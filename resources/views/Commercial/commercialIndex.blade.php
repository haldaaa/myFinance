<!-- resources/views/commercial/index.blade.php -->
@extends('layout')
@section('contenu')


    <div class="container">
       
        <h1>Liste des commerciaux</h1> <br> <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Budget</th>
            
                </tr>
            </thead>
            <tbody>
                @foreach ($commercialInfo as $commercial2)
                    <tr>
                        <td>
                            <a href="{{ route('commercial.show', $commercial2->id) }}">
                                {{ $commercial2->nom }}
                            </a>
                        </td>
                        <td>{{ $commercial2->budget }}</td>
              
                    </tr>
                @endforeach
            </tbody>
        </table>
 
    </div>


@endsection