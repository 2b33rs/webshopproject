<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>


    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>

    <?php

    //get the cart of the user
    session_start();

    $mysqli = new mysqli("localhost", "root", "", "webshop");
    if ($mysqli->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }

    $username = $_SESSION["user_id"];
    $sql = "SELECT * FROM cart WHERE user_id=?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("s", $username);
    $statement->execute();

    $result = $statement->get_result();
    $cart = $result->fetch_assoc();

    if ($result->num_rows == 0) {
        //create a new cart
        $sql = "INSERT INTO cart (user_id) VALUES (?)";
        $statement = $mysqli->prepare($sql);
        $statement->bind_param("s", $username);
        $statement->execute();
    }

    $cart_id = $cart["cart_id"];

    $productId = "";
    if (isset($_POST["products_id"])) {
        $productId = $_POST["products_id"];
    }
    echo $productId;

   

    $sql = "INSERT INTO cart_products (cart_id, products_id) VALUES (?,?)";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("ii", $cart_id, $productId);
    $statement->execute();

    ?>
</body>

</html>