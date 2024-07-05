@extends('layout')

@section('contenu')

<div class="container">

    <title>Détails de la transaction</title> 



    <h1>Détails de la transaction</h1>
    <br><br>
    <p><strong>ID:</strong> {{ $transaction->id }}</p>
    <p><strong>Commercial:</strong> {{ $transaction->commercial->nom }}</p>
    <p><strong>Action:</strong> {{ $transaction->action->nomAction }}</p>
    <p><strong>Montant:</strong> {{ $transaction->total }}</p>
    <p><strong>Date:</strong> {{ $transaction->created_at }}</p>
    <p> <strong> Retour a l'acceuil des transactions : </strong> <a href="{{ route('transactionIndex') }}">Acceuil</a> </p>
</div>
@endsection

