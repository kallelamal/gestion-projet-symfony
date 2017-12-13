<?php

namespace AppBundle\Entity;

/**
 * Etudiant_Enseignant
 */
class Etudiant_Enseignant
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $idEtd;

    /**
     * @var int
     */
    private $idEns;

    /**
     * @var \DateTime
     */
    private $date;


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
     * Set idEtd
     *
     * @param integer $idEtd
     *
     * @return Etudiant_Enseignant
     */
    public function setIdEtd($idEtd)
    {
        $this->idEtd = $idEtd;

        return $this;
    }

    /**
     * Get idEtd
     *
     * @return int
     */
    public function getIdEtd()
    {
        return $this->idEtd;
    }

    /**
     * Set idEns
     *
     * @param integer $idEns
     *
     * @return Etudiant_Enseignant
     */
    public function setIdEns($idEns)
    {
        $this->idEns = $idEns;

        return $this;
    }

    /**
     * Get idEns
     *
     * @return int
     */
    public function getIdEns()
    {
        return $this->idEns;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Etudiant_Enseignant
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}

