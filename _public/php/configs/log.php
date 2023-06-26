<?php
function logEvent($message)
{
    $timestamp = date('Y-m-d H:i:s');
    $ipAdresse = $_SERVER['REMOTE_ADDR'];
    $logMessage = "[$timestamp][$ipAdresse] $message" . PHP_EOL;
	if (file_put_contents('../logs/log.txt', $logMessage, FILE_APPEND) === false) {
		die('Fehler beim Schreiben in die Log-Datei.');
	}
}
?>
