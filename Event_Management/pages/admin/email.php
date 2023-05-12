<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
// include 'PHPMailer/PHPMailerAutoload.php';



function smtpmailer($to,$name,$subject,$message){
    
    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host= 'smtp.gmail.com';
    $mail->SMTPAuth =true;
    $mail-> Username='rashminalasith@gmail.com';
    $mail->Password='qrhiqxyjarxxvcqx';
    // $mail->SMTPSecure ='ssl';
    // $mail->Port =465;
    $mail->SMTPSecure ='tls';
    $mail->Port =587;

    $mail->setFrom('rashminalasith@gmail.com');
    $mail->addAddress($to,$name);
    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body = $message;
    // $mail->SMTPDebug  = SMTP::DEBUG_OFF;
    $mail->send();
    
}

?>