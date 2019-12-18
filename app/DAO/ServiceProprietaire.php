<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 01/10/2019
 * Time: 13:47
 */

namespace App\DAO;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;
use  App\Exceptions\MonException;

class ServiceProprietaire
{

    public static function getListeProprietaires()
    {
        try {
            $response = DB::table('PROPRIETAIRE')
                ->select('*')
                ->get();
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function insertProprietaire($idpro, $nompro,
                    $prenompro, $mailpro, $adressepro)
    {
        try {
            DB::table('PROPRIETAIRE')->insert(
                [   'IDPRO' => $idpro,
                    'NOMPRO' => $nompro,
                    'PRENOMPRO' => $prenompro,
                    'MAILPRO' => $mailpro,
                    'ADRESSEPRO' => $adressepro,
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
    public function updateProprietaire($idpro, $nompro,
                                 $prenompro, $mailpro, $adressepro)
    {
        try {
            DB::table('PROPRIETAIRE')->where('IDPRO', '=', $idpro)
                ->update([
                    'IDPRO' => $idpro,
                    'NOMPRO' => $nompro,
                    'PRENOMPRO' => $prenompro,
                    'MAILPRO' => $mailpro,
                    'ADRESSEPRO' => $adressepro,
                ]);
            $response = array(
                'status_message' => 'Modification réalisée'
            );
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
    public function deleteProprietaire($idPRO)
    {
        try {
            DB::table('PROPRIETAIRE')->where('IDPRO', '=', $idPRO)->delete();
            $response = array(
                'status_message' => 'Suppression réalisée'
            );
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}
