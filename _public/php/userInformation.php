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
        document.getElementById('username').value = document.getElementById('username').value;
        document.getElementById('firstname').value = document.getElementById('firstname').value;
        document.getElementById('name').value = document.getElementById('name').value;
        document.getElementById('address').value = document.getElementById('address').value;
        document.getElementById('email').value = document.getElementById('email').value;
    });
</script>
<main>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="fw-bold pt-1 pb-xl-3">Persönliche Informationen</h1>
                <form class="needs-validation" id="register" action="./scripts/userEditScript.php" method="post"
                    novalidate>

                    <!-- Username -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="username" autocomplete="off"
                            tabindex="1" minlength="3" value="<?php echo $username?>" disabled required>
                        <label for="username" class="form-label">Benutzername*</label>
                        <div class="invalid-feedback">Benutzername fehlt.</div>
                    </div>

                    <!-- Vorname -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="firstname" id="firstname" autocomplete="on"
                            tabindex="2" minlength="2" maxlength="24" value="<?php echo $firstname?>" required>
                        <label for="firstname" class="form-label">Vorname*</label>
                        <div class="invalid-feedback">Vorname fehlt.</div>
                    </div>

                    <!-- Nachname -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="name" autocomplete="on" tabindex="3"
                            minlength="2" maxlength="24" value="<?php echo $name?>" required>
                        <label for="name" class="form-label">Nachname*</label>
                        <div class="invalid-feedback">Nachname fehlt.</div>
                    </div>

                    <!-- Strase -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="address" id="address" autocomplete="on"
                            tabindex="4" minlength="10" maxlength="255"
                            pattern="^(?=.*\d)(.*\,.*)(?=.*[a-z])(?=.*[A-Z]).{10,}$" value="<?php echo $address?>" required>
                        <label for="address"
                            class="form-label">Straße&nbsp;Hausnummer&nbsp;,&nbsp;PLZ&nbsp;Wohnort*</label>
                        <div class="invalid-feedback">Geben sie Ihre Vollständige Adresse an.</div>
                    </div>

                    <!--E-Mail -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" autocomplete="on" tabindex="5"
                            pattern=".+@.+\..{2,}" value="<?php echo $email?>" required>
                        <label for="email" class="form-label">E-Mail*</label>
                        <div class="invalid-feedback">Geben Sie eine gültige E-Mail adresse ein.</div>
                    </div>


                    <!--- TODO Extra Seite für Passwort Reset? --> 
                    
                    <input class="btn btn-primary" id="registerBtn" type="submit" name="submit" value="Register"
                        tabindex="9">
                    <input class="btn btn-secondary" type="reset" onclick="resetLogin()" name="btng" value="Reset"
                        tabindex="10">

                </form>
            </div>
        </div>
    </div>
</main>


<?php include_once '../html/footer.html'; ?>