document.addEventListener('DOMContentLoaded', function () {
    var loginForm = document.querySelector('.needs-validation');
    loginForm.addEventListener('submit', function (event) {
        if (!loginForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            loginForm.classList.add('was-validated');
        } 
    });
});