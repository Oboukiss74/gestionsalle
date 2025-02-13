<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiants;
use App\Models\Locataires;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Etudiant_Controller extends Controller
{
    

    //page accueil Etudiantl
    public function etudiant_inscrit()
    {
        return view('Utilisateur.Etudiant.Etudiant_inscrit');
    }

    //inscrption

    public function AjoutEtudiant(request $request)
    {
        try {
            $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'sexe' => 'required',
                'profile'=> 'required',
                'telephone' => 'required|max:12',
                'cnib' => 'required|max:12',
                'INE' ,
                'email' => 'required',
                'passe' => 'required',
                'confirmepasse' => 'required',

            ]);
            User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if ($request->profile == 'locataire') {
                Locataires::create([
                    'id' => $request->id,
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'sexe' => $request->sexe,
                    'email' => $request->email,
                    'telephone' => $request->telephone,
                    'cnib' => $request->cnib,
                    'datecnib' => $request->datecnib,
                    'password' => Hash::make($request->password),
                    'confirmepassword' => Hash::make($request->confirmepassword),
                ]);
            } else if ($request->profile == 'etudiant') {
            Etudiants::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'sexe' => $request->sexe,
                'telephone' => $request->telephone,
                'cnib' => $request->cnib,
                'INE' => $request->INE,
                'email' => $request->email,
                'passe' => Hash::make($request->passe),
                'confirmepasse' => Hash::make($request->passe),

            ]);
        }

            return redirect()->route('Accueil')->with('success', 'Vous avez été avec succes');
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ]);
        }
       
        
 }

    //connection
    public function etudiant_connection()
    {
        return view('Utilisateur.Etudiant.Etudiant_connection');
    }

    public function connexion(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'passe' => 'required|string|min:8',
        ]);
        // $etud= Etudiant::where('email', $credentials['email'])->first();
        // if ($etud) {
        //     Auth::login($etud);
        //     return redirect()->route('')->with('success','');
        // }

        // dd(Auth::guard('etudiant')->attempt(['email' => $credentials['email'], 'password' => $credentials['passe']]));
        $bool = Auth::guard('etudiant')->attempt(['email' => $credentials['email'], 'password' => $credentials['passe']]);
        if ($bool) {
            // dd("YTEYTEYZTE");
            $user = Auth::guard('etudiant')->user();
            // dd($user);
            $request->session()->regenerate();
            return redirect()->intended(route('Accueil'));   
        }
        // if (Auth::guard('etudiant')->attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended(route('Accueil'));
        // }
        dd('string');
        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('etudiant')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
