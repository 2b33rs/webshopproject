<?php
// Stellen Sie eine Verbindung zur Datenbank her
session_start();
if (isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp'] > 600)) {
    session_unset();
    session_destroy();
}
$_SESSION['timestamp'] = time();
// Überprüfen, ob ein Benutzername übergeben wurde
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    //get the cart id
    $mysqli = new mysqli("localhost", "root", "", "webshop");
    if ($mysqli->connect_error) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }
    $sql = "SELECT cart_id FROM cart WHERE user_id = ?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("i", $_SESSION["user_id"]);
    $statement->execute();
    $result = $statement->get_result();

    while ($row = $result->fetch_assoc()) {
        $cart_id = $row["cart_id"];
        $sql = "DELETE FROM cart WHERE cart_id = ?";
        $statement = $mysqli->prepare($sql);
        $statement->bind_param("i", $card_id);
        $statement->execute();
        $statement->close();
    }

    //delete the user
    $sql = "DELETE FROM user WHERE username = ?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("s", $username);
    $statement->execute();
    $statement->close();

    // Überprüfen, ob der Benutzer erfolgreich gelöscht wurde
    if ($mysqli->affected_rows > 0) {
        echo "Benutzer wurde erfolgreich gelöscht.";
    } else {
        echo "Fehler beim Löschen des Benutzers.";
    }
}

// Verbindung zur Datenbank schließen
$mysqli->close();
session_unset();
session_destroy();
header("Location: ../index.php")
    ?>