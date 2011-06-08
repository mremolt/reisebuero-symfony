<?php

namespace Wma\ReisebueroAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminBaseController extends Controller
{
    /**
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm()
    {
        return $this->get('doctrine')->getEntityManager();
    }
    
    protected function persist($resource) 
    {
        $em = $this->getEm();
        $em->persist($resource);
        $em->flush();
    }
    
    protected function setNotice($text)
    {
        $this->get('session')->setFlash('notice', $text);
    }
}