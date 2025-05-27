<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class equipement extends Model
{
    protected $table = "equipements";
    protected $fillable = ['salle_id','nom', 'code', 'quantite', 'etat' ];
    public function salles()
    {
        return $this->belongsToy(Salles::class);
    }
    public function Salle() {
        return $this->hasManyy(Salles::class,'salle_id');

    }

}
