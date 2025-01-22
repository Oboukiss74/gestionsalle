<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Personnels_Controller extends Controller
{
    //
    public function PagesPersonnels()  
    {
        return view('Pages_personnels');
        
    }
    //page inscription
    public function Inscrit_personnels(){
        return view('public_inscrit');
    }
}
