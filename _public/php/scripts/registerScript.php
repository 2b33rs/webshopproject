<?php
include_once 'sql_InjectionPrevention.php';

function generateSalt() {
    // Zufällige Zeichenfolge für das Salz generieren
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $salt = '';
    $saltLength = 10;

    for ($i = 0; $i < $saltLength; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $salt .= $characters[$index];
    }

    return $salt;
}

if (isset($_POST["submit"])) {
    $usernametry = sqlinjection($_POST["username"]);
    $firstname = sqlinjection($_POST["firstname"]);
    $name = sqlinjection($_POST["name"]);
    $address = sqlinjection($_POST["address"]);
    $email = sqlinjection($_POST["email"]);
    $salt = generateSalt();
    $hsalt = hash('sha256',$salt);
    $password = hash('sha256',$_POST["passwordA"] . $hsalt);	
}

$newUsername = "";
$isSetNewUsername = false;

include	'../configs/dbConnect.php';

// Überprüfen, ob der Benutzername bereits existiert
$sql = "SELECT username FROM user WHERE username = ?";
$statement = $mysqli->prepare($sql);
$statement->bind_param("s", $usernametry);
$statement->execute();
$result = $statement->get_result();
$statement->close();

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
$sql = "INSERT INTO user (username, password, salt, name, firstname, email, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
$statement = $mysqli->prepare($sql);
$statement->bind_param("sssssss", $newUsername, $password, $salt, $name, $firstname, $email, $address);
$statement->execute();
$statement->close();
// Verbindung zur Datenbank schließen
$mysqli->close();

session_start();
$_SESSION["username"] = $newUsername;
$_SESSION['setUsername'] = $isSetNewUsername;
$_SESSION['usernametry'] = $usernametry;

//log
require_once '../configs/log.php';
logEvent('Benutzer ' . $_SESSION["username"] . ' mit der ID ' . $_SESSION["user_id"] . ' wurde registriert.');


//Weiterleitung zur Login Seite
header("Location: ../confirmRegistration.php");

?>