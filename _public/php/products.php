
<?php include_once '../php/header.php' ?>
<header>
    <link rel="stylesheet" href="../CSS/products.css">
    <script src="../JavaScript/products.js"></script>
</header>

<main>
    <div class="container" style="min-height:80vh">


    <?php 
        $mysqli = new mysqli("localhost", "root", "", "webshop");
        if ($mysqli->connect_errno) {
            die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
        }
        $sql = "SELECT * FROM categorie";
        $result = $mysqli->query($sql);
        
        //iterate over $result

        while($row = $result->fetch_assoc()) {
            echo "<details class='card'>
            <summary class='card-body display-5'>
              ".$row['name']."
            </summary>
          </details>";
        }
        
    ?>
<!-- 
<details>
    <summary>Ka1</summary>
    <p>Das ist der Inhalt von Ka1</p>
</details> -->



    </div>
</main>


<?php include_once '../html/footer.html' ?>

