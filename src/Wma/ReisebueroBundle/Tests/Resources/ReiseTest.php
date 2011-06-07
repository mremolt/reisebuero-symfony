<?php

namespace Wma\ReisebueroBundle\Tests\Resources;

use Wma\ReisebueroBundle\Tests\ResourceTestCase as TestCase;
use Wma\ReisebueroBundle\Entity\Reise;
use Wma\ReisebueroBundle\Entity\Kategorie;
use Wma\ReisebueroBundle\Entity\Region;

class ReiseTest extends TestCase
{
    protected static $entity = 'WmaReisebueroBundle:Reise';           
       
    public function testPreisValid()
    {
        $reise = $this->build();
        $reise->setPreis(-500);
        $this->assertEquals(1, $this->getValidator()->validate($reise)->count() );
    }
    
    public function testTitelValid()
    {
        $reise = $this->build();
        $reise->setTitel('');
        $this->assertEquals(1, $this->getValidator()->validate($reise)->count() );
    }
    
    public function testSetKategorie()
    {
        $kategorie = new Kategorie('Abenteuerurlaub');
        
        $reise = $this->build();
        $reise->setKategorie($kategorie);
        
        $em = $this->getEm();
        $em->persist($kategorie);
        $em->persist($reise);
        $em->flush();
        
        $this->assertEquals( $reise->getKategorie()->getId(), $kategorie->getId() );
        $this->assertTrue( $kategorie->getId() > 0 );
    }
    
    public function testSetRegion()
    {
        $region = new Region('Amazonas');
        
        $reise = $this->build();
        $reise->setRegion($region);
        
        $em = $this->getEm();
        $em->persist($region);
        $em->persist($reise);
        $em->flush();
        
        $this->assertEquals( $reise->getRegion()->getId(), $region->getId() );
        $this->assertTrue( $region->getId() > 0 );
    }
        
    protected function build()
    {
        $reise = new Reise();
        $reise->setTitel("Tolle Reise in die Karibik");
        $reise->setPreis(2500.00);
        $reise->setKurzbeschreibung('Lorem Ipsum kurz.');
        $reise->setBeschreibung('Lorem Ipsum lang.');
        $reise->setBeginn( new \DateTime('2011-07-12') );
        $reise->setEnde( new \DateTime('2011-07-12') );
        
        return $reise;
    }
}