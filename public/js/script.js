document.addEventListener('DOMContentLoaded', function () {
    // tous les champs required
    const requiredFields = document.querySelectorAll('input[required], select[required], textarea[required]');

    requiredFields.forEach(field => {
        const label = document.querySelector('label');
        if (label && !label.classList.contains('required')) {
            label.classList.add('required');
        }
    });
});

function dateAujourdhui() {
    return new Date().toLocaleDateString('fr-FR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
}

document.querySelectorAll('.date-aujourdhui').forEach(el => {
    el.textContent = dateAujourdhui();
});
