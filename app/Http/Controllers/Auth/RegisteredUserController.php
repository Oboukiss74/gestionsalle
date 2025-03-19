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
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string'],
                'cnib' => ['required', 'max:13', 'unique:' . User::class],
                'profile' => ['required'],
                'sexe' => ['required'],
                'matricule' => ['unique:personnels,matricule'],
                'telephone' => 'required|max:12',
                'INE' => ['unique:etudiants,INE'],
                'datecnib' => ['required', 'date'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', Rules\Password::defaults()],
            ]);

            if ($request->profile == 'Public') {
                $locataire = Locataires::create([
                    'sexe' => $request->sexe,
                    'telephone' => $request->telephone,
                    'datecnib' => $request->datecnib,
                ]);

                $user = User::create([
                    'id_locataire' => $locataire->id,
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'cnib' => $request->cnib,
                    'profile' => $request->profile,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

            } else if ($request->profile == 'Etudiant') {
                $etudiant = Etudiants::create([
                    'sexe' => $request->sexe,
                    'telephone' => $request->telephone,
                    'INE' => $request->INE,
                    // 'cnib' => $request->cnib,
                    'datecnib' => $request->datecnib,

                ]);

                $user = User::create([
                    'id_etudiant' => $etudiant->id,
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'cnib' => $request->cnib,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

            } elseif ($request->profile == 'Personnel') {
                $personnel = Personnels::create([
                    'sexe' => $request->sexe,
                    'matricule' => $request->matricule,
                    'telephone' => $request->telephone,
                    'datecnib' => $request->datecnib,

                ]);

                $user = User::create([
                    'id_personnel' => $personnel->id,
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'cnib' => $request->cnib,
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
