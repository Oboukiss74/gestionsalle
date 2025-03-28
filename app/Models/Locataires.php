<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;

class Locataires extends Model
{
    //
    protected $fillable=[
        'id',
        'telephone',
    ];
    protected $table = 'locataires';
    public function Locataire(){
        return $this->hasMany(User::class, 'id');
    }
}
