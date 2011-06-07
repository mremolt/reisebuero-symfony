<?php

namespace Wma\ReisebueroBundle\Tests;

class Factory {
    protected static $em = null;
    
    public static function build($entity_name)
    {
        $method = 'build' . $entity_name;
        return self::$method();
    }
    
    public static function create($entity_name)
    {
        $entity = self::build($entity_name);
        self::getEm()->persist($entity);
        self::getEm()->flush();
        return $entity;
    }
    
    protected static function buildReise()
    {
        $reise = new \Wma\ReisebueroBundle\Entity\Reise();
        $reise->setTitel("Tolle Reise in die Karibik");
        $reise->setPreis(2500.00);
        $reise->setKurzbeschreibung('Lorem Ipsum kurz.');
        $reise->setBeschreibung('Lorem Ipsum lang.');
        $reise->setBeginn( new \DateTime('2011-07-12') );
        $reise->setEnde( new \DateTime('2011-07-12') );
        
        return $reise;
    }
    
    /* helper methods */
    
    public static function setEm(\Doctrine\ORM\EntityManager $em)
    {
        self::$em = $em;
    }
    
    /**
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected static function getEm()
    {
        return self::$em;
    }
}