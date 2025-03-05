<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandes extends Model
{
    //
    use HasFactory;
    protected $table = "Demandes";
    protected $fillable = [
        "id",
        "id_salle",
        "nom",
        "telephone",
        "mail",
        "cnib",
        "datedebut",
        "datefin",
        "heuredebut",
        "heurefin",
        "salle",
        "effectif",
        "motif",
        "equipement",
        'etat',
    ];

    public function salle()
    {
        return $this->belongsTo(Salles::class, 'id_salle');
    }
    public function demande()
    {
        return $this->belongsTo(Demandes::class, 'id');
    }
    

}
