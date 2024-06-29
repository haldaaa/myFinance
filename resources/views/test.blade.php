<!DOCTYPE html>
<html>
<head>
    <title>Actions par Commercial</title>
</head>
<body>
    <h1>Actions par Commercial</h1>
    @foreach($commerciaux as $commercial)
        <h2>{{ $commercial->nom }}</h2>
        <p>Budget actuel : {{ $commercial->budget }} €</p>
        <ul>
            @foreach($commercial->detailCommandes as $detailCommande)
                <li>
                    {{ $detailCommande->action->nomAction }} - Quantité: {{ $detailCommande->quantite }} - 
                    Prix total: {{ $detailCommande->quantite * $detailCommande->prix_unitaire }} €, acheté le {{ $detailCommande->created_at }}
                </li>
            @endforeach
        </ul>
        <h3>Totaux par Action</h3>
        <ul>
            @foreach($commercial->totaux as $nomAction => $total)
                <li>
                    {{ $nomAction }} - Quantité totale: {{ $total['quantite'] }} - Montant total: {{ $total['montant'] }} €
                </li>
            @endforeach
        </ul>
    @endforeach
</body>
</html>
