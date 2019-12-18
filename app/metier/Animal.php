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

class Animal extends Model {


    protected $table = 'Animal';
    public $timestamps = false;
    protected $fillable = [
        'idAnimal',
        'CodeIDEN',
        'CodeSTA' ,
        'nomAnimal',
        'dateArriveAnimal',
        'dateDepartAnimal',
        'description',
        'Sexe',
        'castre',
        'age',
        'vacciner',
        'image',
        'prixAdoption'
    ];
    public $timetamps = true;



}
