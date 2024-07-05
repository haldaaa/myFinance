<!-- resources/views/commercial/index.blade.php -->
@extends('layout')
@section('contenu')


   

    <div class="container">
       
        <h1>Liste des commerciaux</h1> <br> <br>
        <ul>
            @foreach ($commercialInfo as $commercial2)
                <li>
                    <a href="{{ route('commercial.show', $commercial2->id) }}">
                        {{ $commercial2->nom }}
                    </a> - Budget: {{ $commercial2->budget }}
                </li>
            @endforeach
        </ul>
 
    </div>


@endsection