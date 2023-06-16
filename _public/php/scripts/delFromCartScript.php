<?php
session_start();
if (isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp'] > 60)) {
    session_unset();
    session_destroy();
}
$_SESSION['timestamp'] = time();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
} else {
    $mysqli = new mysqli("localhost", "root", "", "webshop");
    if ($mysqli->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }

    $sql = "DELETE FROM cart_products WHERE cart_id = ? AND products_id = ? LIMIT 1"; //'" . $_POST["cart_id"] . "' AND products_id = '" . $_POST["products_id"] . "'
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("ii", $_POST["cart_id"], $_POST["products_id"]);
    $statement->execute();
    $statement->close();
    $mysqli->close();
    //$result = $mysqli->query($sql);


    //TODO: show a message that the product was added to the cart
    echo "Hier ist der Text, der für 5 Sekunden angezeigt wird.";
    // Verzögerung für 5 Sekunden (5000 Millisekunden) 
    usleep(500000);
    // Verstecke den Text 
    header("Location: ../cart.php");
}
?>