<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesorías Dashboard</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to Dashboard CSS -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    @include('components.navbar')
    <div class="container mt-5">
        <h1 class="text-center text-primary font-weight-bold mb-5">Asesorías Dashboard</h1>

        <!-- Summary Ribbon -->
        <div class="summary-ribbon">
            <div class="row">
                <div class="col-md-2 col-6 summary-item">
                    <h5>Sesiones:</h5>
                    <p id="sessionsCount">0</p>
                </div>
                <div class="col-md-2 col-6 summary-item">
                    <h5>Total Hrs. Alumnos:</h5>
                    <p id="totalStudentHours">0</p>
                </div>
                <div class="col-md-2 col-6 summary-item">
                    <h5>Duración media de sesión:</h5>
                    <p id="averageSessionDuration">0</p>
                </div>
                <div class="col-md-2 col-6 summary-item">
                    <h5>Total hrs. Talent:</h5>
                    <p id="totalTalentHours">0</p>
                </div>
                <div class="col-md-2 col-6 summary-item">
                    <h5>Profesores:</h5>
                    <p id="uniqueStudents">0</p>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="card shadow-sm p-4 mb-4">
            <div class="row">
                <div class="col-md-6 filter-group">
                    <div class="form-group">
                        <label for="start-date" class="font-weight-bold">Inicio:</label>
                        <input type="date" id="start-date" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 filter-group">
                    <div class="form-group">
                        <label for="end-date" class="font-weight-bold">Fin:</label>
                        <input type="date" id="end-date" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 filter-group">
                    <div class="form-group">
                        <label for="talent-member" class="font-weight-bold">Asesores:</label>
                        <select id="talent-member" class="form-select form-control" multiple>
                            <option value="">Seleccione un asesor</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 filter-group">
                    <div class="form-group">
                        <label for="location" class="font-weight-bold">Sede:</label>
                        <select id="location" class="form-select form-control" multiple>
                            <option value="">Todas las sedes</option>
                            <option value="1">México</option>
                            <option value="4">Aguascalientes</option>
                            <option value="5">Guadalajara</option>
                            <option value="6">Ciudad UP</option>
                            <option value="1007">Sin Sede</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 filter-group">
                    <div class="form-group">
                        <label for="category" class="font-weight-bold">Categoría:</label>
                        <select id="category" class="form-select form-control" multiple>
                            <option value="">Seleccione una Categoría</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Buttons Group -->
            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-secondary mr-2" id="clear-filters">Limpiar</button>
                <button class="btn btn-primary" id="search">Buscar</button>
            </div>
        </div>

        <!-- Results Section -->
        <div id="results" class="results-container">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Correo</th>
                            <th>Nombres</th>
                            <th>Categoría</th>
                            <th>Duración (min)</th>
                            <th>Total Horas TALENT</th>
                            <th>Sesiones</th>
                            <th>% Horas Prof</th>
                            <th>% Horas TALENT</th>
                        </tr>
                    </thead>
                    <tbody id="results-body">
                        <!-- Data will be populated here dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#talent-member, #location, #category').select2({ allowClear: true });

            // Fetch asesors and populate the dropdown
            fetch('/api/asesors')
                .then(response => response.json())
                .then(data => {
                    const talentSelect = document.getElementById('talent-member');
                    data.forEach(asesor => {
                        const option = document.createElement('option');
                        option.value = asesor.id;
                        option.textContent = asesor.nombre;
                        talentSelect.appendChild(option);
                    });
                }).catch(error => console.error('Error fetching asesors:', error));

            // Fetch categories and populate the dropdown
            fetch('/api/categorias')
                .then(response => response.json())
                .then(data => {
                    const categorySelect = document.getElementById('category');
                    data.forEach(categoria => {
                        const option = document.createElement('option');
                        option.value = categoria.id;
                        option.textContent = categoria.nombre;
                        categorySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching categories:', error));

            function updateSummary() {
                const start = document.getElementById('start-date').value;
                const end = document.getElementById('end-date').value;
                const asesors = $('#talent-member').val().join(',');

                fetch(`/api/asesorias?start=${start}&end=${end}&asesor=${asesors}`)
                    .then(response => response.json())
                    .then(data => {
                        const resultsBody = document.getElementById('results-body');
                        resultsBody.innerHTML = ''; // Clear existing results

                        let totalProfessorHours = 0;
                        let totalTalentHours = 0;
                        const asesorHours = {};

                        // Calculate total hours for professors and talents
                        data.forEach(assesory => {
                            const durationHours = assesory.duration / 60;
                            totalProfessorHours += durationHours;
                            totalTalentHours += durationHours * assesory.asesors.length;

                            assesory.asesors.forEach(asesor => {
                                if (!asesorHours[asesor.id]) {
                                    asesorHours[asesor.id] = 0;
                                }
                                asesorHours[asesor.id] += durationHours;
                            });
                        });

                        // Populate the results table
                        data.forEach(assesory => {
                            const asesorsNames = assesory.asesors.map(asesor => asesor.nombre).join(', ');
                            const row = document.createElement('tr');

                            // Calculate percentages for each asesor in this session
                            const porcentajeProfesor = ((asesorHours[assesory.asesors[0].id] / totalProfessorHours) * 100).toFixed(2) + '%';
                            const porcentajeTalent = ((asesorHours[assesory.asesors[0].id] / totalTalentHours) * 100).toFixed(2) + '%';

                            row.innerHTML = `
                                <td>${assesory.email}</td>
                                <td>${asesorsNames}</td>
                                <td>${assesory.category ? assesory.category.nombre : ''}</td>
                                <td>${assesory.duration}</td>
                                <td>${(assesory.duration / 60).toFixed(2)} hrs</td>
                                <td>${assesory.asesors.length}</td>
                                <td>${porcentajeProfesor}</td>
                                <td>${porcentajeTalent}</td>
                            `;
                            resultsBody.appendChild(row);
                        });
                    })
                    .catch(error => console.error('Error fetching results:', error));
            }

            // Update summary when 'Buscar' button is clicked
            document.getElementById('search').addEventListener('click', updateSummary);
            updateSummary(); // Optionally, load initial summary data

            // Clear filters
            document.getElementById('clear-filters').addEventListener('click', function() {
                $('#talent-member, #location, #category').val(null).trigger('change');
                document.getElementById('start-date').value = '';
                document.getElementById('end-date').value = '';
                updateSummary();
            });
        });
    </script>
</body>
</html>
