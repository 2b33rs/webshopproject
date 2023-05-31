<?php include_once 'structure/head.php' ?>

<body onload="login()">
    <div class="container">
        <?php include_once 'structure/header.php' ?>
        <main>

            <!-- Login -->
            <div class="card">
                <div class="card-header">
                    <h1>Login</h1>
                </div>
                <div class="card-body">

                    <form class="row g-3 needs-validation" action="loginScript.php" method="GET" novalidate>
                        <div class="col-md-4">
                            <label for="username" class="form-label">Benutzername</label>
                            <input type="text"  class="form-control" id="username" name="username"autofocus autocomplete="on"
                                tabindex="1" required>
                                <div class="invalid-feedback">
                                Benutzername wird benötigt.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="password" class="form-label">Passwort</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off" tabindex="2" required>
                            <div class="invalid-feedback">
                                Passwort wird benötigt.
                            </div>
                        </div>
                        <div>
                            <input type="submit"  name="submit" value="Login" tabindex="3">
                        </div>
                    </form>
                </div>
            </div>


            <div>
                <br>
                <p>Kein Konto? <a href="register.php">Registrieren</a></p>
            </div>
            
        </main>

        <?php include_once 'structure/footer.php' ?>
    </div>



<script>
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
    </script>
</body>
 
</html>