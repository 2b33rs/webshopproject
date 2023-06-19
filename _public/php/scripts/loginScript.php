<?php
include_once 'sql_InjectionPrevention.php';

$username = "";
if (isset($_POST["username"])) {
	$username = sqlinjection($_POST["username"]);
}
$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_error) {
	die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

$password = "";
if (isset($_POST["password"])) {
	$sql = "SELECT salt FROM user WHERE username=?";
	$statement = $mysqli->prepare($sql);
	$statement->bind_param("s", $username);
	$statement->execute();
	$result = $statement->get_result();
	$statement->close();
	$salt = $result->fetch_assoc()["salt"];
	$mysqli->close();
	$hsalt = hash('sha256', $salt);
	$password = hash('sha256', $_POST["password"] . $hsalt);
}

$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_error) {
	die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}
$sql = "SELECT user_id FROM user WHERE username=? AND PASSWORD=?";
$statement = $mysqli->prepare($sql);
$statement->bind_param("ss", $username, $password);
$statement->execute();
$result = $statement->get_result();

if ($result->num_rows == 1) {
	//redirect to profile
	session_start();
	$_SESSION["username"] = $username;
	$_SESSION["user_id"] = $result->fetch_assoc()["user_id"];
	header("location: ../index.php");

} else {
	//redirect to login page
	header("location: ../login.php");
}
?>