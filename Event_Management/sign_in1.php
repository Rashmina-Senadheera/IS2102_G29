<?php
include('constants.php');
include('Event_Planner/eventplanner_header.php');
include('Event_Planner/controllers/commonFunctions.php');

// define variables and set to empty values
$email = $password = "";

// check user already logged in
if (isset($_SESSION['role']) && isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
    header("location: location_check.php");
} else {
    unset($_SESSION['role']);
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
}

// check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = checkInput($_POST["email"]);
    $password = checkInput($_POST["password"]);
    unset($_SESSION['userStatus']);

    // check if email and password empty
    if (empty($email)) {
        $_SESSION['error-email'] = "Email is required";
    }
    if (empty($password)) {
        $_SESSION['error-password'] = "Password is required";
    }

    // check email in the database
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $db_password = $row['password'];

        // check password
        if (password_verify($password, $db_password)) {
            // set session variables
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['user_name'] = $row['name'];

            $userStatus = $row['email_verified'];
            if ($userStatus == '0') {
                $_SESSION['userStatus'] = $userStatus;
                $_SESSION['email'] = $email;
                $_SESSION['from_page'] = 'signin';
                unset($_SESSION['otp']);
                header("location: ./Event_Planner/email_verification.php");
            } else {
                // redirect to the relevant page
                header("location: location_check.php");
            }
        } else {
            $_SESSION['error'] = "Incorrect password";
            $_SESSION['email'] = $email;
        }
    } else {
        $_SESSION['error'] = "Email not found!";
        $_SESSION['email'] = $email;
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/sign_in2.css">
    <link rel="stylesheet" href="./css/navigationBar.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <!-- Show success message -->
    <div class="success-message">
        <?php echo showSessionMessage('success'); ?>
    </div>
    <div class="loginbody">
        <div class="box" id='sign-up-s'>
            <div class="image-box">
                <img src="images/Events.png" class="sign_in_logo" />
            </div>
            <div class="white-box">
                <p class="heading">Sign Up</p>
                <!-- Show errors -->
                <div class="signinTopError"><?php echo showSessionMessage('error') ?></div>
                
                <div class="select_register">
                    <span class="register_as">
                        Register as,
                    </span>
                    <span class="btn btn_register select_customer">
                        <img src="images/customer.png">
                        <a href="customer/register.php">Customer</a>
                    </span>
                    <span class="btn btn_register select_event_planner">
                        <img src="images/event_planner.png">
                        <a href="event_planner/sign_up_form.php">Event Planner</a>
                    </span>
                    <span class="btn btn_register select_supplier">
                        <img src="images/supplier.png">
                        <a href="supplier/pages/sign_up.php">Supplier</a>
                    </span>
                    <span class="sign_in_txt">
                    Already have an account?
                    <a href="index.php">Sign In</a>
                    </span>
                 </div>
            </div>
        </div>
    </div>

</body>

</html>