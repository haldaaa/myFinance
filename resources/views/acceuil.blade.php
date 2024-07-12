
@extends('layout')

@section('contenu')

<div class="container">
    <div class="row">
        <div class="col-12" id="textAcceuil">
            <p> Je suis {{ Route::currentRouteName() }} </p>
            <p> Compteur ID: {{ DB::table('compteurs')->where('id', 1)->value('valeur') }} </p>
            <form action="{{ route('run') }}" method="GET">
                @csrf
                <button type="submit">Lancer Faire2Tours</button>
            </form>


            <form action="{{ route('resetTables') }}" method="POST">
                @csrf
                <button type="submit">Réinitialiser les tables</button>
            </form>
        
            <form action="{{ route('runArtisanCommand') }}" method="POST">
                @csrf
                <button type="submit">Lancer la commande Artisan 10 fois</button>
            </form>
            
    
            @if(session('message'))
                <p>{{ session('message') }}</p>
            @endif
        </div>
    </div>
</div>

@endsection