<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class Admin extends Model
{
    //
    protected $fillable=[
        'nom',
        'prenom',
        'mail',
        'passe'
    ];
    protected $table= 'admin';
}
