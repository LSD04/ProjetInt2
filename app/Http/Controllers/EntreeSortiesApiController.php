<?php

namespace App\Http\Controllers;
use App\Models\Entree_sortie;
use Illuminate\Http\Request;

class EntreeSortiesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $query = Entree_sortie::with(['user', 'local']);
    
    //     if ($request->filled('date')) {
    //         $query->whereDate('date_et_heure_entree', $request->date);
    //     }
    
    //     $historique = $query->get();
    
    //     return $historique;
    // }

 public function index(Request $request)
{
    $query = Entree_sortie::with(['user', 'local']);

    // Filtrer par date si fournie
    if ($request->filled('date')) {
        $query->whereDate('date_et_heure_entree', $request->date);
    }

    // Filtrer par ID d'utilisateur si fourni
    if ($request->filled('user_id')) {
        $query->where('utilisateur_id', $request->user_id);
    }

    $historique = $query->get();

    return $historique;
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
