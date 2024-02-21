<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Demande d'Inscription</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body class="fond">
    <div class="container formulaire">
        <h1 class="text-center">Détails de la Demande d'Inscription</h1>
        @if(isset($demandesInscriptions) && $demandesInscriptions->isEmpty())
            <p class="text-center">Aucune demande d'inscription n'a été trouvée.</p>
        @else
            <div class="card">
                @foreach ($demandesInscriptions as $demandeInscription)
                    <div class="card-body">
                        <p class="card-text"><strong>Nom :</strong> {{ $demandeInscription->nom }}</p>
                        <p class="card-text"><strong>Prénom :</strong> {{ $demandeInscription->prenom }}</p>
                        <p class="card-text"><strong>Email :</strong> {{ $demandeInscription->adresse_email }}</p>
                        <p class="card-text"><strong>Date de la demande :</strong> {{ $demandeInscription->date_demande ? $demandeInscription->date_demande->format('d/m/Y H:i') : 'Non spécifiée' }}</p>
                        <p class="card-text"><strong>ID du local :</strong> {{ $demandeInscription->local_id }}</p>
                        <p class="card-text"><strong>Statut de la demande :</strong> {{ $demandeInscription->statutDemande }}</p>
                        <p class="card-text"><strong>ID Utilisateur :</strong> {{ $demandeInscription->utilisateur_id }}</p>
                        <p class="card-text"><strong>Nom de l'Utilisateur :</strong> {{ $demandeInscription->utilisateur->nom ?? 'Non spécifié' }}</p>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="text-center">
            <a href="{{ route('demandesinscription.index') }}" class="btn btnOrder">Retour à la liste des demandes</a>
        </div>
    </div>
</body>
</html>


