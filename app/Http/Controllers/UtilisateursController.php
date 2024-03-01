<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;

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
    $utilisateur = Utilisateur::findOrFail($id);
    $utilisateur->a_acces = false;
    $utilisateur->save();

    return back()->with('success', 'Accès retiré avec succès.');
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
        //
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
