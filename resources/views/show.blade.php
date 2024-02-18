<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil de l'Étudiant</title>
</head>
<body>
    <h1>Profil de l'Étudiant</h1>
    <p>Nom : {{ $utilisateur->nom }}</p>
    <p>Prénom : {{ $utilisateur->prenom }}</p>
    <p>Email : {{ $utilisateur->adresse_email }}</p>
    <p>Matricule : {{ $utilisateur->matricule }}</p>
    <p>Accès : {{ $utilisateur->a_acces ? 'Autorisé' : 'Non Autorisé' }}</p>

    {{-- Autres informations de l'utilisateur si nécessaire --}}
</body>
</html>