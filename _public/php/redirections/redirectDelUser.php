<?php
session_start();
if (isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp'] > 600)) {
    session_unset();
    session_destroy();
    header("location: ../login.php");
}else{ 
    header("location: ../deleteUser.php");
}
?>