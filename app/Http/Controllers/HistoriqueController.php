<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\Access;

class HistoriqueController extends Controller
{
    public function index()
    {
        // Remplacez ceci par votre logique de récupération des données
        $historique = Access::all(); // Exemple, récupère tous les enregistrements

        return view('historique', compact('historique'));
    }
}
