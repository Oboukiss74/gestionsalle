<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Demandes;
use App\Models\Salles;
use App\Models\Users;
use Carbon\Carbon;


$now = Carbon::now();

// Salles avec des réservations en cours ou futures
$sallesOccupees = Salles::whereHas('demandes', function ($query) use ($now) {
    $query->where('datefin', '>=', $now->toDateString())
        ->where(function ($q) use ($now) {
            // Soit la réservation est en cours aujourd'hui
            $q->whereDate('datedebut', '<=', $now->toDateString())
                ->whereDate('datefin', '>=', $now->toDateString())
                // Soit c'est une réservation future
                ->orWhereDate('datedebut', '>', $now->toDateString());
        });
})->with([
            'demandes' => function ($query) use ($now) {
                $query->where('datefin', '>=', $now->toDateString())
                    ->orderBy('datedebut')
                    ->orderBy('heuredebut');
            }
        ])->get();

$nombreSallesOccupees = Salles::whereHas('demandes', function ($query) use ($now) {
    $query->where('datefin', '>=', $now->toDateString())
        ->where(function ($q) use ($now) {
            $q->whereDate('datedebut', '<=', $now->toDateString())
                ->whereDate('datefin', '>=', $now->toDateString())
                ->orWhereDate('datedebut', '>', $now->toDateString());
        });
})->count();


class AdminController extends Controller
{
    //profile Admin
    public function AdminProfile(Request $request)
    {
        $users = User::all();
        return view('Utilisateur.admin.admin_profile', compact('users'));
    }

    public function tableau_bord()
    {

        $demandes = Demandes::count();
        $salles = Salles::count();
        $users = User::count();

        return view('Utilisateur.admin.tableau_de_bord', compact(
            'demandes',
            'salles',
            'users'
        ));
        // return view('Utilisateur.admin.les_salles', compact('salles'));
    }

    //côté demande
    //totatal des demandes
    public function total_demandes()
    {
        $demandes = Demandes::count();
        $demandeValidée = Demandes::where('etat', 'Validée')->count();
        $demandeRefusée = Demandes::where('etat', 'Refusée')->count();
        $demandeEncour = Demandes::where('etat', 'En attente')->count();
        //dd($demandeRefusée,$demandeEncour);
        return view('Utilisateur.admin.les_demandes', compact(
            'demandes',
            'demandeValidée',
            'demandeRefusée',
            'demandeEncour',
        ));

    }
    //details des demandes
    public function details_demandes()
    {
        $demandes = Demandes::all();
        return view('Utilisateur.admin.details_demandes', compact('demandes'));
    }

    //côté salles
    //liste des salles
    public function les_salles()
    {
        $salles = Salles::count(); //toutes les salles




        $now = now();
        $now = Carbon::now();

        //totale salle libre
        $nombreSallesLibres = Salles::whereDoesntHave('demandes', function($query) use ($now) {
            $query->where('datefin', '>=', $now->toDateString());
        })
        ->orWhereHas('demandes', function($query) use ($now) {
            $query->where('datefin', '<', $now->toDateString());
        })
        ->orderBy('nom')
        ->count();

        //total salle occupée
        $nombreSallesOccupees = Salles::whereHas('demandes', function($query) use ($now) {
            $query->where('datefin', '>=', $now->toDateString())
                  ->where('datedebut', '<=', $now->toDateString());
        })
        ->with(['demandes' => function($query) use ($now) {
            $query->where('datefin', '>=', $now->toDateString())
                  ->where('datedebut', '<=', $now->toDateString())
                  ->orderBy('datefin');
        }])
        ->orderBy('nom')
        ->count();
        //$salles=Salles::count();
        return view('Utilisateur.admin.les_salle', compact(
            'nombreSallesLibres',
            'salles',
            'nombreSallesOccupees'
        ));


    }
    //salles occupées

    public function SallesOccupee()
    {
        // Récupérer toutes les salles reservées
        $now = Carbon::now();

        $salles = Salles::whereHas('demandes', function($query) use ($now) {
            $query->where('datefin', '>=', $now->toDateString())
                  ->where('datedebut', '<=', $now->toDateString());
        })
        ->with(['demandes' => function($query) use ($now) {
            $query->where('datefin', '>=', $now->toDateString())
                  ->where('datedebut', '<=', $now->toDateString())
                  ->orderBy('datefin');
        }])
        ->orderBy('nom')
        ->get();

        return view('utilisateur.admin.sallesoccupee', compact('salles', 'now'));



    }

    //rechercher un utilisateur
    public function SallesOccupe()
    {

        $salles = Salles::count();
        // Date et heure actuelles
        $now = Carbon::now();

        // Récupérer toutes les salles avec leurs réservations en cours ou futures
        $sallesOccupees = Salles::whereHas('demandes', function ($query) use ($now) {
            $query->where(function ($q) use ($now) {
                // Réservations en cours (date du jour et heure actuelle dans la plage)
                $q->whereDate('datedebut', $now->toDateString())
                    ->where('heuredebut', '<=', $now->format('H:i:s'))
                    ->where('heurefin', '>=', $now->format('H:i:s'));
            })->orWhere(function ($q) use ($now) {
                // Réservations futures (date après aujourd'hui OU date aujourd'hui mais heure après maintenant)
                $q->whereDate('datefin', '>', $now->toDateString())
                    ->orWhere(function ($q2) use ($now) {
                        $q2->whereDate('datedebut', $now->toDateString())
                            ->where('heuredebut', '>', $now->format('H:i:s'));
                    });
            });
        })->with([
                    'demandes' => function ($query) use ($now) {
                        $query->where(function ($q) use ($now) {
                            $q->whereDate('datedebut', '>=', $now->toDateString())
                                ->orWhere(function ($q2) use ($now) {
                                    $q2->whereDate('datefin', $now->toDateString())
                                        ->where('heurefin', '>=', $now->format('H:i:s'));
                                });
                        })
                            ->orderBy('datedebut')
                            ->orderBy('heuredebut');
                    }
                ])->count();

        return view('Utilisateur.admin.les_salle', compact(
            'sallesOccupees',
            'salles',

        ));

    }
    public function Rechercher_user()
    {
        return view('Utilisateur.admin.admin_profile', [
            'users' => User::where('nom', $this->search)->get(),
        ]);
    }


}
