@extends('layout')
@section('contenu')

    <title>Détails du Commercial</title>

<div class="container">
    <h1>Détails du Commercial</h1>

    <p>Nom : {{ $commercial->nom }}</p>
    <p>Budget : {{ $commercial->budget }}</p>
                                    
                    <!-- Ajoutez ici d'autres détails si nécessaire -->

        <a href="{{ route('commercial.index') }}">Retour à la liste des commerciaux</a>
    </div>

@endsection