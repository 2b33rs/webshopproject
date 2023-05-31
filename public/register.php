<?php include_once 'head.php' ?>

<body>
    <div class="container">
    <?php include_once 'header.php' ?>
        <main>

            <!-- Login -->
            <div class="card">
                <div class="card-header">
                    <h1>Login</h1>
                </div>
                <div class="card-body">

                    <form class="row g-3 " action="http://141.79.64.139/cstippek/FormCheck.php" target="_blank">
                        <div class="col-md-4">
                            <label for="kundennummer" class="form-label">Kundennummer</label>
                            <input type="text" class="form-control" id="kundennummer" autofocus autocomplete="on"
                                tabindex="1">
                        </div>
                        <div class="col-md-4">
                            <label for="pw" class="form-label">Passwort</label>
                            <input type="password" class="form-control" id="pw" autocomplete="off" tabindex="2">
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

                    <form action="http://141.79.64.139/cstippek/FormCheck.php" target="_blank">

                        <!-- Anrede -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Anrede</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" checked tabindex="4">Frau&nbsp;&nbsp;&nbsp;
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" tabindex="4">Herr
                                </label>
                            </div>
                        </div>

                        <!-- Titel -->
                        <div class="row mb-3">
                            <label for="titel" class="col-sm-2 col-form-label">Titel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="titel" maxlength="10" list="titelList"
                                    autocomplete="on" tabindex="5">
                                <datalist id="titelList">
                                    <option>Master</option>
                                    <option>Bachelor</option>
                                    <option>Dr.</option>
                                    <option>Diplom</option>
                                </datalist>
                            </div>
                        </div>

                        <!-- Vorname & Nachname -->
                        <div class="row mb-3">
                            <label for="vorname" class="col-sm-2 col-form-label">Vorname*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="vorname" maxlength="20" required
                                    autocomplete="on" tabindex="6">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nachname" class="col-sm-2 col-form-label">Nachname*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nachname" maxlength="20" required
                                    autocomplete="on" tabindex="7">
                            </div>
                        </div>

                        <!-- Strase -->
                        <div class="row mb-3">
                            <label for="strasse"
                                class="col-sm-2 col-form-label">Straße&nbsp;und&nbsp;Hausnummer*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="strasse" maxlength="40" required
                                    autocomplete="on" tabindex="8">
                            </div>
                        </div>

                        <!--PLZ -->
                        <div class="row mb-3">
                            <label for="plz" class="col-sm-2 col-form-label">Postleitzahl*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="plz" required pattern=".{5}"
                                    autocomplete="on" tabindex="9">
                            </div>
                        </div>

                        <!--Ort -->
                        <div class="row mb-3">
                            <label for="ort" class="col-sm-2 col-form-label">Ort*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ort" maxlength="40" required list="orte"
                                    autocomplete="on" tabindex="10">
                                <datalist id="orte">
                                    <option>Achern</option>
                                    <option>Offenburg</option>
                                    <option>Karlsruhe</option>
                                    <option>Appenweier</option>
                                    <option>Renchen</option>
                                </datalist>
                            </div>
                        </div>

                        <!--Land (Da ein land vorausgewält ist muss man kein required mehr reinschreiben, 
                            da man immer ein Land in dem Feld stehen hat) -->
                        <div class="row mb-3">
                            <label for="land" class="col-sm-2 col-form-label">Land*</label>
                            <div class="col-sm-10">
                                <select id="land" name="lang" class="form-control" autocomplete="on" tabindex="11">
                                    <option selected="selected">Deutschland</option>
                                    <option>Italien</option>
                                    <option>Frankreich</option>
                                    <option>Spanien</option>
                                    <option>Schweden</option>
                                </select>
                            </div>
                        </div>

                        <!--EMail -->
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">E-Mail*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="email" required autocomplete="on" tabindex="12">
                            </div>
                        </div>

                        <!--Telefonnummer -->
                        <div class="row mb-3">
                            <label for="telnummer" class="col-sm-2 col-form-label">Telefonnummer</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="telnummer" type="tel" autocomplete="on" tabindex="13">
                            </div>
                        </div>

                        <!--Geburtsdatum -->
                        <div class="row mb-3">
                            <label for="geburtsdatum" class="col-sm-2 col-form-label">Geburtsdatum*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="geburtsdatum" type="date" autocomplete="on"
                                    tabindex="14">
                            </div>
                        </div>

                        <!--Passwort -->
                        <!-- <i class="bi bi-eye"></i> -->
                        <!-- <i class="bi bi-eye-slash"></i> -->
                        <div class="form-group row mb-3">
                            <label for="passwordA" class="col-sm-2 col-form-label" id="pw1">Passwort*</label>
                            <div class="col sm-10 input-group">
                                <input onblur="pwGleichheit()" value="" class="form-control" type="password"
                                    id="passwordA" name="passwordA" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
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
                            <label for="passwordB" class="col-sm-2 col-form-label" id="pw2">Passwort&nbsp;bestätigen*</label>
                            <div class="col sm-10 input-group">
                                <input onblur="pwGleichheit()" value="" class="form-control" type="password"
                                    id="passwordB" name="passwordB" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
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
</body>

</html>