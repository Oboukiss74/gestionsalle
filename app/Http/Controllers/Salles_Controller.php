<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salles;
use App\Models\Demandes;
use App\Models\equipement;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Salles_Controller extends Controller
{
    use AuthorizesRequests;
    //page enregistrement des salles
    public function AjouterSalles()
    {
        $this->authorize('create', Salles::class);
        $equipements = equipement::all();
        return view("salles.Ajout_salles", compact('equipements'));
    }
    //validation denregistrement salles
    public function enretrement_salle(Request $request)
    {
        try {
            $request->validate([

                "nom" => "required",
                "code" => "required",
                "nombreplace" => "required",
                "taille" => "required",
                "tarif" => "required",
                "statut" => "required",
                // "equipement" => "required|array",
                "longitude" => "required",
                "latitude" => "required",

            ]);

            Salles::create([

                "nom" => $request->input("nom"),
                "code" => $request->input("code"),
                "nombreplace" => $request->input("nombreplace"),
                "taille" => $request->input("taille"),
                "tarif" => $request->input("tarif"),
                "statut" => $request->input("statut"),
                "longitude" => $request->input("longitude"),
                "latitude" => $request->input("latitude"),

            ]);
            //dd($salles);

            return back()->with("succes", "Salle ajoutée avec succes");
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ]);
        }
    }
    //liste des salles

    public function liste_salles(Salles $salles)
    {
        $this->authorize('view', Salles::class);
        $salles = Salles::paginate(2);
        $nombresalles = Salles::count();
        return view("salles.liste_salles", compact("salles", "nombresalles"));
    }


    //salle occupées
    public function sallesOccupe(Request $request)
    {
        $this->authorize("view", Salles::class);
        $datedebut = $request->input('datedebut');
        $datefin = $request->input('datefin');

        $sallesOccupees = Salles::whereNotIn('id', function ($query) use ($datedebut, $datefin) {
            $query->select('id_salle')
                ->from('demandes')
                ->where(function ($q) use ($datedebut, $datefin) {
                    $q->whereBetween('datedebut', [$datedebut, $datefin])
                        ->orWhereBetween('datefin', [$datedebut, $datefin])
                        ->orWhere(function ($q2) use ($datedebut, $datefin) {
                            $q2->where('datedebut', '<=', $datedebut)
                                ->where('datefin', '>=', $datefin);
                        });
                });
        })->get();

        // Correction : Utiliser get() au lieu de first()
        $paginate = Salles::paginate('3');
        $salles = Salles::whereNotIn('id', $sallesOccupees)->get();

        return view('salles.salle_disponible', ['salles' => $salles]);
    }

    //salle disponible a une date donnée
    public function sallesDisponibles(Request $request)
    {

        $now = Carbon::now();
        //recuperer les id des salles reservée
        $sallesOccupees = Demandes::where('datefin', '>', $now->format('Y-m-d'))
            ->orWhere(function ($query) use ($now) {
                $query->where('datefin', '=', $now->format('Y-m-d'))
                    ->where('heurefin', '>', $now->format('H:i:s'));
            })
            ->pluck('id_salle');

        // Récupérer les salles dont les réservations sont terminées
        $salles = Salles::whereNotIn('id', $sallesOccupees)->get();
        return view('salles.salle_disponible', compact('salles'));
    }

    //salle disponible a la date du jour

    public function sallesDisponiblesJour(Request $request)
    {
        $now = Carbon::now();

        $salles = Salles::whereDoesntHave('demandes', function ($query) use ($now) {
            $query->where('datefin', '>=', $now->toDateString());
        })
            ->orWhereHas('demandes', function ($query) use ($now) {
                $query->where('datefin', '<', $now->toDateString());
            })
            ->orderBy('nom')
            ->get();

        return view('salles.salle_disponible', compact('salles', 'now'));
    }

    //liste des salles
    public function les_salles()
    {
        $this->authorize('viewAny', Demandes::class);
        $salles = Salles::count(); //toutes les salles
        $now = now();
        $now = Carbon::now();

        //totale salle occupée par leurs id
        $sallesOccupees = Demandes::where('datefin', '>', $now->format('Y-m-d'))
            ->orWhere(function ($query) use ($now) {
                $query->where('datefin', '=', $now->format('Y-m-d'))
                    ->where('heurefin', '>', $now->format('H:i:s'));
            })
            ->pluck('id_salle');

        // Récupérer les salles dont les réservations sont terminées
        $nombreSallesLibres = Salles::whereNotIn('id', $sallesOccupees)->count();

        //total salle occupée
        $nombreSallesOccupees = Salles::whereHas('demandes', function ($query) use ($now) {
            $query->where('datefin', '>=', $now->toDateString())
                ->where('datedebut', '<=', $now->toDateString());
        })
            ->with(['demandes' => function ($query) use ($now) {
                $query->where('datefin', '>=', $now->toDateString())
                    ->where('datedebut', '<=', $now->toDateString())
                    ->orderBy('datefin');
            }])
            ->orderBy('nom')
            ->count();
        //$salles=Salles::count();
        return view('salles.les_salle', compact(
            'nombreSallesLibres',
            'salles',
            'nombreSallesOccupees'
        ));
    }

    //salles occupées

    public function SallesOccupee()
    {
        // Récupérer toutes les salles reservées
        $this->authorize('viewAny', Demandes::class);
        $now = Carbon::now();

        $salles = Salles::whereHas('demandes', function ($query) use ($now) {
            $query->where('datefin', '>=', $now->toDateString())
                ->where('datedebut', '<=', $now->toDateString());
        })
            ->with(['demandes' => function ($query) use ($now) {
                $query->where('datefin', '>=', $now->toDateString())
                    ->where('datedebut', '<=', $now->toDateString())
                    ->orderBy('datefin');
            }])
            ->orderBy('nom')
            ->get();

        return view('salles.sallesoccupee', compact('salles', 'now'));
    }
    public function sallesDispo()
    {
        return view('Utilisateur.admin.salles_dispo_date');
    }

    //statistique des salle louée

    public function statistique()
    {
        $totalSalles = Salles::count();
        $totalDemandes = Demandes::count();
        $demandesParMois = Demandes::selectRaw('MONTH(created_at) as mois, COUNT(*) as total')
            ->groupBy('datefin')
            ->orderBy('datefin')
            ->get();

        $sallesLesPlusReservees = Salles::withCount('demandes')
            ->orderByDesc('nom')
            ->take(5)
            ->get();

        return view('salles.statistique', compact(
            'totalSalles',
            'totalDemandes',
            'demandesParMois',
            'sallesLesPlusReservees'
        ));
    }
}
