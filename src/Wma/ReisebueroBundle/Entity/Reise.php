<?php

namespace Wma\ReisebueroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Wma\ReisebueroBundle\Entity\Reise
 *
 * @ORM\Table(name="reisen")
 * @ORM\Entity
 */
class Reise
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
     * @ORM\Column(type="string", length="255", unique="true")
     * @Assert\NotBlank()
     */
    private $titel;
    
    /**
     * @ORM\Column(type="decimal", precision="6", scale="2")
     * @Assert\NotBlank()
     * @Assert\Min(0.1)
     */
    private $preis;
    
    /**
     * @ORM\Column(type="text", nullable="true")
     */
    private $kurzbeschreibung;
    
    
    /**
     * @ORM\Column(type="text", nullable="true")
     */
    private $beschreibung;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $beginn;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $ende;
    
    /**
     * @ORM\Column(type="string", nullable="true")
     */
    private $bild;
    
    /**
     * @ORM\Column(type="string", nullable="true")
     */
    private $thumbnail;
    
    /**
     * @ORM\ManyToOne(targetEntity="Kategorie", inversedBy="reisen")
     */
    private $kategorie;
    
    /**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="reisen")
     */
    private $region;

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
     * Set titel
     *
     * @param string $titel
     */
    public function setTitel($titel)
    {
        $this->titel = $titel;
    }

    /**
     * Get titel
     *
     * @return string $titel
     */
    public function getTitel()
    {
        return $this->titel;
    }

    /**
     * Set preis
     *
     * @param decimal $preis
     */
    public function setPreis($preis)
    {
        $this->preis = $preis;
    }

    /**
     * Get preis
     *
     * @return decimal $preis
     */
    public function getPreis()
    {
        return $this->preis;
    }

    /**
     * Set kurzbeschreibung
     *
     * @param text $kurzbeschreibung
     */
    public function setKurzbeschreibung($kurzbeschreibung)
    {
        $this->kurzbeschreibung = $kurzbeschreibung;
    }

    /**
     * Get kurzbeschreibung
     *
     * @return text $kurzbeschreibung
     */
    public function getKurzbeschreibung()
    {
        return $this->kurzbeschreibung;
    }

    /**
     * Set beschreibung
     *
     * @param text $beschreibung
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;
    }

    /**
     * Get beschreibung
     *
     * @return text $beschreibung
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }
    
    /**
     * Set beginn
     *
     * @param date $beginn
     */
    public function setBeginn($beginn)
    {
        $this->beginn = $beginn;
    }

    /**
     * Get beginn
     *
     * @return date $beginn
     */
    public function getBeginn()
    {
        return $this->beginn;
    }

    /**
     * Set ende
     *
     * @param date $ende
     */
    public function setEnde($ende)
    {
        $this->ende = $ende;
    }

    /**
     * Get ende
     *
     * @return date $ende
     */
    public function getEnde()
    {
        return $this->ende;
    }

    /**
     * Set bild
     *
     * @param string $bild
     */
    public function setBild($bild)
    {
        $this->bild = $bild;
    }

    /**
     * Get bild
     *
     * @return string $bild
     */
    public function getBild()
    {
        return $this->bild;
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * Get thumbnail
     *
     * @return string $thumbnail
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set kategorie
     *
     * @param Wma\ReisebueroBundle\Entity\Kategorie $kategorie
     */
    public function setKategorie(\Wma\ReisebueroBundle\Entity\Kategorie $kategorie)
    {
        $this->kategorie = $kategorie;
    }

    /**
     * Get kategorie
     *
     * @return Wma\ReisebueroBundle\Entity\Kategorie $kategorie
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }

    /**
     * Set region
     *
     * @param Wma\ReisebueroBundle\Entity\Region $region
     */
    public function setRegion(\Wma\ReisebueroBundle\Entity\Region $region)
    {
        $this->region = $region;
    }

    /**
     * Get region
     *
     * @return Wma\ReisebueroBundle\Entity\Region $region
     */
    public function getRegion()
    {
        return $this->region;
    }
}