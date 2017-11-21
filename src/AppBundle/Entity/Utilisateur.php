<?php

namespace AppBundle\Entity;

/**
 * Utilisateur
 */
class Utilisateur
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $cin;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $tel;

    /**
     * @var \DateTime
     */
    private $dateNaiss;

    /**
     * @var string
     */
    private $cycleEtude;

    /**
     * @var string
     */
    private $niveauEtude;

    /**
     * @var string
     */
    private $specialite;

    /**
     * @var string
     */
    private $grade;

    /**
     * @var string
     */
    private $nomEnt;

    /**
     * @var string
     */
    private $telEnt;

    /**
     * @var string
     */
    private $faxEnt;

    /**
     * @var string
     */
    private $adresseEnt;

    /**
     * @var int
     */
    private $type;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Utilisateur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Utilisateur
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set cin
     *
     * @param string $cin
     *
     * @return Utilisateur
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Utilisateur
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set dateNaiss
     *
     * @param \DateTime $dateNaiss
     *
     * @return Utilisateur
     */
    public function setDateNaiss($dateNaiss)
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    /**
     * Get dateNaiss
     *
     * @return \DateTime
     */
    public function getDateNaiss()
    {
        return $this->dateNaiss;
    }

    /**
     * Set cycleEtude
     *
     * @param string $cycleEtude
     *
     * @return Utilisateur
     */
    public function setCycleEtude($cycleEtude)
    {
        $this->cycleEtude = $cycleEtude;

        return $this;
    }

    /**
     * Get cycleEtude
     *
     * @return string
     */
    public function getCycleEtude()
    {
        return $this->cycleEtude;
    }

    /**
     * Set niveauEtude
     *
     * @param string $niveauEtude
     *
     * @return Utilisateur
     */
    public function setNiveauEtude($niveauEtude)
    {
        $this->niveauEtude = $niveauEtude;

        return $this;
    }

    /**
     * Get niveauEtude
     *
     * @return string
     */
    public function getNiveauEtude()
    {
        return $this->niveauEtude;
    }

    /**
     * Set specialite
     *
     * @param string $specialite
     *
     * @return Utilisateur
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set grade
     *
     * @param string $grade
     *
     * @return Utilisateur
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set nomEnt
     *
     * @param string $nomEnt
     *
     * @return Utilisateur
     */
    public function setNomEnt($nomEnt)
    {
        $this->nomEnt = $nomEnt;

        return $this;
    }

    /**
     * Get nomEnt
     *
     * @return string
     */
    public function getNomEnt()
    {
        return $this->nomEnt;
    }

    /**
     * Set telEnt
     *
     * @param string $telEnt
     *
     * @return Utilisateur
     */
    public function setTelEnt($telEnt)
    {
        $this->telEnt = $telEnt;

        return $this;
    }

    /**
     * Get telEnt
     *
     * @return string
     */
    public function getTelEnt()
    {
        return $this->telEnt;
    }

    /**
     * Set faxEnt
     *
     * @param string $faxEnt
     *
     * @return Utilisateur
     */
    public function setFaxEnt($faxEnt)
    {
        $this->faxEnt = $faxEnt;

        return $this;
    }

    /**
     * Get faxEnt
     *
     * @return string
     */
    public function getFaxEnt()
    {
        return $this->faxEnt;
    }

    /**
     * Set adresseEnt
     *
     * @param string $adresseEnt
     *
     * @return Utilisateur
     */
    public function setAdresseEnt($adresseEnt)
    {
        $this->adresseEnt = $adresseEnt;

        return $this;
    }

    /**
     * Get adresseEnt
     *
     * @return string
     */
    public function getAdresseEnt()
    {
        return $this->adresseEnt;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Utilisateur
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }
}

