<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Etudiant_Controller;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\Personnels_Controller;
use App\Http\Controllers\Locataire_Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Salles_Controller;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User_Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\RolePermissionController;
use App\Models\User;
use GuzzleHttp\Promise\Create;

Route::get('/', function () {
    // $createAdmin = Role::create(['name'=> 'SuperAdmin']);
    // Role::create(['name'=> 'Utilisateur']);
    // Role::create(['name'=> 'Gestionnaier1']);
    // Role::create(['name'=> 'Gestionnaire2']);
    // Role::create(['name'=> 'Admin']);
    // Permission::create(['name' => 'modifier.demande']);
    // Permission::create(['name' => 'supprimer.demande']);
    // Permission::create(['name' => 'soummetre.demande']);
    // Permission::create(['name' => 'valider.demande']);
    // Permission::create(['name' => 'refuser.demande']);
    // Permission::create(['name' => 'voir.demande']);
    // Permission::create(['name' => 'suivre.demande']);
    // Permission::create(['name' => 'modifier.utilisateur']);
    // Permission::create(['name' => 'supprimer.utilisateurs']);

    // Permission::create(['name' => 'creer.utilisateurs']);
    // Permission::create(['name' => 'voir.utilisateurs']);
    // Permission::create(['name' => 'modifier.profile']);
    // Permission::create(['name' => 'voir.profile']);

    //Permission::create(['name'=>'ecrire.demande']);


    // $roleSuperAdmin = Role::where('name','Utilisateur')->first();
    // $roleSuperAdmin->givePermissionTo(['modifier.profile', 'voir.profile','ecrire.demande','suivre.demande']);
    // $rolegestionaire=Role::where('name','Gestionnaire')->first();
    // $rolegestionaire->givePermissionTo([
    //     'modifier.demande',
    //     'supprimer.demande',
    //     'ecrire.demande',
    //     'modifier.demande',
    //     'valider.demande',
    //     'refuser.demande',
    //     'creer.utilisateurs',
    //     'voir.utilisateurs'
    // ]);


    //assigner role
    $users = User::all();
    foreach ($users as $user) {
        $user->assignRole('Utilisateur'); // Assigne le rôle à chaque utilisateur
    } // Assigne le rôle "admin"
    //    $role-> givePermissionTo('ok');
    //    $role->givePermissionTo('ok');

    // return view('welcome');

});
Route::get('ListeUtilisateur', [User_Controller::class, 'ListeUtilisateurs']);
Route::get('lespermissoin', [RolePermissionController::class, 'AssignerRolePermissions']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('users/{id}', function ($id) {

// });
//partie accueil
Route::get('page_accueil', [AccueilController::class, 'PageAccueil'])->name(name: 'Accueil');

//partie etudiant
//vision des pages etudiants
Route::get('etudian_inscrit', [Etudiant_Controller::class, 'etudiant_inscrit'])->name(name: 'etudiant_inscrit');
Route::get('etudiant_connection', [Etudiant_Controller::class, 'etudiant_connection'])->name(name: 'etudiant_connection');
//enregisttrement d'etudiant
Route::post('etudiant_enregistrer', [Etudiant_Controller::class, 'AjoutEtudiant'])->name(name: 'etudiants_enregistrer');
Route::post('etudiant_connecter', [Etudiant_Controller::class, 'connexion'])->name(name: 'etudiant_connecter');
//listes des etudiants
Route::get('listeetudiants', [Etudiant_Controller::class, 'listeetudiant'])->name(name: 'listeetudaint');
//partie personnels

Route::get('personnel_inscrit', [Personnels_Controller::class, 'Inscrit_personnels'])->name(name: 'inscrit_personnel');
Route::get('personnel_connecter', [Personnels_Controller::class, 'personnels_page_connection'])->name(name: 'Connection_personnel');
//enregistrer personnels
Route::post('personnel_enregistrer', [Personnels_Controller::class, 'validerpersonnels'])->name(name: 'personnel_senregistrer');
//connecter un personnel
Route::post('personnel_connecter', [Personnels_Controller::class, 'loginpersonnels'])->name(name: 'personnels_conneter');


//partie pour le locataire

Route::get('inscrit_locataire', [Locataire_Controller::class, 'Locataire_inscrit'])->name(name: 'inscrit_locataires');
Route::get('Connecter_locataire', [Locataire_Controller::class, 'connection_locataire'])->name(name: 'connecte_personnels');
//enregistrer locataire
Route::post('Enregistrer_locataire', [Locataire_Controller::class, 'Enregistrer_Locataire'])->name(name: 'locataire_Enregistrer');
Route::post('connexion_locataire', [Locataire_Controller::class, 'connecter_Locataire'])->name(name: 'locataire_connecter');

Route::middleware(['auth'])->group(function () {
    //page d'enregistrement salles
    Route::get('sallles', [Salles_Controller::class, 'AjouterSalle'])->name(name: 'pages_salles');
    //validation des salles
    Route::post('Ajouter_salles', [Salles_Controller::class, 'enretrement_salles'])->name(name: 'enregistrer_salle');
    //liste des salles
    //Route::post('liste_salles', [Salles_Controller::class, 'liste_salles'])->name(name: 'liste_salles');
    //mise a jour des salle
    Route::post('modifier_salles', [Salles_Controller::class, 'Salles_Update'])->name(name: 'Update_salles');
    //supprimer salles
    Route::post('supprimer_salles', [Salles_Controller::class, 'delete_salle'])->name(name: 'delete_salles');
});


// Route::get('sallle', [Salles_Controller::class,'AjouterSalle'])->name(name:'pages_salles');
//page d'enregistrement salles
Route::get('salle', [Salles_Controller::class, 'AjouterSalles'])->name(name: 'pages_salles');
//validation des salles
Route::post('Ajouter_salle', [Salles_Controller::class, 'enretrement_salle'])->name(name: 'enregistrer_salles');
//liste des salles
Route::get('liste_salles', [Salles_Controller::class, 'liste_salles'])->name(name: 'liste_salles');

//role et permission

Route::get('/roles', [RolePermissionController::class, 'listRoles']);
Route::post('/roles/create', [RolePermissionController::class, 'createRole']);
Route::post('/permissions/create', [RolePermissionController::class, 'createPermission']);
Route::post('/roles/assign', [RolePermissionController::class, 'assignRoleToUser']);
Route::post('/permissions/assign', [RolePermissionController::class, 'assignPermissionToRole']);


//pour les demandes
Route::get('demandepage', [DemandeController::class, 'Page_Demande'])->name(name: 'pagedemandes');
Route::get('demandes_liste', [DemandeController::class, 'liste_demande'])->name(name: 'liste_demande');
Route::get('la_demande', [DemandeController::class, 'lademande'])->name(name: 'la_demande');
//creation demande
Route::post('demande', [DemandeController::class, 'StoreDemande'])->name(name: 'creer_demande');
//valider demande
Route::post('validerdemande', [DemandeController::class, 'updateEtat'])->name(name: 'demandevalidee');
//voir la demande
Route::post('lademande', [DemandeController::class, 'lademande'])->name(name: 'voirdemande');
//supprimer une demande
Route::delete('supprimerdemande/{id}', [DemandeController::class, 'deletedemande'])->name(name: 'demandesupprimer');
//valider ou refuser demande
Route::put('demande_accepter/{id}', [DemandeController::class, 'demandeaccepter'])->name(name: 'accpeterdemande');
Route::put('demande_refuser/{id}', [DemandeController::class, 'demanderefuser'])->name(name: 'refuserdemande');
//voir la liste des demande par SG
Route::get('listedemandeSG', [DemandeController::class,'ViewSG'])->name(name:'listeSG');

//pour les salles

//rechercher une salle
Route::get('rechercher_salle', action: [Salles_Controller::class,'sallesDispo'])->name(name:'recherche_salles');
//liste de salle disponible sur une demandée
Route::get('salle_disponible', action: [Salles_Controller::class,'sallesDisponible'])->name(name:'liste_salles');
//liste des salles du jour
Route::post('salle_disponible', action: [Salles_Controller::class,'sallesDisponiblesJour'])->name(name:'liste_salle_jour');
//liste des salles occupées
Route::post('salle_occupe', action: [Salles_Controller::class,'sallesOccupe'])->name(name:'liste_salle_occupe');
