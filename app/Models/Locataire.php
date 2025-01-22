<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    //
    protected $fillable=[
        'id',
        'nom',
        'prenom',
        'telephone',
        'mail',
        'passe'

    ];
    protected $table = 'locataire';
}
