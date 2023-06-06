<?php include_once 'header.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<main>

    <div class="container">

        <?php

        $mysqli = new mysqli("localhost", "root", "", "webshop");
        if ($mysqli->connect_errno) {
            die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
        }

        $sql = "SELECT * FROM cart WHERE user_id = '" . $_SESSION["user_id"] . "'";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        if (!$result->num_rows == 0) {
            $cart_id = $row["cart_id"];
            $sql = "SELECT products_id FROM cart_products WHERE cart_id = '" . $cart_id . "'";

            $result = $mysqli->query($sql);

        }

        if ($result->num_rows == 0) {
            echo "<h1 class='text-center mt-5'>Der Warenkorb ist leer</h1>";
            echo "<img src='../images/cart.svg' class='img-fluid mx-auto d-block ' alt='' style='height: 30vh'>";
        }


        while ($row = $result->fetch_assoc()) {

            //get the product
            $sql = "SELECT * FROM products WHERE products_id = '" . $row["products_id"] . "'";
            $resultPro = $mysqli->query($sql);

            $rowPro = $resultPro->fetch_assoc();


            echo "<div class='card shadow p-3 mb-3 bg-white rounded' >
                <div class='card-body d-flex justify-content-between align-items-end'><div>
                <h5 class='card-title'>" . $rowPro['name'] . "</h5>
                <p class='card-text '>" . $rowPro['description'] . "</p>
                <p class='card-text'>" . $rowPro['price'] . "€</p>
                </div>";

            echo "<form method='POST' action='../php/scripts/delFromCartScript.php'>
                <input type='submit' name='del-from-cart' value='Vom Warenkorb entfernen' class='btn btn-outline-danger btn-sm delete-btn'>
                <input type='hidden' name='products_id' value='" . $row['products_id'] . "'>
                <input type='hidden' name='cart_id' value='" . $cart_id . "'>
              </form> 
              </div>
                </div>";
        }

        if (!$result->num_rows == 0) {
            $sql = "SELECT SUM(price) FROM products WHERE products_id IN (SELECT products_id FROM cart_products WHERE cart_id = '" . $cart_id . "')";
            $result = $mysqli->query($sql);
            $row = $result->fetch_assoc();
            echo "<h3 class='text-end'>Gesamtpreis: " . $row["SUM(price)"] . "€</h3>";
            echo "<form method='POST' action='./checkout.php'>
            <input type='submit' name='checkout' value='Zur Kasse' class='btn btn-primary'>
            <input type='hidden' name='cart_id' value='" . $cart_id . "'>
            <input type='hidden' name='price' value='" . $row["SUM(price)"] . "'>
            </form> ";
        }

        ?>




    </div>
</main>

<?php include_once '../html/footer.html' ?>