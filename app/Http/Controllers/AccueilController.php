<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //
    public function PageAccueil(){
        if ($user = \Illuminate\Support\Facades\Auth::user()) {
            // Logique pour un utilisateur authentifié
            return view('Utilisateur.profiles.profile', ['user' => $user]);
        }
        return view('page_accueil');
    }
}
