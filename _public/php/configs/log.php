<?php
function logEvent($message)
{
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] $message" . PHP_EOL;

	if (file_put_contents('../logs/log.txt', $logMessage, FILE_APPEND) === false) {
        
		die('Fehler beim Schreiben in die Log-Datei.');
	}
	
}
?>
