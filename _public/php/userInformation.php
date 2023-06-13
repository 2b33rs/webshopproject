<?php include_once 'header.php'; ?>

<?php
//Datenbankverbindung

$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_error) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}
$sql = "SELECT * FROM user WHERE user_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$username = $row['username'];
$firstname = $row['firstname'];
$name = $row['name'];
$address = $row['address'];
$email = $row['email'];
//    $password = $row['password'];
//    $password = password_hash($password, PASSWORD_DEFAULT);
$stmt->close();
$mysqli->close();

?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var loginForm = document.querySelector('.needs-validation');
        loginForm.addEventListener('submit', function (event) {
            if (!loginForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                loginForm.classList.add('was-validated');
            }
        });
        if (document.getElementById('username').value == "") {
            document.getElementById('username').value = "<?php echo $username ?>";
        }else{
            document.getElementById('username').value = document.getElementById('username').value;
        }
        if (document.getElementById('firstname').value == "") {
            document.getElementById('firstname').value = "<?php echo $firstname ?>";
        }else{
            document.getElementById('firstname').value = document.getElementById('firstname').value;
        }
        if (document.getElementById('name').value == "") {
            document.getElementById('name').value = "<?php echo $name ?>";
        }else{
            document.getElementById('name').value = document.getElementById('name').value;
        }
        if (document.getElementById('address').value == "") {
            document.getElementById('address').value = "<?php echo $address ?>";
        }else{
            document.getElementById('address').value = document.getElementById('address').value;
        }
        if (document.getElementById('email').value == "") {
            document.getElementById('email').value = "<?php echo $email ?>";
        }else{
            document.getElementById('email').value = document.getElementById('email').value;
        }

    });

    function checkValues() {
        var usernameInput = document.getElementById('username');
        var username = usernameInput.value;
        

        // Make an AJAX request to the PHP script
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'php/scripts/check_username.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle the response
                    var response = JSON.parse(xhr.responseText);
                    if (response.available) {
                        // Username is available, remove validation error
                        usernameInput.setCustomValidity('');
                    } else {
                        // Username is already taken, set validation error
                        usernameInput.setCustomValidity('Benutzername bereits vorhanden.');
                    }
                } else {
                    // An error occurred during the AJAX request
                    console.error('AJAX request failed.');
                }
            }
        };
        xhr.send('username=' + encodeURIComponent(username));
    }

</script>
<main>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="fw-bold pt-1 pb-xl-3">Persönliche Informationen</h1>
                <form class="needs-validation" id="register" action="php/scripts/userEditScript.php" method="post"
                    novalidate>

                    <!-- Username -->
                    <div class="form-floating input-group mb-3">
                        <input type="text" onblur="checkValues()" class="form-control" name="username" id="username"
                            autocomplete="off" tabindex="1" minlength="3" value="<?php echo $username ?>" disabled required>

                        <label for="username" class="form-label">Benutzername*</label>
                        
                        <div class="invalid-feedback">Benutzername ist schon vergeben</div>

                        <button class="input-group-text btn-secondary" id="basic-addon2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">bearbeiten</button>

                        <!--
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            bearbeiten
                        </button>
-->
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vorname -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="firstname" id="firstname" autocomplete="on"
                            tabindex="2" minlength="2" maxlength="24" value="<?php echo $firstname ?>" required>
                        <label for="firstname" class="form-label">Vorname*</label>
                        <div class="invalid-feedback">Vorname fehlt.</div>
                    </div>

                    <!-- Nachname -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="name" autocomplete="on" tabindex="3"
                            minlength="2" maxlength="24" value="<?php echo $name ?>" required>
                        <label for="name" class="form-label">Nachname*</label>
                        <div class="invalid-feedback">Nachname fehlt.</div>
                    </div>

                    <!-- Strase -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="address" id="address" autocomplete="on"
                            tabindex="4" minlength="10" maxlength="255"
                            pattern="^(?=.*\d)(.*\,.*)(?=.*[a-z])(?=.*[A-Z]).{10,}$" value="<?php echo $address ?>"
                            required>
                        <label for="address"
                            class="form-label">Straße&nbsp;Hausnummer&nbsp;,&nbsp;PLZ&nbsp;Wohnort*</label>
                        <div class="invalid-feedback">Geben sie Ihre Vollständige Adresse an.</div>
                    </div>

                    <!--E-Mail -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" autocomplete="on" tabindex="5"
                            pattern=".+@.+\..{2,}" value="<?php echo $email ?>" required>
                        <label for="email" class="form-label">E-Mail*</label>
                        <div class="invalid-feedback">Geben Sie eine gültige E-Mail adresse ein.</div>
                    </div>


                    <!--- TODO Extra Seite für Passwort Reset? -->

                    <input class="btn btn-primary" id="registerBtn" type="submit" name="submit" value="Speichern"
                        tabindex="9">
                    <input class="btn btn-secondary" type="reset" onclick="resetLogin()" name="btng" value="Reset"
                        tabindex="10">

                </form>
            </div>
        </div>
    </div>
</main>


<?php include_once '../html/footer.html'; ?>