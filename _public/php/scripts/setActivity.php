<?php
include 'logoutScript.php';
function setLogoutCookie()
{
    $time = time();
    $expiryTime = time() + 6; // 10 Minuten in Sekunden
    echo '<p> Time (set): ' . $time . '  </p>';
    echo '<p> ExpiryTime (set): ' . $expiryTime . '  </p>';
    setcookie('logout_time', $expiryTime, 0);
}

function checkLogoutStatus($path_to_login = "../login.php")
{
    $isset = isset($_COOKIE['logout_time']);
    if ($isset) {
        echo '<p> Cookie gesetzt (check) </p>';
    } else {
        echo '<p> Cookie nicht gesetzt (check) </p>';

    }

    if ($isset) {
        $expiryTime = $_COOKIE['logout_time'];
        echo '<p> ExpiryTime: ' . $expiryTime . '  </p>';
        $time = time();
        echo '<p> Time: ' . $time . '  </p>';
        if ($time > $expiryTime) {
            logout($path_to_login);
            exit;
        } else {
            // Benutzer ist noch aktiv, setze den Logout-Cookie neu
            setLogoutCookie();
        }
    }
}


?>