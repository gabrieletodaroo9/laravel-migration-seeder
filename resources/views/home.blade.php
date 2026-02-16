<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header class="py-4 bg-dark text-white">
        <h2 class=" display-4 text-uppercase ms-5">Tabellone Treni</h2>
    </header>
    <main class="bg-train">
        <div class="container py-5">
            <table class="table share-tech-mono-regular border">
                <thead class="table-light">
                    <tr>
                        <th>Azienda</th>
                        <th>Tipo</th>
                        <th>Partenza</th>
                        <th>Orario partenza</th>
                        <th>Binario</th>
                        <th>Arrivo</th>
                        <th>Orario arrivo</th>
                        <th>Codice</th>
                        <th>Carrozze</th>
                        <th>Stato</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @foreach ($trains as $train)
                    <tr>
                        <td><strong>{{ $train->azienda }}</strong></td>
                        <td>{{ $train->tipo_treno }}</td>
                        <td>{{ $train->stazione_partenza }}</td>
                        <td>{{ date('d-m / H:i', strtotime($train->orario_partenza)) }}</td>
                        <td>{{ $train->binario_partenza }}</td>
                        <td>{{ $train->stazione_arrivo }}</td>
                        <td>{{ date('d-m / H:i', strtotime($train->orario_arrivo)) }}</td>
                        <td>{{ $train->codice_treno }}</td>
                        <td>{{ $train->totale_carrozze }}</td>
                        <td>
                            @if($train->cancellato)
                            <span class="text-danger">Cancellato</span>
                            @elseif ($train->minuti_ritardo > 0)
                            <span class="text-danger">In ritardo di {{$train["minuti_ritardo"]}} minuti</span>
                            @else
                            <span class="text-success">In orario</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>