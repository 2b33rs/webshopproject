<!DOCTYPE html>
<html>
	<head>
	</head>
	
	<body>
		<?php
			$username="";
			if (isset($_GET["username"])) {
				$username = $_GET["username"];
			}
			$password="";
			if (isset($_GET["password"])) {
				$password = $_GET["password"];
			}
			
			$mysqli = new mysqli("localhost", "root", "", "webshop");
			if ($mysqli->connect_errno) {
				die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
			}
			$sql = "SELECT * FROM benutzer WHERE benutzername=? AND PASSWORD=?";
			$statement = $mysqli->prepare($sql); 
			$statement->bind_param("ss",$username,$password);
			
			$statement->execute();
			$result = $statement->get_result();
			
			if ($result->num_rows == 1) {
				//redirect to profile
				session_start();
				$_SESSION["username"]=$username;
				$sql = "select * from benutzer_rollen, rolle WHERE benutzer=? AND rolle=id";
				$statement = $mysqli->prepare($sql);
				$statement->bind_param("s",$username);
				$statement->execute();
				$result = $statement->get_result();
				$rollen=[];
				while($row = $result->fetch_object()) {
					$rollen[]=$row->rollenname;
				}
				$_SESSION["rollen"]=$rollen;
				header("location: homepage.php");
			} else {
				//redirect to login page
				header("location: login.html");
			}
		?>
	</body>
</html>