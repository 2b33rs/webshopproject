<?php
include_once '../configs/config.php';
session_start();
if (isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp'] > $maxTime)) {
    session_unset();
    session_destroy();
}
$_SESSION['timestamp'] = time();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
} else {
    include('../configs/dbConnect.php');
    $sql = "DELETE FROM cart WHERE cart_id = ? and user_id = ?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("ii", $_POST["cart_id"], $_SESSION["user_id"]);
    $statement->execute();
    $statement->close();
    $mysqli->close();

    header("Location: ../cart.php");
}
?>