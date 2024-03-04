@extends('layouts.app')

@section('contenu')
<div class="container">
    <h1 class="text-center">Demandes d'Inscription</h1>
    
    <!-- Formulaire de recherche -->
    <form action="{{ route('demandesinscription.index') }}" method="GET" class="mb-4">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Rechercher par nom ou prénom" value="{{ request('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-secondary">Recherche</button>           
            </div>
        </div>
  
    </form>
    <!-- Fin du formulaire de recherche -->

    



    
    <!-- Fin du formulaire pour rétirer l'accès à tous les utilisateurs -->

    <div class="row">
        @forelse ($demandesInscriptions as $demandeInscription)
            <div class="col-md-4">
                <div class="card" onclick="window.location.href='{{ route('demandesinscription.show', $demandeInscription->id) }}'">
                    <div class="card-body">
                        <h5 class="card-title">{{ $demandeInscription->nom }} {{ $demandeInscription->prenom }}</h5>
                        <p class="card-text">Statut: {{ $demandeInscription->statutDemande }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Aucune demande d'inscription trouvée.</p>
        @endforelse
    </div>
</div>
@endsection




