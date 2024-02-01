<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessManagementController;
use App\Http\Controllers\HistoriqueController;

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
Route::get('/access-management', [AccessManagementController::class, 'index'])->name('access-management');

// Route pour l'historique
Route::get('/historique', [HistoriqueController::class, 'index'])->name('historique');

