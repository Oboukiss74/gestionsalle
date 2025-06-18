<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salle_equipement extends Model
{
    //
    protected $table = "salle_equipements";
    protected $fillable = ['salle_id', 'equipement_id'];
    public function salle()
    {
        return $this->belongsTo(Salles::class, 'salle_id');
    }
    public function equipement(){
        return $this->belongsTo(equipement::class, 'equipement_id');
    }
    public function salles(){
        return $this->hasMany(Salles::class, 'salle_id');
    }
    public function equipements(){
        return $this->hasMany(equipement::class, 'equipement_id');
    }

}
