/*
document.addEventListener('DOMContentLoaded', function() {
    var loginForm = document.querySelector('.needs-validation');
    loginForm.addEventListener('submit', function(event) {
        if (!loginForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            loginForm.classList.add('was-validated');
        } else {
            var usernameInput = document.getElementById('username');
            var passwordInput = document.getElementById('password');
            
            if (usernameInput.value.trim() === '' || passwordInput.value.trim() === '') {
                event.preventDefault();
                event.stopPropagation();
                
                // Anzeige der Fehlermeldung
                var feedback = document.getElementById('login-feedback');
                feedback.innerText = 'Benutzername und Passwort müssen ausgefüllt werden.';
                feedback.style.display = 'block';
            }
        }
    });
});
*/
// Hier kommt der bestehende Code hin

/*
(function () {
    'use strict';

    // Form Validierung aktivieren
    var forms = document.querySelectorAll('.needs-validation');

    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });
})();
*/
/*
(function () {
    var loginForm = document.querySelector('.needs-validation');
    loginForm.addEventListener('submit', function (event) {
        if (!loginForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            loginForm.classList.add('was-validated');
        } else {
            var usernameInput = document.getElementById('username');
            var passwordInput = document.getElementById('password');

            if (usernameInput.value.trim() === '' || passwordInput.value.trim() === '') {
                event.preventDefault();
                event.stopPropagation();

                // Anzeige der Fehlermeldung
                var feedback = document.getElementById('login-feedback');
                feedback.innerText = 'Benutzername und Passwort müssen ausgefüllt werden.';
                feedback.style.display = 'block';
            }
        }
    });
})();
*/