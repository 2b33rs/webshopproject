<?php
// Datenbankverbindung


// Überprüfen, ob ein Benutzername übergeben wurde
if (isset($_POST['username'])) {
    $username = $_POST['username'];

    // Datenbankverbindung
    include('../configs/dbConnect.php');
    // Vorbereiten und Ausführen der SELECT-Abfrage
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $mysqli->close();
    $row = $result->fetch_assoc();

    // Überprüfen, ob der Benutzername bereits vorhanden ist
    if ($row) {
        // Der Benutzername ist bereits vergeben
        $response = array('available' => false);
    } else {
        // Der Benutzername ist verfügbar
        $response = array('available' => true);
    }

    // Rückgabe der JSON-Antwort
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>
