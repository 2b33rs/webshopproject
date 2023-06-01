<?php
// Include configuration file 
include_once 'config.php';

// Include database connection file 
include_once 'dbConnect.php';
include_once '../header.php';


$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

$sql = "SELECT cart_id FROM cart WHERE user_id = '" . $_SESSION["user_id"] . "'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
if (!$result->num_rows == 0) {
    $cart_id = $row["cart_id"];
    $sql = "SELECT products_id FROM cart_products WHERE cart_id = '" . $cart_id . "'";

    $result = $mysqli->query($sql);
    $date = date("Y-m-d");

    while ($row = $result->fetch_assoc()) {

        $sql = "SELECT * FROM products WHERE products_id = '" . $row["products_id"] . "'";
        $resultPro = $mysqli->query($sql);

        $rowPro = $resultPro->fetch_assoc();

        $sql = "INSERT INTO orders (user_id ,username ,name ,description ,price , purchase_date) VALUES (?,?,?,?,?,?)";
        $statement = $mysqli->prepare($sql);
        
        $statement->bind_param("isssds", $_SESSION["user_id"], $_SESSION["username"],$rowPro["name"],$rowPro["description"],$rowPro["price"], $date);
        $statement->execute();
    }

$sql = "DELETE FROM cart_products WHERE cart_id = '" . $cart_id . "'";
$mysqli->query($sql);
$sql = "DELETE FROM cart WHERE cart_id = '" . $cart_id . "'";
$mysqli->query($sql);


}


?>
<div class="container">
    <div class="status">
     
            <h1 class="success">Your Payment has been Successful</h1>

            <h1 class="success">Thank You For Your Order</h1>
       
    </div>
    <a href="../products.php" class="btn-link">Back to Products</a>
</div>