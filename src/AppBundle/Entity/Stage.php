<?php

namespace AppBundle\Entity;

/**
 * Stage
 */
class Stage
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $sujetStage;

    /**
     * @var string
     */
    private $descStage;

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
     * Set sujetStage
     *
     * @param string $sujetStage
     *
     * @return Stage
     */
    public function setSujetStage($sujetStage)
    {
        $this->sujetStage = $sujetStage;

        return $this;
    }

    /**
     * Get sujetStage
     *
     * @return string
     */
    public function getSujetStage()
    {
        return $this->sujetStage;
    }

    /**
     * Set descStage
     *
     * @param string $descStage
     *
     * @return Stage
     */
    public function setDescStage($descStage)
    {
        $this->descStage = $descStage;

        return $this;
    }

    /**
     * Get descStage
     *
     * @return string
     */
    public function getDescStage()
    {
        return $this->descStage;
    }

    /**
     * Set dateDeb
     *
     * @param \DateTime $dateDeb
     *
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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

