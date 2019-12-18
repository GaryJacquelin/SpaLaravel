<?php


namespace App\metier;


class Proprietaire
{
    protected $table = 'Proprietaire';
    public $timestamps = false;
    protected $fillable = [
        'idPRO',
        'nomPRO',
        'prenomPRO',
        'mailPRO',
        'adressePRO'
    ];
    public $timetamps = true;
}
