<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/* Authentification */

Route::post('/getConnexion', 'UsersController@signIn')->middleware('cors');
Route::get('/getLogout', 'UsersController@signOut')->middleware('cors');

Route::prefix('Animal')->group(function () {
    Route::get('/listeAnimaux', 'AnimalController@getListeAnimaux')->middleware('cors');
    Route::post('/ajoutAnimal', 'AnimalController@ajoutAnimal')->middleware('cors');
    Route::post('/modifierAnimal/','AnimalController@modifierAnimal')->middleware('cors');
    Route::delete('/supprimerAnimal', 'AnimalController@supprimerAnimal')->middleware('cors');
});

Route::prefix('Proprietaire')->group(function () {
    Route::get('/listeProprietaires', 'ProprietaireController@getList eProprietaires')->middleware('cors');
    Route::post('/ajoutProprietaire', 'ProprietaireController@ajoutProprietaire')->middleware('cors');
    Route::post('/modifierProprietaire','ProprietaireController@modifierProprietaire')->middleware('cors');
    Route::delete('/supprimerProprietaire', 'ProprietaireController@supprimerProprietaire')->middleware('cors');

});
Route::prefix('Utilisateur')->group(function () {
    Route::get('/getListUtilisateurs', 'UsersController@getListeUtilisateurs')->middleware('cors');
    Route::post('/ajoutUtilisateur', 'UsersController@ajoutUtilisateur')->middleware('cors');
    Route::post('/modifierUtilisateur','UsersController@modifierUtilisateur')->middleware('cors');
    Route::delete('/supprimerUtilisateur', 'UsersController@supprimerUtilisateur')->middleware('cors');

});
