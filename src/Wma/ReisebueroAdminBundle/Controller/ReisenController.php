<?php

namespace Wma\ReisebueroAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Wma\ReisebueroBundle\Entity\Reise;
use Wma\ReisebueroAdminBundle\Form\ReiseType;


class ReisenController extends Controller
{
    /**
     * @Route("/", name="_admin_reisen_index")
     * @Template()
     */
    public function indexAction()
    {
        $query = $this->getQueryBuilder()->orderBy('r.beginn', 'DESC')->getQuery();
        
        return array('reisen' => $query->getResult());
    }
    
    /**
     * @Route("/new", name="_admin_reisen_new")
     * @Template()
     */
    public function newAction()
    {
        $reise = new Reise();
        $form = $this->createForm(new ReiseType(), $reise);
        
        return array(
            'form' => $form,
            'reise' => $reise,
        );
    }
    
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
    
}
