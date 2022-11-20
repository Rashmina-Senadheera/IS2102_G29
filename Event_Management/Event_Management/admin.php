
<?php
    include('constants.php');
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-message'] = "Please login to access Admin Panel";
        header('location:'.SITEURL.'index.php');
    }
   
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <div class="box center">
    
        <div class="off-white-box">
        

            <div class="white-box">
                <img src="images/logo.png" class="logo">
                   <p class="heading">Sign In</p> 
                   <hr class="hr1">
                   <?php
            if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
            }
            if(isset($_SESSION['user'])){
                echo $_SESSION['user'];
                unset($_SESSION['user']);
            }
        ?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="login-form" class="login-form">
                    Email Address: <br />
                    <input type="text" name="email" >
                    
                    <br><br>
                    Password: <br>
                    <input type="password" name="pwd">
                    
                    <br><br>
                    <input type="submit" name="login" value="Login" >
                    
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php


?>


