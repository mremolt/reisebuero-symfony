<?php

namespace Wma\ReisebueroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Wma\ReisebueroBundle\Entity\Buchung
 *
 * @ORM\Entity
 * @ORM\Table(name="buchungen")
 */
class Buchung
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
     * @var integer $anzahl_reisende
     *
     * @ORM\Column(name="anzahl_reisende", type="integer")
     * @Assert\NotBlank()
     * @Assert\Min(0.1)
     */
    private $anzahl_reisende;

    /**
     * @var date $buchungs_datum
     *
     * @ORM\Column(name="buchungs_datum", type="date")
     */
    private $buchungs_datum;

    /**
     * @var string $anrede
     *
     * @ORM\Column(name="anrede", type="string", length=20)
     * @Assert\NotBlank()
     */
    private $anrede;

    /**
     * @var string $vorname
     *
     * @ORM\Column(name="vorname", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $vorname;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string $strasse
     *
     * @ORM\Column(name="strasse", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $strasse;

    /**
     * @var string $ort
     *
     * @ORM\Column(name="ort", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $ort;

    /**
     * @var string $plz
     *
     * @ORM\Column(name="plz", type="string", length=5)
     * @Assert\NotBlank()
     */
    private $plz;

    /**
     * @var string $telefon_nr
     *
     * @ORM\Column(name="telefon_nr", type="string", length=80, nullable=true)
     */
    private $telefon_nr;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=true)
     */
    private $email;
    
    /**
     * @var Reise
     *
     * @ORM\ManyToOne(targetEntity="Reise", inversedBy="buchungen")
     */
    private $reise;

    
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
     * Set anzahl_reisende
     *
     * @param integer $anzahlReisende
     */
    public function setAnzahlReisende($anzahlReisende)
    {
        $this->anzahl_reisende = $anzahlReisende;
    }

    /**
     * Get anzahl_reisende
     *
     * @return integer $anzahlReisende
     */
    public function getAnzahlReisende()
    {
        return $this->anzahl_reisende;
    }

    /**
     * Set buchungs_datum
     *
     * @param date $buchungsDatum
     */
    public function setBuchungsDatum($buchungsDatum)
    {
        $this->buchungs_datum = $buchungsDatum;
    }

    /**
     * Get buchungs_datum
     *
     * @return date $buchungsDatum
     */
    public function getBuchungsDatum()
    {
        return $this->buchungs_datum;
    }

    /**
     * Set anrede
     *
     * @param string $anrede
     */
    public function setAnrede($anrede)
    {
        $this->anrede = $anrede;
    }

    /**
     * Get anrede
     *
     * @return string $anrede
     */
    public function getAnrede()
    {
        return $this->anrede;
    }

    /**
     * Set vorname
     *
     * @param string $vorname
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

    /**
     * Get vorname
     *
     * @return string $vorname
     */
    public function getVorname()
    {
        return $this->vorname;
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
     * Set strasse
     *
     * @param string $strasse
     */
    public function setStrasse($strasse)
    {
        $this->strasse = $strasse;
    }

    /**
     * Get strasse
     *
     * @return string $strasse
     */
    public function getStrasse()
    {
        return $this->strasse;
    }

    /**
     * Set ort
     *
     * @param string $ort
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;
    }

    /**
     * Get ort
     *
     * @return string $ort
     */
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * Set plz
     *
     * @param string $plz
     */
    public function setPlz($plz)
    {
        $this->plz = $plz;
    }

    /**
     * Get plz
     *
     * @return string $plz
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Set telefon_nr
     *
     * @param string $telefonNr
     */
    public function setTelefonNr($telefonNr)
    {
        $this->telefon_nr = $telefonNr;
    }

    /**
     * Get telefon_nr
     *
     * @return string $telefonNr
     */
    public function getTelefonNr()
    {
        return $this->telefon_nr;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set reise
     *
     * @param Wma\ReisebueroBundle\Entity\Reise $reise
     */
    public function setReise(\Wma\ReisebueroBundle\Entity\Reise $reise)
    {
        $this->reise = $reise;
    }

    /**
     * Get reise
     *
     * @return Wma\ReisebueroBundle\Entity\Reise $reise
     */
    public function getReise()
    {
        return $this->reise;
    }
}