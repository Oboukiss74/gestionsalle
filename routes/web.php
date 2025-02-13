<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Etudiant_Controller;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Personnels_Controller;
use App\Http\Controllers\Locataire_Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Salles_Controller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('users/{id}', function ($id) {
    
// });
//partie accueil
Route::get('page_accueil',[AccueilController::class,'PageAccueil'])->name(name:'Accueil');

//partie etudiant
//vision des pages etudiants
Route::get('etudian_inscrit', [Etudiant_Controller::class, 'etudiant_inscrit'])->name(name:'etudiant_inscrit');
Route::get('etudiant_connection',[Etudiant_Controller::class, 'etudiant_connection'])->name(name:'etudiant_connection');
//enregisttrement d'etudiant
Route::post('etudiant_enregistrer',[Etudiant_Controller::class, 'AjoutEtudiant'])->name(name:'etudiants_enregistrer');
Route::post('etudiant_connecter',[Etudiant_Controller::class, 'connexion'])->name(name:'etudiant_connecter');

//partie personnels

Route::get('personnel_inscrit', [Personnels_Controller::class,'Inscrit_personnels'])->name(name:'inscrit_personnel');
Route::get('personnel_connecter', [Personnels_Controller::class,'personnels_page_connection'])->name(name:'Connection_personnel');
//enregistrer personnels
Route::post('personnel_enregistrer', [Personnels_Controller::class,'validerpersonnels'])->name(name:'personnel_senregistrer');
//connecter un personnel
Route::post('personnel_connecter', [Personnels_Controller::class,'loginpersonnels'])->name(name:'personnels_conneter');


//partie pour le locataire

Route::get('inscrit_locataire', [Locataire_Controller::class,'Locataire_inscrit'])->name(name:'inscrit_locataires');
Route::get('Connecter_locataire', [Locataire_Controller::class,'connection_locataire'])->name(name:'connecte_personnels');
//enregistrer locataire
Route::post('Enregistrer_locataire', [Locataire_Controller::class,'Enregistrer_Locataire'])->name(name:'locataire_Enregistrer');
Route::post('connexion_locataire', [Locataire_Controller::class,'connecter_Locataire'])->name(name:'locataire_connecter');

Route::middleware(['auth'])->group(function () {
    //page d'enregistrement salles
    Route::get('sallles', [Salles_Controller::class,'AjouterSalle'])->name(name:'pages_salles');
    //validation des salles
    Route::post('Ajouter_salles', [Salles_Controller::class,'enretrement_salles'])->name(name:'enregistrer_salle');
    //liste des salles
    Route::post('liste_salles', [Salles_Controller::class,'listes_salles'])->name(name:'liste_salles');
    //mise a jour des salle
    Route::post('modifier_salles', [Salles_Controller::class,'Salles_Update'])->name(name:'Update_salles');
    //supprimer salles
    Route::post('supprimer_salles', [Salles_Controller::class,'delete_salle'])->name( name:'delete_salles');
});
// Route::get('sallle', [Salles_Controller::class,'AjouterSalle'])->name(name:'pages_salles');
