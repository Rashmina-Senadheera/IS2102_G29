<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>EVENTRA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!---- CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
 .p{
 font-size: 14px;
 margin: 15px 0;
 display: inline-block;
 color: rgb(0, 0, 0);
 padding: 5px 20px;

 }
        .inner {
            height: 120%;
            width: 70%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 10px 10px 68px -6px rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: space-between;
        }

        .photo {
            width: 50%;
            height: 100%;
            padding: 0 50px;
        }

        .photo img {
            width: 100%;
            height: 100%;

        }

        .user-form {
            background: #eb69eb;
            padding: 50px;
            width: 50%;
            height: 100%;
            border-radius: 0px 5px 5px 0px;
        }

        .user-form h1 {
            color: rgb(0, 0, 0);
            padding: 30px 0;
            margin: 10px;
        }

        input {
            width: 10%;
            border-radius: 30px;
            border: none;
            height: 1.5em;
            font-size: 15px;
            margin: 10px 0;
            padding: 0 30px;
            height:40px;
        }

        .line {
            height: 6px;
            border-radius: 20px;
            width: 20%;
            background: #fff;
            margin: 5px;
        }



        .action-btn {
            width: 100%;
            display: flex;
            margin: 30px 0;
        }

        .btn {
            border: 1px solid #6C006C;
            color: rgb(3, 3, 3);
            padding: 10px;
            background-color: #6C006C;
            border-radius: 20px;
            width: 50%;
            margin: 0 10px;
            cursor: pointer;
            font-size: 16px;
            
        }

        .btn:hover {
            color: #ffffff;
            background-color: #6C006C;
            border: 1px solid #6C006C;
        }


        @media(max-width: 665px) {
            .photo {
                display: none;
            }

            .user-form {
                width: 100%;
                border-radius: 10px;
            }
        }

        @media screen and (max-width: 990px) and (min-width: 665px) {
            .action-btn {
                margin: 5px;
                display: block;
                width: 100%;
            }

            .btn {
                width: 100%;
                margin: 5px;
                padding: 5px;
            }
        }
    </style>

</head>

<body>


<!--Include nav bar-->
<?php session_start();
    if (isset($_SESSION["username"])  ) {?>
      <?php include('Dynamicnavbar.php') ?>
      <?php } 
    else {?> 
      <?php include('Staticnavbar.php') ?>           
<?php    }?>
<!--End include nav bar-->

   
        <div class="inner ">
            <div class="photo no-gutters">
                <img src="assets/img/undraw_customer_survey_re_v9cj.svg" alt="">
            </div>

            <div class="user-form">
                <br>
                <br>
                <br>
                 <br>

                <form class="px-md-2" 
                action="php/signup.php" 
                method="post"
                enctype="multipart/form-data">
  
              <h4  style="font-family:'Poppins'">Register Here!</h4><br>
              <?php if(isset($_GET['error'])){ ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
              </div>
              <?php } ?>
  
              <?php if(isset($_GET['success'])){ ?>
              <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
              </div>
              <?php } ?>
            <div class="col-md-12">
              <label class="form-label" style="font-family:'Poppins'">Full Name</label>
              <input type="text" 
                     class="form-control"
                     name="fname"
                     value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">
            </div>
  
            <div class="col-md-12">
              <label class="form-label" style="font-family:'Poppins'">Email</label>
              <input type="text" 
                     class="form-control"
                     name="uname"
                     value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
            </div>
            
  
            <div class="col-md-12">
              <label class="form-label" style="font-family:'Poppins'">Password</label>
              <input type="password" 
                     class="form-control"
                     name="pass"
                     id="password"
                     onchange="validatePassword()"
                     >
            </div>
  
            <div class="col-md-12">

                
              <label class="form-label" style="font-family:'Poppins'">Confirm Password</label>
              <input type="password" 
                     class="form-control"
                     name="conpass"
                     id="confirm_password"
                     onchange="validatePassword()"
                     >
                     <h6 id="errConfirmPW" ></h6>
            </div>
  
            <div class="col-md-12">
              <label class="form-label" style="font-family:'Poppins'">Telephone</label>
              <input type="text" 
                     class="form-control"
                     name="tel"
                     value="<?php echo(isset($_GET['tel']))?$_GET['tel']:""?>">
            </div>
            
            <button type="submit" class="btn btn-primary" style="font-family:'Poppins'">Sign Up</button>
            
          </form>

                    </div>
                    <br>


                </form>

                <br>
            </div>

        </div>
   <script src="cus_reg.js"></script>

   <script>
  // var password = document.getElementById("password"); 
  // var confirm_password = document.getElementById("confirm_password"); 

function validatePassword(){
    console.log('hello')
    let password = $('#password').val();
    let confirm_password =  $('#confirm_password').val();

 if(password != confirm_password) {
    
    $('#errConfirmPW').text("Passwords Don't Match");
    //confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    $('#errConfirmPW').text("");
    //confirm_password.setCustomValidity('');
  }
}

//password.onchange = validatePassword();
//confirm_password.onkeyup = validatePassword();</script>
</body>

</html>