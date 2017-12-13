<?php

namespace AppBundle\Entity;

/**
 * Etudiant_PFE
 */
class Etudiant_PFE
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
    private $idPfe;

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
     * @return Etudiant_PFE
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
     * Set idPfe
     *
     * @param integer $idPfe
     *
     * @return Etudiant_PFE
     */
    public function setIdPfe($idPfe)
    {
        $this->idPfe = $idPfe;

        return $this;
    }

    /**
     * Get idPfe
     *
     * @return int
     */
    public function getIdPfe()
    {
        return $this->idPfe;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Etudiant_PFE
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

