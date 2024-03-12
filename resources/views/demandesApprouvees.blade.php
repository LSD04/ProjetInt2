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
                    <td>{{ $demande->date_demande}}</td>
                    <td>
                        @if($demande->a_acces == 1)
                        <!-- Bouton pour retirer l'accès -->
                            <form action="{{ route('utilisateurs.retirerAcces', $demande->utilisateur_id) }}" method="POST">
                                @csrf
                                @method('PATCH') <!-- Supposant que vous avez une méthode PATCH configurée pour retirer l'accès -->
                                <button type="submit" class="btn btn-sm btn-danger">Retirer l'accès</button>
                            </form>
                        @elseif($demande->a_acces == 0)
                            <form action="{{ route('utilisateurs.remettreAcces', $demande->utilisateur_id) }}" method="POST">
                                @csrf
                                @method('PATCH') <!-- Supposant que vous avez une méthode PATCH configurée pour retirer l'accès -->
                                <button type="submit" class="btn btn-sm btn-danger">Remettre l'accès</button>
                            </form>
                        @endif

                        <form action="{{ route('utilisateurs.supprimer', $demande->utilisateur_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Supprimer l'utilisateur </button>
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
