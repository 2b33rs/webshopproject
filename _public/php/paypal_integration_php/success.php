<?php
// Include configuration file 
include_once 'config.php';

// Include database connection file 
include_once 'dbConnect.php';

// i need to get the product id from the cart_products table
// Get the cart ID from the session
$cart_id = $_SESSION['cart_id'];

// Query the cart_products table to get the product ID
$query = "SELECT products_id FROM cart_products WHERE cart_id = $cart_id";

$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

$statement = $mysqli->prepare($query);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    $product_id = $row['products_id'];


    $sql = "INSERT INTO orders_products ( orders_products_id, orders_id ,products_id ) VALUES (?,?,?)";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("iii", $orders_products_id, $orders_id, $products_id);
}






?>
<div class="container">
    <div class="status">
        <?php if (!empty($payment_id)) { ?>
            <h1 class="success">Your Payment has been Successful</h1>

            <h4>Payment Information</h4>
            <p><b>Reference Number:</b>
                <?php echo $payment_id; ?>
            </p>
            <p><b>Transaction ID:</b>
                <?php echo $txn_id; ?>
            </p>
            <p><b>Paid Amount:</b>
                <?php echo $payment_gross; ?>
            </p>
            <p><b>Payment Status:</b>
                <?php echo $payment_status; ?>
            </p>

            <h4>Product Information</h4>
            <p><b>Name:</b>
                <?php echo $productRow['name']; ?>
            </p>
            <p><b>Price:</b>
                <?php echo $productRow['price']; ?>
            </p>
        <?php } else { ?>
            <h1 class="error">Your Payment has Failed</h1>
        <?php } ?>
    </div>
    <a href="../products.php" class="btn-link">Back to Products</a>
</div>