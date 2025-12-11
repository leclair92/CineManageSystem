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

