<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Etudiant_Controller;
use App\Http\Controllers\ControllerAcueil;
use App\Http\Controllers\Personnels_Controller;
use App\Http\Controllers\publique_Controller;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('users/{id}', function ($id) {
    
// });
//partie accueil
Route::get('/',[ControllerAcueil::class,'accueil'])->name(name:'Accueil');

//partie etudiant
//vision des pages etudiants
Route::get('etudian_inscrit', [Etudiant_Controller::class, 'etudiant_inscrit'])->name(name:'etudiant_inscrit');
Route::get('etudiant_connecter',[Etudiant_Controller::class, 'etudiant_connection'])->name(name:'etudiant_connection');
//enregisttrement d'etudiant
Route::post('etudiant_enregistrer',[Etudiant_Controller::class, 'enregistrer_etudiant'])->name(name:'etudiants_enregistrer');

//partie personnels

Route::get('personnel_inscrit', [Personnels_Controlle::class,'Inscrit_personnels'])->name(name:'inscrit_personnel');
Route::get('personnel_inscrit', [Personnels_Controlle::class,'Connection_personnels'])->name(name:'Connection_personnel');
//enregistrer personnels
Route::get('personnel_enregistrer', [Personnels_Controlle::class,'Enregistrer_personnels'])->name(name:'enregistrer_personnels');


//partie pour le public

Route::get('inscrit_public', [public_Controller::class,'inscription_public'])->name(name:'inscrit_publics');
Route::get('Connecter_public', [public_Controller::class,'connection_public'])->name(name:'connecte_personnels');
//enregistrer public
Route::post('Enregistrer_public', [public_Controller::class,'Enregistrer_publics'])->name(name:'public_Enregistrer');
