<?php

 
// Überprüfen, ob der Benutzer eingeloggt ist
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Überprüfen, ob die letzte Aktivität gespeichert ist
    if (isset($_SESSION['last_activity'])) {
        // Überprüfen, ob die maximale Inaktivitätsdauer überschritten wurde
        $inactive_time = 5; // 3 Minuten (in Sekunden)
        $current_time = time();
        $elapsed_time = $current_time - $_SESSION['last_activity'];
        $_SESSION['inactive'] = false;
        if ($elapsed_time > $inactive_time) {
            // Benutzer ausloggen und Session zerstören
            $_SESSION['inactive'] = true;
            //session_destroy();
            //header("Location: logout.php"); // Weiterleitung zur Logout-Seite
            exit;
        }
    }
    
    // Aktualisieren der letzten Aktivitätszeit
    $_SESSION['last_activity'] = time();
}
 
// Weitere Inhalte der Seite...
?>