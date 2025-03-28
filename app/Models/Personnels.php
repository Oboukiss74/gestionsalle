<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Personnels extends Model
{
    //
    protected $fillable=[
        'id',
        'matricule',
        'fonction',
        'telephone',
    ];
    protected $table = 'personnels';

    public function Perspnnels(){
        return $this->hasMany(User::class, 'id');
    }
}
