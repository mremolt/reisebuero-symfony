<?php

namespace Wma\ReisebueroAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Wma\ReisebueroBundle\Entity\Reise;
use Wma\ReisebueroAdminBundle\Form\ReiseType;
use Wma\ReisebueroAdminBundle\Controller\AdminBaseController;

/**
 * @Route("/reisen", name="_admin_reisen")
 * @Secure(roles="ROLE_ADMIN")
 */
class ReisenController extends AdminBaseController
{
    /**
     * @Route("/", name="_admin_reisen_index")
     * @Template()
     * 
     */
    public function indexAction()
    {
        $reisen = $this->getQueryBuilder()->select('r, kat, reg')
                ->join('r.kategorie', 'kat')->join('r.region', 'reg')
                ->orderBy('r.beginn', 'DESC')
                ->getQuery()->getResult();

        return array('reisen' => $reisen);
    }
    
    /**
     * @Route("/new", name="_admin_reisen_new")
     * @Template()
     */
    public function newAction()
    {
        $reise = new Reise();
        $form = $this->createForm(new ReiseType(), $reise);
        
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $this->persist($reise);
                
                $this->setNotice('Reise wurde erfolgreich angelegt!');
                return $this->redirect($this->generateUrl('_admin_reisen_index'));
            }
        }
        
        return array(
            'form' => $form->createView(),
            'reise' => $reise,
        );
    }
    
    /**
     * @Route("/edit/{id}", name="_admin_reisen_edit")
     * @Template
     */
    public function editAction($id)
    {        
        $reise = $this->getQueryBuilder()->select('r, kat, reg')
                ->join('r.kategorie', 'kat')->join('r.region', 'reg')
                ->where('r.id = :id')->setParameter('id', $id)
                ->orderBy('r.beginn', 'DESC')
                ->getQuery()->getSingleResult();
        
        $form = $this->createForm(new ReiseType(), $reise);
        
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $this->persist($reise);
                
                $this->setNotice('Reise wurde erfolgreich bearbeitet!');
                return $this->redirect($this->generateUrl('_admin_reisen_index'));
            }
        }
        
        return array(
            'form' => $form->createView(),
            'reise' => $reise,
        );
    }
    
    /**
     * @Route("/delete/{id}", name="_admin_reisen_delete")
     */
    public function deleteAction($id)
    {
        $this->getQueryBuilder()->delete('WmaReisebueroBundle:Reise r')
                ->where('r.id = :id')->setParameter('id', $id)
                ->getQuery()->getResult();
        
        $this->setNotice('Reise wurde erfolgreich gelöscht!');
        return $this->redirect($this->generateUrl('_admin_reisen_index'));
    }    
    
    /**
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository()
    {
        return $this->getEm()->getRepository('WmaReisebueroBundle:Reise');
    }
    
    /**
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function getQueryBuilder()
    {
        return $this->getRepository()->createQueryBuilder('r');
    }
}