<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('Utilisateur.profiles.modifier_profile', [
            'user' => $request->user(),
        ]);
        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        $request->user()->save();

        return Redirect::route('profile')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    //supprimer compte
    public function SuppCompte() {
        $user=Auth::user();
        if ($user) {
            $user->delete(); // Supprime l'utilisateur
            Auth::logout(); // Déconnecte l'utilisateur après suppression
            return redirect('/')->with('success', 'Votre compte a été supprimé avec succès.');
        }

        return redirect()->back()->with('error', 'Erreur lors de la suppression.');

    }
    //vue de connection a son profile
    public function ConnectionProfile() {
        return view('Utilisateur.profiles.connection');

    }

    //vue de modifier les infos du profile
    public function profile_modier()  {
        return view('utilisateur.profiles.modifier_profile');
    }
    //vue du profile
    public function profiles(request $request) {

        return view('Utilisateur.profiles.profile');
    }

    //modifier infos
    public function updateinfos(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'nom' => 'string|max:255',
            'prenom' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $user->id,
            'telephone' => 'string|max:20',
        ]);

        // Mise à jour des infos utilisateur
        $user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
        ]);

        // Mise à jour du téléphone dans la bonne table
        // if ($user->etudiant) {
        //     $user->etudiant->update([
        //         'telephone' => $request->telephone,
        //     ]);
        // }

        return redirect()->route('profile');
    }


}
