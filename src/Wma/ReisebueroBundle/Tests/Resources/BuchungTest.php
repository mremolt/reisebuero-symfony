<?php

use Wma\ReisebueroBundle\Tests\ResourceTestCase as TestCase;
use Wma\ReisebueroBundle\Entity\Buchung;
use Wma\ReisebueroBundle\Tests\Factory;


class BuchungTest extends TestCase
{
    protected static $entity = 'WmaReisebueroBundle:Buchung';
    
    public function testAnzahlReisendePositive()
    {
        $buchung = $this->build();
        $buchung->setAnzahlReisende(-5);
        $this->assertNotValid($buchung);
    }
    
    public function testRequiredAnzahlReisende()
    {
        $buchung = $this->build();
        $buchung->setAnzahlReisende(null);
        $this->assertNotValid($buchung);
    }
    
    public function testRequiredVorname()
    {
        $buchung = $this->build();
        $buchung->setVorname(null);
        $this->assertNotValid($buchung);
    }
    
    public function testSetReise()
    {
        $em = $this->getEm();
        Factory::setEm($em);
        
        $reise = Factory::create("Reise"); 
        $buchung = $this->build();    
        $buchung->setReise($reise);
        
        $em->persist($buchung);
        $em->flush();
        // refresh $reise with db state
        $em->refresh($reise);
        
        $this->assertEquals(1, $reise->getBuchungen()->count() );
    }
    
    protected function build()
    {
        $buchung = new Buchung();
        $buchung->setAnzahlReisende(42);
        $buchung->setBuchungsDatum( new \DateTime('2011-05-23') );
        $buchung->setAnrede('Herr');
        $buchung->setVorname('Arthur');
        $buchung->setName('Dent');
        $buchung->setStrasse('Teststraße 5');
        $buchung->setPlz('54321');
        $buchung->setOrt('Testhausen');
        
        return $buchung;
    }
}