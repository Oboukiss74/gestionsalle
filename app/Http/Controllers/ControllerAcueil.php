<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerAcueil extends Controller
{
    //
    public function accueil() {
        return view('page_accueil');
    }
}
