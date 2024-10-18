<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesorías Dashboard</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <div class="dashboard-container">
        <h1>Ad / Asesorias / Dashboard</h1>

        <!-- Filter Section -->
        <div class="filters">
            <div class="filter-group">
                <label for="start-date">Inicio:</label>
                <input type="date" id="start-date">
                <button id="reset-start-date">✖</button>
            </div>

            <div class="filter-group">
                <label for="end-date">Fin:</label>
                <input type="date" id="end-date">
                <button id="reset-end-date">✖</button>
            </div>

            <div class="filter-group">
                <label for="talent-member">Asesores:</label>
                <select id="talent-member">
                    <option value="">Seleccione un asesor</option>
                    <!-- Populate dynamically -->
                     
                </select>
            </div>

            <div class="filter-group">
                <label for="location">Sede:</label>
                <select id="location">
                    <option value="">Todas las sedes</option>
                    <option value="1">México</option>
                    <option value="4">Aguascalientes</option>
                    <option value="5">Guadalajara</option>
                    <option value="6">Ciudad UP</option>
                    <option value="1007">Sin Sede</option>
                </select>
            </div>

            <div class="filter-group">
                <label for="category">Categoría:</label>
                <select id="category">
                    <option value="">Seleccione una Categoría</option>
                    <!-- Populate dynamically -->
                </select>
            </div>

            <!-- Buttons Group -->
            <div class="buttons-group">
                <button class="btn-clear" id="clear-filters">Limpiar</button>
                <button class="btn-search" id="search">Buscar</button>
            </div>
        </div>

        <!-- Summary of Selected Filters -->
        <div class="summary-filters" id="selected-filters"></div>

        <!-- Results Section -->
        <div id="results"></div>
    </div>

    <!-- JS to handle filters -->
    <script>
        // Populate talent members and categories dynamically
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/asesors')
                .then(response => response.json())
                .then(data => {
                    const talentSelect = document.getElementById('talent-member');
                    data.forEach(asesor => {
                        const option = document.createElement('option');
                        option.value = asesor.ID;
                        option.textContent = asesor.Nombre;
                        talentSelect.appendChild(option);
                    });
                });

            fetch('/api/categories')
                .then(response => response.json())
                .then(data => {
                    const categorySelect = document.getElementById('category');
                    data.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.ID;
                        option.textContent = category.Nombre;
                        categorySelect.appendChild(option);
                    });
                });
        });

        // Clear filters
        document.getElementById('clear-filters').addEventListener('click', function() {
            document.getElementById('start-date').value = '';
            document.getElementById('end-date').value = '';
            document.getElementById('talent-member').value = '';
            document.getElementById('location').value = '';
            document.getElementById('category').value = '';
            document.getElementById('selected-filters').innerHTML = '';
        });

        // Search and display results
        document.getElementById('search').addEventListener('click', function() {
            const startDate = document.getElementById('start-date').value;
            const endDate = document.getElementById('end-date').value;
            const talentMember = document.getElementById('talent-member').value;
            const location = document.getElementById('location').value;
            const category = document.getElementById('category').value;

            // Display selected filters
            const selectedFilters = document.getElementById('selected-filters');
            selectedFilters.innerHTML = `
                <div>Inicio: ${startDate || 'N/A'}</div>
                <div>Fin: ${endDate || 'N/A'}</div>
                <div>Talent: ${talentMember || 'N/A'}</div>
                <div>Sede: ${location || 'N/A'}</div>
                <div>Categoría: ${category || 'N/A'}</div>
            `;

            // Fetch and display results
            fetch(`/api/asesorias?start=${startDate}&end=${endDate}&talent=${talentMember}&location=${location}&category=${category}`)
                .then(response => response.json())
                .then(data => {
                    const results = document.getElementById('results');
                    results.innerHTML = data.map(asesoria => `
                        <div>ID: ${asesoria.ID}, Correo: ${asesoria.Correo}, Fecha: ${asesoria.Fecha}, Duración: ${asesoria.Duracion}, Categoría: ${asesoria.Categoria}, Asesor: ${asesoria.Asesor}</div>
                    `).join('');
                });
        });
    </script>
</body>
</html>
