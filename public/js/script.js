document.addEventListener('DOMContentLoaded', function () {
    const requiredFields = document.querySelectorAll(
        'input[required], select[required], textarea[required]'
    );

    requiredFields.forEach(field => {
        const label = field.previousElementSibling;

        if (label && label.tagName === 'LABEL') {
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



