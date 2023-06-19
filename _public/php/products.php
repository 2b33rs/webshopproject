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
      if ($mysqli->connect_error) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
      }

      $sql = "SELECT * FROM products WHERE subcategorie_id = ?";
      $statement = $mysqli->prepare($sql);
      $statement->bind_param("i", $subCategorie);
      $statement->execute();
      $result = $statement->get_result();
      $statement->close();
      $mysqli->close();


      //iterate over $result with ajax!
      while ($row = $result->fetch_assoc()) {
        echo "<div class='card shadow p-3 my-4 bg-white rounded' >
              <div class='row'>
                <div class='card-body col-md-8'>
                  <h5 class='card-title'>" . $row['name'] . "</h5>
                  <p class='card-text '>" . $row['description'] . "</p>
                  <p class='card-text'>" . $row['price'] . "€</p>";

        if ($GLOBALS['loggedIn']) {
          echo '    <button onclick="addToCart(' . $row['products_id'] . ')" class="btn btn-primary">Zum Warenkorb hinzufügen</button>';
        } else {
          echo "       <a href='php/login.php' class='btn btn-primary'>Zum Warenkorb hinzufügen (Login)</a>";
        }

        echo "</div>
                <div class='col-md-4'>
                  <img src='" . $row['images'] . "' class='img-fluid produkt-images'>
                </div>
              </div>
            </div>";

      }
    }
    ?>

    <!-- Toast -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3 m-3">
      <div id="liveToast" class="toast align-items-center bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body text-white"><i class="bi bi-check-lg text-white"></i>
            Artikel wurde zum Warenkorb hinzugefügt.
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>

  </div>
</main>


<?php include_once '../html/footer.html' ?>