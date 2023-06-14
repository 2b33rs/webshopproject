// Load this script after the HTML form is loaded.
document.addEventListener('DOMContentLoaded', function () {
    var loginForm = document.querySelector('.needs-validation');
    var honeypotField = document.getElementById('pothoney');
    loginForm.addEventListener('submit', function (event) {
        honeypotField.removeAttribute('required');
        if (!loginForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            loginForm.classList.add('was-validated');
            
        } else if (honeypotField.value !== '') {
            event.preventDefault();

            //alert('Honeypot-Überprüfung fehlgeschlagen!');
            alert("Diese Website ist nicht für Roboter geeignet.\nHoneypot-Feldwert: " + honeypotField.value);
        }
        
    });
});
