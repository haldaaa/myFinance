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
                <th>Nombre d'actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $commercial->nom }}</td>
                <td>{{ $commercial->budget }}</td>
                <td>{{ $commercial->detail_commandes_count }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Liste des actions achetées -->
    <h2>Actions achetées</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Action</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Prix Total par Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailCommandes as $detail)
                <tr>
                    <td>{{ $detail->action->nomAction }}</td>
                    <td>{{ $detail->quantite }}</td>
                    <td>{{ $detail->prix_unitaire }}</td>
                    <td>{{ $detail->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $detailCommandes->links() }}

    <!-- Prix total général -->
    <h3>Prix Total Général: {{ $totalGeneral }}</h3>

    <a href="{{ route('commercial.index') }}" class="btn btn-primary">Retour à la liste des commerciaux</a>
</div>

@endsection