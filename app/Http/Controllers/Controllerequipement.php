<?php

namespace App\Http\Controllers;

use App\Models\equipement;
use App\Models\Salles;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\delete;

class Controllerequipement extends Controller
{
    //ajouter des equipements
    public function Ajouter()
    {
        $salles = Salles::all();
        return view("equipement.ajouter", compact("salles"));
    }
    //valider l'equipement
    public function valider(Request $request)
    {


        //dd($validated);
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'code' => 'required|string|unique:equipements,code|max:50',
                'quantite' => 'required|integer|min:1',
                'etat' => 'required',
                'salle_id' => 'required'
            ]);
            equipement::create($validated);
            return redirect()->back()->with('success', 'Équipement ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout: ' . $e->getMessage());
        }
    }
    //consultat la liste des equipement avec leurs salles
    public function view(Request $request)
    {
        $equipement = equipement::all("id", "code", "");
        return view("equipement.voir", compact("equiment"));
    }
    //modifier equipements
    public function equipent_modifier(Request $request)
    {
        $equipement = equipement::all();
        return view("equipement.modifier", compact("equipement"));
    }
    //valider la modification
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                "nom" => "required",
                "code" => "required",
                "quantite" => "required",
                "etat" => "required",
            ]);
            equipement::update($validate);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with("error", $th->getMessage());
        }
    }
    //supprimer un equipement
    public function destrow(equipement $equipement)
    {
        $equipement->delete();
        return redirect()->back()->with("success", "equipement supprimé avec succes");
    }
}
