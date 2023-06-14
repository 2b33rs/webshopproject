<?php

        $mysqli = new mysqli("localhost", "root", "", "webshop");
        if ($mysqli->connect_error) {
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
            echo "<img src='images/cart.svg' class='img-fluid mx-auto d-block ' alt='' style='height: 30vh'>";
        }


        while ($row = $result->fetch_assoc()) {

            //get the product
            $sql = "SELECT * FROM products WHERE products_id = '" . $row["products_id"] . "'";
            $resultPro = $mysqli->query($sql);

            $rowPro = $resultPro->fetch_assoc();


            echo "  <div class='card shadow p-3 my-3 bg-white rounded' >
                        <div class='card-body d-flex justify-content-between align-items-end'>
                        <div>
                        <h5 class='card-title'>" . $rowPro['name'] . "</h5>
                        <p class='card-text '>" . $rowPro['description'] . "</p>
                        <p class='card-text'>" . $rowPro['price'] . "&euro;</p>
                    </div>";

            echo "  <form method='POST' action='php/scripts/delFromCartScript.php'>
                        <lable for='del-from-cart'></lable>
                        <button type='submit' name='del-from-cart' class='btn btn-outline-danger btn-sm delete-btn'>
                        Aus Warenkorb entfernen
                        </button>
                        <input type='hidden' name='products_id' value='" . $row['products_id'] . "'>
                        <input type='hidden' name='cart_id' value='" . $cart_id . "'>
                    </form> 
                </div>
            </div>";
        }

        if (!$result->num_rows == 0) {
            /*
            $sql = "SELECT SUM(price) FROM products WHERE products_id IN (SELECT products_id FROM cart_products WHERE cart_id = '" . $cart_id . "')";
            $result = $mysqli->query($sql);
            $row = $result->fetch_assoc();
            echo "<h3 class='text-end'>Gesamtpreis: " . $row["SUM(price)"] . "€</h3>";
            echo "<form method='POST' action='./checkout.php'>
            <input type='submit' name='checkout' value='Zur Kasse' class='btn btn-primary'>
            <input type='hidden' name='cart_id' value='" . $cart_id . "'>
            <input type='hidden' name='price' value='" . $row["SUM(price)"] . "'>
            </form> ";
            */
            $sql = "SELECT SUM(products.price) FROM webshop.cart_products JOIN webshop.products
                    ON cart_products.products_id = products.products_id WHERE cart_products.cart_id = ?";
            $statement = $mysqli->prepare($sql);
            $statement->bind_param("i", $cart_id);
            $statement->execute();
            $statement->bind_result($sum);
            $statement->fetch();
            $statement->close();
            echo '  <div class="container my-3 pt-3">
                        <div class="row">
                            <div class="col-6">
                                <h2>Gesamtpreis: ' . $sum . ' &euro;</h2>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <form method="POST" action="php/checkout.php">
                                    <button type="submit" name="checkout" class="btn btn-primary btn-lg">Zur Kasse</button>
                                    <input type="hidden" name="cart_id" value="' . $cart_id . '">
                                    <input type="hidden" name="price" value="' . $sum . '">
                                </form>
                            </div>
                        </div>
                    </div>
            ';

        }

        ?>