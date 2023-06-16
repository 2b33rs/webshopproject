<?php include_once 'header.php' ?>

<head>
  <script src="JavaScript/products.js"></script>
</head>

<main>
  <div class="container">

    <h1 class="h1 text-center mt-5">Unsere Produkte.</h1>
    <p class="lead text-center">Immer genau das richtige für Dich.</p>
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
    $sql = "SELECT * FROM categorie";
    $statement = $mysqli->prepare($sql);
    $statement->execute();
    $result = $statement->get_result();
    $statement->close();
    $mysqli->close();

    //iterate over $result
    
    while ($row = $result->fetch_assoc()) {
      $categorie = $row['categroie_id'];
      echo "<details class='m-3 shadow rounded'>
            <summary class='card-body fs-4'>
              " . $row['name'] . "</summary>";

      getSubCategorie($categorie);

      echo "
          </details>";
    }


    function getSubCategorie($categorie)
    {
      $mysqli = new mysqli("localhost", "root", "", "webshop");
      if ($mysqli->connect_error) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
      }

      $sql = "SELECT * FROM subcategorie WHERE categroie_id = ?";
      $statement = $mysqli->prepare($sql);
      $statement->bind_param("i", $categorie);
      $statement->execute();
      $result = $statement->get_result();
      $statement->close();
      $mysqli->close();

      //iterate over $result
    
      while ($row = $result->fetch_assoc()) {
        $subCategorie = $row['subcategorie_id'];
        echo "<details>
                <summary class='card-body fs-5'>
                  " . $row['name'] . "</summary>
                  <div class='card-body'>";
        getProducts($subCategorie);
        echo "</div>
              </details>";
      }
    }

    function getProducts($subCategorie)
    {
      $mysqli = new mysqli("localhost", "root", "", "webshop");
      if ($mysqli->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
      }

      $sql = "SELECT * FROM products WHERE subcategorie_id = ?";
      $statement = $mysqli->prepare($sql);
      $statement->bind_param("i", $subCategorie);
      $statement->execute();
      $result = $statement->get_result();
      $statement->close();
      $mysqli->close();

      /*
      //iterate over $result
      while ($row = $result->fetch_assoc()) {
        echo "<div class='card shadow p-3 my-4 bg-white rounded' >
                <div class='row'>
                  <div class='card-body col-md-8'>
                    <h5 class='card-title'>" . $row['name'] . "</h5>
                    <p class='card-text '>" . $row['description'] . "</p>
                    <p class='card-text'>" . $row['price'] . "€</p>";

        if ($GLOBALS['loggedIn']) {
          echo "    <form method='POST' action='php/scripts/addToCartScript.php'>
                      <input type='submit' name='add-to-cart' value='Zum Warenkorb hinzufügen' class='btn btn-primary'>
                      <input type='hidden' name='products_id' value='" . $row['products_id'] . "'>
                    </form>
                  </div>
                  <div class='col-md-4'>
                    <img src='" . $row['images'] . "' class='img-fluid' style='max-height: 20vh; object-fit:contain;'>
                  </div>
                </div>
              </div>";
        } else
          echo
            "       <a href='php/login.php' class='btn btn-primary'>Zum Warenkorb hinzufügen (Login)</a>
                  </div>
                  <div class='col-md-4'>
                    <img src='" . $row['images'] . "' class='img-fluid' style='max-height: 20vh; object-fit:contain;'>
                  </div>
                </div>
              </div>";

      }
    }*/
    //iterate over $result with ajax!
    while ($row = $result->fetch_assoc()) {
      echo "<div class='card shadow p-3 my-4 bg-white rounded' >
              <div class='row'>
                <div class='card-body col-md-8'>
                  <h5 class='card-title'>" . $row['name'] . "</h5>
                  <p class='card-text '>" . $row['description'] . "</p>
                  <p class='card-text'>" . $row['price'] . "€</p>";

      if ($GLOBALS['loggedIn']) {
        echo '    <button onclick="addToCart(' . $row['products_id'] . '); showNotification(Hinzugefügt)" class="btn btn-primary">Zum Warenkorb hinzufügen</button>';
      } else {
        echo "       <a href='php/login.php' class='btn btn-primary'>Zum Warenkorb hinzufügen (Login)</a>";
      }

      echo "</div>
                <div class='col-md-4'>
                  <img src='" . $row['images'] . "' class='img-fluid' style='max-height: 20vh; object-fit:contain;'>
                </div>
              </div>
            </div>";

    }
  }
  ?>



  </div>
</main>


<?php include_once '../html/footer.html' ?>