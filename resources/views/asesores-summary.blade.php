<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesores Summary</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary font-weight-bold mb-5">Asesores Summary</h1>

        <!-- Filter Section -->
        <div class="card shadow-sm p-4 mb-4">
            <div class="row">
                <div class="col-md-6 filter-group">
                    <div class="form-group">
                        <label for="asesor" class="font-weight-bold">Asesor:</label>
                        <select id="asesor" class="form-control" multiple></select>
                    </div>
                </div>
                <div class="col-md-6 filter-group">
                    <div class="form-group">
                        <label for="categoria" class="font-weight-bold">Categoría:</label>
                        <select id="categoria" class="form-control" multiple></select>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" id="filter">Filter</button>
        </div>

        <!-- Results Table -->
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Correo</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Sesiones</th>
                    <th>Total Horas TALENT</th>
                    <th>Duración Media Sesión</th>
                    <th>% Horas Prof</th>
                    <th>% Horas TALENT</th>
                </tr>
            </thead>
            <tbody id="asesores-table-body">
                <!-- Rows will be populated dynamically -->
            </tbody>
        </table>
    </div>

    <!-- Include jQuery and Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('#asesor, #categoria').select2({
                placeholder: 'Seleccione',
                allowClear: true,
                width: '100%'
            });

            // Fetch asesors and categories for the filters
            fetch('/api/asesors')
                .then(response => response.json())
                .then(data => {
                    const asesorSelect = $('#asesor');
                    data.forEach(asesor => {
                        const option = new Option(asesor.nombre, asesor.id, false, false);
                        asesorSelect.append(option);
                    });
                });

            fetch('/api/categorias')
                .then(response => response.json())
                .then(data => {
                    const categoriaSelect = $('#categoria');
                    data.forEach(categoria => {
                        const option = new Option(categoria.nombre, categoria.id, false, false);
                        categoriaSelect.append(option);
                    });
                });

            // Fetch and display asesores summary
            function fetchAsesoresSummary() {
                const asesors = $('#asesor').val();
                const categories = $('#categoria').val();

                // Prepare query parameters
                const params = new URLSearchParams();
                if (asesors && asesors.length > 0) params.append('asesors', asesors.join(','));
                if (categories && categories.length > 0) params.append('categories', categories.join(','));

                fetch(`/api/asesores-summary?${params.toString()}`)
                    .then(response => response.json())
                    .then(data => {
                        const tableBody = $('#asesores-table-body');
                        tableBody.empty(); // Clear existing rows

                        data.forEach(asesor => {
                            const row = `
                                <tr>
                                    <td>${asesor.email}</td>
                                    <td>${asesor.firstName}</td>
                                    <td>${asesor.lastName}</td>
                                    <td>${asesor.sessions}</td>
                                    <td>${asesor.totalHoursTalent}</td>
                                    <td>${asesor.averageSessionDuration}</td>
                                    <td>${asesor.percentageHoursProf}</td>
                                    <td>${asesor.percentageHoursTalent}</td>
                                </tr>
                            `;
                            tableBody.append(row);
                        });
                    });
            }

            // Fetch summary on filter button click
            $('#filter').on('click', fetchAsesoresSummary);

            // Initial fetch
            fetchAsesoresSummary();
        });
    </script>
</body>
</html>
