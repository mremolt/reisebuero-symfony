<?php

use Wma\ReisebueroBundle\Tests\ResourceTestCase as TestCase;
use Wma\ReisebueroBundle\Entity\Benutzer;


class BenutzerTest extends TestCase
{
    protected static $entity = 'WmaReisebueroBundle:Benutzer';
    
    
    
    
    /**
     * @return Benutzer 
     */
    protected function build()
    {
        $benutzer = new Benutzer();
        $benutzer->setBenutzername('admin');
        $benutzer->setPasswort('geheim');
        
        return $benutzer;
    }
}
