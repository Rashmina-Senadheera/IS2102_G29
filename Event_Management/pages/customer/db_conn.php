<?php

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "eventra";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}

define('STRIPE_API_KEY', 'sk_test_51N7vTMSGWwdlEMD2cqWisd3G2XwahZamsM6H9RGMA8Tmna054382Hr70Ny0hK1kImoWqx3LKyeTpki7l4ahBhVSp00rCZbg7xc'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51N7vTMSGWwdlEMD2DfdL2mnkHPY8akHYJgw22ABkdPXSLHmT0Zffl7R2UkmHSHsHe7I73JhfZmEvCupXl7udrG9K005IulF7mY'); 
define('STRIPE_SUCCESS_URL', 'http://localhost/e/IS2102_G29/Event_Management/pages/payment/payment-success.php'); //Payment success URL 
define('STRIPE_CANCEL_URL', 'http://localhost/stripe/stripe/payment-cancel.php'); //Payment cancel URL

