<?php

namespace Wma\ReisebueroAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Wma\ReisebueroAdminBundle\Controller\AdminBaseController;

use Wma\ReisebueroBundle\Entity\Kategorie;
use Wma\ReisebueroAdminBundle\Form\KategorieType;

class KategorienController extends AdminBaseController
{
    /**
     * @Route("/", name="_admin_kategorien_index")
     * @Template
     */
    public function indexAction()
    {
        $kategorien = $this->getQueryBuilder()->orderBy('k.name')
                ->getQuery()->getResult();
        
        return array(
            'kategorien' => $kategorien
        );
    }
    
    /**
     * @Route("/new", name="_admin_kategorien_new")
     * @Template
     */
    public function newAction()
    {
        $kategorie = new Kategorie();
        $form = $this->createForm(new KategorieType(), $kategorie);
        
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $this->persist($kategorie);
                
                $this->setNotice("Kategorie '$kategorie' wurde erfolgreich angelegt!");
                return $this->redirect($this->generateUrl('_admin_kategorien_index'));
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/edit/{id}", name="_admin_kategorien_edit")
     * @Template
     */
    public function editAction($id)
    {
        $kategorie = $this->getRepository()->find($id);
        $form = $this->createForm(new KategorieType(), $kategorie);
        
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $this->persist($kategorie);
                
                $this->setNotice("Kategorie '$kategorie' wurde erfolgreich bearbeitet!");
                return $this->redirect($this->generateUrl('_admin_kategorien_index'));
            }
        }
        
        return array(
            'kategorie' => $kategorie,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/delete/{id}", name="_admin_kategorien_delete")
     * @Template
     */
    public function deleteAction($id)
    {
        $this->getQueryBuilder()->delete('WmaReisebueroBundle:Kategorie', 'k')
                ->where('k.id = :id')->setParameter('id', $id)
                ->getQuery()->getResult();
        
        $this->setNotice("Kategorie wurde erfolgreich geköscht!");
        return $this->redirect($this->generateUrl('_admin_kategorien_index'));
    }
    
    /**
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository()
    {
        return $this->getEm()->getRepository('WmaReisebueroBundle:Kategorie');
    }
    
    /**
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function getQueryBuilder()
    {
        return $this->getRepository()->createQueryBuilder('k');
    }
}