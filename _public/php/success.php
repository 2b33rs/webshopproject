<?php
include_once './scripts/configPaypalScript.php';
include_once './scripts/dbConnectScript.php';
include_once './header.php';


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

        $statement->bind_param("isssds", $_SESSION["user_id"], $_SESSION["username"], $rowPro["name"], $rowPro["description"], $rowPro["price"], $date);
        $statement->execute();
    }

    $sql = "DELETE FROM cart_products WHERE cart_id = '" . $cart_id . "'";
    $mysqli->query($sql);
    $sql = "DELETE FROM cart WHERE cart_id = '" . $cart_id . "'";
    $mysqli->query($sql);


}


?>
<main>
    <div class="container">
        <div class="card shadow p-xl-2 bg-white rounded ">
            <div class="status card-body">
                <h1 class="card-title">Your Payment has been Successful</h1><br>
                <h3 class="card-text">Vielen Dank für Ihre Bestellung</h3>
                <div class="mt-xl-5">
                <a href="./products.php" class="btn btn-primary float-start" role="button">zu den Produkten</a>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include_once '../html/footer.html' ?>