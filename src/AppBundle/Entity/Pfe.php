<?php

namespace AppBundle\Entity;

/**
 * Pfe
 */
class Pfe
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $sujetPfe;

    /**
     * @var string
     */
    private $descPfe;

    /**
     * @var \DateTime
     */
    private $dateDeb;

    /**
     * @var \DateTime
     */
    private $dateFin;

    /**
     * @var bool
     */
    private $etatProposition;

    /**
     * @var bool
     */
    private $etatDemande;

    /**
     * @var int
     */
    private $idProp;


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
     * Set sujetPfe
     *
     * @param string $sujetPfe
     *
     * @return Pfe
     */
    public function setSujetPfe($sujetPfe)
    {
        $this->sujetPfe = $sujetPfe;

        return $this;
    }

    /**
     * Get sujetPfe
     *
     * @return string
     */
    public function getSujetPfe()
    {
        return $this->sujetPfe;
    }

    /**
     * Set descPfe
     *
     * @param string $descPfe
     *
     * @return Pfe
     */
    public function setDescPfe($descPfe)
    {
        $this->descPfe = $descPfe;

        return $this;
    }

    /**
     * Get descPfe
     *
     * @return string
     */
    public function getDescPfe()
    {
        return $this->descPfe;
    }

    /**
     * Set dateDeb
     *
     * @param \DateTime $dateDeb
     *
     * @return Pfe
     */
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    /**
     * Get dateDeb
     *
     * @return \DateTime
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Pfe
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set etatProposition
     *
     * @param boolean $etatProposition
     *
     * @return Pfe
     */
    public function setEtatProposition($etatProposition)
    {
        $this->etatProposition = $etatProposition;

        return $this;
    }

    /**
     * Get etatProposition
     *
     * @return bool
     */
    public function getEtatProposition()
    {
        return $this->etatProposition;
    }

    /**
     * Set etatDemande
     *
     * @param boolean $etatDemande
     *
     * @return Pfe
     */
    public function setEtatDemande($etatDemande)
    {
        $this->etatDemande = $etatDemande;

        return $this;
    }

    /**
     * Get etatDemande
     *
     * @return bool
     */
    public function getEtatDemande()
    {
        return $this->etatDemande;
    }

    /**
     * Set idProp
     *
     * @param integer $idProp
     *
     * @return Pfe
     */
    public function setIdProp($idProp)
    {
        $this->idProp = $idProp;

        return $this;
    }

    /**
     * Get idProp
     *
     * @return int
     */
    public function getIdProp()
    {
        return $this->idProp;
    }
}

