<?php

use App\Http\Controllers\ActeurContoller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Etudiant_Controller;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\DemandeController;

use App\Http\Controllers\Salles_Controller;
use App\Http\Controllers\Controllerequipement;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller_equipement;
use App\Http\Controllers\User_Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\Utilisateurs_Controller;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use App\Http\Middleware\App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\couriercontroller;


Route::get('role_permission', function () {
    // Role::create(['name' => 'Admin']);
    // Role::create(['name' => 'SuperAdmin']);
    // Role::create(['name' => 'Utilisateur']);
    // Role::create(['name' => 'Gestionnaier']);
    // Role::create(['name' => 'SG']);
    // Role::create(['name' => 'DEPS']);
    // Role::create(['name' => 'SC']);
    // Role::create(['name' => 'SupperAdmin']);
    // Permission::create(['name' => 'modifier.ma.demande']);
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
    // Permission::create(['name' => 'voir.demandevalidee']);
    // Permission::create(['name' => 'voir.demandeerefusee']);
    // Permission::create(['name' => 'voir.demandeencour']);
    // Permission::create(['name'=>'ecrire.demande']);


    //     // $roleSuperAdmin = Role::where('name','Utilisateur')->first();
    //     // $roleAdmin->givePermissionTo(['modifier.profile', 'voir.profile','ecrire.demande','suivre.demande']);
    $rolegestionaire=Role::where('name','Admin')->first();
    $rolegestionaire->givePermissionTo([
        'modifier.ma.demande',
        'supprimer.demande',
        'ecrire.demande',
        'valider.demande',
        'refuser.demande',
        'creer.utilisateurs',
        'supprimer.utilisateurs',
        'voir.utilisateurs',
        'modifier.profile',
        'voir.profile',
        'ecrire.demande'
    ]);


    //assigner role
    $users = User::all();
    foreach ($users as $user) {
        $user->assignRole('Utilisateur'); // Assigne le rôle à chaque utilisateur
        $user->givePermissionTo(['ecrire.demande']);
    }

    // Assigne le rôle "admin"
    //    $role-> givePermissionTo('ok');
    //    $role->givePermissionTo('ok');

    //     return view('welcome');
    $user = User::find(1); // Récupère l'utilisateur
    $user->assignRole('Admin'); // Assigne le rôle "admin"
    //Tu peux aussi attribuer plusieurs permissions à un rôle :
    // $role = Role::findByName('DEPS');
    $role = Role::findByName('Admin');
    $role->givePermissionTo([
        'voir.demande',

    ]);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('Accueil');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile_modifier', [ProfileController::class, 'updateinfos'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/suppression', [ProfileController::class, 'SuppCompte'])->name('profile.supprimer');
});

//coté utilisateur
Route::middleware(['auth',])->group(function () {
    Route::get('modifier_utilisateur', [User_Controller::class, 'addutilissateur'])->name('ajouterutilisateur');
});

//partie accueil
Route::get('/', [AccueilController::class, 'PageAccueil'])->name(name: 'Accueil');



//connexion avant action sur le profile
Route::middleware(['auth'])->group(function () {
    //page d'enregistrement salles
    Route::get('salles/ajouter', [Salles_Controller::class, 'AjouterSalles'])->name(name: 'pages_salles');
    //validation des salles
    Route::post('Ajouter_salles', [Salles_Controller::class, 'enretrement_salle'])->name(name: 'enregistrer_salle');
    //validation des salles
    Route::post('Ajouter_salle', [Salles_Controller::class, 'enretrement_salle'])->name(name: 'enregistrer_salles');
    //liste des salles
    Route::get('liste_salles', [Salles_Controller::class, 'liste_salles'])->name(name: 'liste_salles');
    //mise a jour des salle
    Route::post('modifier_salles', [Salles_Controller::class, 'Salles_Update'])->name(name: 'Update_salles');
    //supprimer salles
    Route::post('supprimer_salles', [Salles_Controller::class, 'delete_salle'])->name(name: 'delete_salles');
    //salle occupées
    Route::get('occupe_salles', [Salles_Controller::class, 'sallesOccupe'])->name(name: 'occupant_salles');

    //rechercher une salle
    Route::get('rechercher_salle', action: [Salles_Controller::class, 'sallesDispo'])->name(name: 'recherche_salles');
    //liste de salle disponible sur une demande
    Route::get('salle_disponible', action: [Salles_Controller::class, 'sallesDisponibles'])->name(name: 'liste_salles_dipsonible');
    //liste des salles du jour
    Route::post('salle_disponible_jour', action: [Salles_Controller::class, 'sallesDisponiblesJour'])->name(name: 'liste_salle_jour');
    //liste des salles occupées
    //Route::post('salle_occupe', action: [Salles_Controller::class, 'sallesOccupe'])->name(name: 'liste_salle_occupe');
    //salles occupees
    Route::get('admin/salleoccupee', [AdminController::class, 'SallesOccupee'])->name('liste_salles_occupee');
    //statistiques des salles sur demande
    Route::get('salles/statistiquesalles/', [Salles_Controller::class,'statistique'])->name('statistique');
});
//cote demandes
Route::middleware(['auth'])->group(function () {

    //accueil des demandes
    Route::get('Mesdemandes', [DemandeController::class, 'DemandeStatut'])->name('mes_demande');

    //faire une demande
    Route::get('demandepage', [DemandeController::class, 'Page_Demande'])->name(name: 'pagedemandes');

    //liste des demandes
    Route::get('demandes_liste', [DemandeController::class, 'liste_demande'])->name(name: 'liste_demande');

    //ma demande
    Route::get('ma_demande/', [DemandeController::class, 'lademande'])->name(name: 'la_demande');

    //verification des mes demandes etats
    Route::get('verifie_demande', [DemandeController::class, 'VerifierStatut'])->name(name: 'Verifie_demande');

    //creation demande
    Route::post('demande', [DemandeController::class, 'StoreDemande'])->name(name: 'creer_demande');

    //detail de ma demande en vue de modifier
    Route::get('detail_demande/{id}', [DemandeController::class, 'DetailMaDemande'])->name('ma_demande_detail');


    //modifier sa demande
    Route::put('modifiermademande/{id}', [DemandeController::class,'UpdateDemande'])->name('modifier_mademande');

    //confirmer reception des demandes
    Route::get('demande/valider/reception', [DemandeController::class, 'updatereception'])->name('validerreception');

    //valider demande
    Route::post('validerdemande', [DemandeController::class, 'updateEtat'])->name(name: 'demandevalidee');

    //voir la demande
    Route::post('lademande', [DemandeController::class, 'lademande'])->name(name: 'voirdemande');

    //supprimer une demande
    Route::delete('supprimer_demande/{id}', [DemandeController::class, 'deletedemande'])->name(name: 'demandesupprimer');

    //valider demande
    Route::put('accepter_demande/{id}', [DemandeController::class, 'demandeaccepter'])->name(name: 'accpeterdemande');

    //refuser demande
    Route::put('refuser_demande/{id}', [DemandeController::class, 'demanderefuser'])->name(name: 'refuserdemande');
    //total des salles
    Route::get('admin/tableau_bord/salles', [AdminController::class, 'les_salles'])->name(name: 'salles_tableau');
    //details des salles
    //total des salles
    Route::post('admin/tableau_bord/salles', [AdminController::class, 'les_salles'])->name(name: 'tableau_salles');
    //rechercher user
    Route::get('recherche', [AdminController::class, 'Rechercher_user'])->name(name: 'Rechercher_users');
    //liste de demandes en cours
    Route::get('liste_demande_en_attente', [DemandeController::class, 'demande_en_cour'])->name(name: 'liste_demandeencour');

    //liste des demandes refusee
    Route::get('liste_demande_refusee', [DemandeController::class, 'demande_refusee'])->name(name: 'liste_demanderefusee');
    //liste des demandes validées
    Route::get('liste_demande_validee', [DemandeController::class, 'demande_validee'])->name(name: 'liste_demandevalidee');
    //tableau de bord
    Route::get('tableau_bord', [AdminController::class, 'tableau_bord'])->name(name: 'tableau_de_bord');
    //liste total des demandes
    Route::get('tableau_bord/demandes', [AdminController::class, 'total_demandes'])->name(name: 'total_demande');
    //details de demandes
    Route::get('admin/tableau_bord/details_demandes', [AdminController::class, 'details_demandes'])->name(name: 'deatilsdemandes');
});

//cote equipement

Route::middleware(['auth'])->group(function () {
    Route::get('equipements/ajout', [Controllerequipement::class,'Ajouter'])->name('ajoutequipement');
    //valider l'enregistrement des equipements
    Route::post('equipements/valider', [Controllerequipement::class,'valider'])->name('validerequipement');

});

//cote profile

Route::middleware(['auth'])->group(function () {
    //Profile
    Route::get('profile', action: [ProfileController::class, 'profiles'])->name(name: 'profile');
    //modifier info
    Route::get('mes_infos', [ProfileController::class, 'profile_modifier'])->name('mesinfos');
    Route::put('mesinfos', [ProfileController::class, 'ModifierProfile'])->name('mesinfosmodifier');
});


//role et permission

Route::get('/roles', [RolePermissionController::class, 'listRoles']);
Route::post('/roles/create', [RolePermissionController::class, 'createRole']);
Route::post('/permissions/create', [RolePermissionController::class, 'createPermission']);
Route::post('/roles/assign', [RolePermissionController::class, 'assignRoleToUser']);
Route::post('/permissions/assign', [RolePermissionController::class, 'assignPermissionToRole']);






//profile administrateur
Route::get('Admin', [AdminController::class, 'AdminProfile'])->name(name: 'profile_admin');

//profile des acteur

//service courier
Route::get('service_courier/profile', [ActeurContoller::class, 'service_courier'])->name('service_courier');
Route::get('service_courier/demanderefuse', [couriercontroller::class, 'demanderefuse'])->name('courier_demande_refuse');
//pour les salles





require __DIR__ . '/auth.php';
