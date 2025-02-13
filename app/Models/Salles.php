<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salles extends Model
{
    protected $fillable=[
        'code',
        'nom',
        'code',
        'nombre_place',
        'taille',
        'equipement',
        'tarif',
        'statut',
        'localisation',
    ];
    protected $table="salles";
}
