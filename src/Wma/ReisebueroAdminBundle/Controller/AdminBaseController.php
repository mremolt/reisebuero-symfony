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