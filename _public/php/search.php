<?php include_once 'header.php' ?>

<head>
  <script src="JavaScript/products.js"></script>
</head>

<main>
  <div class="container">


    <!-- Suche -->
    <div class="card-body">
      <h1 class="fw-bold pt-3 pt-xl-5 pb-2 pb-xl-3">Suche</h1>

      <form class="row g-3" action="php/search.php" method="GET">
        <div class="col-auto">
          <input class="form-control-lg" type="text" id="searchterm" name="searchterm" autofocus autocomplete="on"
            tabindex="1" placeholder="Suche...">

        </div>
        <div class="col-auto">
          <button class="btn-lg btn-primary" type="submit" name="submit" value="Suche" tabindex="3">Suchen</button>
        </div>
      </form>
    </div>

    <?php

    $input = "";
    $searchterm = "";
    if (isset($_GET['searchterm'])) {
      $input = $_GET['searchterm'];

      //Preparing for SQL-Injection
      $input = trim($input); // Leerzeichen werden entfernt
      $blacklist = array("DROP", "DELETE", "UPDATE", "*", "<", ">", "&", "`", "$", "!", "|", "OR 1=1", "--", ";", "%"); // Unerwünschte Wörter
      $input = str_ireplace($blacklist, "", $input); // Unerwünschte Wörter werden entfernt
      $input = htmlspecialchars($input); // HTML-Code wird in Zeichen umgewandelt
      $searchterm = $input;

    }
    //TODO: wofür ist das globale loggedIn?
    if (!($searchterm == "")) {
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
      $searchterm = mysqli_real_escape_string($mysqli, $searchterm);
      $likeSearchterm = "%" . $searchterm . "%";
      $sql = "SELECT * FROM products WHERE name LIKE ? OR description LIKE ?";
      $statement = $mysqli->prepare($sql);
      $statement->bind_param("ss", $likeSearchterm, $likeSearchterm);
      $statement->execute();
      $result = $statement->get_result();
      $statement->close();
      $mysqli->close();

      //Wenn keine Ergebnisse gefunden wurden soll angezeigtwerden das es keine gab:
    
      if ($result->num_rows == 0) {
        echo "<div class=' shadow p-3 mb-5 bg-white rounded' >
      <h5 class='card-title'><i class='bi bi-emoji-frown'></i> Es konten keine Ergebnisse für <i>'$searchterm'</i> gefunden werden.</h5>
      </div>";
      }

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


    } else {
      echo "<div class=' shadow p-3 mb-5 bg-white rounded' >
      
      <h5 class='card-title'><i class='bi bi-emoji-frown'></i> Bitte gebe einen Suchbegriff ein.</h5>
      </div>";
    }
    ?>

    <!-- Toast -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3 m-3">
      <div id="liveToast" class="toast align-items-center bg-success" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body text-white"><i class="bi bi-check-lg text-white"></i>
            Artikel wurde zum Warenkorb hinzugefügt.
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
            aria-label="Close"></button>
        </div>
      </div>
    </div>


  </div>
</main>
<?php include_once '../html/footer.html' ?>