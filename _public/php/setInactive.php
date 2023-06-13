<?php
session_start();
$_SESSION["inactive"] = 1;
header("location: index.php");
?>