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
    return view('login');
 
});
 
// Route pour page d'accueil Admin
 
 
// Route pour la gestion d'accès
Route::get('/gestionAccess', [AccessController::class, 'index'])->name('gestionAccess');
 
// Route pour l'historique
Route::get('/entree-sortie', [EntreeSortiesController::class, 'index'])->name('entreeSortie.index');
 
//Afficher le profil d'un utilisateur
Route::get('/utilisateurs/{id}', [UtilisateursController::class, 'show'])->name('utilisateurs.show');
 
 
 
 
 
 
 
// Route pour afficher la page DemandesInscription.blade.php  Appliquer le middleware 'auth' pour protéger la route et utiliser le contrôleur pour la logique
Route::get('/demandesinscription', [DemandesInscriptionsController::class, 'index'])->name('demandesinscription.index');
 
 
// Route pour afficher les détails d'une demande d'inscription spécifique
Route::get('/demandesinscription/{id}', [DemandesInscriptionsController::class, 'show'])->name('demandesinscription.show');
 
 
// Route pour supprimer une demande d'inscription spécifique (si nécessaire)
Route::delete('/demandesinscription/{id}', [DemandesInscriptionsController::class, 'destroy'])->name('demandesinscription.destroy');
 
 
// Met à jour une demande d'inscription spécifique
Route::patch('/demandesinscription/{id}', [DemandesInscriptionsController::class, 'update'])->name('demandesinscription.update');
 
// Rétirer l,accès à tous les utilisateurs
Route::patch('/utilisateurs/{id}/retirer-acces', [UtilisateursController::class, 'retirerAcces'])->name('utilisateurs.retirerAcces');
Route::post('/utilisateurs/retirer-acces-tous', [UtilisateursController::class, 'retirerAccesTous'])->name('utilisateurs.retirerAccesTous');
 
// Redonner l,accès à tous les utilisateurs
Route::patch('/utilisateurs/{id}/remettre-acces', [UtilisateursController::class, 'remettreAcces'])->name('utilisateurs.remettreAcces');
 
// Afficher demandes approuvées
Route::get('/demandes-approuvees', [DemandesInscriptionsController::class, 'demandesApprouvees'])->name('demandes.approuvees');
 
 
//Routes Connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
 
// Déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');