<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Results</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to Dashboard Results CSS -->
    <link href="{{ asset('css/dashboard-results.css') }}" rel="stylesheet">
</head>
<body>
    @include('components.navbar') <!-- Include the navbar component here -->

        <h1 class="text-center text-primary font-weight-bold mb-5">Dashboard Results</h1>

            <table class="table table-striped">
                <thead class="thead-dark">
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

</body>
</html>
