@extends('layouts.app')

@section('contenu')
<div class="container">
    <h1>Historique des entrées et sorties</h1>

      <!-- Formulaire de Recherche -->
      <form action="{{ route('entreeSortie.index') }}" method="GET" class="mb-4">
        <div class="input-group mb-3">
            <label for="date" class="input-group-text">Filtrer par date:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ request('date') }}">
            <button type="submit" class="btn btn-primary" style="margin-left: 8px;">Rechercher</button>
        </div>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nom de l'utilisateur</th>
                <th>Local</th>
                <th>Date et heure d'entrée</th>
                <th>Date et heure de sortie</th>
                <th>Jour de la semaine</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historique as $entreeSortie)
            <tr>
               
                <td>{{ optional($entreeSortie->user)->nom }}</td>
                <td>{{ $entreeSortie->local->nom }}</td> <!-- Assurez-vous que la relation 'local' est bien définie -->
                <td>{{ $entreeSortie->date_et_heure_entree }}</td>
                <td>{{ $entreeSortie->date_et_heure_sortie }}</td>
                <td>{{ $entreeSortie->jour_de_la_semaine }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
