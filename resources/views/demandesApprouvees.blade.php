@extends('layouts.app')

@section('contenu')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Liste d'utilisateurs</h1>
        <form action="{{ route('utilisateurs.retirerAccesTous') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-warning">Retirer l'accès à tous</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Date de la Demande</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandesApprouvees as $demande)
            <tr>
                <td>{{ $demande->nom }}</td>
                <td>{{ $demande->prenom }}</td>
                <td>{{ $demande->adresse_email }}</td>
                <td>{{ $demande->date_demande}}</td>
                <td>
                    <div class="d-flex">
                        @if($demande->a_acces == 1)
                            <form action="{{ route('utilisateurs.retirerAcces', $demande->utilisateur_id) }}" method="POST" class="me-2">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-danger">Retirer l'accès</button>
                            </form>
                        @else
                            <form action="{{ route('utilisateurs.remettreAcces', $demande->utilisateur_id) }}" method="POST" class="me-2">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">Remettre l'accès</button>
                            </form>
                        @endif
                
                        <form action="{{ route('utilisateurs.supprimer', $demande->utilisateur_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer l'utilisateur</button>
                        </form>
                    </div>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
