<?php
include_once 'scripts/configPaypalScript.php';
include_once 'scripts/dbConnectScript.php';
include_once 'header.php';


include 'configs/dbConnect.php';

$sql = "SELECT * FROM cart WHERE user_id = ?";
$statement = $mysqli->prepare($sql);
$statement->bind_param("i", $_SESSION["user_id"]);
$statement->execute();
$result = $statement->get_result();
$statement->close();
$date = date("Y-m-d H:i:s");
$invoice_id = $_SESSION["user_id"] . date("YmdHis");

while ($row = $result->fetch_assoc()) {
    $sql = "SELECT * FROM products WHERE products_id = ?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("i", $row["products_id"]);
    $statement->execute();
    $resultPro = $statement->get_result();
    $rowPro = $resultPro->fetch_assoc();
    $statement->close();
    
    $sql = "INSERT INTO orders (invoice_id, user_id, username, products_id, name, description, price, purchase_date) VALUES (?,?,?,?,?,?,?,?)";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("iisissds", $invoice_id, $_SESSION["user_id"], $_SESSION["username"], $row["products_id"], $rowPro["name"], $rowPro["description"], $rowPro["price"], $date);
    $statement->execute();
    $statement->close();
    
    $sql = "DELETE FROM cart WHERE cart_id = ?"; //'" . $cart_id . "'
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("i", $row["cart_id"]);
    $statement->execute();
    $statement->close();
    //$mysqli->close();

}
$mysqli->close();

?>
<?php include_once '../html/success.html' ?>
<?php include_once '../html/footer.html' ?>