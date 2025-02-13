<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Locataires;
use App\Models\Etudiants;
use App\Models\Personnels;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try {
            $valider=$request->validate([
                
                
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string'],
                'sexe' => ['required'],
                'matricule' => ['unique:personnels,matricule'],
                'telephone' => 'required|max:12',
                'cnib' => ['required','max:12'],
                'datecnib' => ['required','date'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'INE'=> ['unique:etudiants,INE'],
                'password' => ['required', Rules\Password::defaults()],
            ]);
           
    
            
            if ($request->profile == 'Public') {
                $locataire=Locataires::create([
                    'sexe' => $request->sexe,
                    'telephone' => $request->telephone,
                    'cnib' => $request->cnib,
                    'datecnib' => $request->datecnib,
                    
                ]);
                $user = User::create([
                    'id_locataire'=> $locataire->id,
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                
            } else if ($request->profile == 'Etudiant') {
                $etudiant=Etudiants::create([
                    'sexe' => $request->sexe,
                    'telephone' => $request->telephone,
                    'INE' => $request->INE,
                    'cnib' => $request->cnib,
                    'datecnib' => $request->datecnib,
                    
                ]);
                $user = User::create([
                    'id_etudiant'=>$etudiant->id,
                    
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            }
            elseif ($request->profile == 'Personnel') {
                $personnel=Personnels::create([
                    'sexe'=> $request->sexe,
                    'matricule' => $request->matricule,
                    'telephone' => $request->telephone,
                    'cnib'=> $request->cnib,
                    'datecnib'=> $request->datecnib,
                    
                ]);
                $user = User::create([
                    'id_personnel'=>$personnel->id,
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
        
                # code...
            }
    
            event(new Registered($user));
    
            Auth::login($user);
    
            
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ]);
        }
        return redirect(route('dashboard', absolute: false));
    }
}
