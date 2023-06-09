<?php

/*Versuch:
-Session starten
-Werte aus der Session in die Felder schreiben
-im IF müssen dann die Session variablen gesetzt werden
*/

session_start();
echo 'document.getElementById("username").value = "<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ""; ?>"';
echo 'document.getElementById("name").value = "<?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : ""; ?>"';
echo 'document.getElementById("firstname").value = "<?php echo isset($_SESSION["firstname"]) ? $_SESSION["firstname"] : ""; ?>"';
echo 'document.getElementById("email").value = "<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : ""; ?>"';
echo 'document.getElementById("address").value = "<?php echo isset($_SESSION["address"]) ? $_SESSION["address"] : ""; ?>"';
echo 'document.getElementById("passwordA").value = "<?php echo isset($_SESSION["passwordA"]) ? $_SESSION["passwordA"] : ""; ?>"';
echo 'document.getElementById("passwordB").value = "<?php echo isset($_SESSION["passwordB"]) ? $_SESSION["passwordB"] : ""; ?>"';


if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["passwordA"];
    $name = $_POST["name"];
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
}

$mysqli = new mysqli("localhost", "root", "", "webshop");
if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}


//Prüfen ob der username bereits vergeben wurde
$sql = "SELECT COUNT(*) from user where username=?";
$statement = $mysqli->prepare($sql);
$statement->bind_param("s", $username);
$statement->execute();
$result = $statement->get_result();

if ($result->num_rows > 0) {
    //echo "User already exists";
    $_SESSION['username'] = $username;
    $_SESSION['name'] = $name;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['email'] = $email;
    $_SESSION['address'] = $address;
    $_SESSION['passwordA'] = $passwordA;
    $_SESSION['passwordB'] = $passwordB;
    echo "<script>document.getElementById('username').value = ''; value = '';</script>";
    header("Location: ../register.php");
} else {
    $sql = "INSERT INTO user (username, password, name, firstname, email, address) VALUES (?, ?, ?, ?, ?, ?)";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("ssssss", $username, $password, $name, $firstname, $email, $address);
    //echo $statement->get_result();

    $statement->execute();

    $result = $statement->get_result();

    echo "User created";
    echo "<br>";
    echo $result;
    $statement->close();
    //redirect to login
    session_unset();
    header("Location: ../login.php");
}






/*
$sql = "INSERT INTO user (username, password, name, firstname, email, address) VALUES (?, ?, ?, ?, ?, ?)";
$statement = $mysqli->prepare($sql);
$statement->bind_param("ssssss", $username, $password, $name, $firstname, $email, $address);
//echo $statement->get_result();

$statement->execute();

$result = $statement->get_result();

if ($result->num_rows > 0) {
    echo "User already exists";
} else {
    echo "User created";
    echo "<br>";
    echo $result;
}
$statement->close();
//redirect to login
header("Location: ../login.php");
*/
?>