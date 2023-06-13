<?php include_once './header.php' ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Registrierung</h1>


                <?php if ($_SESSION['setUsername'] == true){
                    echo "<p>Hallo ". $_SESSION['username'] . ",</p>
                    <p>Vielen Dank für Ihre Registrierung. Die Registrierung war erfolgreich.</p>
                    <p>Der Benutzername " . $_SESSION['usernametry'] . " ist bereits vergeben.
                        Der Benutzername wurde zu " . $_SESSION['username'] . " geändert.</p>
                        <p>Sollte Ihnen der Benutzername nicht zusagen können Sie ihn in den Einstellungen ändern.</p>
                        <a href='../login.php' class='btn btn-primary'>Zurück zur Login Seite</a>";

                }else{
                    echo "<p>Hallo " . $_SESSION['username'] . ",</p>
                    <p>Vielen Dank für deine Registrierung. Die Registrierung war erfolgreich.</p>
                    <a href='./php/login.php' class='btn btn-primary'>Zurück zum Login</a>"
                    //TODO: Link zum Login funktioniert nicht richtig
                        //SOLUTION: adding base link in header.php

                ;} ?>
            </div>
        </div>
    </div>
</main>

<?php include_once '../html/footer.html' ;
session_unset();
session_destroy()?>



