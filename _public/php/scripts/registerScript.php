<?php

if (isset($_POST["submit"])) {
    $usernametry = $_POST["username"];
    $firstname = $_POST["firstname"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["passwordA"];
}

$newUsername = "";
$isSetNewUsername = false;

$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_error) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}


// Überprüfen, ob der Benutzername bereits existiert
$sql = "SELECT username FROM user WHERE username = ?";
$statement = $mysqli->prepare($sql);
$statement->bind_param("s", $usernametry);
$statement->execute();
$result = $statement->get_result();
$statement->close();
$mysqli->close();

if ($result->num_rows > 0) {
    // Der Benutzername existiert bereits

    // Suchen nach allen Usernamen die mit username beginnen
    $sql = "SELECT username FROM user WHERE username LIKE ?";
    $statement = $mysqli->prepare($sql);
    $usernameWildcard = $usernametry . "%";
    $statement->bind_param("s", $usernameWildcard);
    $statement->execute();
    $result = $statement->get_result();
    $statement->close();
    $mysqli->close();
    $usernamesarray = [];
    while ($row = $result->fetch_assoc()) {
        $usernamesarray[] = $row["username"];
    }
    // Den nächsten Usernamen mit aufsteigender Zahl erstellen
    $counter = 1;
    $newUsername = $usernametry . $counter;
    while (in_array($newUsername, $usernamesarray)) {
        $counter++;
        $newUsername = $usernametry . $counter;
    }

    $isSetNewUsername = true;
    //Abfrage ob der User den neunen Usernamen newUsername verwenden möchte

} else {
    // Der Benutzername existiert noch nicht
    $newUsername = $usernametry;
}
echo $newUsername;


// Den aktualisierten Benutzernamen in die Datenbank einfügen
$sql = "INSERT INTO user (username, password, name, firstname, email, address) VALUES (?, ?, ?, ?, ?, ?)";
$statement = $mysqli->prepare($sql);
$statement->bind_param("ssssss", $newUsername, $password, $name, $firstname, $email, $address);
$statement->execute();
$statement->close();
// Verbindung zur Datenbank schließen
$mysqli->close();


session_start();
$_SESSION["username"] = $newUsername;
$_SESSION['setUsername'] = $isSetNewUsername;
$_SESSION['usernametry'] = $usernametry;

//Weiterleitung zur Login Seite
header("Location: ../confirmRegistration.php");
?>