<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Etudiants extends Model
{
    //infos a soumettre
    protected $fillable = [
        'id',
        'telephone',
        'INE',
        'universite',
        'filiere',
    ];
    protected $table = 'etudiants';
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->passe;
    }

    public function Etudiant(){
        return $this->hasMany(User::class, 'id');
    }

}
