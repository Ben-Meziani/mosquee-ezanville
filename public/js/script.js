document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contact-form');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');
    const buttonSubmit = document.getElementById('contact_submit');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(form);
        buttonSubmit.disabled = true;
        fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            successMessage.style.display = 'block';
            buttonSubmit.disabled = false;
            setTimeout(() => {
                form.reset();
                successMessage.style.display = 'none';
            }, 3000);
        })
        .catch(error => {
            errorMessage.style.display = 'block';
        });
    });
});