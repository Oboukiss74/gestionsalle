<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateurs extends Model
{
    //
    protected $filable=[
        'id_utilisateurs',
        'nom',
        'prenom',
        'mail',
        'password',
        'confirme_password'
    ];
    protected $table="Utilisateurs";
}
