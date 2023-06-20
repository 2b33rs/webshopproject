<?php

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
}

include	'../configs/dbConnect.php';
session_start();
$sql = "UPDATE user SET name = ?, firstname = ?, address=?, email=?  WHERE user_id = ?";
$statement = $mysqli->prepare($sql);
$statement->bind_param("ssssi", $name, $firstname, $address, $email, $_SESSION["user_id"]);
$statement->execute();
$statement->close();
$mysqli->close();

header("Location: ../UserInformation.php");
?>