<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Demande;
use App\Http\Controllers\Salles_Controller;

class Salles extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'nom',
        'code',
        'nombreplace',
        'taille',
        'equipement',
        'tarif',
        'statut',
        'localisation',
    ];
    protected $table="salles";
    public function demandes()
    {
        return $this->hasMany(Demandes::class, 'id_salle');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_personnel');
    }
}
