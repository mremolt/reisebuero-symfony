<?php

namespace Wma\ReisebueroBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestCase extends WebTestCase {
    protected static $entity = null;
    protected $em = null;
    
    public function setUp() {
        parent::setUp();
        //$this->truncate();
        $this->getEm()->beginTransaction();
    }
    
    public function tearDown()
    {
        parent::tearDown();
        $this->getEm()->getConnection()->rollback();
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
        if (! $this->em ) {
            $this->em = $this->getKernel()->getContainer()->get('doctrine.orm.entity_manager');
        }
        return $this->em;
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
        $conn = $this->getEm()->getConnection();
        $conn->executeQuery("TRUNCATE TABLE reisen");
        $conn->executeQuery("TRUNCATE TABLE kategorien");
        $conn->executeQuery("TRUNCATE TABLE regionen");
    }
}

?>
