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
            @component('components.date-filter', ['id' => 'start-date', 'label' => 'Inicio']) @endcomponent

            @component('components.date-filter', ['id' => 'end-date', 'label' => 'Fin']) @endcomponent

            @component('components.select-filter', ['id' => 'talent-member', 'label' => 'Asesores', 'defaultOption' => 'Seleccione un asesor'])
                <!-- Dynamically populated Asesores -->
            @endcomponent

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

            @component('components.select-filter', ['id' => 'category', 'label' => 'Categoría', 'defaultOption' => 'Seleccione una Categoría'])
                <!-- Dynamically populated Categorías -->
            @endcomponent

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

        <!-- Summary Item -->
        <div class="summary-component">
            @component('components.summary-item', ['value' => '164', 'label' => 'Sesiones']) @endcomponent
            @component('components.summary-item', ['value' => '145:45', 'label' => 'Total Hrs. Profesor']) @endcomponent
            @component('components.summary-item', ['value' => '0:53', 'label' => 'Duración Media Sesión']) @endcomponent
            @component('components.summary-item', ['value' => '147:15', 'label' => 'Total Hrs. Talent']) @endcomponent
            @component('components.summary-item', ['value' => '126', 'label' => 'Profesores']) @endcomponent
        </div>

    </div>

    <!-- JS to handle filters and populate dropdowns dynamically -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch asesors and populate the dropdown
            fetch('/api/asesors')
                .then(response => response.json())
                .then(data => {
                    const talentSelect = document.getElementById('talent-member');
                    data.forEach(asesor => {
                        const option = document.createElement('option');
                        option.value = asesor.id; // Assuming 'id' is the correct field
                        option.textContent = asesor.nombre; // Assuming 'nombre' is the correct field
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
                        option.value = categoria.id; // Assuming ID field is 'id'
                        option.textContent = categoria.nombre; // Assuming name field is 'nombre'
                        categorySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching categories:', error));
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
