<?php include_once 'header.php';

// Check if user is still logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
} ?>

<!-- Main -->
<main>
    <div class="container">
        <?php include_once 'scripts/createCart.php' ?>
    </div>
</main>

<?php include_once '../html/footer.html' ?>