<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 01/10/2019
 * Time: 13:46
 */

namespace App\DAO;

use App\Exceptions\MonException;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class ServiceAnimal
{
    public static function getListeAnimaux()
    {
        try {
            $response = DB::table('ANIMAL')
                ->select('*')
                ->join('IDENTIFICATION', 'IDENTIFICATION.codeIDEN', '=', 'ANIMAL.CodeIDEN')
                ->join('STATUT', 'STATUT.codeSTA', '=', 'ANIMAL.codeSTA')
                ->join('RACE', 'RACE.CodeRACE', '=', 'ANIMAL.CodeRACE')
                ->orderBy('nomAnimal')
                ->get();
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function insertAnimal($CodeIDEN,$idPRO,$idPRO_ANCIEN ,
                                 $codeSTA,$codeRace, $nomAnimal, $dateArriveAnimal,
                                 $dateDepartAnimal ,  $description,$Sexe,$castre,$age,
                                 $vacciner,$image,$prixAdoption)
    {
        try {
            DB::table('ANIMAL')->insert(
                [
                    'CODEIDEN' => $CodeIDEN,
                    'IDPRO' =>$idPRO,
                    'IDPRO_ANCIEN' =>$idPRO_ANCIEN,
                    'CODESTA' => $codeSTA,
                    'CODERACE' =>$codeRace,
                    'NOMANIMAL' => $nomAnimal,
                    'DATEARRIVEANIMAL' => $dateArriveAnimal,
                    'DATEDEPARTANIMAL' => $dateDepartAnimal,
                    'DESCRIPTION' => $description,
                    'SEXE' => $Sexe,
                    'CASTRE' => $castre,
                    'AGE' => $age,
                    'VACCINER' => $vacciner,
                    'IMAGE' => $image,
                    'PRIXADOPTION' => $prixAdoption
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
    public function updateAnimal($idanimal, $CodeIDEN,$idPRO,$idPRO_ANCIEN ,
                                  $codeSTA,$codeRace, $nomAnimal, $dateArriveAnimal,
                                  $dateDepartAnimal ,  $description,$Sexe,$castre,$age,
                                  $vacciner,$image,$prixAdoption)
{
    try {
        DB::table('ANIMAL')->where('IDANIMAL', '=', $idanimal)
            ->update([
                'CODEIDEN' => $CodeIDEN,
                'IDPRO' =>$idPRO,
                'IDPRO_ANCIEN' =>$idPRO_ANCIEN,
                'CODESTA' => $codeSTA,
                'CODERACE' =>$codeRace,
                'NOMANIMAL' => $nomAnimal,
                'DATEARRIVEANIMAL' => $dateArriveAnimal,
                'DATEDEPARTANIMAL' => $dateDepartAnimal,
                'DESCRIPTION' => $description,
                'SEXE' => $Sexe,
                'CASTRE' => $castre,
                'AGE' => $age,
                'VACCINER' => $vacciner,
                'IMAGE' => $image,
                'PRIXADOPTION' => $prixAdoption
            ]);
        $response = array(
            'status_message' => 'Modification réalisée'
        );
        return $response;
    } catch (QueryException $e) {
        throw new MonException($e->getMessage(), 5);
    }
}
    public function deleteAnimal($idAnimal)
    {
        try {
            DB::table('ANIMAL')->where('IDANIMAL', '=', $idAnimal)->delete();
            $response = array(
                'status_message' => 'Suppression réalisée'
            );
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }


}
