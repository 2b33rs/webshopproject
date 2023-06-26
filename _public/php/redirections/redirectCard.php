<?php
include_once '../configs/config.php';
session_start();
if (isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp'] > $maxTime)) {
    session_unset();
    session_destroy();
    header("location: ../login.php");
}else{ 
    header("location: ../cart.php");
}
?>