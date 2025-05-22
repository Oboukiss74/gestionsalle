<?php

namespace App\Http\Controllers;

use App\Models\Locataire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class Locataire_Controller extends Controller
{
    //page inscription locataire
    public function Locataire_inscrit()
    {
        return view('Utilisateur.locataire.locataire_inscrit');
    }
    //validation d'enregistrement locataire
    public function Enregistrer_Locataire(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|unique:locataire,email',
            'telephone' => 'required|min:8|max:13',
            'cnib' => 'required',
            'datecnib' => 'required|date',
            'password' => 'required|min:8',
            'confirmepassword' => 'required|min:8',
        ]);

        $request->Locataire::create([
            'id' => $request->id,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'cnib' => $request->cnib,
            'datecnib' => $request->datecnib,
            'password' => Hash::make($request->password),
            'confirmepassword' => Hash::make($request->confirmepassword),
        ]);
        return redirect()->back()->with('message', 'inscrit avec succes');
    }


}
