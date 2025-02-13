<?php

namespace App\Http\Controllers;

use App\Models\Personnels;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Personnels_Controller extends Controller
{
    //page inscription formulaire
    public function Inscrit_personnels()
    {
        return view('Utilisateur.personnels.Personnels_inscrit');
    }
    //page inscription valider
    public function validerpersonnels(request $request)
    {
        // try {
        $request->validate([
            'id' => 'required',
            'matricule' => 'required',
            'telephone' => 'required',

        ]);
        // dd($request->all());
        Personnels::create([
            'id' => $request->id,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'matricule' => $request->matricule,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'confirmepassword' => Hash::make($request->confirmepassword),
        ]);

        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'status'=>false,
        //         'message'=> $th->getMessage()
        //     ]);
        // }

        return back()->with('success', 'vous avez été ajouté avec succes');
    }

    //page connection
    public function personnels_page_connection()
    {
        return view('Utilisateur.personnels.Personnels_connection');
    }
    public function loginpersonnels(Request $request)
    {

        $personnels = Personnels::where(
            'email',
            $request->email,

        )->first();
        //dd($personnel);
        if ($personnels && Hash::check($request->password, $personnels->passe)) {
            Auth::login($personnels);
            return redirect()->route('Accueil')->with('success', '');
        } else {
            return back()->with('error', 'mail ou de passe incorrecte');
        }
    }
}
