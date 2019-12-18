<?php


namespace App\Http\Controllers;


use App\DAO\ServiceAnimal;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Session;
use App\metier\AnimalT;

class AnimalController
{

    public function getListeAnimaux()
    {
        $listeAnimaux = array();
        try {
            $unService = new ServiceAnimal();
            $response = $unService->getListeAnimaux();
            if ($response) {
                foreach ($response as $value) {
                    $Animal = new AnimalT();
                    $Animal->setIdAnimal((int)$value->IDANIMAL);
                    $Animal->setCodeIDEN((string)$value->LIBELLEIDEN);
                    $Animal->setCodeSTA((string)$value->LIBELLESTA);
                    $Animal->setCodeRace((string)$value->LIBELLERACE);
                    $Animal->setNomAnimal((string)$value->NOMANIMAL);
                    $Animal->setDateArriveAnimal((string)$value->DATEARRIVEANIMAL);
                    $Animal->setDescription((string)$value->DESCRIPTION);
                    $Animal->setSexe((string)$value->SEXE);
                    $Animal->setCastre((string)$value->CASTRE);
                    $Animal->setAge((int)$value->AGE);
                    $Animal->setVacciner((boolean)$value->VACCINER);
                    $Animal->SetImage((string)$value->IMAGE);
                    $Animal->SetPrixAdoption((double)$value->PRIXADOPTION);
                    $listeAnimaux[]=$Animal;
                }
            }
            return json_encode($listeAnimaux);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }

    public function ajoutAnimal()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $AnimalJson = json_decode($json);
            if ($AnimalJson != null) {
                $CodeIDEN = $AnimalJson->CODEIDEN;
                $idPRO = $AnimalJson->IDPRO;
                $idPRO_ANCIEN = $AnimalJson->IDPRO_ANCIEN;
                $codeSTA = $AnimalJson->CODESTA;
                $codeRace = $AnimalJson->CODERACE;
                $nomAnimal = $AnimalJson->NOMANIMAL;
                $dateArriveAnimal = $AnimalJson->DATEARRIVEANIMAL;
                $dateDepartAnimal = $AnimalJson->DATEDEPARTANIMAL;
                $description = $AnimalJson->DESCRIPTION;
                $Sexe = $AnimalJson->SEXE;
                $castre = $AnimalJson->CASTRE;
                $age = $AnimalJson->AGE;
                $vacciner = $AnimalJson->VACCINER;
                $image = $AnimalJson->IMAGE;
                $prixAdoption = $AnimalJson->PRIXADOPTION;
                $unService = new ServiceAnimal();
                $uneReponse = $unService->insertAnimal($CodeIDEN,$idPRO,$idPRO_ANCIEN
                    , $codeSTA,$codeRace,
                    $nomAnimal, $dateArriveAnimal, $dateDepartAnimal ,
                 $description,$Sexe,$castre,$age,$vacciner,$image,$prixAdoption);
                return response()->json($uneReponse);
            }
        } catch(MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }
    public function supprimerAnimal()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $Animaljson = json_decode($json);
            if ($Animaljson != null) {
                $idAnimal = $Animaljson->IDANIMAL;
                $unService = new ServiceAnimal();
                $uneReponse = $unService->deleteAnimal($idAnimal);
                return response()->json($uneReponse);
            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }
    public function modifierAnimal()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $AnimalJson = json_decode($json);
            if ($AnimalJson != null) {
                $idanimal = $AnimalJson->IDANIMAL;
                $CodeIDEN = $AnimalJson->CODEIDEN;
                $idPRO = $AnimalJson->IDPRO;
                $idPRO_ANCIEN = $AnimalJson->IDPRO_ANCIEN;
                $codeSTA = $AnimalJson->CODESTA;
                $codeRace = $AnimalJson->CODERACE;
                $nomAnimal = $AnimalJson->NOMANIMAL;
                $dateArriveAnimal = $AnimalJson->DATEARRIVEANIMAL;
                $dateDepartAnimal = $AnimalJson->DATEDEPARTANIMAL;
                $description = $AnimalJson->DESCRIPTION;
                $Sexe = $AnimalJson->SEXE;
                $castre = $AnimalJson->CASTRE;
                $age = $AnimalJson->AGE;
                $vacciner = $AnimalJson->VACCINER;
                $image = $AnimalJson->IMAGE;
                $prixAdoption = $AnimalJson->PRIXADOPTION;
                $unService = new ServiceAnimal();
                $uneReponse = $unService->updateAnimal($idanimal,$CodeIDEN,$idPRO, $idPRO_ANCIEN,
                    $codeSTA,$codeRace, $nomAnimal, $dateArriveAnimal,$dateDepartAnimal,
                    $description,$Sexe,$castre,$age,$vacciner,$image,$prixAdoption
                    );
                return response()->json($uneReponse);
            }
        } catch(MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }
}
