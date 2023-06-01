<?php 
/* 
 * PayPal and database configuration 
 */ 
  
// PayPal configuration 
define('PAYPAL_ID', 'Insert_PayPal_Business_Email'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'http://www.example.com/success.php'); 
define('PAYPAL_CANCEL_URL', 'http://www.example.com/cancel.php'); 
define('PAYPAL_NOTIFY_URL', 'http://www.example.com/ipn.php'); 
define('PAYPAL_CURRENCY', 'USD'); 
 
// Database configuration 
define('DB_HOST', 'MySQL_Database_Host'); 
define('DB_USERNAME', 'MySQL_Database_Username'); 
define('DB_PASSWORD', 'MySQL_Database_Password'); 
define('DB_NAME', 'MySQL_Database_Name'); 
 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");
