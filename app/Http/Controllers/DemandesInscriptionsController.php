<?php

namespace App\Http\Controllers;

use App\Models\DemandesInscription;
use App\Models\Utilisateur;
use App\Models\Entree_sortie;
use Illuminate\Http\Request;
use Log;
use DB;

class DemandesInscriptionsController extends Controller
{
    /**
     * Affiche une liste de toutes les demandes d'inscription.
     */
    public function index(Request $request)
    {
     
        $demandesInscriptions =  DemandesInscription::where('statutDemande', 'en attente')->get();
        // $search = $request->input('search');
        
        // if (!empty($search)) {
        //     // Filtre les demandes d'inscription par nom ou prénom
        //     $demandesInscriptions = DemandesInscription::where('nom', 'LIKE', "%{$search}%")
        //         ->orWhere('prenom', 'LIKE', "%{$search}%")
        //         ->get();
        // } else {
        //     // Récupère toutes les demandes si aucun terme de recherche n'est spécifié
        //     $demandesInscriptions = DemandesInscription::all();
        // }

        // dd("J'arrive ici ");
        return view('demandesInscription', compact('demandesInscriptions'));
    }




    public function demandesApprouvees()
    {
        $utilisateurs =  Utilisateur::all();
        $demandesApprouvees = DB::select('select d.*, u.a_acces from demandes_inscription d inner join utilisateurs u on d.utilisateur_id = u.id where d.utilisateur_id = u.id && statutDemande = "approuvée"');
        Log::debug($demandesApprouvees);
        return view('demandesApprouvees', compact('demandesApprouvees', 'utilisateurs'));
    }
    

    public function approuverDemande($id)
    {
        $demande = DemandesInscription::findOrFail($id);
        $demande->statutDemande = 'approuvée';
        $demande->save();

    // Redirection vers la page des demandes en attente
     return redirect()->route('demandesinscription.index')->with('success', 'Demande approuvée avec succès.');
    }



    public function supprimerUtilisateurEtDependances($utilisateurId)
    {
        DB::transaction(function () use ($utilisateurId) {
            // Supprimer les enregistrements dépendants dans 'entree_sortie'
            Entree_sortie::where('utilisateur_id', $utilisateurId)->delete();
            
            // Supprimer les demandes d'inscription liées à l'utilisateur
            DemandesInscription::where('utilisateur_id', $utilisateurId)->delete();
            
            // Supprimer l'utilisateur
            Utilisateur::find($utilisateurId)->delete();
        });

        // Rediriger vers une page appropriée après la suppression
        return redirect()->route('demandes.approuvees')->with('success', 'Utilisateur et données associées supprimés avec succès.');
    }
    






    /**
     * Affiche les détails d'une demande d'inscription spécifique.
     */
    public function show(int $id)
    {
        // Trouve la demande d'inscription par son ID ou renvoie une erreur 404
        $demandeInscription = DemandesInscription::findOrFail($id);
        
        // Affiche une vue avec les détails de la demande d'inscription
        return view('showDemandeInscription', compact('demandeInscription'));
    }



    // Met à jour le statut d'une demande d'inscription
    public function update(Request $request, $id)
    {
        // $demandeInscription = DemandesInscription::findOrFail($id);
        // $demandeInscription->update($request->all());
        // return redirect()->route('demandesinscription.index')->with('message', 'Statut de la demande modifié avec succès');
        $demandeInscription = DemandesInscription::findOrFail($id);
        $demandeInscription->statutDemande = $request->input('statutDemande');
        $demandeInscription->save();
        return redirect()->route('demandesinscription.index')->with('message', 'Statut de la demande modifié avec succès');
        //return redirect()->route('demandesinscription.show', $id)->with('success', 'La demande d\'inscription a été mise à jour.');
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

