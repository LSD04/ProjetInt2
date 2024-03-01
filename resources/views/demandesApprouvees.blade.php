@extends('layouts.app')

@section('contenu')
<div class="container">
    <h1>Demandes Approuvées</h1>
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
                <td>{{ $demande->date_demande->format('d/m/Y H:i') }}</td>
                <td>
                    <!-- Bouton pour retirer l'accès -->
                    <form action="{{ route('utilisateurs.retirerAcces', $demande->utilisateur_id) }}" method="POST">
                        @csrf
                        @method('PATCH') <!-- Supposant que vous avez une méthode PATCH configurée pour retirer l'accès -->
                        <button type="submit" class="btn btn-sm btn-danger">Retirer l'accès</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('utilisateurs.retirerAccesTous') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="btn btn-warning">Retirer l'accès à tous</button>
    </form>
</div>
@endsection
