<head>
  <script src="JavaScript/products.js"></script>
</head>
<?php
include_once '../configs/config.php';
session_start();
if (isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp'] > $maxTime)) {
    session_unset();
    session_destroy();
}
$_SESSION['timestamp'] = time();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
$productId = "";
if (isset($_POST["products_id"])) {
    $productId = $_POST["products_id"];
}


//fill cart with userid and productid
include('../configs/dbConnect.php');
$sql = "INSERT INTO cart (user_id, products_id) VALUES (?,?)";
$statement = $mysqli->prepare($sql);
$statement->bind_param("ii", $_SESSION["user_id"], $productId);
$statement->execute();
$statement->close();
$mysqli->close();

exit;
?>