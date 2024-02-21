<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use App\Http\Requests\LoginRequest; // Assurez-vous que cette classe de requête existe avec les règles de validation appropriées.

class AuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        // Si l'utilisateur est déjà connecté, redirige vers la page des demandes d'inscription
        return Auth::check() ? redirect()->route('demandesinscription.index') : view('login');
    }

    // Traiter la tentative de connexion
    public function login(Request $request)
    {
        $reussi = Auth::attempt([ 'adresse_email'=>$request->adresse_email, 'password'=>$request->password]);

        if ($reussi) {
            // Régénère la session pour protéger contre la fixation de session
            //$request->session()->regenerate();

            // Redirige vers la page des demandes d'inscription après connexion réussie
            return redirect()->route('demandesinscription.index')->with('message', 'Connexion réussie');
        } else {
            // En cas d'échec, redirige vers le formulaire de connexion avec un message d'erreur
            return back()->with('invalid', 'L\'adresse courriel et/ou le mot de passe est invalide.');
        }
    }

    // Gérer la déconnexion
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalide la session et régénère le token de la session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige vers la page de connexion
        return redirect()->route('login')->with('message', "Déconnexion réussie");
    }
}
