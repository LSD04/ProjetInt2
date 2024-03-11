<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateursApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('adresse_email', 'password');

        if (Auth::attempt($credentials)) {
            $utilisateur = Auth::user();

            return response()->json([
                'success' => true,
                'message' => 'Connexion réussie.',
                'data' => $utilisateur,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Identifiants invalides.',
        ], 401);
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
}
