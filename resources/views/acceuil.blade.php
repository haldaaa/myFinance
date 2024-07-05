
@extends('layout')

@section('contenu')

<div class="container">
    <div class="row">
        <div class="col-12" id="textAcceuil">
            <p> Je suis {{ Route::currentRouteName() }} </p>
        </div>
    </div>
</div>

@endsection