<?php

namespace Wma\ReisebueroBundle\Tests\Resources;

use Wma\ReisebueroBundle\Tests\TestCase;
use Wma\ReisebueroBundle\Entity\Kategorie;

class KategorieTest  extends TestCase
{
    protected static $entity = 'WmaReisebueroBundle:Kategorie';
    
    public function testCreateKategorie() 
    {
        $kategorie = $this->buildKategorie();
        
        $em = $this->getEm();
        $em->persist($kategorie);
        $em->flush();
        
        $this->assertTrue($kategorie->getId() > 0);
        
        $kategorien = $em->createQueryBuilder()->select("k")->from(static::$entity, 'k')
            ->getQuery()->getResult();
        $this->assertEquals(1, count($kategorien));
    }
    
    public function testNameValid()
    {
        $kategorie = $this->buildKategorie();
        $kategorie->setName('');
        $this->assertEquals(1, $this->getValidator()->validate($kategorie)->count() );
    }
    
    protected function buildKategorie()
    {
        $kategorie = new Kategorie();
        $kategorie->setName("Kreuzfahrt");
        
        return $kategorie;
    }
}