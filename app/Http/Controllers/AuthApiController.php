<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;
use App\Models\Admin;
use Log;

class AuthApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function login(Request $request)
{
    $reussi = Auth::attempt(['adresse_email' => $request->adresse_email, 'password' => $request->password]);

    if ($reussi) {
        $utilisateur = Auth::user(); // Récupère les informations de l'utilisateur authentifié

        // Vous pouvez ajouter d'autres informations de l'utilisateur si nécessaire
        $informationsUtilisateur = [
            'id' => $utilisateur->id,
            'nom' => $utilisateur->nom,
            'prenom' => $utilisateur->prenom,
            // Ajoutez d'autres champs d'informations ici si nécessaire
        ];

        // Renvoie les informations de l'utilisateur avec un message de réussite
        return response()->json(['message' => 'Connexion réussie', 'utilisateur' => $informationsUtilisateur], 200);
    } else {
        // En cas d'échec, retourne un message d'erreur
        return response()->json(['error' => 'Les informations de connexion ne sont pas valides'], 401);
    }
}

}
