<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Utilisateurs_Controller extends Controller
{
    //profile
    public function profiles(request $request) {

        return view('Utilisateur.profiles.profile');

    }

    // modification de profile

    public function profile_modier()  {
        return view('utilisateur.profiles.modifier_profile');

    }

    public function ConnectionProfile() {
        return view('Utilisateur.profiles.connection');

    }
}
