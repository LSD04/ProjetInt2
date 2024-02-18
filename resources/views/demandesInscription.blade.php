<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Demande d'Inscription</title>
</head>
<body>
    <h1>Détails de la Demande d'Inscription</h1>
    @if(isset($demandesInscriptions) && $demandesInscriptions->isEmpty())
        <p>Aucune demande d'inscription n'a été trouvée.</p>
    @else
        <div>
            @foreach ($demandesInscriptions as $demandeInscription)
                <p><strong>Nom :</strong> {{ $demandeInscription->nom }}</p>
                <p><strong>Prénom :</strong> {{ $demandeInscription->prenom }}</p>
                <p><strong>Email :</strong> {{ $demandeInscription->adresse_email }}</p>
                <p><strong>Date de la demande :</strong> {{ $demandeInscription->date_demande ? $demandeInscription->date_demande->format('d/m/Y H:i') : 'Non spécifiée' }}</p>
                <p><strong>ID du local :</strong> {{ $demandeInscription->local_id }}</p>
                <p><strong>Statut de la demande :</strong> {{ $demandeInscription->statutDemande }}</p>
                <p><strong>ID Utilisateur :</strong> {{ $demandeInscription->utilisateur_id }}</p>
                <p><strong>Nom de l'Utilisateur :</strong> {{ $demandeInscription->utilisateur->nom ?? 'Non spécifié' }}</p>
            @endforeach
        </div>
    @endif
    <a href="{{ route('demandesinscription.index') }}">Retour à la liste des demandes</a>
</body>
</html>

