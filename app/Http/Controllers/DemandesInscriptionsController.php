<?php

namespace App\Http\Controllers;

use App\Models\DemandesInscription;
use Illuminate\Http\Request;

class DemandesInscriptionsController extends Controller
{
    /**
     * Affiche une liste de toutes les demandes d'inscription.
     */
    public function index()
    {
        // Récupère toutes les demandes et les passe à la vue
        $demandesInscriptions =DemandesInscription::all();
        return view('DemandesInscription', compact('demandesInscriptions'));
    }

    /**
     * Affiche les détails d'une demande d'inscription spécifique.
     */
    public function show(int $id)
    {
        // Trouve la demande d'inscription par son ID ou renvoie une erreur 404
        $demandeInscription = DemandesInscription::findOrFail($id);
        
        // Affiche une vue avec les détails de la demande d'inscription
        return view('DemandesInscription', compact('demandesInscription'));
    }

    /**
     * Supprime une demande d'inscription spécifique de la base de données.
     * Ajoutez cette méthode seulement si vous souhaitez permettre la suppression via le site web.
     */
    public function destroy(int $id)
    {
        $demandeInscription = DemandesInscription::findOrFail($id);
        $demandeInscription->delete();
        
        // Redirige vers la liste des demandes avec un message de succès
        return redirect()->route('DemandesInscription')->with('success', 'Demande d\'inscription supprimée avec succès.');
    }
}

