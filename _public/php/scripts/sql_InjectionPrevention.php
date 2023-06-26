<?php

//Preparing for SQL-Injection und Cross-Site-Scripting
function sqlinjection($input){
$input = trim($input); // Leerzeichen werden entfernt
$blacklist = array("DROP", "DELETE", "UPDATE", "UNION", "*", "<", ">", "&", "`", "$", "!", "|", "OR 1=1", "--", ";", "%", "/"); // Unerwünschte Wörter
$output = str_ireplace($blacklist, "", $input); // Unerwünschte Wörter werden entfernt
$output = stripslashes($output); // Backslashes werden entfernt

/*
if ($output!==$input) { // Wenn die Eingabe verändert wurde, wird eine Fehlermeldung ausgegeben
    if (isset($_SESSION["user_id"])) {
        require_once 'configs/log.php';
        logEvent('SQL-Injection wurde versucht von Benutzer ' . $_SESSION["username"] . ' mit der ID ' . $_SESSION["user_id"] . '.');
    }
    else
    require_once 'configs/log.php';
    logEvent('SQL-Injection wurde versucht.');
}
*/

$output = htmlspecialchars($output); // HTML-Code wird in Zeichen umgewandelt

return $output;
}
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
?>