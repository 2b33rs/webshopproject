<?php include_once '../php/header.php' ?>
<header>
  <link rel="stylesheet" href="../CSS/products.css">
  <script src="../JavaScript/products.js"></script>
</header>

<main>
  <div class="container" style="min-height:100svh">



    <div class="mt-5"></div>
    <?php

    
    global $loggedIn;
    if (isset($_SESSION["username"])) {
      $loggedIn = true;
    } else {
      $loggedIn = false;
    }


    $mysqli = new mysqli("localhost", "root", "", "webshop");
    if ($mysqli->connect_errno) {
      die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }
    $sql = "SELECT * FROM categorie";
    $result = $mysqli->query($sql);

    //iterate over $result
    
    while ($row = $result->fetch_assoc()) {
      $categorie = $row['categroie_id'];
      echo "<details class='m-3 shadow rounded'>
            <summary class='card-body fs-4'>
              " . $row['name'];

      getSubCategorie($categorie);

      echo "</summary>
          </details>";
    }


    function getSubCategorie($categorie)
    {
      $mysqli = new mysqli("localhost", "root", "", "webshop");
      if ($mysqli->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
      }

      $sql = "SELECT * FROM subcategorie WHERE categroie_id = $categorie";
      $result = $mysqli->query($sql);

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

      $sql = "SELECT * FROM products WHERE subcategorie_id = $subCategorie";
      $result = $mysqli->query($sql);

      //iterate over $result
    
      while ($row = $result->fetch_assoc()) {
        echo "<div class='card shadow p-3 mb-5 bg-white rounded' >
                <div class='card-body'>
                <img src='" . $row['images'] . "' class='card-img-top img-fluid' style='max-height: 20vh; object-fit:contain;'>
                  <h5 class='card-title'>" . $row['name'] . "</h5>
                  
                  
                  <p class='card-text '>" . $row['description'] . "</p>
                    <p class='card-text'>" . $row['price'] . "€</p>";
        if ($GLOBALS['loggedIn']) {
          echo "<form method='POST' action='../php/scripts/addToCartScript.php'>
                  <input type='submit' name='add-to-cart' value='Zum Warenkorb hinzufügen' class='btn btn-primary'>
                  <input type='hidden' name='products_id' value='" . $row['products_id'] . "'>
                </form> </div>
                </div>";
        } else
        //TODO: Link zu Login Seite MIT ID des Produkts oder wieder zurück zur Seite mit dem Produkt  
        echo
           "<a href='../php/login.php' class='btn btn-primary'>Zum Warenkorb hinzufügen (Login)</a>

                </div>
              </div>";

      }
    }
    ?>


  </div>
</main>


<?php include_once '../html/footer.html' ?>