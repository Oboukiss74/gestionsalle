<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Demandes;
use App\Models\equipement;

class Salles extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'code',
        'nombreplace',
        'taille',
        'tarif',
        'statut',
        'equipement',
        'longitude',
        'latitude',
    ];
    protected $casts = [
        'equipement' => 'array',
    ];

    protected $table = "salles";
    public function demandes()
    {
        return $this->hasMany(Demandes::class, 'id_salle');
    }

    // public function equipements()
    // {
    //     return $this->hasMany(salle_equipement::class, ('id_salle'));
    // }

    // public function equipement()
    // {
    //     return $this->belongsToMany(salle_equipement::class);
    // }
}
