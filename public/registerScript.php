<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>

<?php

    //username
    $username="";
    if (isset($_POST["username"])) {
        $username = $_POST["username"];
    }
    echo "Username: " . $username;
    //firstname
    $firstname="";
    if (isset($_POST["firstname"])) {
        $firstname = $_POST["firstname"];
    }
    //lastname
    $name="";
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
    }
    //email
    $email="";
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    //address
    $address="";
    if (isset($_POST["address"])) {
        $address = $_POST["address"];
    }
    //password
    $password="";
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }


    $mysqli = new mysqli("localhost", "root", "", "webshop");
    if ($mysqli->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }

    $sql = "INSERT INTO user (username, password, name, firstname, email, address) VALUES (?, ?, ?, ?, ?, ?)";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("ssssss",$username,$password,$name,$firstname,$email,$address);
    //echo $statement->get_result();


    $statement->execute();

    

    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        echo "User already exists";
    } else {
        echo "User created";
        echo "<br>";
        echo $result;
    }
    $statement->close();

    //redirect to login
    //header("Location: login.php");



?>

</body>