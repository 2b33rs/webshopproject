<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["passwordA"];
    $name = $_POST["name"];
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
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
    header("Location: ../login.php");
?>
