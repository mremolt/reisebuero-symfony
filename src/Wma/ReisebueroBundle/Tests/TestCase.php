<?php

namespace Wma\ReisebueroBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestCase extends WebTestCase {
    protected static $entity = null;
    
    public function setUp()
    {
        $this->truncate();
    }
    
    protected function getKernel()
    {
        $kernel = $this->createKernel();
        $kernel->boot();
        return $kernel;
    }
    
    /**
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm()
    {
        return $this->getKernel()->getContainer()->get('doctrine.orm.entity_manager');
    }
    
    protected function getValidator()
    {
        return $this->getKernel()->getContainer()->get('validator');
    }
    
    protected function getTableName()
    {
        if (static::$entity) {
            return $this->getEm()->getMetadataFactory()->getMetadataFor(static::$entity)->getTableName();
        }
    }
    
    protected function truncate()
    {
        $this->getEm()->getConnection()->executeQuery("TRUNCATE TABLE " . $this->getTableName());
    }
}

?>
