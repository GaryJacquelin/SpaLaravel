<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 01/10/2019
 * Time: 13:47
 */

namespace App\DAO;

use App\Exceptions\MonException;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;
use Hash;

class ServiceUtilisateur
{
    public function getConnexion($emailUser,$pwdUser)
    {
        $User=null;
        if ($emailUser!= null) {
            try {
                $User = DB::table('users')
                    ->where('email', '=', $emailUser)
                    ->first();
                if ($User != null) {
                    if (Hash::check ($pwdUser ,$User->password)) {
                        $response =$User;
                    } else
                        $response =  null;
                } else
                    $response = null;

            } catch (QueryException $e) {
                throw new MonException($e->getMessage());
            }
        }
        return $response;
    }

    public static function getListeUtilisateurs()
    {
        try {
            $response = DB::table('users')
                ->select('*')
                ->get();
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
    public function insertUtilisateur($id, $name,
                                      $email, $password, $role,$id_visiteur)
    {
        try {
            DB::table('users')->insert(
                [   'id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'last_update' => 'NOW()',
                    'user_update' => 'NOW()',
                    'role' => $role,
                    'id_visiteur' => $id_visiteur,
                ]
            );
            $response = array(
                'status_message' => 'Insertion réalisée'
            );
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
    public function updateUtilisateur($id, $name,
                                      $email, $password, $role,$id_visiteur)
    {
        try {
            DB::table('users')->where('id', '=', $id)
                ->update([
                    'id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'last_update' => NOW(),
                    'user_update' => NOW(),
                    'role' => $role,
                    'id_visiteur' => $id_visiteur,
                ]);
            $response = array(
                'status_message' => 'Modification réalisée'
            );
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
    public function deleteUtilisateur($idUser)
    {
        try {
            DB::table('users')->where('id', '=', $idUser)->delete();
            $response = array(
                'status_message' => 'Suppression réalisée'
            );
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}
