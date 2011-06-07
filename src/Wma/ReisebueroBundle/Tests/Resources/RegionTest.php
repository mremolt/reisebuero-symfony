<?php

namespace Wma\ReisebueroBundle\Tests\Resources;

use Wma\ReisebueroBundle\Tests\ResourceTestCase as TestCase;
use Wma\ReisebueroBundle\Entity\Region;

class RegionTest extends TestCase
{
    protected static $entity = 'WmaReisebueroBundle:Region';
    
    public function testNameValid()
    {
        $region = $this->build();
        $region->setName('');
        $this->assertEquals(1, $this->getValidator()->validate($region)->count() );
    }
    
    protected function build()
    {
        $region = new Region();
        $region->setName("Antarktis");
        return $region;
    }
}