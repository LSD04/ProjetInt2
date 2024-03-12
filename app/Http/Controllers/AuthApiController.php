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

    public function login (Request $request){
        $reussi = Auth::attempt([ 'adresse_email'=>$request->adresse_email, 'password'=>$request->password]);

        if ($reussi) {
            // Régénère la session pour protéger contre la fixation de session
            //$request->session()->regenerate();

            // Redirige vers la page des demandes d'inscription après connexion réussie
            return response()->json(['message' => 'Connexion réussie'], 200);
        } else {
            // En cas d'échec, redirige vers le formulaire de connexion avec un message d'erreur
            return response()->json(['error' => 'Les informations ne sont pas valides'], 401);
        }
    }
}
