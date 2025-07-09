<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelPdf\Facades\Pdf as FacadesPdf;

class Demandes extends Model
{
    //
    use HasFactory;
    protected $table = "Demandes";
    protected $fillable = [
        "id",
        "id_salle",
        "id_user",
        "nom",
        "demandeur",
        "telephone",
        "mail",
        "cnib",
        "datedebut",
        "datefin",
        "heuredebut",
        "heurefin",
        "motif",
        'etat',
        'reçu',
    ];

    // Relation avec la salle
    public function salle()
    {
        return $this->belongsTo(Salles::class, 'id_salle');
    }
    public function salles()
    {
        return $this->hasMany(Salles::class,'id_demande');
    }

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function demandes() {
        return $this->hasMany(Demandes::class,'id_user');

    }

    //pdf
    public function genererquittance()
    {
        $pdf = FacadesPdf::view('Demandes.quittance', [
            'demande' => $this,
            'datedebut' => now()->format('d/m/Y'),
            'datefin' => now()->format('d/m/Y'),
        ])
        ->format('A4')
        ->name("quittance-{$this->id}.pdf");

        return $pdf->save(storage_path("app/public/quittance/{$this->id}.pdf"));
    }

    //     public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }


}
