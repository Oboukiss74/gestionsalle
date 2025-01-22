<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarifs extends Model
{
    //
    protected $filable=[
        'id_Tarif',
        'id_salle',
        'prix_horaire',
        'prix_journalier',
    ];
    protected $table="Tarifs";
}
