<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salles extends Model
{
    protected $fillable=[
        'code',
        'nom',
        'taille',
        'nombre_place',
        'Epuipement',
        'id_tarif',
        'localisation',
        'statut',
    ];
    protected $table="salles";
}
