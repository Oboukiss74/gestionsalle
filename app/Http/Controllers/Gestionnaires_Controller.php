<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Gestionnaires_Controller extends Controller
{
    //
    public function PageGestionnaire() {
        return view('pages_gestionnaires');
        
    }
}
