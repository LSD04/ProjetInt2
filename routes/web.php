<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DemandesInscriptionsController;
use App\Http\Controllers\EntreeSortiesController;
use App\Http\Controllers\LocalsController;
use App\Http\Controllers\PermissionAccessController;
use App\Http\Controllers\UserLocalsController;
use App\Http\Controllers\UtilisateursController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route pour la page d'accueil
Route::get('/', function () {
    return view('welcome');

});


// Route pour la gestion d'accès
Route::get('/gestionAccess', [AccessController::class, 'index'])->name('gestionAccess');

// Route pour l'historique
Route::get('/entreeSortie', [EntreeSortiesController::class, 'index'])->name('entreeSortie');



//Afficher le profil d'un utilisateur
Route::get('/utilisateurs/{id}', [UtilisateursController::class, 'show'])->name('utilisateurs.show');

//Afficher DemandesInscription





// Route pour afficher la page DemandesInscription.blade.php
Route::get('/demandesinscription', [DemandesInscriptionsController::class, 'index'])->name('demandesinscription.index');

// Route pour afficher les détails d'une demande d'inscription spécifique
Route::get('/demandesinscription/{id}', [DemandesInscriptionsController::class, 'show'])->name('demandesinscription.show');

// Route pour supprimer une demande d'inscription spécifique (si nécessaire)
Route::delete('/demandesinscription/{id}', [DemandesInscriptionsController::class, 'destroy'])->name('demandesinscription.destroy');