<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Demandes;
use App\Mail\DemandeValidationAdmin;
use App\Models\Salles;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class DemandeController extends Controller
{
    //page de demande
    public function Page_Demande()
    {
        $salles=Salles::all();
        return view("Demandes.creer_demandes", compact("salles"));
        //return view("Demandes.creer_demandes");
    }

    public function StoreDemande(Request $request)
    {
        try {
            $validatedData = $request->validate(
                [
                    "id_salle"=> "required",
                    "nom" => "required",
                    "telephone" => "required",
                    "mail" => "required|email",
                    "cnib" => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
                    "datedebut" => "required|date|after_or_equal:today",
                    "datefin" => "required|date|after_or_equal:datedebut",
                    "heuredebut" => "required",
                    "heurefin" => "required",
                    "salle" => "required",
                    "effectif" => "required|integer|min:1",
                    "motif" => "required",
                    "equipement" => "required",
                ]

            );
            // Gestion du fichier CNIB
            if ($request->hasFile('cnib')) {
                $path = $request->file('cnib')->store('cnibs', 'public'); // Stocke dans storage/app/public/cnibs
                $request['cnib'] = $path; // Ajoute le chemin du fichier à l'array
            }

            Demandes::create([

                "id_salle" => $request->input("id_salle"),
                "nom" => $request->input("nom"),
                "telephone" => $request->input("telephone"),
                "mail" => $request->input("mail"),
                "cnib" => $request->input("cnib"),
                "datedebut" => $request->input("datedebut"),
                "datefin" => $request->input("datefin"),
                "heuredebut" => $request->input("heuredebut"),
                "heurefin" => $request->input("heurefin"),
                "salle" => $request->input("salle"),
                "effectif" => $request->input("effectif"),
                "motif" => $request->input("motif"),
                "equipement" => $request->input("equipement"),
            ]);
            Demandes::create($validatedData);

            //mail depuis le DB


            // $admin = User::role('admin')->pluck('email');
            // Mail::to($admin)->send(new DemandeValidationAdmin($demande));
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ]);
        }
        // return redirect(back())->with("success", "succes");
        // try {
        //     $demande = $request->validate([
        //         "nom" => "required",
        //         "telephone" => "required",
        //         "mail" => "required|email",
        //         "cnib" => 'nullable|file|max:2048|mimes:pdf,doc,docx,jpg,png',
        //         "datedebut" => "required|date|after_or_equal:today",
        //         "datefin" => "required|date|after_or_equal:datedebut",
        //         "heuredebut" => "required",
        //         "heurefin" => "required",
        //         "salle" => "required",
        //         "effectif" => "required|integer|min:1",
        //         "motif" => "required",
        //         "equipement" => "required",
        //     ]);

        //     // Gestion du fichier CNIB
        //     $data = $request->all();
        //     if ($request->hasFile('cnib')) {
        //         $path = $request->file('cnib')->store('cnibs', 'public');
        //         $data['cnib'] = $path;
        //     }

        //     $demande = Demandes::create($data);

        //     // Envoi d'un email à l'admin
        //     $admin = User::where('role', 'Admin')->value('email');
        //     Mail::to($admin)->send(new DemandeValidationAdmin($demande));


        // } catch (\Throwable $th) {
        //     return response()->json([
        //         "status" => false,
        //         "message" => $th->getMessage(),
        //     ]);
        // }

        // Redirection avec message de succès
        return redirect()->back()->with('success', 'Demande créée avec succès.');

    }

    //validation de l'etat de la demande
    public function updateEtat(Request $request, Demandes $demande)
    {
        $request->validate([
            'etat' => 'required|in:En attente,Validée,Refusée'
        ]);

        $demande->update(['etat' => $request->etat]);

        // return back()->with('success', 'État de la demande mis à jour.');
    }
    //choix de salle a la demande de location
    public function choix_salle(Request $request){
        $salles=Salles::all();
        return view("Demandes.creer_demandes", compact("salles"));

    }
    //supprimer une demande
    public function deletedemande($id)
    {
        $demande = Demandes::find($id);

        if (!$demande) {
            return redirect()->back()->with('error', 'Demande non trouvée.');
        }

        $demande->delete();

        return redirect()->back()->with('success', 'Demande supprimée avec succès.');
    }


    //liste des demandes et la configuration de la validation et refus
    public function liste_demande()
    {
        // Récupère tous les demandes
        $demandes = Demandes::all();

        // Envoie les données à la vue

        return view('Demandes.liste_demande', compact('demandes'));
    }

    public function lademande($id)
    {
        $demande = Demandes::findOrFail($id); // Récupère la demande spécifique
        return view('Demandes.liste_demande', compact('demandes'));
    }
    //mes demande
    public function DemandeStatut() {
        $user=Auth::user();
        $demandes=$user->demande;
        return view('Demandes.mes_demandes', compact('demandes'));

    }
    //voir la demande
    public function show(Demandes $demande)
    {
        return view('admin.demandes.show', compact('demande'));
    }
    // accpeter demande
    public function demandeaccepter($id)
    {
        $demande = Demandes::findOrFail($id);
        $demande->etat = 'Validée';
        $demande->save();

        return redirect()->back()->with('success', 'Demande acceptée avec succès.');
    }

    //refuser demande
    public function demanderefuser($id)
    {
        $demande = Demandes::findOrFail($id);
        $demande->etat = 'Refusée';
        $demande->save();

        return redirect()->back()->with('error', 'Demande refusée.');
    }

    //SG
    public function ViewSG(request $request){
        $demandes = Demandes::paginate(3); // 10 demandes par page
        return view('Demandes.Demande_SG', compact('demandes'));
    }
}
