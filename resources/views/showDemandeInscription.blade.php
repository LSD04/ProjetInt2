@extends('layouts.app')

@section('contenu')
<div class="container formulaire">
    <h1 class="text-center">Détails de la Demande d'Inscription</h1>
    <form action="{{ route('demandesinscription.update', $demandeInscription->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label>Nom:</label>
            <input type="text" class="form-control" value="{{ $demandeInscription->nom }}" readonly>
        </div>
        <div>
            <label>Prénom:</label>
            <input type="text" class="form-control" value="{{ $demandeInscription->prenom }}" readonly>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" class="form-control" value="{{ $demandeInscription->adresse_email }}" readonly>
        </div>
        <div>
            <label>Statut de la demande:</label>
            <select name="statutDemande" class="form-select">
                <option value="en attente" {{ $demandeInscription->statutDemande == 'en attente' ? 'selected' : '' }}>En attente</option>
                <option value="approuvée" {{ $demandeInscription->statutDemande == 'approuvée' ? 'selected' : '' }}>Approuvée</option>
                <option value="refusée" {{ $demandeInscription->statutDemande == 'refusée' ? 'selected' : '' }}>Refusée</option>
            </select>
        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>
</div>
@endsection
