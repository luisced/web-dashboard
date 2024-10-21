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
                <select id="talent-member" class="form-select form-control">
                    <option value="">Seleccione un asesor</option>
                </select>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
    });
</script>
