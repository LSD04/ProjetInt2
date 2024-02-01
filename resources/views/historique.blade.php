<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des Accès</title>
    <link rel="stylesheet" href="{{ asset('css/historique.css') }}">
</head>
<body>
<div class="container">
    <h1>Historique des Accès</h1>
    <table>
        <thead>
        <tr>
            <th>Utilisateur</th>
            <th>Date/Heure d'entrée</th>
            <th>Date/Heure de sortie</th>
            <th>Local</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($historique as $item)
            <tr>
                <td>{{ $item->utilisateur }}</td>
                <td>{{ $item->heure_entree }}</td>
                <td>{{ $item->heure_sortie }}</td>
                <td>{{ $item->local }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Aucun historique disponible</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
