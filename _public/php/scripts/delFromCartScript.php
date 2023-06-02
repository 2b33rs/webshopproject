<?php
include_once './checkActivity.php';

$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

$sql = "DELETE FROM cart_products WHERE cart_id = '" . $_POST["cart_id"] . "' AND products_id = '" . $_POST["products_id"] . "' LIMIT 1";
$result = $mysqli->query($sql);


//TODO: show a message that the product was added to the cart
echo "Hier ist der Text, der für 5 Sekunden angezeigt wird.";
// Verzögerung für 5 Sekunden (5000 Millisekunden) 
usleep(500000);
// Verstecke den Text 
header("Location: ../cart.php");


?>