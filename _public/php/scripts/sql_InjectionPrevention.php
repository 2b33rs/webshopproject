<?php

//Preparing for SQL-Injection und Cross-Site-Scripting
function sqlinjection($input){
$input = trim($input); // Leerzeichen werden entfernt
$blacklist = array("DROP", "DELETE", "UPDATE", "UNION", "*", "<", ">", "&", "`", "$", "!", "|", "OR 1=1", "--", ";", "%"); // Unerwünschte Wörter
$input = str_ireplace($blacklist, "", $input); // Unerwünschte Wörter werden entfernt
$input = htmlspecialchars($input); // HTML-Code wird in Zeichen umgewandelt
$output = $input;
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