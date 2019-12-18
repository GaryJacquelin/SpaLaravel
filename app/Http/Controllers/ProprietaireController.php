<?php


namespace App\Http\Controllers;


use App\DAO\ServiceAnimal;
use App\DAO\ServiceProprietaire;
use App\Exceptions\MonException;
use App\metier\Proprietaire;
use Illuminate\Support\Facades\Session;
use App\metier\ProprietaireT;

class ProprietaireController
{
    public function getListeProprietaires()
    {
        $listeProprietaires = array();
        try {
            $unService = new ServiceProprietaire();
            $response = $unService->getListeProprietaires();
            if ($response) {
                foreach ($response as $value) {
                    $proprietaire = new ProprietaireT();
                    $proprietaire->setIdPRO((int)$value->IDPRO);
                    $proprietaire->setNomPRO((string)$value->NOMPRO);
                    $proprietaire->setPrenomPRO((string)$value->PRENOMPRO);
                    $proprietaire->setMailPRO((string)$value->MAILPRO);
                    $proprietaire->setAdressePRO($value->ADRESSEPRO);
                    $listeProprietaires[]=$proprietaire;
                }
            }
            return json_encode($listeProprietaires);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }
    public function ajoutProprietaire()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $ProprietaireJson = json_decode($json);
            if ($ProprietaireJson != null) {

                $idpro = $ProprietaireJson->IDPRO;
                $nompro = $ProprietaireJson->NOMPRO;
                $prenompro = $ProprietaireJson->PRENOMPRO;
                $mailpro = $ProprietaireJson->MAILPRO;
                $adressepro = $ProprietaireJson->ADRESSEPRO;
                $unService = new ServiceProprietaire();
                $uneReponse = $unService->insertProprietaire($idpro, $nompro,
                    $prenompro, $mailpro, $adressepro);
                return response()->json($uneReponse);
            }
        } catch(MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }
    public function supprimerProprietaire()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $Proprietairejson = json_decode($json);
            if ($Proprietairejson != null) {
                $idpro = $Proprietairejson->IDPRO;
                $unService = new ServiceProprietaire();
                $uneReponse = $unService->deleteProprietaire($idpro);
                return response()->json($uneReponse);
            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }
    public function modifierProprietaire()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $ProprietaireJson = json_decode($json);
            if ($ProprietaireJson != null) {
                $idpro = $ProprietaireJson->IDPRO;
                $nompro = $ProprietaireJson->NOMPRO;
                $prenompro = $ProprietaireJson->PRENOMPRO;
                $mailpro = $ProprietaireJson->MAILPRO;
                $adressepro = $ProprietaireJson->ADRESSEPRO;
                $unService = new ServiceProprietaire();
                $uneReponse = $unService->updateProprietaire($idpro,$nompro, $prenompro,
                    $mailpro,$adressepro
                );
                return response()->json($uneReponse);
            }
        } catch(MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }
}
