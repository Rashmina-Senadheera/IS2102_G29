<?php
// Autoloader
if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
    require_once(__DIR__ . '/../../vendor/autoload.php');
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->safeLoad();

// send email
// function sendEmailOTP()
function sendEmailOTP($to, $name, $otp)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['EMAIL'];                         //SMTP username
        $mail->Password   = $_ENV['APP_PASSWORD'];                  //SMTP password
        $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($_ENV['EMAIL'], 'Eventra');
        $mail->addAddress($to, $name);              //Add a recipient. Name is optional
        $mail->addReplyTo($_ENV['EMAIL'], 'Eventra');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');            //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       //Optional name

        //Content
        $mail->isHTML(true);                                    //Set email format to HTML
        $mail->Subject = 'OTP for EVENTRA registration confirmation';
        $mail->Body    = 'Dear ' . $name . ', Thank you for registering with EVENTRA! <br/> Your OTP is <b>' . $otp . '</b>. To finalize your registration, please enter the above code in your registration window. <br/>Thank you! <br/>Eventra Team';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->SMTPDebug  = SMTP::DEBUG_OFF; //Disable SMTP debug output
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// send email
function sendEmail($to, $name, $subject, $message)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['EMAIL'];                         //SMTP username
        $mail->Password   = $_ENV['APP_PASSWORD'];                  //SMTP password
        $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($_ENV['EMAIL'], 'Eventra');
        $mail->addAddress($to, $name);              //Add a recipient. Name is optional
        $mail->addReplyTo($_ENV['EMAIL'], 'Eventra');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');            //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       //Optional name

        //Content
        $mail->isHTML(true);                                    //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->SMTPDebug  = SMTP::DEBUG_OFF; //Disable SMTP debug output
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function showSessionMessage($type)
{
    if (isset($_SESSION[$type])) {
        $tempErr = $_SESSION[$type];
        unset($_SESSION[$type]);
        return $tempErr;
    }
}

// remove white spaces and unwanted special characters
function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// format currency
function formatCurrency($number)
{
    return number_format($number, 2, '.', ',');
}

// format date
function formatDate($date)
{
    return date('d M Y', strtotime($date));
}

// format date
function formatDateTime($date)
{
    return date('d M Y h:i A', strtotime($date));
}

// format date
function formatTime($date)
{
    return date('H:i', strtotime($date));
}

// format date
function formatDateDefault($date)
{
    return date('Y-m-d', strtotime($date));
}

// Show supplier type
function showSupType($type)
{
    switch ($type) {
        case 'deco':
            return "Decorations";
        case 'ent':
            return "Entertainment";
        case 'florist':
            return "Floral Decorations";
        case 'foodbev':
            return "Food & Beverages";
        case 'light':
            return "Light Decorations";
        case 'photo':
            return "Photography";
        case 'sound':
            return "Sounds";
        case 'transport':
            return "Transport";
        case 'venue':
            return "Venue";
        case 'other':
            return "Other";
        default:
            return $type;
    }
}

// Calculate time difference
function timeDiff($start, $end)
{
    try {
        $start = strtotime($start);
        $end = strtotime($end);
        $diff = $end - $start;
        // convert to hours and round up to upper integer
        $diff = ceil($diff / 3600);
        return $diff;
    } catch (Exception $e) {
        return 0;
    }
}
