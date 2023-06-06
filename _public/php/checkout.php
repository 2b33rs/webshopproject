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




<link rel="stylesheet" href="../css/checkout.css">

<main>
    <div class="container h-100">

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
        <div class="mb-4">
            <h2>Checkout</h2>
        </div>
        <div class="row h-100">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="row w-100">
                    <div class="card shadow w-100 bg-white rounded">
                        <div class="card-body">
                            <h3 class="card-title">Rechnungsadresse</h3>
                            <p><br></p>

                            <?php
                            // Datenbankverbindung herstellen
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "webshop";

                            // Verbindung herstellen
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Prüfen, ob die Verbindung erfolgreich war
                            if ($conn->connect_error) {
                                die("Verbindung fehlgeschlagen: " . $conn->connect_error);
                            }

                            // Benutzername aus der Session-Datenbanktabelle abrufen
                            $session_username = $_SESSION['username'];

                            // Query ausführen, um die Rechnungsadresse basierend auf dem Benutzernamen abzurufen
                            $sql = "SELECT * FROM user WHERE username = '" . $_SESSION["username"] . "'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<p class='card-text'>" . $row["firstname"] . " " . $row["name"] . "<br>";
                                echo $row["address"] . "</p>";
                            } else {
                                echo "<p class='card-text'>Keine Rechnungsadresse gefunden.</p>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="card shadow w-100 bg-white rounded">
                        <div class="card-body">
                            <h3 class="card-title">Bezahlmethode</h3>
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
                                <input type="image" name="submit" src="../images/checkout-logo-large-de.png">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card shadow w-100 p-3 bg-white rounded summary">
                    <div class="card-body">
                        <h2 class="card-title">Warenkorb</h2>
                        <table class="table">
                            <?php
                            // Berechnung der Steuern
                            
                            $steuersatz = 19;
                            $steuern = ($total_price * $steuersatz) / 100;
                            ?>
                            <tbody>
                                <tr>
                                    <td>Zwischensumme:</td>
                                    <td>
                                        <?php echo $total_price; ?>€
                                    </td>
                                </tr>
                                <tr>
                                    <td>Versand:</td>
                                    <td>0.00€</td>
                                </tr>
                                <tr>
                                    <td>inkl. 19% MwSt:</td>
                                    <td>
                                        <?php echo number_format($steuern, 2); ?>€
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>Gesamtpreis:</h3>
                                    </td>
                                    <td>
                                        <?php echo "<h3>" . number_format($total_price, 2) . "€</h3>"; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</main>
<?php include_once '../html/footer.html' ?>