<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Etudiant_Controller extends Controller
{
    //page accueil Etudiantl
    public function etudiant_inscrit() {
        return view('Utilisateur.Etudiant.Etudiant_inscrit');
        
    }
    
    //inscrption

    public function AjoutEtudiant(request $request) {
        try {
            $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'telephone'=>'required|max:12',
            'INE'=>'required',
            'passe'=>'required',

            ]);
            etudiant::create([
                'nom'=>$request->input('nom'),
                'prenom'=>$request->input('prenom'),
                'telephone'=>$request->input('telephone'),
                'INE'=>$request->input('INE'),
                'passe'=>$request->input('passe'),
                'confirmepasse'=>$request->input('confirmepasse')
            ]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "status"=>false,
                "message"=>$th->getMessage(),
            ]);
        }

    }

    //connection
    public function etudiant_connection() {
        return view('Utilisateur.Etudiant.Etudiant_connection');
        
    }
}
