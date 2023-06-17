<head>
  <script src="JavaScript/products.js"></script>
</head>
<?php
session_start();
if (isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp'] > 600)) {
    session_unset();
    session_destroy();
}
$_SESSION['timestamp'] = time();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}



//get the cart of the user
$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_error) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM cart WHERE user_id=?";
$statement = $mysqli->prepare($sql);
$statement->bind_param("i", $user_id);
$statement->execute();
$result = $statement->get_result();
$statement->close();
//$mysqli->close();
$cart = $result->fetch_assoc();

//when the user has no cart yet, create one
if ($result->num_rows == 0) {
    $sql = "INSERT INTO cart (user_id) VALUES (?)";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("i", $user_id);
    $statement->execute();
    $statement->close();
    $mysqli->close();
    $sql = "SELECT * FROM cart WHERE user_id=?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("i", $user_id);
    $statement->execute();
    $result = $statement->get_result();
    $statement->close();
    //$mysqli->close();
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
$statement->close();
$mysqli->close();

//TODO: show a message that the product was added to the cart


//echo "Hier ist der Text, der für 5 Sekunden angezeigt wird.";
// Verzögerung für 5 Sekunden (5000 Millisekunden) 
//usleep(500000);
// Verstecke den Text 
//header("Location: ../cart.php");
exit;

?>