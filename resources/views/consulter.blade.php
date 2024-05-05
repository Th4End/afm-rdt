<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Consultation message</title>
</head>
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
@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Messages</div>

                <div class="card-body">
                    @if ($messages->isEmpty())
                        <p>Aucun message trouvé.</p>
                    @else
                    @foreach ($messages as $message)
                        <li class="list-group-item">
                            <strong>Envoyé par : </strong>{{ $message->name }} <br>
                            <strong>Message : </strong>{{ $message->content }}
                        </li>
                        @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection