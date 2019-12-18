<?php


namespace App\metier;


class ProprietaireT implements \JsonSerializable
{

        private $idPRO;
        private $nomPRO;
        private $prenomPRO;
        private $mailPRO;
        private $adressePRO;


    /**
     * @return mixed
     */
    public function getIdPRO()
    {
        return $this->idPRO;
    }

    /**
     * @param mixed $idPRO
     * @return ProprietaireT
     */
    public function setIdPRO($idPRO)
    {
        $this->idPRO = $idPRO;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomPRO()
    {
        return $this->nomPRO;
    }

    /**
     * @param mixed $nomPRO
     * @return ProprietaireT
     */
    public function setNomPRO($nomPRO)
    {
        $this->nomPRO = $nomPRO;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenomPRO()
    {
        return $this->prenomPRO;
    }

    /**
     * @param mixed $prenomPRO
     * @return ProprietaireT
     */
    public function setPrenomPRO($prenomPRO)
    {
        $this->prenomPRO = $prenomPRO;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMailPRO()
    {
        return $this->mailPRO;
    }

    /**
     * @param mixed $mailPRO
     * @return ProprietaireT
     */
    public function setMailPRO($mailPRO)
    {
        $this->mailPRO = $mailPRO;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdressePRO()
    {
        return $this->adressePRO;
    }

    /**
     * @param mixed $adressePRO
     * @return ProprietaireT
     */
    public function setAdressePRO($adressePRO)
    {
        $this->adressePRO = $adressePRO;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
