<?php
include_once './header.php';

// Include configuration file 
include_once './scripts/configPaypalScript.php';

// Include database connection file 
include_once './scripts/dbConnectScript.php';


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}



?>

<div class="container">
    <?php
    // Fetch products from the database 
    $cart_id = 0;
    if (isset($_POST["cart_id"])) {
        $_SESSION["cart_id"] = $cart_id;
    }
    $total_price = 0;
    if (isset($_POST["price"])) {
        $total_price = $_POST["price"];
    }

    

        ?>
        <div class="pro-box">
            
            <div class="body">
                <h5>
                    <?php echo "Warenkorb"; ?>
                </h5>
                <h6>Price:
                    <?php echo $total_price . ' ' . PAYPAL_CURRENCY; ?>
                </h6>

                <!-- PayPal payment form for displaying the buy button -->
                <form action="<?php echo PAYPAL_URL; ?>" method="post">
                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">

                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="<?php echo "Warenkorb"; ?>">
                    <input type="hidden" name="item_number" value="<?php echo $cart_id; ?>">
                    <input type="hidden" name="amount" value="<?php echo $total_price; ?>">
                    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                    <!-- Specify URLs -->
                    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">

                    <!-- Display the payment button. -->
                    <input type="image" name="submit" border="0"
                        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
                </form>
            </div>
        </div>
 
</div>