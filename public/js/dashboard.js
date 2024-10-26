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
        fetch('/api/summary')
            .then(response => response.json())
            .then(data => {
                document.getElementById('sessionsCount').textContent = data.sessionsCount;
                document.getElementById('totalStudentHours').textContent = data.totalStudentHours;
                document.getElementById('averageSessionDuration').textContent = data.averageSessionDuration;
                document.getElementById('totalTalentHours').textContent = data.totalTalentHours;
                document.getElementById('uniqueStudents').textContent = data.uniqueStudents;
            })
            .catch(error => console.error('Error fetching summary:', error));
    }

    document.getElementById('search').addEventListener('click', updateSummary);
    updateSummary(); // Optionally, update summary on page load
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
    const talentMember = $('#talent-member').val().join(','); // Join selected asesors with commas
    const location = $('#location').val();
    const category = $('#category').val();

    // Display selected filters
    const selectedFilters = document.getElementById('selected-filters');
    selectedFilters.innerHTML = `
        <div><strong>Inicio:</strong> ${startDate || 'N/A'}</div>
        <div><strong>Fin:</strong> ${endDate || 'N/A'}</div>
        <div><strong>Talent:</strong> ${talentMember || 'N/A'}</div>
        <div><strong>Sede:</strong> ${location || 'N/A'}</div>
        <div><strong>Categoría:</strong> ${category || 'N/A'}</div>
    `;

    // Fetch and display results
    fetch(`/api/asesorias?start=${startDate}&end=${endDate}&asesor=${talentMember}&location=${location}&category=${category}`)
        .then(response => response.json())
        .then(data => {
            const results = document.getElementById('results');
            results.innerHTML = data.map(asesoria => `
                <div class="card shadow-sm mb-3 p-3 result-item" data-id="${asesoria.id}">
                    <button type="button" class="btn-close" aria-label="Close"></button>
                    <div><strong>ID:</strong> ${asesoria.id}</div>
                    <div><strong>Correo:</strong> ${asesoria.email}</div>
                    <div><strong>Fecha:</strong> ${asesoria.date}</div>
                    <div><strong>Duración:</strong> ${asesoria.duration}</div>
                    <div><strong>Categoría:</strong> ${asesoria.category.nombre || 'N/A'}</div>
                    <div><strong>Asesor:</strong> ${asesoria.asesors.map(a => a.nombre).join(', ')}</div>
                </div>
            `).join('');

            // Add event listeners to close buttons
            document.querySelectorAll('.btn-close').forEach(function(button) {
                button.addEventListener('click', function() {
                    const resultItem = this.closest('.result-item');
                    resultItem.remove();  // Remove the result from the DOM
                    // Optionally, make an API call to update the backend or query
                });
            });
        })
        .catch(error => console.error('Error fetching asesorias:', error));
});
