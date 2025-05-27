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
use Illuminate\Validation\Rule;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\LaravelPdf\PdfBuilder;


class DemandeController extends Controller
{
    use AuthorizesRequests;
    //page de demande
    public function Page_Demande(Request $request)
    {
        $this->authorize("create", Demandes::class);

        // Dates par défaut (aujourd'hui)
        $dateDebut = $request->input('datedebut', now()->format('Y-m-d'));
        $heureDebut = $request->input('heuredebut', '06:00');
        $dateFin = $request->input('datefin', now()->format('Y-m-d'));
        $heureFin = $request->input('heurefin', '23:00');

        // Convertir en objets Carbon pour la requête
        $debut = Carbon::createFromFormat('Y-m-d H:i', "$dateDebut $heureDebut");
        $fin = Carbon::createFromFormat('Y-m-d H:i', "$dateFin $heureFin");

        // Récupérer les salles disponibles
        $sallesDisponibles = Salles::whereDoesntHave('demandes', function ($query) use ($debut, $fin) {
            $query->where(function ($q) use ($debut, $fin) {
                $q->where(function ($sub) use ($debut, $fin) {
                    $sub->where('datedebut', '<', $fin)
                        ->where('datefin', '>', $debut);
                });
            });
        })->get();
        return view("Demandes.creer_demandes", compact(

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
                    //"cnib" => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
                    "datedebut" => "required|date|after_or_equal:today",
                    "datefin" => "required|date|after_or_equal:datedebut",
                    "heuredebut" => "required",
                    "heurefin" => "required",
                    "batiment" => "nullable",
                    "salle" => "nullable",
                    "effectif" => "required|integer|min:1",
                    "motif" => "required",

                ]



            );
            //dd($validatedData);
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

    public function UpdateDemande(Request $request, $id)
    {
        try {
            // Validation des données
            $request->validate([
                'datedebut' => 'required|date',
                'datefin' => 'required|date|after_or_equal:datedebut',
                'heuredebut' => 'required',
                'heurefin' => 'required|after:heuredebut',
                'effectif' => 'required|integer|min:1',
                'motif' => 'required|string|max:255',
            ]);
            //dd($validated);
            // Mise à jour de la demande
            $demande = Demandes::findOrFail($id);
            $demande->update([
                'datedebut' => $request->datedebut,
                'datefin' => $request->datefin,
                'heuredebut' => $request->heuredebut,
                'heurefin' => $request->heurefin,
                'effectif' => $request->effectif,
                'motif' => $request->motif,
            ]);

            //dd($demande);
            return redirect()->route('Verifie_demande');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la mise à jour: ' . $e->getMessage());
        }
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
    //valider la reception de la demande par le S.C
    public function updatereception(Request $request, Demandes $demande)
    {
        $request->validate([
            'reçcu' => 'required|in:Non,Oui'
        ]);
        $demande->update(['reçu' => $request->reçu]);
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
        $this->authorize("deleteAny");
        $demande = Demandes::find($id);

        if (!$demande) {
            return redirect()->back()->with('error', 'Demande non trouvée.');
        }
        $demande->delete();
        return redirect()->back()->with('success', 'Demande supprimée avec succès.');
    }


    //liste des demandes et la configuration de la validation et refus
    public function liste_demande(Demandes $demande)
    {
        $this->authorize('view', Demandes::class);
        //$this->authorize('view', $demande) ;
        // Récupère tous les demandes
        $demandes = Demandes::paginate(3);
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
    public function DemandeStatut(Demandes $demandes)
    {
        $this->authorize('voirmesdemandes', Demandes::class);

        $user = Auth::user();
        $demandes = $user->demandes;
        return view('Demandes.mes_demandes', compact('demandes'));
    }

    //verifier mes demandes etats
    public function VerifierStatut(Demandes $demandes)
    {
        $this->authorize('view', $demandes);

        $user = Auth::user();
        // if ($user->hasPermissionTo('voir.demande')) {
        //     return 'la permission ma ete attribuée';
        // }
        // return 'le contraire est vrai';
        // $mesDemande = $user->demandes()->first();
        // if ($mesDemande) {
        //     $this->authorize('view', $mesDemande); // Vérifie avec la Policy
        // }
        // else {
        //     return "vous n'êtes pas autorisé";
        // }
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
            return back()->with('message', 'votre demande est deja traitée');
        }
        // dd($demandes);


    }
    //voir la demande
    public function show(Demandes $demande)
    {
        return view('admin.demandes.show', compact('demande'));
    }
    // accpeter demande
    public function demandeaccepter(Demandes $demandes, $id)
    {

        $demande = Demandes::findOrFail($id);
        $demande->etat = 'Validée';
        $demande->save();

        return redirect()->back()->with('success', 'Demande acceptée avec succès.');
    }

    //refuser demande
    public function demanderefuser(Demandes $demandes, $id)
    {
        $this->authorize('update', $demandes);
        $demande = Demandes::findOrFail($id);
        $demande->etat = 'Refusée';
        $demande->save();

        return redirect()->back()->with('error', 'Demande refusée.');
    }

    //SG
    public function ViewSG(request $request)
    {
        // $demandes = Demandes::paginate(3); // 10 demandes par page
        return view('Demandes.Demande_SG', compact('demandes'));
    }
    //liste de demande en cour
    public function demande_en_cour()
    {
        $this->authorize('view', Demandes::class);

        // $demandes = Demandes::paginate(3);
        //rehercher demande
        $query = Demandes::where('etat', 'En attente');

        if (request()->has('search') && !empty(request('search'))) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', "%$search%")
                    ->orWhere('mail', 'like', "%$search%")
                    ->orWhere('salle', 'like', "%$search%");
            });
        }
        $nombredemande = Demandes::where('etat', 'En attente')->count();
        $demandeEncours = Demandes::where('etat', 'En attente')->paginate(3);
        //dd($demandes);

        return view('Demandes.demande_encour', compact('demandeEncours', 'nombredemande'));
    }
    //liste de demande refusee
    public function demande_refusee(Demandes $demandes)
    {
        $this->authorize('approuve', $demandes);
        $demandeRejetee = Demandes::where('etat', 'Refusée')->paginate(3);
        $nombredemande = Demandes::where('etat', 'Refusée')->count();
        $demandeRefusees = Demandes::where('etat', 'Refusée')->get();
        return view('Demandes.demande_refusee', compact('demandeRefusees', 'nombredemande', 'demandeRejetee'));
    }
    //liste de demande validee
    public function demande_validee()
    {
        $this->authorize('approuve', Demandes::class);
        $demandeValidee = Demandes::where('etat', 'Validée')->paginate(3);
        $nombredemande = Demandes::where('etat', 'Validée')->count();
        $demandes = Demandes::where('etat', 'Validée')->get();
        return view('Demandes.demande_validee', compact('demandes', 'nombredemande', 'demandeValidee'));
    }

    //quittance demandes
   public function demandequittance(Demandes $demande)
    {

        // Seules les demandes validée peuvent générer une quittance
        if ($demande->etat !== 'Validée') {
            return redirect()->back()
                ->with('error', 'La quittance n\'est disponible que pour les demandes approuvées.');
        }

        $pdf = Pdf::view('Demandes.quittance', compact('demande'))
            ->format('a4')
            ->margins(10, 10, 10, 10)
            ->name('quittance-' . $demande->id . '.pdf');

        return $pdf->download();
    }

    //rechercher une demande
}
