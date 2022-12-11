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

            // redirect to the relevant page
            header("location: location_check.php");
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
        <div class="box">
            <div class="image-box">
                <img src="images/Login-2.svg" class="sign_in_logo" />
            </div>
            <div class="white-box">
                <p class="heading">Sign In</p>
                <!-- Show errors -->
                <div class="signinTopError"><?php echo showSessionMessage('error') ?></div>
                <form class="login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="input">
                        <input type="text" value="<?php
                                                    if (isset($_SESSION['email'])) {
                                                        echo $_SESSION['email'];
                                                        unset($_SESSION['email']);
                                                    }
                                                    ?>" name="email" class="input-field" required />
                        <label class="input-label">Email</label>
                        <div class="signinError"><?php echo showSessionMessage('error-email') ?></div>
                    </div>
                    <div class="input">
                        <input type="password" name="password" class="input-field" required />
                        <label class="input-label">Password</label>
                        <div class="signinError"><?php echo showSessionMessage('error-password') ?></div>
                    </div>
                    <div class="action">
                        <button class="action-button">Sign In</button>
                    </div>
                    <div class="login-card-info">
                        Don't have an account?
                        <a href="sign_up.php">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>