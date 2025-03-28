<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Locataires;
use App\Models\Etudiants;
use App\Models\Personnels;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('Utilisateur.register');
        //  return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        try {
            $request->validate([

                'matricule' => ['nullable','unique:personnels,matricule'],
                'fonction' => ['nullable','string'],
                'telephone' => ['required','max:12'],
                'INE' => ['nullable','unique:etudiants,INE'],
                'universite' => ['nullable','string'],
                'filiere' => ['nullable','string'],
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string'],
                'sexe' => ['required'],
                'profile' => ['required'],
                'cnib' => ['required', 'max:24', 'unique:' . User::class],
                'datecnib' => ['required', 'date'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', Rules\Password::defaults()],
            ]);
           // dd($request);
            if ($request->profile == 'Public') {
                $locataire = Locataires::create([
                    'telephone' => $request->telephone,
                ]);

                $user = User::create([
                    'id_locataire' => $locataire->id,
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'sexe' => $request->sexe,
                    'profile' => $request->profile,
                    'cnib' => $request->cnib,
                    'datecnib' => $request->datecnib,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

            } else if ($request->profile == 'Etudiant') {
                $etudiant = Etudiants::create([
                    'telephone' => $request->telephone,
                    'INE' => $request->INE,
                    'universite'=>$request->universite,
                    'filiere'=>$request->filiere,
                ]);

                $user = User::create([
                    'id_etudiant' => $etudiant->id,
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'sexe' => $request->sexe,
                    'profile' => $request->profile,
                    'cnib' => $request->cnib,
                    'datecnib' => $request->datecnib,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

            } elseif ($request->profile == 'Personnel') {
                $personnel = Personnels::create([
                    'matricule' => $request->matricule,
                    'fonction' => $request->fonction,
                    'telephone' => $request->telephone,

                ]);

                $user = User::create([
                    'id_personnel' => $personnel->id,
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'sexe' => $request->sexe,
                    'profile' => $request->profile,
                    'cnib' => $request->cnib,
                    'datecnib' => $request->datecnib,
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
        return redirect(route('profile'));
    }
}
