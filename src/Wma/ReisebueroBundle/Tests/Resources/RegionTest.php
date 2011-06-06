<?php

namespace Wma\ReisebueroBundle\Tests\Resources;

use Wma\ReisebueroBundle\Tests\TestCase;
use Wma\ReisebueroBundle\Entity\Region;

class RegionTest extends TestCase
{
    protected static $entity = 'WmaReisebueroBundle:Region';
    
    public function testCreateRegion() 
    {
        $region = $this->buildRegion();
        
        $em = $this->getEm();
        $em->persist($region);
        $em->flush();
        
        $this->assertTrue($region->getId() > 0);
        
        $regionen = $em->createQueryBuilder()->select("r")->from(static::$entity, 'r')
            ->getQuery()->getResult();
        $this->assertEquals(1, count($regionen));
    }
    
    public function testNameValid()
    {
        $region = $this->buildRegion();
        $region->setName('');
        $this->assertEquals(1, $this->getValidator()->validate($region)->count() );
    }
    
    protected function buildRegion()
    {
        $region = new Region();
        $region->setName("Antarktis");
        
        return $region;
    }
}