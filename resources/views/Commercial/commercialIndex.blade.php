<!-- resources/views/commercial/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Commercial Index</title>
</head>
<body>
    <p>Je suis la page Commercial index</p>

    <div class="container">
        <p>TEST</p>
        <h1>Liste des commerciaux</h1>
        <ul>
            @foreach ($commercialInfo as $commercial2)
                <li>
                    <a href="{{ route('commercial.show', $commercial2->id) }}">
                        {{ $commercial2->nom }}
                    </a> - Budget: {{ $commercial2->budget }}
                </li>
            @endforeach
        </ul>
        <form action="{{ route('caca') }}" method="POST">
            @csrf
            <button type="submit">Appuyer sur le bouton</button>
        </form>
    </div>
</body>
</html>
