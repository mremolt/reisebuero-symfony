<?php

namespace Wma\ReisebueroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Wma\ReisebueroBundle\Entity\Kategorie
 *
 * @ORM\Table(name="kategorien")
 * @ORM\Entity
 */
class Kategorie
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
     * @var string $name
     * @ORM\Column(type="string", unique="true")
     * @Assert\NotBlank()
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="Reise", mappedBy="kategorie")
     */
    protected $reisen;
    
    
    public function __construct($name = '')
    {
        $this->setName($name);
        $this->reisen = new ArrayCollection();
    }
    
    public function __toString() 
    {
        return $this->getName();
    }
    
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add reise
     *
     * @param Wma\ReisebueroBundle\Entity\Reise $reise
     */
    public function addReisen(\Wma\ReisebueroBundle\Entity\Reise $reise)
    {
        $this->reisen[] = $reise;
    }

    /**
     * Get reisen
     *
     * @return Doctrine\Common\Collections\Collection $reisen
     */
    public function getReisen()
    {
        return $this->reisen;
    }
}