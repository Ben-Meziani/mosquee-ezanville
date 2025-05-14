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
            console.log(data);
            if(data.success) {
                successMessage.style.display = 'block';
                buttonSubmit.disabled = false;
                setTimeout(() => {
                    form.reset();
                    successMessage.style.display = 'none';
                }, 3000);
            }else{
                errorMessage.style.display = 'block';
                buttonSubmit.disabled = false;
                setTimeout(() => {
                    form.reset();
                    errorMessage.style.display = 'none';
                }, 3000);
            }
        })
        .catch(error => {
            errorMessage.style.display = 'block';
        });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    // Quand CKEditor est prêt, supprime l'avertissement
    if (window.CKEDITOR) {
        CKEDITOR.on('instanceReady', function () {
            const warning = document.querySelector('.cke_notification_warning');
            if (warning) {
                warning.remove();
            }
        });
    }
});


document.addEventListener("DOMContentLoaded", function() {
    // Détection mobile
    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    // Détection Chrome mobile
    var isChrome = /Chrome/i.test(navigator.userAgent) && /Mobile/i.test(navigator.userAgent);

    if (isMobile && isChrome) {
        var iframe = document.getElementById('haWidget-mobile');
        var link = document.getElementById('helloasso-link');
        if (iframe && link) {
            iframe.style.display = 'none';
            link.style.display = 'block';
        }
    }
});
