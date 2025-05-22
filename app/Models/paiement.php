<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paiement extends Model
{
    protected $table = "paiements";
    protected $fillable = ['moyen_paiement','montant','date_paiement','salle_id'];
    public function paiement(){
        return $this->belongsToMany(paiement::class);
    }
}
