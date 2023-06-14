'use strict';

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
