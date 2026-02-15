<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
    <h2 class="mb-5">Tabellone Treni</h2>
    
    <table class="table">
        <thead class="table-light">
            <tr class="text-center">
                <th>Azienda</th>
                <th>Partenza</th>
                <th>Arrivo</th>
                <th>Orario</th>
                <th>Codice</th>
                <th>Carrozze</th>
                <th>Stato</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($trains as $train)
            <tr>
                <td><strong>{{ $train->azienda }}</strong></td>
                <td>{{ $train->stazione_partenza }}</td>
                <td>{{ $train->stazione_arrivo }}</td>
                <td>{{ date('d-m / H:i', strtotime($train->orario_partenza)) }}</td>
                <td>{{ $train->codice_treno }}</td>
                <td>{{ $train->totale_carrozze }}</td>
                <td>
                    @if($train->cancellato)
                        <span class="text-danger">Cancellato</span>
                    @else
                        {{ $train->in_orario ? 'In orario' : 'In ritardo' }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>