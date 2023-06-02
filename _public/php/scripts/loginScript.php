	<?php

	$username = "";
	if (isset($_GET["username"])) {
		$username = $_GET["username"];
	}
	$password = "";
	if (isset($_GET["password"])) {
		$password = $_GET["password"];
	}


	echo $username;

	$mysqli = new mysqli("localhost", "root", "", "webshop");
	if ($mysqli->connect_errno) {
		die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
	}
	$sql = "SELECT * FROM user WHERE username=? AND PASSWORD=?";
	$statement = $mysqli->prepare($sql);
	$statement->bind_param("ss", $username, $password);

	$statement->execute();
	$result = $statement->get_result();

	if ($result->num_rows == 1) {
		//redirect to profile
		session_start();
		$_SESSION["username"] = $username;
		$_SESSION["user_id"] = $result->fetch_assoc()["user_id"];
		//header("location: ../index.php");
		
		//Test von Jonas:
		header("location: ../setInactive.php");

	} else {
		//redirect to login page
		header("location: ../login.php");

		


	}
	?>