<?php
function logout($path_to_login = "../login.php"){

	session_start();
	session_destroy();
	//unset($_SESSION["username"]);
	header("location: $path_to_login");
	exit;
}

	
?>