<main>
    <div class="container">
        <?php

        $mysqli = new mysqli("localhost", "root", "", "webshop");
        if ($mysqli->connect_error) {
            die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
        }

        $sql = "SELECT * FROM cart WHERE user_id = ? ORDER BY `products_id` ASC";
        $statement = $mysqli->prepare($sql);
        $statement->bind_param("i", $_SESSION["user_id"]);
        $statement->execute();
        $result = $statement->get_result();
        $statement->close();
        $mysqli->close();


        if ($result->num_rows == 0) {
            echo "<h1 class='text-center mt-5'>Der Warenkorb ist leer</h1>";
            echo "<img src='images/cart.svg' class='img-fluid mx-auto d-block ' alt='' style='height: 30vh'>";
        } else {
            while ($row = $result->fetch_assoc()) {

                $mysqli = new mysqli("localhost", "root", "", "webshop");
                if ($mysqli->connect_error) {
                    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
                }
                //get the product
                $sql = "SELECT * FROM products WHERE products_id = ? ";
                $statementPro = $mysqli->prepare($sql);
                $statementPro->bind_param("i", $row["products_id"]);
                $statementPro->execute();
                $resultPro = $statementPro->get_result();
                $statementPro->close();
                $mysqli->close();
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
                            <input type='hidden' name='cart_id' value='" . $row['cart_id'] . "'>
                        </form> 
                    </div>
                </div>";
            }

            $mysqli = new mysqli("localhost", "root", "", "webshop");
            if ($mysqli->connect_error) {
                die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
            }

            $sql = "SELECT SUM(products.price) FROM webshop.cart JOIN webshop.products ON cart.products_id = products.products_id WHERE cart.user_id = ?;";
            $statement = $mysqli->prepare($sql);
            $statement->bind_param("i", $_SESSION["user_id"]);
            $statement->execute();
            $statement->bind_result($sum);
            $statement->fetch();
            $statement->close();
            $mysqli->close();
            echo '  <div class="container my-3 pt-3">
                            <div class="row">
                                <div class="col-6">
                                    <h2>Gesamtpreis: ' . $sum . ' &euro;</h2>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <form method="POST" action="php/checkout.php">
                                        <button type="submit" name="checkout" class="btn btn-primary btn-lg">Zur Kasse</button>
                                        <input type="hidden" name="price" value="' . $sum . '">
                                    </form>
                                </div>
                            </div>
                        </div>
                ';


        }




        ?>

    </div>
</main>