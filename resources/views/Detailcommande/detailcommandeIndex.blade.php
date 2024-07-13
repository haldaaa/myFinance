@extends('layout')

@section('contenu')
    <title>Transactions</title>
    <div class="container">
        <h1>Liste des Transactions</h1>

        <table id="transactionsTable" class="display" border="1">
            <thead>
                <tr>
                    <th>ID Transaction</th>
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
                        <td><a href="{{ route('detailCommandeShow', $transaction->id) }}">{{ $transaction->commercial->nom }}</a></td>
                        <td>{{ $transaction->action->nomAction }}</td>
                        <td>{{ $transaction->quantite }}</td>
                        <td>{{ $transaction->prix_unitaire }}</td>
                        <td>{{ $transaction->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Inclure les scripts DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#transactionsTable').DataTable();
        });
    </script>
@endsection