<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,hasApiTokens,HasRoles;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_etudiant',
        'id_personnel',
        'id_locataire',
        'nom',
        'prenom',
        'sexe',
        'profile',
        'cnib',
        'datecnib',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function Etudiant(){
        return $this->belongsTo(Etudiants::class, 'id_etudiant');


    }
    public function Locations(){
        return $this->belongsTo(Locataires::class, 'id_locataire');
    }
    public function Personnel(){
        return $this->belongsTo(Personnels::class, 'id_personnel');
    }

    public function salles()
    {
        return $this->hasMany(Salles::class, 'id');
    }

    public function demandes()
    {
        return $this->hasMany(Demandes::class, 'id_user');
    }


}
