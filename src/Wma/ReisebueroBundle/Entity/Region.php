<?php

namespace Wma\ReisebueroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Wma\ReisebueroBundle\Entity\Region
 *
 * @ORM\Table(name="regionen")
 * @ORM\Entity
 */
class Region
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
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="Reise", mappedBy="region")
     */
    protected $reisen;
    
    
    public function __construct($name = '')
    {
        $this->setName($name);
        $this->reisen = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function addReise(\Wma\ReisebueroBundle\Entity\Reise $reise)
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