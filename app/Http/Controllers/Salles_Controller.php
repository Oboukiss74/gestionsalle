<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salles;
class Salles_Controller extends Controller
{
    //page enregistrement des salles
    public function AjouterSalle()
    {
        return view("salles.Ajout_salles");
    }
    //validation denregistrement salles
    public function store(Request $request)
    {
        $salles=$request->validate( [
            
            "nom" => "required",
            "code" => "required",
            "nombre_place" => "required",
            "taille" => "required",
            "equipement" => "required",
            "tarif"=> "required",
            "statut" => "required",
            "localisation" => "required",

        ]);
        // dd($salles);
        Salles::create([
           
            "nom"=> $request->input("nom"),
            "code"=> $request->input("code"),
            "nombre_place"=> $request->input("nombre_place"),
            "taille"=> $request->input("taille"),
            "equipement"=> $request->input("equipement"),
            "statut"=> $request->input("statut"),
            "localisation"=> $request->input("localisation"),

        ]);
        return back()->with("success","Salle ajoutée");

    }
    //liste des salles
    public function liste_salles (Request $request){
        $salles = Salles::where("id_salle", $request->input("id_salle"))->get();
        dd($salles);
    }
}
