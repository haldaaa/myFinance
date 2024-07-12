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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actions as $action)
            <tr>
                <td><a href="{{ route('action.show', $action->id) }}">{{ $action->nomAction }}</a></td>
                <td>{{ $action->quantite }}</td>
                <td>{{ $action->prix }}</td>
                <td>
                    <form action="{{ route('action.acheter', $action->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Acheter</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection