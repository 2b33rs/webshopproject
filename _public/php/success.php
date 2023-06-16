<?php
include_once 'scripts/configPaypalScript.php';
include_once 'scripts/dbConnectScript.php';
include_once 'header.php';


$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_error) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

$sql = "SELECT cart_id FROM cart WHERE user_id = ?";
$statement = $mysqli->prepare($sql);
$statement->bind_param("i", $_SESSION["user_id"]);
$statement->execute();
$result = $statement->get_result();
$statement->close();
//$mysqli->close();
$row = $result->fetch_assoc();
if (!$result->num_rows == 0) {
    $cart_id = $row["cart_id"];
    $sql = "SELECT products_id FROM cart_products WHERE cart_id = ?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("i", $cart_id);
    $statement->execute();
    $result = $statement->get_result();
    $statement->close();
    //$mysqli->close();
    $date = date("Y-m-d");

    while ($row = $result->fetch_assoc()) {

        $sql = "SELECT * FROM products WHERE products_id = ?";
        $statement = $mysqli->prepare($sql);
        $statement->bind_param("i", $row["products_id"]);
        $statement->execute();
        $resultPro = $statement->get_result();
        $rowPro = $resultPro->fetch_assoc();
        $statement->close();
        //$mysqli->close();
        $sql = "INSERT INTO orders (user_id ,username ,name ,description ,price , purchase_date) VALUES (?,?,?,?,?,?)";
        $statement = $mysqli->prepare($sql);
        $statement->bind_param("isssds", $_SESSION["user_id"], $_SESSION["username"], $rowPro["name"], $rowPro["description"], $rowPro["price"], $date);
        $statement->execute();
        $statement->close();
        //$mysqli->close();
    }

    $sql = "DELETE FROM cart_products WHERE cart_id = ?"; //'" . $cart_id . "'
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("i", $cart_id);
    $statement->execute();
    $statement->close();
    //$mysqli->close();
    $sql = "DELETE FROM cart WHERE cart_id = ?"; //'" . $cart_id . "'
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("i", $cart_id);
    $statement->execute();
    $statement->close();
    //$mysqli->close();
    
}
$mysqli->close();

?>
<?php include_once '../html/success.html' ?>
<?php include_once '../html/footer.html' ?>