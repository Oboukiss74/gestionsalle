<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnels extends Model
{
    //
    protected $fillable=[
        'id',
        'nom',
        'prenom',
        'Gmail',
        'telephone',
        'passe',
    ];
    protected $table = 'personnels';
}
