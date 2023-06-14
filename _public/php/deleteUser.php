<?php include_once 'header.php';

// Check if user is still logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
} ?>

<?php include_once '../html/deleteUser.html' ?>
<?php include_once '../html/footer.html' ?>