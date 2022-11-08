<?php
include('constants.php');
$emailerr =$pwderr="";
$email = $password=$error="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
   
    if(empty($_POST['email']))
    {
        $emailerr = "Email is required";
    }
    else{
        $email = mysqli_real_escape_string($conn,$_POST['email']);
    }
    if(empty($_POST['pwd'])){
        $pwderr = "Password is required";
    }
    else{
        $password = mysqli_real_escape_string($conn,$_POST['pwd']);
    }
        

    
    if($emailerr=="" & $pwderr==""){
        $sql = "SELECT * FROM tbl_admin WHERE email='$email' AND password='$password'";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count == 1){
            $_SESSION['login'] = "Login Successful";
            $rows = mysqli_fetch_assoc($res);
            $_SESSION['user'] = $rows['name'];
            header('location:'.SITEURL.'dashboard.php');
        }
        else {
            $error = "Username or Password is incorrect";
        }
    }
    
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
<body class="sign_body">
    <div class="box center">
        <div class="off-white-box">
        <img src="images/logo.png" class="sign_in_logo">
            <div class="white-box">
                
                   <p class="heading">Sign In</p> 
                   <hr class="hr1">
                   <div class = "error margin-left-60">
                <?php 
                 if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                 }
                ?>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="login-form" class="login-form">
                    Email Address: <br />
                    <input type="text" name="email" placeholder="Enter your email" >
                    <span class="error"> <?php echo $emailerr; ?></span> 
                    <br><br>
                    Password: <br>
                    <input type="password" name="pwd" placeholder="Enter your password">
                    <span class="error"><?php echo $pwderr; ?></span>
                    <br><br>
                    <span class="error"> <?php echo $error; ?> </span>
                    <br>
                    <input type="submit" name="login" value="Login" >
                    <br>
                    <span class="sign_up_link">
                    Don't have an account?
                    <a href="sign_up.php">Sign Up</a>
                    </span>
                </form>
                
            </div>
        </div>
    </div>

</body>
</html>
<?php


?>

