<?php
session_start(); 
// //check if the user is still active

// if ((time() - $_SESSION['last_activity'] > 5)) {
//     session_start();
//     session_destroy();
//     header("location: ../login.php");
//     exit();
// }
//get the cart of the user
$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM cart WHERE user_id=?";
$statement = $mysqli->prepare($sql);
$statement->bind_param("i", $user_id);
$statement->execute();

$result = $statement->get_result();
$cart = $result->fetch_assoc();

//when the user has no cart yet, create one
if ($result->num_rows == 0) {
    $sql = "INSERT INTO cart (user_id) VALUES (?)";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("i", $user_id);
    $statement->execute();
    $sql = "SELECT * FROM cart WHERE user_id=?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("i", $user_id);
    $statement->execute();
    $result = $statement->get_result();
    $cart = $result->fetch_assoc();
}


$cart_id = $cart["cart_id"];


$productId = "";
if (isset($_POST["products_id"])) {
    $productId = $_POST["products_id"];
}
//echo $productId;



$sql = "INSERT INTO cart_products (cart_id, products_id) VALUES (?,?)";
$statement = $mysqli->prepare($sql);
$statement->bind_param("ii", $cart_id, $productId);
$statement->execute();

//TODO: show a message that the product was added to the cart
echo "Hier ist der Text, der für 5 Sekunden angezeigt wird.";
// Verzögerung für 5 Sekunden (5000 Millisekunden) 
usleep(500000);
// Verstecke den Text 
header("Location: ../products.php");


?>