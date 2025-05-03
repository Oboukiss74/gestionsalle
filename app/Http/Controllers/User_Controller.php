<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class User_Controller extends Controller
{
    //
    public function ListeUtilisateurs(){
        $user = User::all();
        return compact("Listeutilisateur");
    }
    //modifier utilisateur

    public function addutilissateur(){
        return view("Utilisateur.ajouterutiliteur");
    }
    //traiter la modification
    public function confirmermodification(Request $request){

    }
}
