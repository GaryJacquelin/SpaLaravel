<?php

namespace App\metier;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class users extends Model {


    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'last_update',
        'user_update',
        'role',
        'id_visiteur',
    ];
    public $timetamps = true;
}
?>

