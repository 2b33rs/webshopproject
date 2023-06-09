<?php include_once './header.php' ?>
<?php include_once '../html/register.html' ?>
<?php
//$name = $_GET['name'];

$name = "";
if (isset($_GET["name"])) {
	$name = $_GET["name"];
}

echo '<script>';
echo 'document.getElementById("name").value = '.$name;
//echo 'document.getElementById("name").value = "John";'; 
echo '</script>';
?>
<?php include_once '../html/footer.html' ?>