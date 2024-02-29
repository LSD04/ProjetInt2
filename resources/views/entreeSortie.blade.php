@extends('layouts.app')

@section('contenu')
<div class="container">
    <h1>Historique des entrées et sorties</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom de l'utilisateur</th>
                <th>Local</th>
                <th>Date et heure d'entrée</th>
                <th>Date et heure de sortie</th>
                <th>Jour de la semaine</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historique as $entreeSortie)
            <tr>
                <td>{{ $entreeSortie->user->nom }}</td> <!-- Assurez-vous que la relation 'user' est bien définie -->
                <td>{{ $entreeSortie->local->nom }}</td> <!-- Assurez-vous que la relation 'local' est bien définie -->
                <td>{{ $entreeSortie->date_et_heure_entree }}</td>
                <td>{{ $entreeSortie->date_et_heure_sortie }}</td>
                <td>{{ $entreeSortie->jour_de_la_semaine }}</td>
                <td>{{ $entreeSortie->statut }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
