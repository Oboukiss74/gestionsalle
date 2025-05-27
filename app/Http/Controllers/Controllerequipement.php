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
    // Controller
    public function valider(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|unique:equipements,code|max:50',
            'quantite' => 'required|integer|min:1',
            'etat' => 'required|string',
            'salle_id' => 'required|exists:salles,id'
        ]);

        try {
            Equipement::create($validated);
            return redirect()->back()->with('succes', 'Équipement ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur technique : ' . $e->getMessage());
        }
    }
    //consultat la liste des equipement avec leurs salles
    public function view(Request $request)
    {

        $equipements = equipement::paginate();
        $nombreequipement=equipement::count();
        $salles = Salles::all('nom');
        return view("equipement.voir", compact("equipements",'salles','nombreequipement'));
    }

    //liste des equipements
    public function listeequipement() {
        $equipementneuf = equipement::all()->count();
        $equipementneuf = equipement::where('etat','neuf')->count();
        $equipementmauvais = equipement::where('etat','mauvais')->count();
        $equipementuse = equipement::where('etat','use')->count();
        $equipementbon = equipement::where('etat','bon etat')->count();
        return view('equipement.liste',compact('equipementneuf',"equipementmauvais","equipementuse","equipementbon"));
    }
    //modifier equipements
    public function equipent_modifier(Request $request)
    {
        $equipement = equipement::all();
        $nombreequipement = equipement::count();
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
    public function delete(equipement $equipement)
    {
        $equipement->delete();
        return redirect()->back()->with("success", "equipement supprimé avec succes");
    }
}
