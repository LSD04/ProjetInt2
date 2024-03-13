@extends('layouts.app')

@section('contenu')
<body onload="createCard()">
    <div class="container">
        <h1 class="text-center">Demandes d'Inscription</h1>
        
        <!-- Formulaire de recherche -->
        <div class="mb-4" id="test">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" id="searchInput" placeholder="Rechercher par nom ou prénom"">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" style="margin-left: 8px;">Recherche</button>           
                </div>
            </div>
        </div>
        <!-- Fin du formulaire de recherche -->

        



        
        <!-- Fin du formulaire pour rétirer l'accès à tous les utilisateurs -->

        <div id="listeCard">
            @if(count($demandesInscriptions))
                {{-- <div class="col-md-4"> --}}
                    {{-- <div class="card" onclick="window.location.href='{{ route('demandesinscription.show', $demandeInscription->id) }}'">
                        <div class="card-body">
                            <h5 class="card-title">{{ $demandeInscription->nom }} {{ $demandeInscription->prenom }}</h5>
                            <p class="card-text">Statut: {{ $demandeInscription->statutDemande }}</p>
                        </div>
                    </div> --}}
                {{-- </div> --}}
            @else
                <p class="text-center">Aucune demande d'inscription trouvée.</p>
            @endif
        </div>
    </div>
</body>

<script>
let originalData = @json($demandesInscriptions);
let actualData;


function createCard(data)
    {
        if(data == null){
            data = actualData = originalData;
            console.log(data)
        }

         let cardData = document.getElementById("listeCard"); 
         let card = '<div class="row">';
            for(i = 0; i < data.length; i++){
                let urlShow = '{{ route('demandesinscription.show', ":id") }}';
                let placeholder = ":id";
                let url = urlShow.replace(placeholder, data[i].id);
               
                card = card  + `
                <a href=${url} class="col-md-4" style="text-decoration:none;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${data[i].nom} ${data[i].prenom}</h5>
                            <p class="card-text">Statut: ${data[i].statutDemande}</p>
                        </div>
                    </div>
                </a>
            `;

        }
        cardData.innerHTML = card;
        console.log(cardData);
    }

    const searchInput = document.getElementById("searchInput");
    searchInput.addEventListener("keyup", (e) => {
      
        let value = e.target.value;

        if (value && value.trim().length > 0){
            value = value.trim().toLowerCase();

            var formSearch = originalData.filter(f => 
                f.nom.toLowerCase().includes(value) || 
                f.prenom.toLowerCase().includes(value)
            );
            actualData = formSearch;

            createCard(actualData);
        }
        else if(!value || value === ""){
            actualData = originalData;
            createCard();
        }
    });
    
</script>

@endsection
