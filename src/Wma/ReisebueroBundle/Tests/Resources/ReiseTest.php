<?php

namespace Wma\ReisebueroBundle\Tests\Resources;

use Wma\ReisebueroBundle\Tests\TestCase;
use Wma\ReisebueroBundle\Entity\Reise;
use Wma\ReisebueroBundle\Entity\Kategorie;
use Wma\ReisebueroBundle\Entity\Region;

class ReiseTest extends TestCase
{
    protected static $entity = 'WmaReisebueroBundle:Reise';           
            
    public function testcreateReise()
    {       
        $reise = $this->buildReise();
        
        $em = $this->getEm();
        $em->persist($reise);
        $em->flush();
        
        $this->assertTrue($reise->getId() > 0);
        
        $reisen = $em->createQueryBuilder()->select("r")->from(static::$entity, 'r')
            ->getQuery()->getResult();
        $this->assertEquals(1, count($reisen));
    }
    
    public function testValid() 
    {
        $reise = $this->buildReise();
        $this->assertEquals(0, $this->getValidator()->validate($reise)->count() );
    }


    public function testPreisValid()
    {
        $reise = $this->buildReise();
        $reise->setPreis(-500);
        $this->assertEquals(1, $this->getValidator()->validate($reise)->count() );
    }
    
    public function testTitelValid()
    {
        $reise = $this->buildReise();
        $reise->setTitel('');
        $this->assertEquals(1, $this->getValidator()->validate($reise)->count() );
    }
    
    public function testSetKategorie()
    {
        $kategorie = new Kategorie('Abenteuerurlaub');
        
        $reise = $this->buildReise();
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
        
        $reise = $this->buildReise();
        $reise->setRegion($region);
        
        $em = $this->getEm();
        $em->persist($region);
        $em->persist($reise);
        $em->flush();
        
        $this->assertEquals( $reise->getRegion()->getId(), $region->getId() );
        $this->assertTrue( $region->getId() > 0 );
    }
        
    protected function buildReise()
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