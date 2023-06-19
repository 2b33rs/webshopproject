<!doctype html>
<html lang="de">

<?php
session_start();

if (isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp'] > 600)) {
    session_unset();
    session_destroy();
} else {
    $_SESSION['timestamp'] = time();

}


//Get the number of items in the cart
//include_once 'scripts/countItemInCart.php';     --> Funktioniert nicht, ergebnis bleibt dann 1
function getCartItemCount()
{
    if (!isset($_SESSION["user_id"])) {
        return 0;
    } else {
        $mysqli = new mysqli("localhost", "root", "", "webshop");
        if ($mysqli->connect_error) {
            die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
        }

        $sql = "SELECT cart_id FROM cart WHERE user_id = ?";
        $statement = $mysqli->prepare($sql);
        $statement->bind_param("i", $_SESSION["user_id"]);
        $statement->execute();
        $result = $statement->get_result();
        $statement->close();

        if ($row = $result->fetch_assoc()) {
            $cart_id = $row["cart_id"];
            $sql = "SELECT count(*) from cart_products where cart_id = ?";
            $statement = $mysqli->prepare($sql);
            $statement->bind_param("i", $cart_id);
            $statement->execute();
            $result = $statement->get_result();
            $statement->close();
            $mysqli->close();
            $row = $result->fetch_assoc();
            return $row["count(*)"];

        } else {
            return 0;
        }

    }

}




$ItemsInCart = getCartItemCount();
//$_SESSION['timestamp'] = time();

//include_once '../html/head.html';
?>
<?php include_once '../html/head.html'; ?>

<body>
    <header class="header-main bg-dark sticky-top shadow-lg mb-5">
        <div class="container ">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
                <a href="php/index.php"><img class="logo" src="images/logo.png" alt="Fehler" height="80vh"></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul id="nav_1" class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="php/index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="php/products.php">Produkte</a></li>
                        <li class="nav-item"><a class="nav-link" href="php/impressum.php">Impressum</a></li>

                        <?php

                        if (isset($_SESSION['username'])) {
                            echo '<li class="nav-item"><a class="nav-link position-relative" href="php/redirections/redirectCard.php">Warenkorb von ' . $_SESSION["username"] . ' 
                            <span class="position-absolute top-0 start-99 badge rounded-pill bg-primary" id="itemsInCartCounter">' . $ItemsInCart . '</span></a></li>';

                        }
                        ?>

                    </ul>
                    <ul id="nav_2" class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="php/search.php"><i class="bi bi-search"></i>
                                Suche</a> </li>

                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo '<li class="nav-item"><a class="nav-link" href="php/login.php"><i class="bi bi-person-fill"></i> Login</a></li>';

                        } else {
                            include_once '../html/codeSnipets/headerLogout.html';
                        }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>