<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UtilisateursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    // Retirer l'accès à un utilisateur spécifique
    public function retirerAcces($id)
{
    Log::debug("retirer acces");
    $utilisateur = Utilisateur::findOrFail($id);
    $utilisateur->a_acces = false;
    $utilisateur->save();

    return back()->with('success', 'Accès retiré avec succès.');
}

public function remettreAcces($id)
{

    $utilisateur = Utilisateur::findOrFail($id);
    $utilisateur->a_acces = true;
    $utilisateur->save();
    return back()->with('success', 'Accès remis avec succès.');
}

// Retirer l'accès à tous les utilisateurs
    public function retirerAccesTous()
{
    Utilisateur::query()->update(['a_acces' => false]);

    return back()->with('success', 'L\'accès a été retiré à tous les utilisateurs.');
}



    public function profil()
 {
//     // Utilisez l'authentification Laravel pour obtenir l'utilisateur connecté
//     $utilisateur = auth()->user();

//     // Renvoyez l'utilisateur à la vue de profil
//     return view('utilisateurs.profil', compact('utilisateur'));
}







    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
            // Enregistrer les données reçues dans les logs
            Log::info('Données reçues:', $request->all());
    
            // Valider les données reçues
            $validatedData = $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'adresse_email' => 'required|email|unique:utilisateurs',
                'password' => 'required|string|min:6', // Exemple de règle de validation pour le mot de passe
                'matricule' => 'required|int',
                // Ajoutez d'autres règles de validation si nécessaire
            ]);
    
            // Créer un nouvel utilisateur avec les données validées
            $utilisateur = new Utilisateur($validatedData);
            $utilisateur->password = Hash::make($validatedData['password']); // Hacher le mot de passe
    
            // Enregistrer l'utilisateur dans la base de données
            $utilisateur->save();
    
            // Enregistrer l'utilisateur créé dans les logs
            //Log::info('Utilisateur créé avec succès:', $utilisateur);
    
            // Retourner une réponse appropriée avec un code HTTP 201 (Created)
            return response()->json(['message' => 'Utilisateur créé avec succès', 'utilisateur' => $utilisateur], 201);
        
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Trouver l'utilisateur par son ID
        $utilisateur = Utilisateur::findOrFail($id);

        // Passer l'utilisateur à la vue
        return view('show', compact('utilisateur'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
