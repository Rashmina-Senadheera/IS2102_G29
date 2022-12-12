<?php include('../config/constants.php') ?>


<html>
    <head>
        <title>
            Login
        </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1><br />
            <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);

                }
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);

                }
            ?>
            <br />
            <!-- login form -->
            <form action="" method="POST" class="text-center">
                Username:<br />
                <input type="text" name="username" placeholder="Enter Username"><br/> <br />
                Password:<br />
                <input type="password" name="password" placeholder="Enter Password"><br /><br />
                <br />
                
                <input type="submit" name="submit" value="Login" class="btn-add">
                <br />
                <a href="<?php echo SITEURL; ?>" style="float:left" >Home</a>
            </form>
            
        </div>
        
    </body>
</html>
<?php 
    //chech the submit button
if(isset($_POST['submit'])){
    //Process for login
    //get the data from form
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
    
    //sql query to check the username and pwd existance
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'"; 
    //execute tthe query
    $res = mysqli_query($conn,$sql);
    //count rows to check whether the user exists or not 
    $count = mysqli_num_rows($res);

    if($count == 1){
        //user exists
        $_SESSION['login'] = "<div class='success'>Login Successful</div>";
        $_SESSION['user'] = "<div class='admin-name'>$username</div>"; //to check whether the user is logged or not


        //redirect to home page
        header('location:'.SITEURL.'admin/');
    }
    else{
        //User not found
        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match</div>";
        //redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }
}

?>
