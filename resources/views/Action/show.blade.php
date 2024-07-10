@extends('layout')
@section('contenu')

<div class="container"> 
    <h1>{{ $action->nomAction }}</h1>
    <table class="table table-striped">
        <tr>
            <th>Quantité</th>
            <td>{{ $action->quantite }}</td>
        </tr>
        <tr>
            <th>Prix</th>
            <td>{{ $action->prix }}</td>
        </tr>
        <tr>
            <th>Compteur ID</th>
            <td>{{ DB::table('compteurs')->where('id', 1)->value('valeur') }}</td>
        </tr>
    </table>

    <h2>Variations de Prix</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tour</th>
                <th>Prix</th>
                <th>Variation</th> <!-- Nouvelle colonne pour la variation -->
            </tr>
        </thead>
        <tbody>
            @php
                $previousPrice = null;
                $prices = [];
                $labels = [];
            @endphp
            @foreach(DB::table('historiqueprix')->where('action_id', $action->id)->get() as $historique)
            <tr>
                <td>{{ $historique->id }}</td>
                <td>{{ $historique->prix }}</td>
                <td>
                    @if ($previousPrice === null)
                        N/A
                    @elseif ($historique->prix > $previousPrice)
                        hausse
                    @elseif ($historique->prix < $previousPrice)
                        baisse
                    @else
                        egal
                    @endif
                </td>
            </tr>
            @php
                $previousPrice = $historique->prix;
                $prices[] = $historique->prix;
                $labels[] = $historique->id;
            @endphp
            @endforeach
        </tbody>
    </table>

    <h2>Graphique de l'évolution des prix</h2>
    <canvas id="priceChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('priceChart').getContext('2d');
    const priceChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Prix',
                data: @json($prices),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection