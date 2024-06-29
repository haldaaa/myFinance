<!DOCTYPE html>
<html>
<head>
    <title>Détails de la transaction</title>
</head>
<body>
    <h1>Détails de la transaction</h1>

    <p>Nom : {{ $commercial->nom }}</p>
    <p>Budget : {{ $commercial->budget }}</p>
    <!-- Ajoutez ici d'autres détails si nécessaire

    <a href="{{ route('commercial.index') }}">Retour à la liste des commerciaux</a> -->
</body>
</html>