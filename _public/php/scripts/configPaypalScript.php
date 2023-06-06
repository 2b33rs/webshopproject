<?php 
/* 
 * PayPal and database configuration 
 */ 
  
// PayPal configuration 
define('PAYPAL_ID', 'phpwebshop@e-business.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'http://localhost/webshopproject/_public/php/success.php'); 
define('PAYPAL_CANCEL_URL', 'http://localhost/webshopproject/_public/php/cancel.php'); 
define('PAYPAL_NOTIFY_URL', 'http://localhost/webshopproject/_public/php/ipn.php'); 
define('PAYPAL_CURRENCY', 'EUR'); 
 
// Database configuration 
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'webshop'); 
 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");

?>