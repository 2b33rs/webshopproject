<?php
session_start();
if (isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp'] > 60)) {
    session_unset();
    session_destroy();
}
$_SESSION['timestamp'] = time();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
} else {
    $mysqli = new mysqli("localhost", "root", "", "webshop");
    if ($mysqli->connect_error) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }

    $sql = "DELETE FROM cart WHERE cart_id = ? and user_id = ?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("ii", $_POST["cart_id"], $_SESSION["user_id"]);
    $statement->execute();
    $statement->close();
    $mysqli->close();

    header("Location: ../cart.php");
}
?>