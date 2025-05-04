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
        "id_user",
        "nom",
        "telephone",
        "mail",
        "cnib",
        "datedebut",
        "datefin",
        "heuredebut",
        "heurefin",
        "batiment",
        "salle",
        "effectif",
        "motif",
        "equipement",
        'etat',
        'reçu',
    ];
    // Relation avec la salle
    public function salle()
    {
        return $this->belongsTo(Salles::class, 'id_salle');
    }
    public function salles()
    {
        return $this->hasMany(Salles::class);
    }
    public function demande()
    {
        return $this->belongsTo(Demandes::class, 'id_demande');
    }
    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function demandes() {
        return $this->hasMany(Demandes::class,'id_user');

    }


}
