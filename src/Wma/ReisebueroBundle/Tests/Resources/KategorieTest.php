<?php

namespace Wma\ReisebueroBundle\Tests\Resources;

use Wma\ReisebueroBundle\Tests\ResourceTestCase as TestCase;
use Wma\ReisebueroBundle\Entity\Kategorie;

class KategorieTest  extends TestCase
{
    protected static $entity = 'WmaReisebueroBundle:Kategorie';
       
    public function testNameValid()
    {
        $kategorie = $this->build();
        $kategorie->setName('');
        $this->assertNotValid($kategorie);
    }
    
    protected function build()
    {
        $kategorie = new Kategorie();
        $kategorie->setName("Kreuzfahrt");
        $this->assertValid($kategorie);
        return $kategorie;
    }
}