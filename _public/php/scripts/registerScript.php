<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["passwordA"];
    $name = $_POST["name"];
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
}


try {
    // Dein Code, der den SQL-Befehl ausführt
    // ...

    // Beispiel: Einfügen eines Datensatzes
    $mysqli = new mysqli("localhost", "root", "", "webshop");
        if ($mysqli->connect_errno) {
            die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

$sql = "INSERT INTO user (username, password, name, firstname, email, address) VALUES (?, ?, ?, ?, ?, ?)";
$statement = $mysqli->prepare($sql);
$statement->bind_param("ssssss", $username, $password, $name, $firstname, $email, $address);
//echo $statement->get_result();

$statement->execute();

$result = $statement->get_result();

$statement->close();
//redirect to login
header("Location: ../login.php");

    // Weitere Verarbeitung des Ergebnisses
    // ...
} catch (mysqli_sql_exception $e) {
 
    $url = "../register.php?password=" . urlencode($password) . "&name=" . urlencode($name) . "&firstname=" . urlencode($firstname) . "&email=" . urlencode($email) . "&address=" . urlencode($address);

// Weiterleitung zur neuen PHP-Seite
    header("Location: " . $url);
    //header("Location: ../register.php");
}
?>










