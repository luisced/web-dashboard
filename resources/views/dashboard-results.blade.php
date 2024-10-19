<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Results</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Dashboard Results</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Correo</th>
                    <th>Fecha</th>
                    <th>Duración</th>
                    <th>Categoría</th>
                    <th>Asesor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assesories as $assesory)
                    <tr>
                        <td>{{ $assesory->id }}</td>
                        <td><a href="mailto:{{ $assesory->email }}">{{ $assesory->email }}</a></td>
                        <td>{{ $assesory->date }}</td>
                        <td>{{ $assesory->duration }}</td>
                        <td>{{ $assesory->category->nombre ?? 'N/A' }}</td>
                        <td>
                            @foreach($assesory->asesors as $asesor)
                                {{ $asesor->nombre }}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
