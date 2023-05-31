<?php
	session_start();
	if (isset($_GET["username"])) {
		$new_username = $_GET["username"];
	}
	if (isset($_GET["password"])) {
		$new_password = $_GET["password"];
	}
	if (isset($_GET["role"])) {
		$new_role = $_GET["role"];
	}
	$mysqli = new mysqli("localhost", "root", "", "webshop");
	if ($mysqli->connect_errno) {
		die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
	}
	$sql = "insert into benutzer values (?,?)";
	$statement = $mysqli->prepare($sql); 
	$statement->bind_param("ss",$new_username,$new_password);		
	$statement->execute();
	
	$sql = "select id from rolle where rollenname = ?";
	$statement = $mysqli->prepare($sql); 
	$statement->bind_param("s",$new_role);		
	$statement->execute();
	$result = $statement->get_result();
	$row = $result->fetch_object();
	$role_id = $row->id;
	
	$sql = "insert into benutzer_rollen values (?,?)";
	$statement = $mysqli->prepare($sql); 
	$statement->bind_param("si",$new_username,$role_id);		
	$statement->execute();
	header("location: homepage.php");
	


?>