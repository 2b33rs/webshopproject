<!DOCTYPE html>
<html>
	<head>
	</head>
	
	<body>
		
		<?php
		  function printUsertable() {
			$mysqli = new mysqli("localhost", "root", "", "webshop");
			if ($mysqli->connect_errno) {
				die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
			}
			$sql = "select * from benutzer_rollen, rolle WHERE rolle=id";
			$statement = $mysqli->prepare($sql); 		
			$statement->execute();
			$result = $statement->get_result();
		    print("<table border='1' rules='all'>");
			print("<tr><th>Benutzername</th><th>Rolle</th></tr>");
			
			while($row = $result->fetch_object()) {
				print("<tr>");
				print("<td>$row->benutzer</td>");
				print("<td>$row->rollenname</td>");
				print("</tr>");
			}
			
			print("</table>");
			echo <<<ENDE
			<form action='createuser.php' method='get'>
			<input type='text' name='username'>
			<input type='password' name='password'>
			<select name='role'>
ENDE;
			
			$sql = "select * from rolle";
			$statement = $mysqli->prepare($sql); 		
			$statement->execute();
			$result = $statement->get_result();

			while($row = $result->fetch_object()) {
				print("<option>");
				print($row->rollenname);
				print("</option>");
			}
			print("</select>");
			print("<input type='submit' value='Benutzer anlegen'>");
			print("</form>");
			
		  }
		
		
		  session_start();
		  // prüfe, ob Schlüssel "username" gesetzt wurde
		  if (!isset($_SESSION["username"])) {
			  header("location: login.html");
			  exit();
		  }
		  $u = $_SESSION["username"];
		  print("<h1>Willkommen Benutzer $u</h1>");
		  $rollen = $_SESSION["rollen"];
		  if (in_array("admin",$rollen)) {
			  printUsertable();
		  }
		  
		?>
		<form action="logout.php">
		  <input type="submit" value="Logout">
		</form>
	</body>
</html>