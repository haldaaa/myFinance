@extends('layout')


@section('contenu')
    

    <title>Transactions</title>
<div class="container">
    <h1>Liste des Transactions</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID Transaction </th>
                <th>Nom du Commercial</th>
                <th>Nom de l'Action</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td><a href="{{ route('transaction.show', $transaction->id) }}">{{ $transaction->commercial->nom }}</a></td>
                    <td>{{ $transaction->action->nomAction }}</td>
                    <td>{{ $transaction->quantite }}</td>
                    <td>{{ $transaction->prix_unitaire }}</td>
                    <td>{{ $transaction->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




@endsection
