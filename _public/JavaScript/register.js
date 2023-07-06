'use strict';


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


function showPWA() {
    var input = document.getElementById("passwordA");
    var type = input.getAttribute("type");

    if (type === "text") {
        input.setAttribute("type", "password");
    } else if (type === "password") {
        input.setAttribute("type", "text");
    }
}

function showPWB() {
    var input = document.getElementById("passwordB");
    var type = input.getAttribute("type");

    if (type === "text") {
        input.setAttribute("type", "password");
    } else if (type === "password") {
        input.setAttribute("type", "text");
    }
}
