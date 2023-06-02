<?php
if ($_SESSION['inactive'] = true) {
    session_start();
    session_destroy();
    header("location: login.php");
}

?>
