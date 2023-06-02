<!--Von Jonas hinzugefügt Test wegen der Zeit-->
<?php
//Wenn ich auf die Produkt Seite klicke wird ja mein Zeitstempel zurück gestezt
//Aber ich war schon vorher zu lange inaktiv das wir in dieser VAriable gespeichert
session_start();
if (!isset($_SESSION["timestamp"])) {
    $_SESSION["timestamp"] = time();
}

    
    if (time() - $_SESSION['timestamp'] > 10) {
        $_SESSION["inactive"] = 2;
    }


?>