<?php

namespace Wma\ReisebueroBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class ResourceTestCase extends WebTestCase {
    protected static $entity = null;
    protected $em = null;
    
    public function setUp() 
    {
        parent::setUp();        
        $this->getEm()->beginTransaction();  
    }
    
    public function tearDown()
    {
        parent::tearDown();
        $this->getEm()->getConnection()->rollback();
    }
    
    /* More assertions */
    
    public function assertValid($resource) 
    {
        $validation = $this->getValidator()->validate($resource);
        $this->assertEquals(0, $validation->count(),
                "Object " . get_class($resource) . " is not valid:\n\n" . $validation);
    }
    
    public function assertNotValid($resource) 
    {
        $this->assertNotEquals(0, $this->getValidator()->validate($resource)->count(),
                "Object " . get_class($resource) . " is valid!");
    }
    
    public function assertHasId($resource) 
    {
        $this->assertTrue($resource->getId() > 0, 
                "The object " . get_class($resource) . "was not assigned an ID.");
    }
    
    public function assertNumberOfPersistedResources($resourceName, $number)
    {
        $resources = $this->getEm()->createQueryBuilder()->select("r")
            ->from(static::$entity, 'r')->getQuery()->getResult();
        $number_of_resources = count($resources);
        
        $this->assertEquals($number, $number_of_resources,
                "Expected to find $number persisted $resourceName Entities, got $number_of_resources.");
    }

    /*
     * Standard tests that all resources should go through.
     * Especially ensure the build methods work for every resource
     */
    public function testCreate() 
    {
        $resource = $this->build();
        
        $em = $this->getEm();
        $em->persist($resource);
        $em->flush();
        
        $this->assertHasId($resource);
        $this->assertNumberOfPersistedResources(static::$entity, 1);
    }
    
    public function testValid()
    {
        $this->assertValid($this->build());
    }
    
    
    /* Test helper methods */
    
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
    
    protected abstract function build();
}