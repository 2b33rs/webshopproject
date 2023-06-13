<!doctype html>
<html lang="de">

<?php
session_start();

if (isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp'] > 600)) {
    session_unset();
    session_destroy();
}

$_SESSION['timestamp'] = time();

include_once '../html/head.html';
?>


<body>
    <header class="header-main bg-dark sticky-top shadow-lg mb-5" style="min-height: 7svh;">
        <div class="container ">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
                <a href="./index.php"><img class="logo" src="../images/logo.png" alt="Fehler" height="80vh"></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul id="nav_1" class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="products.php">Produkte</a></li>
                        <li class="nav-item"><a class="nav-link" href="impressum.php">Impressum</a></li>

                        <?php

                        if (isset($_SESSION['username'])) {
                            echo '<li class="nav-item"><a class="nav-link" href="cart.php">Warenkorb von ' . $_SESSION["username"] . '</a></li>';

                        }
                        ?>

                    </ul>
                    <ul id="nav_2" class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="search.php"><i class="bi bi-search"></i>
                                Suche</a> </li>

                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo '<li class="nav-item"><a class="nav-link" href="login.php"><i class="bi bi-person-fill"></i> Login</a></li>';

                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="scripts/logout.php"><i class="bi bi-box-arrow-right"></i>Logout</a></li>';
                            echo '  <li class="nav-item">
                                        <div class="dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-gear"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">                                                
                                                <li><a class="dropdown-item" href="userInformation.php">Persönliche Informationen</a></li>
                                                <li><a class="dropdown-item" href="./scripts/logout.php">Logout</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="./scripts/deleteUser">Konto löschen</a></li>
                                            </ul>
                                        </div>
                                    </li>';
                            //echo '<li class="nav-item"><a class="nav-link" href="login.php"><i class="bi bi-person-fill-gear">Settings</i>';
                        
                            //<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            //        Dropdown button
                            //    </button>
                        }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>