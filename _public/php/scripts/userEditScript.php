<?php

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
}

$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_error) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}
session_start();
$sql = "UPDATE user SET name = ?, firstname = ? WHERE user_id = ?";
$statement = $mysqli->prepare($sql);
$statement->bind_param("ssi", $name, $firstname, $_SESSION["user_id"]);
$statement->execute();
$statement->close();
$mysqli->close();

header("Location: ../UserInformation.php");
?>