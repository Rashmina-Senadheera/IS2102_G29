<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body class="sign_body font-poppins">
    <div class="box center">
        <div class="off-white-box signup_image">
            
            <div class="white-box signup_form">
                <img src="images/logo.png" class="logo">
                   <p class="heading">Welcome!</p> 
                   <hr class="hr1">
                <div class = "error margin-left-60">
                <?php 
                 if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                 }
                ?>
                </div>
                
                <form>
                        <div class="info-box">
                            <div class="details_box flex-row">
                                <span class="details">Full Name</span>
                                <input type="text" placeholder="Enter Your Name" required>
                            </div>
                            <div class="details_box flex-row">
                                <span class="details">Password</span>
                                <input type="password" placeholder="Enter Your Name" required>
                            </div>
                            <div class="details_box flex-row">
                                <span class="details">Email</span>
                                <input type="text" placeholder="Enter Your Name" required>
                            </div>
                            
                            <div class="details_box  flex-row">
                                <span class="details">Phone Number</span>
                                <input type="text" placeholder="Enter Your Name" required>
                            </div>
                            <div class="details_box  flex-row">
                                <span class="details">Address</span>
                                <input type="text" placeholder="Enter Your Name" required>
                            </div>
                        </div>
                        <input type="submit" value="Create Account" class="add-btn">
                    </form> 
                </form>
                
                
                    
                 </div>
            </div>
        </div>
    </div>

</body>
</html>