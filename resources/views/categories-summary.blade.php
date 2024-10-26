<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías Summary</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to Dashboard CSS for consistent styling -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    @include('components.navbar')

    <div class="container mt-5">
        <h1 class="text-center text-primary font-weight-bold mb-5">Categorías Summary</h1>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Key</th>
                        <th>Nombre</th>
                        <th>Sesiones</th>
                        <th>Profesores</th>
                        <th>Total Horas Prof</th>
                        <th>Total Horas TALENT</th>
                        <th>Duración Media Prof</th>
                        <th>Duración Media TALENT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->key }}</td>
                            <td>{{ $category->nombre }}</td>
                            <td>{{ $category->sessions_count }}</td>
                            <td>{{ $category->unique_professors_count }}</td>
                            <td>{{ $category->total_hours_prof }}</td>
                            <td>{{ $category->total_hours_talent }}</td>
                            <td>{{ $category->average_duration_prof }}</td>
                            <td>{{ $category->average_duration_talent }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</body>
</html>
