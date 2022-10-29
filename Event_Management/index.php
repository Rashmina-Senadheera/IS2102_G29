<?php
include('constants.php');
$emailerr =$pwderr="";
$email = $password=$error="";
if(isset($_POST['login'])){
   
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
        

    $sql = "SELECT * FROM tbl_admin WHERE username='$email' AND password='$password'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);

    if($count == 1){
        $_SESSION['login'] = "Login Successful";
        $_SESSION['user'] = "$email";
        header('location:'.SITEURL.'admin.php');
    }
    else {
        $error = "Username or Password is incorrect";
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
<body>
    <div class="box center">
        <div class="off-white-box">
            <img src="images/admin.png" class="admin_img">
            <div class="white-box">
                <img src="images/logo.png" class="logo">
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
                    <input type="text" name="email" >
                    <?php echo $emailerr; ?> 
                    <br><br>
                    Password: <br>
                    <input type="password" name="pwd">
                    <?php echo $pwderr; ?>
                    <br><br>
                    <span class="error"> <?php echo $error; ?> </span>
                    <br>
                    <input type="submit" name="login" value="Login" >
                    
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php


?>

