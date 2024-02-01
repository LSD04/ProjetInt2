<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessManagementController extends Controller
{
    public function index()
    {
        // Vous devrez récupérer les données nécessaires pour l'affichage
        // Par exemple, la liste des utilisateurs et leurs accès
        return view('index');
    }
}
