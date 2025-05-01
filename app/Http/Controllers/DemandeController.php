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
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;


class DemandeController extends Controller
{
    use AuthorizesRequests;
    //page de demande
    public function Page_Demande(Request $request)
    {
        $salles = Salles::all();
        // Dates par défaut (aujourd'hui)
        $dateDebut = $request->input('datedebut', now()->format('Y-m-d'));
        $heureDebut = $request->input('heuredebut', '08:00');
        $dateFin = $request->input('datefin', now()->format('Y-m-d'));
        $heureFin = $request->input('heurefin', '17:00');

        // Convertir en objets Carbon pour la requête
        $debut = Carbon::createFromFormat('Y-m-d H:i', "$dateDebut $heureDebut");
        $fin = Carbon::createFromFormat('Y-m-d H:i', "$dateFin $heureFin");

        // Récupérer les salles disponibles
        $sallesDisponibles = Salles::whereDoesntHave('demandes', function ($query) use ($debut, $fin) {
            $query->where(function ($q) use ($debut, $fin) {
                $q->whereBetween('datedebut', [$debut, $fin])
                    ->orWhereBetween('datefin', [$debut, $fin])
                    ->orWhere(function ($q2) use ($debut, $fin) {
                        $q2->where('datedebut', '<=', $debut)
                            ->where('datefin', '>=', $fin);
                    });
            });
        })->get();
        return view("Demandes.creer_demandes", compact(
            "salles",
            'sallesDisponibles',
            'dateDebut',

            'dateFin',
            'heureDebut',
            'heureFin'
        ));
        //return view("Demandes.creer_demandes");
    }

    public function StoreDemande(Request $request)
    {
        try {
            $validatedData = $request->validate(
                [
                    "id_salle" => "required",
                    "id_user" => "required",
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
            // dd($validatedData);
            // Gestion du fichier CNIB
            if ($request->hasFile('cnib')) {
                $path = $request->file('cnib')->store('cnibs', 'public'); // Stocke dans storage/app/public/cnibs
                $request['cnib'] = $path; // Ajoute le chemin du fichier à l'array
            }

            Demandes::create([

                "id_salle" => $request->input("id_salle"),
                "id_user" => $request->input("id_user"),
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
    public function choix_salle(Request $request)
    {
        $salles = Salles::all();
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
        $demandes = Demandes::paginate(5);
        $nombredemande = Demandes::count();

        // Envoie les données à la vue

        return view('Demandes.liste_demande', compact('demandes', 'nombredemande'));
    }

    public function lademande($id)
    {
        $demande = Demandes::findOrFail($id); // Récupère la demande spécifique
        return view('Demandes.liste_demande', compact('demandes'));
    }

    //mes demande
    public function DemandeStatut()
    {
        $user = Auth::user();
        $demandes = $user->demandes;
        return view('Demandes.mes_demandes', compact('demandes'));

    }

    //verifier mes demandes etats
    public function VerifierStatut(Request $request, Demandes $demandes)
    {
        //$this->authorize('view', $Demandes);

        $user = Auth::user();
        // if ($user->hasPermissionTo('voir.demande')) {
        //     return 'la permission ma ete attribuée';
        // }
        // return 'le contraire est vrai';
        $mesDemande = $user->demandes()->first();
        if ($mesDemande) {
            $this->authorize('view', $mesDemande); // Vérifie avec la Policy
        }
        else {
            return "vous n'êtes pas autorisé";
        }
        $demandes = $user->demandes;
        return view('Demandes.verifier_demande', compact('demandes'));


    }
    //detail de ma demande
    public function DetailMaDemande($id)
    {

        $user = Auth::user();
        $demandes = $user->demandes()->where('id', $id)->first();
        if ($demandes->etat == 'En attente') {
            return view('Demandes.detailmademande', compact('demandes'));
        } else {
            return back()->with('message', 'votre est deja traitée');
        }
        // dd($demandes);


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
    public function ViewSG(request $request)
    {
        $demandes = Demandes::paginate(3); // 10 demandes par page
        return view('Demandes.Demande_SG', compact('demandes'));
    }
    //liste de demande en cour
    public function demande_en_cour() {
        $demande=Demandes::all();
        $nombredemande=Demandes::count();
        $demandeEncours = Demandes::where('etat', 'En attente')->get();
        return view('Demandes.demande_encour',compact('demandeEncours','nombredemande'));

    }
    //liste de demande refusee
    public function demande_refusee() {
        $demande=Demandes::all();
        $nombredemande=Demandes::count();
        $demandeRefusees = Demandes::where('etat', 'Refusée')->get();
        return view('Demandes.demande_refusee',compact('demandeRefusees','nombredemande'));

    }
    //liste de demande validee
    public function demande_validee() {
        $demande=Demandes::all();
        $nombredemande=Demandes::count();
        $demandeValidee = Demandes::where('etat', 'Refusée')->get();
        return view('Demandes.demande_refusee',compact('demandeValidee','nombredemande'));

    }
}
