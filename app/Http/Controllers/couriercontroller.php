<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class couriercontroller extends Controller
{
    //demande refusée
    public function demanderefuse(){
        return view("Utilisateur.acteurs.service_courier.demande_refuse");
    }
}
