<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DemandesInscriptionsController;
use App\Http\Controllers\EntreeSortiesController;
use App\Http\Controllers\LocalsController;
use App\Http\Controllers\PermissionAccessController;
use App\Http\Controllers\UserLocalsController;
use App\Http\Controllers\UtilisateursController;
use App\Http\Controllers\Api\UtilisateurApiController;
use App\Http\Controllers\Api\EntreeSortieApiController;

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



Route::middleware(['auth'])->group(function () {
   
   //Route::get('/entree-sortie', [EntreeSortiesController::class, 'index'])->name('entreeSortie.index');
    Route::get('/entree-sortie', [EntreeSortieApiController::class, 'index'])->name('entreeSortie.index');


    Route::get('/utilisateurs/{id}', [UtilisateursController::class, 'show'])->name('utilisateurs.show');

    Route::post('/loginUtilisateur', [UtilisateurApiController::class, 'login']);
 ;



    Route::get('/demandesinscription', [DemandesInscriptionsController::class, 'index'])->name('demandesinscription.index');
    Route::get('/demandesinscription/{id}', [DemandesInscriptionsController::class, 'show'])->name('demandesinscription.show');
    Route::delete('/demandesinscription/{id}', [DemandesInscriptionsController::class, 'destroy'])->name('demandesinscription.destroy');
    Route::patch('/demandesinscription/{id}', [DemandesInscriptionsController::class, 'update'])->name('demandesinscription.update');
    Route::patch('/utilisateurs/{id}/retirer-acces', [UtilisateursController::class, 'retirerAcces'])->name('utilisateurs.retirerAcces');
    Route::post('/utilisateurs/retirer-acces-tous', [UtilisateursController::class, 'retirerAccesTous'])->name('utilisateurs.retirerAccesTous');
    Route::patch('/utilisateurs/{id}/remettre-acces', [UtilisateursController::class, 'remettreAcces'])->name('utilisateurs.remettreAcces');
    Route::get('/demandes-approuvees', [DemandesInscriptionsController::class, 'demandesApprouvees'])->name('demandes.approuvees');
});
