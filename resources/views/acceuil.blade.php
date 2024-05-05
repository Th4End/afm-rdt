<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>AFM-RDT</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/image/favicon.ico') }}">
    <style>
        .carousel {
            max-width: 50%;
            margin: auto;
        }
        .img-half-size {
            width: 50%;
            position: absolute;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('acceuil') }}">Acceuil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('message.create') }}">Nous contacter</a>
                    </li>
                    @auth <!-- Vérifie si l'utilisateur est connecté -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('consulter') }}">Consulter les messages</a>
                    </li>
                    @endauth
                </ul>
            </div> 
            <ul class="navbar-nav">
                @auth <!-- Vérifie si l'utilisateur est connecté -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Déconnexion</button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('connexion') }}">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">S'enregistrer</a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    
    <div class="container mt-5">
        <h1 class="text-center mb-4">Notre Histoire</h1>
        <p class="fs-5">Afm-Rdt est née de notre rencontre avec le peuple des montagnes, lors du 56ème salon des roses à Kalaat M’gouna (Sud-Est du Maroc) en mai 2018.</p>
        
        <p class="fs-5">Afm-Rdt a été invitée par le Président de la Chambre d’Agriculture de la Région Draa-Tafilalet pour participer à 2 rencontres avec les agriculteurs locaux à Ouarzazate et à Zagora. Lors de ces réunions, nous nous sommes engagés à représenter ce peuple et lui donner la parole à travers nos missions.</p>
        <button type="button" class="btn btn-primary" onclick="redirect()">Faire un don</button>
        <script>
            // Fonction pour la redirection avec animation
            function redirect() {
                // Ajouter une classe CSS pour l'animation
                document.querySelector('.btn').classList.add('animate__animated', 'animate__bounceOutLeft');
                
                // Rediriger après un court délai pour que l'animation ait le temps de se terminer
                setTimeout(function() {
                    window.location.href = 'https://www.helloasso.com/associations/afm-rdt/formulaires/1';
                }, 500); // 500 millisecondes
            }
        </script>
<!-- Animation CSS (Bibliothèque Animate.css utilisée) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel"> 
            <div class="carousel-inner">
                 <div class="carousel-item active">
                     <img src="{{ asset('image/CouvertureAfm1.jpg')}}" class="d-block w-100" alt="Slide 1">
                     </div> 
                     <div class="carousel-item">
                         <img src="{{ asset('image/CouvertureAfm2.jpg')}}" class="d-block w-100" alt="Slide 2"> 
                    </div> 
                    <div class="carousel-item">
                         <img src="{{ asset('image/draa.jpg') }}" class="d-block w-100" alt="Slide 3">
                    </div> 
                </div> 
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"> 
                    <span class="carousel-control-prev-icon" aria-hidden="true">
                    </span> 
                    <span class="visually-hidden">Previous
                    </span> 
                </button> 
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"> 
                    <span class="carousel-control-next-icon" aria-hidden="true">
                    </span> 
                    <span class="visually-hidden">Next</span>
                </button> 
            </div>
        
        <p class="fs-5">AFM-RDT est devenue le relais privilégié et officiel entre la région Drâa-Tafilalet (Sud-Est Marocain) et la France à travers des actions de promotion et développement de l’économie solidaire et du tourisme éthique. Donner la parole aux peuples des montagnes et diffuser les produits du terroir issus de l'agriculture biologique et solidaire (coopératives de femmes) pour les aider à mieux vivre leur isolement, protéger leur culture et garantir l'avenir aux générations futures.</p>
        <!-- Ajout de la classe img-fluid pour rendre l'image responsive -->
        <img src="{{ asset('image/carte-agriculture.jpg') }}" class="img-fluid img-half-size">
    </div>
</body>
</html>
