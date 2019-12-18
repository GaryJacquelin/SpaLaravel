<?php

namespace App\Http\Controllers;

use App\dao\ServiceLogin;
use App\Exceptions\MonException;
use App\metier\usersT;
use App\metier\VisiteuT;
use Illuminate\Support\Facades\Session;
use Request;
use App\DAO\ServiceUtilisateur;

class UsersController extends Controller {

    /**
     * Authentifie le visiteur
     * @return type Vue formLogin ou home
     */
    public function signIn()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $UserJson = json_decode($json);
            if ($UserJson != null) {
                $emailUser=$UserJson->email;
                $pwdUser=$UserJson->password;
                $unService = new ServiceUtilisateur();
                $uneReponse = $unService->getConnexion($emailUser,$pwdUser);
                $User = new usersT();
                $User->setId($uneReponse->id);
                $User->setName($uneReponse->name);
                $User->setEmail($uneReponse->email);
                return json_encode($User);
            }
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur);
        }
    }

    /**
     * Déconnecte le visiteur authentifié
     * @return type Vue home
     */
    public function signOut() {
        try {

            $unUtilisateur = new ServiceUtilisateur();
            $unUtilisateur->logout();
            return view('home');
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        }
    }

    /**
     * Initialise le formulaire d'authentification
     * @return type Vue formLogin
     */
    public function getLogin() {
        try {
            $erreur = "";
            return view('formLogin', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
            return view('Error', compact('erreur'));
        }
    }
    public function ajoutUtilisateur() {
        if (Session::get('role') == "admin") {
            try {
                $json = file_get_contents('php://input'); // Récupération du flux JSON
                $UtilisateurJson = json_decode($json);
                if ($UtilisateurJson != null) {

                    $id = $UtilisateurJson->id;
                    $name = $UtilisateurJson->name;
                    $email = $UtilisateurJson->email;
                    $password = $UtilisateurJson->password;
                    $role = $UtilisateurJson->role;
                    $id_visiteur = $UtilisateurJson->id_visiteur;
                    $unService = new ServiceUtilisateur();
                    $uneReponse = $unService->insertUtilisateur($id, $name,
                        $email, $password, $role,$id_visiteur);
                    return response()->json($uneReponse);
                }
            } catch (MonException $e) {
                $erreur = $e->getMessage();
                return view('Error', compact('erreur'));
            } catch (Exception $ex) {
                $erreur = $ex->getMessage();
                return view('Error', compact('erreur'));
            }
        } else {
            $erreur = "Vous n'avez pas l'autorisation d'ajouter";
            return view('Error', compact('erreur'));
        }
    }

    public function getListeUtilisateurs()
    {
        $listeUsers = array();
        try {
            $unService = new ServiceUtilisateur();
            $response = $unService->getListeUtilisateurs();
            if ($response) {
                foreach ($response as $value) {
                    $user = new usersT();
                    $user->setId((int)$value->id);
                    $user->setName((string)$value->name);
                    $user->setEmail((int)$value->email);
                    $user->setPassword((string)$value->password);
                    $user->setLastUpdate($value->last_update);
                    $user->setUserUpdate($value->user_update);
                    $user->setRole($value->role);
                    $user->setIdVisiteur($value->id_visiteur);
                    $listeUsers[]=$user;
                }
            }
            return json_encode($listeUsers);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }
    public function supprimerUtilisateur()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $Utilisateurjson = json_decode($json);
            if ($Utilisateurjson != null) {
                $id = $Utilisateurjson->id;
                $unService = new ServiceUtilisateur();
                $uneReponse = $unService->deleteUtilisateur($id);
                return response()->json($uneReponse);
            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }
    public function modifierUtilisateur()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $UtilisateurJson = json_decode($json);
            if ($UtilisateurJson != null) {
                $id = $UtilisateurJson->id;
                $name = $UtilisateurJson->name;
                $email = $UtilisateurJson->email;
                $password = $UtilisateurJson->password;
                $role = $UtilisateurJson->role;
                $id_visiteur = $UtilisateurJson->id_visiteur;
                $unService = new ServiceUtilisateur();
                $uneReponse = $unService->updateUtilisateur($id, $name,
                    $email, $password, $role,$id_visiteur);
                return response()->json($uneReponse);
            }
        } catch(MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }

}
