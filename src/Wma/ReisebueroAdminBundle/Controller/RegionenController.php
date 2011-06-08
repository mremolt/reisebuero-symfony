<?php

namespace Wma\ReisebueroAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Wma\ReisebueroAdminBundle\Controller\AdminBaseController;

use Wma\ReisebueroBundle\Entity\Region;
use Wma\ReisebueroAdminBundle\Form\RegionType;

class RegionenController extends AdminBaseController
{
    /**
     * @Route("/", name="_admin_regionen_index")
     * @Template
     */
    public function indexAction()
    {
        $regionen = $this->getQueryBuilder()->orderBy('r.name')
                ->getQuery()->getResult();
        
        return array(
            'regionen' => $regionen
        );
    }
    
    /**
     * @Route("/new", name="_admin_regionen_new")
     * @Template
     */
    public function newAction()
    {
        $region = new Region();
        $form = $this->createForm(new RegionType(), $region);
        
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $this->persist($region);
                
                $this->setNotice("Region '$region' wurde erfolgreich angelegt!");
                return $this->redirect($this->generateUrl('_admin_regionen_index'));
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/edit/{id}", name="_admin_regionen_edit")
     * @Template
     */
    public function editAction($id)
    {
        $region = $this->getRepository()->find($id);
        $form = $this->createForm(new RegionType(), $region);
        
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $this->persist($region);
                
                $this->setNotice("Region '$region' wurde erfolgreich bearbeitet!");
                return $this->redirect($this->generateUrl('_admin_regionen_index'));
            }
        }
        
        return array(
            'kategorie' => $region,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/delete/{id}", name="_admin_regionen_delete")
     * @Template
     */
    public function deleteAction($id)
    {
        $this->getQueryBuilder()->delete('WmaReisebueroBundle:Region', 'k')
                ->where('k.id = :id')->setParameter('id', $id)
                ->getQuery()->getResult();
        
        $this->setNotice("Region wurde erfolgreich geköscht!");
        return $this->redirect($this->generateUrl('_admin_regionen_index'));
    }
    
    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository()
    {
        return $this->getEm()->getRepository('WmaReisebueroBundle:Region');
    }
    
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function getQueryBuilder()
    {
        return $this->getRepository()->createQueryBuilder('r');
    }
}