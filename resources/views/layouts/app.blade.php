<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Votre Nouveau Projet</title>
</head>
<body class ="bg-blue-black-gradient">
    {{-- <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">Logo/Nom du Projet</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- Vos liens de navigation ici -->
                    </ul>
                    <!-- Bouton de déconnexion visible uniquement pour les utilisateurs connectés -->
                    @auth
                    <form method="POST" action="{{ route('logout') }}" class="d-flex">
                        @csrf
                        <button type="submit" class="btn btn-danger">Déconnexion</button>
                    </form>
                    @endauth
                </div>
            </div>
        </nav>
    </header> --}}

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">Logo/Nom du Projet</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- Lien vers la page des demandes d'inscription -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('demandesinscription.index') }}">Demandes d'Inscription</a>
                        </li>
                        <!-- Lien vers la page d'historique des entrées et sorties -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('entreeSortie.index') }}">Historique des Entrées et Sorties</a>
                        </li>
                         <!-- Nouveau lien vers la page des demandes approuvées -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('demandes.approuvees') }}">Demandes Approuvées</a>
                    </li>
                    
                        <!-- Vous pouvez ajouter plus de liens ici si nécessaire -->
                    </ul>
                    <!-- Bouton de déconnexion visible uniquement pour les utilisateurs connectés -->
                    @auth('admin')
                    <form method="POST" action="{{ route('logout') }}" class="d-flex">
                        @csrf
                        <button type="submit" class="btn btn-link text-decoration-none" style="color: black;">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </button>
                    </form>
                    @endauth


                </div>
            </div>
        </nav>
    </header>

    <main class="py-4">
        @yield('contenu')
    </main>
    <!-- Bootstrap JS et jQuery pour le fonctionnement du menu toggle en responsive -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

