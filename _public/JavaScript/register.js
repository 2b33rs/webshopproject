'use strict';


/*
function loginTrue() {
    'use strict';

    // Get all input fields from Form register
    const inputs = document.querySelectorAll('#register input');

    // Add event listener to each input field
    inputs.forEach(input => {
        input.addEventListener('input', () => {
            // Check if all input fields have values
            const allFilled = Array.from(inputs).every(input => input.value !== '');
            // Enable or disable login button based on allFilled
            document.getElementById('registerBtn').disabled = !allFilled;
        });
    });
}
*/
/*
document.addEventListener('DOMContentLoaded', function () {
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
});
*/

function resetLogin() {
    document.getElementById("registerBtn").disabled = true;
    document.getElementById("pw1").innerHTML = 'Passwort*';
    document.getElementById("pw2").innerHTML = 'Passwort bestätigen*';
}

function pwGleichheit() {
    let pA = document.getElementById('passwordA');
    let pB = document.getElementById('passwordB');

    pA.addEventListener('input', () => {
        if (pA.value && pB.value) {
            if (pA.value == pB.value) {
                document.getElementById("pw1").innerHTML = 'Passwort* <i class="bi bi-check btn-success"></i>';
                document.getElementById("pw2").innerHTML = 'Passwort bestätigen* <i class="bi bi-check btn-success"></i>';
            }
            if (pA.value != pB.value) {
                document.getElementById("pw1").innerHTML = 'Passwort* <i class="bi bi-x btn-danger"></i>';
                document.getElementById("pw2").innerHTML = 'Passwort bestätigen* <i class="bi bi-x btn-danger"></i>';
            }
        }
    });
}
