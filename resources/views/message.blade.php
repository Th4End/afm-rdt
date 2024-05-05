<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nous contacter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('/image/favicon.ico') }}">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('acceuil') }}">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('message.create') }}">Nous contacter</a>
                    </li>
                </ul>
            </div> 
            <ul class="navbar-nav ms-auto">
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Nous contacter</h2>
                <form method="POST" action="{{ route('message.store') }}" autocomplete="off">
                    @csrf
                    @auth
                        <input type="hidden" id="name" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" id="email" name="email" value="{{ Auth::user()->email }}">
                    @else
                        <div class="mb-3">
                            <label for="name" class="form-label" placeholder="entrez votre nom">Nom :</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    @endauth
                    <div class="mb-3">
                        <label for="content" class="form-label">Message :</label>
                        <textarea class="form-control" id="content" name="content" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

</body>
<style>
    /* Empêcher l'agrandissement de la zone de texte */
    textarea {
        resize: none;
    }
</style>
</html>
