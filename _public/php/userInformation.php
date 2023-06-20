<?php include_once 'header.php'; ?>

<?php
//Datenbankverbindung

include 'configs/dbConnect.php';
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
$stmt->close();
$mysqli->close();

?>
<script src="JavaScript/validation.js"></script>

<script>
    //funktion to check if username exists already in database
function checkUsername(){

    var username = document.getElementById("usernameModal").value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/scripts/check_username.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            
            if (response.available) {
                document.getElementById("username").value = username;
                document.getElementById("register").submit();
            } else {
                document.getElementById("usernameModal").classList.add("is-invalid");
            }
        }
    };

}
</script>

<main>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="fw-bold pt-1 pb-xl-3">Persönliche Informationen</h1>

                <form action="">
                    <!-- Username -->
                    <div class="form-floating input-group mb-3">
                        <input type="text" class="form-control" name="username" id="username" autocomplete="off"
                            tabindex="1" minlength="3" value="<?php echo $username ?>" disabled required>

                        <label for="username" class="form-label">Benutzername*</label>

                        <div class="invalid-feedback">Benutzername ist schon vergeben</div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            bearbeiten
                        </button>


                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Benutzernamen ändern</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating input-group mb-3">
                                        <input type="text" class="form-control" name="username" id="usernameModal"
                                            autocomplete="off" tabindex="1" minlength="3" value="<?php echo $username ?>"
                                            required>

                                        <label for="username" class="form-label">Benutzername*</label>

                                        <div class="invalid-feedback">Benutzername ist schon vergeben</div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                                    <button onclick="checkUsername()" type="button" class="btn btn-primary">Speichern</button>
                                </div>
                            </div>
                        </div>
                    </div>




                </form>




                <form class="needs-validation" id="register" action="php/scripts/userEditScript.php" method="post"
                    novalidate>


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

                    <!-- Honeypot-Feld -->
                    <div class="pothoney">
                        <label for="pothoney">Unbedingt ausfüllen:</label>
                        <input type="text" id="pothoney" name="pothoney" required>
                    </div>


                    <!--- TODO Extra Seite für Passwort Reset? -->

                    <input class="btn btn-primary" id="registerBtn" type="submit" name="submit" value="Speichern"
                        tabindex="9">
                    <input class="btn btn-secondary" type="reset" name="btng" value="Reset" tabindex="10">

                </form>
            </div>
        </div>
    </div>
</main>



<?php include_once '../html/footer.html'; ?>