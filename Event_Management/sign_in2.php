<?php
include('constants.php');
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
    <div class="box">
        <div class="image-box">
            <img src="images/Login-2.svg" class="sign_in_logo" />
        </div>
        <div class="white-box">
            <p class="heading">Sign In</p>
            <form class="login-form">
                <div class="input">
                    <input type="text" class="input-field" required />
                    <label class="input-label">Email</label>
                </div>
                <div class="input">
                    <input type="password" class="input-field" required />
                    <label class="input-label">Password</label>
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

</body>

</html>
<?php


?>