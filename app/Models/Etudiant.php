<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //infos a soumettre
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'INE',
        'passe',
    ];
    protected $table = 'etudiant';
}
