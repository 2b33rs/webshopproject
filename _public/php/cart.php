<?php include_once 'header.php';

// Check if user is still logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} 
include_once 'scripts/createCart.php';
include_once '../html/footer.html' ?>