<?php

$searchterm = "";
if (isset($_GET['searchterm'])) {
    $searchterm = $_GET['searchterm'];
}

//echo "$searchterm";



$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

$likeSearchterm = "%" . $searchterm . "%";

$sql = "SELECT * FROM products WHERE name LIKE ?";
$statement = $mysqli->prepare($sql);
$statement->bind_param("s", $likeSearchterm);

$statement->execute();
$result = $statement->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div class='card shadow p-3 mb-5 bg-white rounded' >
                <div class='card-body'>
                <img src='" . $row['images'] . "' class='card-img-top img-fluid' style='max-height: 20vh; object-fit:contain;'>
                  <h5 class='card-title'>" . $row['name'] . "</h5>
                  
                  
                  <p class='card-text '>" . $row['description'] . "</p>
                    <p class='card-text'>" . $row['price'] . "€</p>";
    if ($GLOBALS['loggedIn']) {
        echo "<form method='POST' action='./scripts/addToCartScript.php'>
                  <input type='submit' name='add-to-cart' value='Zum Warenkorb hinzufügen' class='btn btn-primary'>
                  <input type='hidden' name='products_id' value='" . $row['products_id'] . "'>
                </form> </div>
                </div>";
    } else
        //TODO: Link zu Login Seite MIT ID des Produkts oder wieder zurück zur Seite mit dem Produkt  
        echo
            "<a href='./login.php' class='btn btn-primary'>Zum Warenkorb hinzufügen (Login)</a>

                </div>
              </div>";

}


?>