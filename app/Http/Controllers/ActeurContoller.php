<?php

namespace App\Http\Controllers;
use App\Models\Demandes;
use Illuminate\Http\Request;

class ActeurContoller extends Controller
{
    public function service_courier()
    {
        $demandes = Demandes::count();
        $demandeValidée = Demandes::where('etat', 'Validée')->count();
        $demandeRefusée = Demandes::where('etat', 'Refusée')->count();
        $demandeEncour = Demandes::where('etat', 'En attente')->count();
        return view('Utilisateur.acteurs.service_courier', compact('demandes', 'demandeEncour', 'demandeValidée', 'demandeRefusée'));
    }
}
