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
     * @ORM\Column(type="string")
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
     * Add reisen
     *
     * @param Wma\ReisebueroBundle\Entity\Reisen $reisen
     */
    public function addReisen(\Wma\ReisebueroBundle\Entity\Reisen $reisen)
    {
        $this->reisen[] = $reisen;
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