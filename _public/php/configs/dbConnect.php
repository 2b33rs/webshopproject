<?php
// Verwende die Zugangsdaten
$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbdatabase = 'webshop';

// Führe die Datenbankverbindung durch
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);
if ($mysqli->connect_error) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}
?>