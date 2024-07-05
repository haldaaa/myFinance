
@extends('layout')

@section('contenu')

<div class="container">
    <div class="row">
        <div class="col-12" id="textAcceuil">
            <p> Je suis {{ Route::currentRouteName() }} </p>
            <p> Compteur ID: {{ DB::table('compteurs')->where('id', 1)->value('valeur') }} </p>
        </div>
    </div>
</div>

@endsection