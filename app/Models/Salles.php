<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Demande;
use App\Models\equipements;
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
        'longitude',
        'latitude',
    ];
    protected $table="salles";
    public function demandes()
    {
        return $this->hasMany(Demandes::class, 'id_salle');
    }

    public function equipements(){
        return $this->hasMany(equipement::class,('id'));
    }
    public function demande()
    {
        return $this->belongsTo(Demandes::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_personnel');
    }
}
