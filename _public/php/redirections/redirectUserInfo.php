<?php
session_start();
if (isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp'] > 60)) {
    session_unset();
    session_destroy();
    header("location: ../login.php");
}else{ 
    header("location: ../userInformation.php");
}
?>