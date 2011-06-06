<?php

namespace Wma\ReisebueroBundle\Tests\Resources;

use Wma\ReisebueroBundle\Tests\TestCase;
use Wma\ReisebueroBundle\Entity\Reise;

class ReiseTest extends TestCase 
{
    protected static $entity = 'WmaReisebueroBundle:Reise';           
            
    public function testcreateReise()
    {       
        $reise = $this->buildReise();
        
        $em = $this->getEm();
        $em->persist($reise);
        $em->flush();
        
        $this->assertEquals(1, $reise->getId());
        
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