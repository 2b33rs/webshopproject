<!--Von Jonas hinzugefügt Test wegen der Zeit-->
<?php 
session_start(); 
if(time()-$_SESSION["timestamp"]>5 || $_SESSION["inactive"] == 2){
    session_destroy();
    header("Location: ../login.php");
    exit();
}
?>
