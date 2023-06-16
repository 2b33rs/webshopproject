<?php include_once 'header.php' ?>
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
    if (isset($_GET['searchterm'])) {
      $input = $_GET['searchterm'];

      //Preparing for SQL-Injection
      $input = trim($input); // Leerzeichen werden entfernt
      $blacklist = array("DROP", "DELETE", "UPDATE", "*" , "<", ">", "&", "`", "$", "!", "|", "OR 1=1", "--", ";","%"); // Unerwünschte Wörter
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
      
      if($result->num_rows == 0){
        echo "<div class=' shadow p-3 mb-5 bg-white rounded' >
      <h5 class='card-title'><i class='bi bi-emoji-frown'></i> Es konten keine Ergebnisse für <i>'$searchterm'</i> gefunden werden.</h5>
      </div>";}

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
            "<a href='php/login.php' class='btn btn-primary'>Zum Warenkorb hinzufügen (Login)</a>
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

  </div>
</main>
<?php include_once '../html/footer.html' ?>