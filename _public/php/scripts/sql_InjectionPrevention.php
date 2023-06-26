<?php

/*function logEventSQL($message)
{
    $timestamp = date('Y-m-d H:i:s');
    $ipAdresse = $_SERVER['REMOTE_ADDR'];
    $logMessage = "[$timestamp][$ipAdresse] $message" . PHP_EOL;
    if (file_put_contents('../logs/log.txt', $logMessage, FILE_APPEND) === false) {
        die('Fehler beim Schreiben in die Log-Datei.');
    }
}
*/
//Preparing for SQL-Injection und Cross-Site-Scripting
function sqlinjection($input)
{
    $input = trim($input); // Leerzeichen werden entfernt
    $blacklist = array("DROP", "DELETE", "UPDATE", "UNION", "*", "<", ">", "&", "`", "$", "!", "|", "OR 1=1", "--", ";", "%", "/"); // Unerwünschte Wörter
    $output = str_ireplace($blacklist, "", $input); // Unerwünschte Wörter werden entfernt
    $output = stripslashes($output); // Backslashes werden entfernt

    /*if ($output !== $input) { // Wenn die Eingabe verändert wurde, wird eine Fehlermeldung ausgegeben
        if (isset($_SESSION["user_id"])) {
            logEventSQL('SQL-Injection wurde versucht von Benutzer ' . $_SESSION["username"] . ' mit der ID ' . $_SESSION["user_id"] . '.');
        } else
            logEventSQL('SQL-Injection wurde versucht.');
    }
*/
    $output = htmlspecialchars($output); // HTML-Code wird in Zeichen umgewandelt

    return $output;
}

?>