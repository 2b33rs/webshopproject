<?php include_once 'header.php' ?>


<main>
  <div class="container">

    <h1 class="h1 text-center mt-5">Bestellverlauf</h1>
    <p class="lead text-center">Hier siehst du deine Bestellungen.</p>
    <div class="mt-5"></div>
    <?php


    global $loggedIn;
    if (isset($_SESSION["username"])) {
      $loggedIn = true;
    } else {
      $loggedIn = false;
    }


    $mysqli = new mysqli("localhost", "root", "", "webshop");
    if ($mysqli->connect_error) {
      die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }
    $sql = "SELECT * FROM orders Where user_id = ? GROUP BY purchase_date DESC";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("i", $_SESSION['user_id']);
    $statement->execute();
    $result = $statement->get_result();
    $statement->close();
    $mysqli->close();

    while ($row = $result->fetch_assoc()) {
        $purchase_date = $row['purchase_date'];
        echo "<details class='m-3 shadow rounded'>
              <summary class='card-body fs-4'>Bestellung vom " . $row['purchase_date'] . "</summary>";
  
        getInvoiceIDs($purchase_date);
  
        echo "
            </details>";
    }


    function getInvoiceIDs($purchase_date){
        $mysqli = new mysqli("localhost", "root", "", "webshop");
        if ($mysqli->connect_error) {
            die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
        }

        $sql = "SELECT * FROM orders WHERE user_id=? AND purchase_date = ? GROUP BY invoice_id desc";
        $statement = $mysqli->prepare($sql);
        $statement->bind_param("is", $_SESSION['user_id'], $purchase_date);
        $statement->execute();
        $result = $statement->get_result();
        $statement->close();
        $mysqli->close();

        //iterate over $result
    
        while ($row = $result->fetch_assoc()) {
            $invoice = $row['invoice_id'];
            echo "<details>
                    <summary class='card-body fs-5'>Rechnungsnummer: " . $invoice . "</summary>
                     <div class='card-body'>";
            getProducts($invoice);
            echo "</div>
                   </details>";
        }
    }

function getProducts($invoice_id)
    {
      $mysqli = new mysqli("localhost", "root", "", "webshop");
      if ($mysqli->connect_error) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
      }

      $sql = "SELECT * FROM orders WHERE invoice_id = ?";
      $statement = $mysqli->prepare($sql);
      $statement->bind_param("i", $invoice_id);
      $statement->execute();
      $result = $statement->get_result();
      $statement->close();
      $mysqli->close();


      while ($row = $result->fetch_assoc()) {
        echo "<div class='card shadow p-3 my-4 bg-white rounded' >
                <div class='row'>
                  <div class='card-body col-md-8'>
                    <h5 class='card-title'>" . $row['name'] . "</h5>
                    <p class='card-text '>" . $row['description'] . "</p>
                    <p class='card-text'>" . $row['price'] . "€</p>";
  
        if ($GLOBALS['loggedIn']) {
          echo '    <button onclick="addToCart(' . $row['products_id'] . '); showNotification(Hinzugefügt)" class="btn btn-primary">Nochmal Kaufen</button>';
        }
  
        echo "</div></div></div>";
        //          <div class='col-md-4'>
        //            <img src='" . $row['images'] . "' class='img-fluid' style='max-height: 20vh; object-fit:contain;'>
        //          </div>
        //        </div>
        //      </div>";
  
      }
    }
?>
</div>
</main>
<?php include_once '../html/footer.html' ?>