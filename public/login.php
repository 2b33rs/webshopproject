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

                    <form class="row g-3 needs-validation" action="loginScript.php" method="GET">
                        <div class="col-md-4">
                            <label for="username" class="form-label">Benutzername</label>
                            <input type="text"  class="form-control" id="username" name="username"autofocus autocomplete="on"
                                tabindex="1">
                        </div>
                        <div class="col-md-4">
                            <label for="password" class="form-label">Passwort</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off" tabindex="2">
                        </div>
                        <div>
                            <input type="submit"  name="submit" value="Login" tabindex="3" disabled>
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

</body>

<script>
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const submitButton = document.querySelector('input[type="submit"]');

    usernameInput.addEventListener('input', () => {
        if (usernameInput.value && passwordInput.value) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    });

    passwordInput.addEventListener('input', () => {
        if (usernameInput.value && passwordInput.value) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    });
</script>

 
</html>