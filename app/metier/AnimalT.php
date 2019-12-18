<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class AnimalT implements \JsonSerializable {
 private $idAnimal;
        private $CodeIDEN;
        private $CodeSTA;
        private $CodeRace;
        private $IdPRO;
        private $nomAnimal;
        private $dateArriveAnimal;
        private $dateDepartAnimal;
        private $description;
        private $Sexe;
        private $castre;
        private $age;
        private $vacciner;
        private $image;
        private $prixAdoption;

    /**
     * @return mixed
     */
    public function getCodeRace()
    {
        return $this->CodeRace;
    }

    /**
     * @param mixed $CodeRace
     * @return AnimalT
     */
    public function setCodeRace($CodeRace)
    {
        $this->CodeRace = $CodeRace;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPRO()
    {
        return $this->IdPRO;
    }

    /**
     * @param mixed $IdPRO
     * @return AnimalT
     */
    public function setIdPRO($IdPRO)
    {
        $this->IdPRO = $IdPRO;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getIdAnimal()
    {
        return $this->idAnimal;
    }

    /**
     * @param mixed $idAnimal
     * @return AnimalT
     */
    public function setIdAnimal($idAnimal)
    {
        $this->idAnimal = $idAnimal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeIDEN()
    {
        return $this->CodeIDEN;
    }

    /**
     * @param mixed $CodeIDEN
     * @return AnimalT
     */
    public function setCodeIDEN($CodeIDEN)
    {
        $this->CodeIDEN = $CodeIDEN;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeSTA()
    {
        return $this->CodeSTA;
    }

    /**
     * @param mixed $CodeSTA
     * @return AnimalT
     */
    public function setCodeSTA($CodeSTA)
    {
        $this->CodeSTA = $CodeSTA;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomAnimal()
    {
        return $this->nomAnimal;
    }

    /**
     * @param mixed $nomAnimal
     * @return AnimalT
     */
    public function setNomAnimal($nomAnimal)
    {
        $this->nomAnimal = $nomAnimal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateArriveAnimal()
    {
        return $this->dateArriveAnimal;
    }

    /**
     * @param mixed $dateArriveAnimal
     * @return AnimalT
     */
    public function setDateArriveAnimal($dateArriveAnimal)
    {
        $this->dateArriveAnimal = $dateArriveAnimal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateDepartAnimal()
    {
        return $this->dateDepartAnimal;
    }

    /**
     * @param mixed $dateDepartAnimal
     * @return AnimalT
     */
    public function setDateDepartAnimal($dateDepartAnimal)
    {
        $this->dateDepartAnimal = $dateDepartAnimal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return AnimalT
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->Sexe;
    }

    /**
     * @param mixed $Sexe
     * @return AnimalT
     */
    public function setSexe($Sexe)
    {
        $this->Sexe = $Sexe;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCastre()
    {
        return $this->castre;
    }

    /**
     * @param mixed $castre
     * @return AnimalT
     */
    public function setCastre($castre)
    {
        $this->castre = $castre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @return AnimalT
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVacciner()
    {
        return $this->vacciner;
    }

    /**
     * @param mixed $vacciner
     * @return AnimalT
     */
    public function setVacciner($vacciner)
    {
        $this->vacciner = $vacciner;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return AnimalT
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrixAdoption()
    {
        return $this->prixAdoption;
    }

    /**
     * @param mixed $prixAdoption
     * @return AnimalT
     */
    public function setPrixAdoption($prixAdoption)
    {
        $this->prixAdoption = $prixAdoption;
        return $this;
    }


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }



}



