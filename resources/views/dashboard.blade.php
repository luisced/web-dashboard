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
    <!-- Add this in the <head> section -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    @include('components.navbar') <!-- Include the navbar component here -->
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

        <!-- Summary of Selected Filters -->
        <div class="alert alert-info" id="selected-filters"></div>

        <!-- Results Section -->
        <div id="results" class="results-container">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
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
                    <tbody>
                        <tr>
                            <td>mbatiz@up.edu.mx</td>
                            <td>Mónica</td>
                            <td>López Bátiz</td>
                            <td>5</td>
                            <td>6:20</td>
                            <td>1:16</td>
                            <td>4.16 %</td>
                            <td>4.12 %</td>
                        </tr>
                        <tr>
                            <td>gbenitez@up.edu.mx</td>
                            <td>Giancarlo Xavier</td>
                            <td>Benítez Villacreses</td>
                            <td>144</td>
                            <td>127:35</td>
                            <td>0:53</td>
                            <td>83.89 %</td>
                            <td>83.7 %</td>
                        </tr>
                        <tr>
                            <td>jalfaro@up.edu.mx</td>
                            <td>Julio César</td>
                            <td>Alfaro Avila</td>
                            <td>21</td>
                            <td>19:40</td>
                            <td>0:56</td>
                            <td>12.93 %</td>
                            <td>12.81 %</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- JS to handle filters and populate dropdowns dynamically -->
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <!-- Add this before the closing </body> tag -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('#talent-member, #location, #category').select2({
                allowClear: true
            });

            // Function to update selected filters
            function updateSelectedFilters() {
                let selectedFilters = [];

                // Get selected text values
                let talentMembers = $('#talent-member').select2('data').map(option => option.text);
                let locations = $('#location').select2('data').map(option => option.text);
                let categories = $('#category').select2('data').map(option => option.text);

                // Add to selected filters array if not empty
                if (talentMembers.length > 0) {
                    selectedFilters.push('Asesores: ' + talentMembers.join(', '));
                }
                if (locations.length > 0) {
                    selectedFilters.push('Sedes: ' + locations.join(', '));
                }
                if (categories.length > 0) {
                    selectedFilters.push('Categorías: ' + categories.join(', '));
                }

                // Update the selected-filters div
                $('#selected-filters').text(selectedFilters.join(' | '));
            }

            // Event listeners for changes
            $('#talent-member, #location, #category').on('change', updateSelectedFilters);

            // Initial update
            updateSelectedFilters();
        });
    </script>

</body>
</html>
