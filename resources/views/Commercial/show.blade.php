@extends('layout')
@section('contenu')

    <title>Détails du Commercial</title>

<div class="container">
    <h1>Détails du Commercial</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Budget</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $commercial->nom }}</td>
                <td>{{ $commercial->budget }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Ajoutez ici d'autres détails si nécessaire -->

    <a href="{{ route('commercial.index') }}">Retour à la liste des commerciaux</a>
</div>

@endsection