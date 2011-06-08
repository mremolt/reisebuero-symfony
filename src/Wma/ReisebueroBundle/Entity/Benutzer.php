<?php

namespace Wma\ReisebueroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Wma\ReisebueroBundle\Entity\Benutzer
 *
 * @ORM\Table(name="benutzer")
 * @ORM\Entity
 */
class Benutzer implements UserInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $benutzername
     *
     * @ORM\Column(name="benutzername", type="string", length=45, unique="true")
     */
    private $benutzername;

    /**
     * @var string $passwort
     *
     * @ORM\Column(name="passwort", type="string", length=20)
     */
    private $passwort;


    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set benutzername
     *
     * @param string $benutzername
     */
    public function setBenutzername($benutzername)
    {
        $this->benutzername = $benutzername;
    }

    /**
     * Get benutzername
     *
     * @return string $benutzername
     */
    public function getBenutzername()
    {
        return $this->benutzername;
    }

    /**
     * Set passwort
     *
     * @param string $passwort
     */
    public function setPasswort($passwort)
    {
        $this->passwort = $passwort;
    }

    /**
     * Get passwort
     *
     * @return string $passwort
     */
    public function getPasswort()
    {
        return $this->passwort;
    }
    
    /* UserInterface */
    public function getRoles()
    {
        return array("ROLE_ADMIN");
    }
    
    public function getPassword()
    {
        return $this->passwort;
    }
    
    public function getSalt()
    {
        return null;
    }
    
    public function getUsername()
    {
        return $this->getBenutzername();
    }
    
    public function eraseCredentials() 
    {
        // do nothing
    }
    
    public function equals(UserInterface $user)
    {
        return ($this->getId() == $user->getId()) && 
                ($this->getBenutzername() == $user->getBenutzername());
    }
    
    public function __toString()
    {
        return $this->getBenutzername();
    }
   
}