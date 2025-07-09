<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function PaiementMethode(){

        return view('paiement.methode_paiement');
    }
}
