<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class equipement extends Model
{
    protected $table = "equipements";
    protected $fillable = ['nom', ];
    public function salles()
    {
        return $this->belongsToMany(Salles::class);
    }
    public function Salle() {
        return $this->hasMany(Salles::class,'salle_id');

    }


}
