<?php include_once 'structure/head.php' ?>

<body>
    <div class="container">
        <?php include_once 'structure/header.php' ?>
        <main>

            <!-- Login -->
            <div class="card">
                <div class="card-header">
                    <h1>Login</h1>
                </div>
                <div class="card-body">

                    <form class="row g-3 " action="loginScript.php" target="_blank">
                        <div class="col-md-4">
                            <label for="username" class="form-label">Benutzername</label>
                            <input type="text" class="form-control" id="username" autofocus autocomplete="on"
                                tabindex="1">
                        </div>
                        <div class="col-md-4">
                            <label for="password" class="form-label">Passwort</label>
                            <input type="password" class="form-control" id="password" autocomplete="off" tabindex="2">
                        </div>
                        <div>
                            <input type="submit" name="btng" value="Login" tabindex="3">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Registration -->
            <div class="card">
                <div class="card-header">
                    <h1>Registrierung</h1>
                </div>
                <div class="card-body">
                    <form action="registerScript.php" target="_blank">

                        <!-- Username -->
                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Benutzername*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" autocomplete="on" tabindex="5"
                                    required>
                            </div>
                        </div>

                        <!-- Vorname & Nachname -->
                        <div class="row mb-3">
                            <label for="firstname" class="col-sm-2 col-form-label">Vorname*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="firstname" maxlength="20" required
                                    autocomplete="on" tabindex="6">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Nachname*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" maxlength="20" required
                                    autocomplete="on" tabindex="7">
                            </div>
                        </div>

                        <!-- Strase -->
                        <div class="row mb-3">
                            <label for="address"
                                class="col-sm-2 col-form-label">Straße&nbsp;und&nbsp;Hausnummer*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" maxlength="40" required
                                    autocomplete="on" tabindex="8">
                            </div>
                        </div>

                        <!--PLZ -->
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">E-Mail*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" required autocomplete="on"
                                    tabindex="9">
                            </div>
                        </div>



                        <!--Passwort -->
                     
                        <div class="form-group row mb-3">
                            <label for="passwordA" class="col-sm-2 col-form-label" id="pw1">Passwort*</label>
                            <div class="col sm-10 input-group">
                                <input onblur="pwGleichheit()" value="" class="form-control" type="password"
                                    id="passwordA" name="passwordA" 
                                    
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                    autocomplete="off" tabindex="15">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="bi bi-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!--Passwort bestätigen -->
                        <div class="row mb-3">
                            <label for="passwordB" class="col-sm-2 col-form-label"
                                id="pw2">Passwort&nbsp;bestätigen*</label>
                            <div class="col sm-10 input-group">
                                <input onblur="pwGleichheit()" value="" class="form-control" type="password"
                                    id="passwordB" name="passwordB" 
                                  
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                    autocomplete="off" tabindex="16">

                                <div class="input-group-append">
                                    <span class="input-group-text" role="button">
                                        <i class="bi bi-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <div class="form-check">
                                    <input onclick="loginTrue()" class="form-check-input" type="checkbox"
                                        id="gridCheck1" tabindex="17">
                                    <label id="agb" class="form-check-label" for="gridCheck1">
                                        Ja,&nbsp;ich&nbsp;stimme&nbsp;den&nbsp;<a href="agbs.html"
                                            tabindex="18">AGBs</a>&nbsp;und&nbsp;den&nbsp;<a href="datenschutz.html"
                                            tabindex="19">Datenschutzbestimmungen</a>&nbsp;zu.*
                                    </label>
                                </div>
                            </div>
                        </div>
                        <input id="loginBtn" type="submit" name="btng" value="Login" disabled tabindex="20">
                        <input type="reset" onclick="resetLogin()" name="btng" value="Reset" tabindex="21">
                    </form>
                </div>
            </div>
        </main>

        <footer>
            <nav id="nav_3">
                <!--Fußzeile mit verlinkungen-->
                <a>&copy;2021</a>
                <a>|</a>
                <a href="impressum.html">Impressum</a>
                <a>|</a>
                <a href="datenschutz.html">Datenschutz</a>
                <a>|</a>
                <a href="erklaerungBF.html">Erklärung zur Barrierefreiheit</a>
            </nav>
        </footer>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <script>
        'use strict';

        function loginTrue() {
            if (document.getElementById("gridCheck1").checked) {
                document.getElementById("loginBtn").disabled = false;
            } else {
                document.getElementById("loginBtn").disabled = true;
            }
        }


        function resetLogin() {
            document.getElementById("loginBtn").disabled = true;
            document.getElementById("pw1").innerHTML = 'Passwort*';
            document.getElementById("pw2").innerHTML = 'Passwort bestätigen*';
        }


        function pwGleichheit() {

            let pA = document.getElementById('passwordA');
            let pB = document.getElementById('passwordB');

            if (pA.value && pB.value) {
                if (pA.value == pB.value) {
                    document.getElementById("pw1").innerHTML = 'Passwort* <i class="bi bi-check btn-success"></i>';
                    document.getElementById("pw2").innerHTML = 'Passwort bestätigen* <i class="bi bi-check btn-success"></i>';
                }
                if (pA.value != pB.value) {
                    document.getElementById("pw1").innerHTML = 'Passwort* <i class="bi bi-x btn-danger"></i>';
                    document.getElementById("pw2").innerHTML = 'Passwort bestätigen* <i class="bi bi-x btn-danger"></i>';
                    let meldung = confirm("Achtung! Passwörter stimmen nicht überein!");
                    if (meldung == true) {
                        pA.value = "";
                        pB.value = "";
                        pA.focus();
                    }
                }
            }
        }
    </script>
</body>

</html>