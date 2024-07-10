@extends('layout')

@section('contenu')

<div class="container">
    <h1>Actions</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom de l'Action</th>
                <th>Quantité</th>
                <th>Prix</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($actions as $action)
            <tr>
                <td><a href="{{ route('action.show', $action->id) }}">{{ $action->nomAction }}</a></td>
                <td>{{ $action->quantite }}</td>
                <td>{{ $action->prix }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection