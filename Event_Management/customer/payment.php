
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
      <title>EVENTRA</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
    
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
      <!-- Vendor CSS Files -->
      <link href="assets/vendor/aos/aos.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
      <!--  Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet">
    
      <style>
        body {
  background: #BA68C8;
}

.form-control:focus {
  box-shadow: none;
  border-color: #BA68C8;
}

.profile-button {
  background: #BA68C8;
  box-shadow: none;
  border: none;
}

.profile-button:hover {
  background: #682773;
}

.profile-button:focus {
  background: #682773;
  box-shadow: none;
}

.profile-button:active {
  background: #682773;
  box-shadow: none;
}

.back:hover {
  color: #682773;
  cursor: pointer;
}


		/* ##################### IMPORTANT */
		body {
			/*color: #44444400;  Hide Php error text */
			/*overflow-y: hidden;  Hide vertical scrollbar */
			overflow-x: hidden; /* Hide horizontal scrollbar */
		}
		#otherStuff {
			display: inline-block;
			width: 80vw;
			position: absolute;
			top: 120px;
			left: 260px;
		}


	</style>

	<link rel="stylesheet" href="sidenav.css">
  	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="structure.css">



    </head>
    
<body>
    


</div id="parent">
    <div id="navBarinSub">
        <!--Include nav bar-->
      <?php session_start();
          if (isset($_SESSION["username"])  ) {?>
            <?php include('Dynamicnavbar.php') ?>
            <?php } 
          else {?> 
            <?php include('Staticnavbar.php') ?>           
      <?php    }?>
      <!--End include nav bar-->
    </div>


    <div id="sideMenu">
      <div id="sideNavigationBar">
        <!--navigation bar left-->
        <div class="sidebar">
            <div class="logo-details">
                <!-- <i class='bx bxl-c-plus-plus'></i> -->
                <img src="logo-white.svg" alt="logo" />
                <span class="logo_name">Eventra</span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="Update.php">
                        <i class='bx bx-list-ul'></i>
                        <span class="links_name">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="ChangePass.php">
                        <i class='bx bx-list-ul'></i>
                        <span class="links_name">Password</span>
                    </a>
                </li>
                <li>
                    <a href="QuotationNw.php">
                        <i class='bx bx-list-ul'></i>
                        <span class="links_name">Quotations</span>
                    </a>
                </li>
                <li>
                    <a href="events.php">
                        <i class='bx bx-list-ul'></i>
                        <span class="links_name">Events</span>
                    </a>
                </li>
                <li>
                    <a href="payment.php">
                        <i class='bx bx-list-ul'></i>
                        <span class="links_name">Payments</span>
                    </a>
                </li>
                
            </ul>
        </div>
      </div>
    </div>







    <div id="otherStuff">
      <div class="container rounded bg-white ">
        <br><br><center><b>
        <h5><b>Payment Details</b></h5>
    </center>
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://i.imgur.com/0eg0aG0.jpg" width="90"><span class="font-weight-bold">John Doe</span><span class="text-black-50">john_doe12@bbb.com</span><span>United States</span></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                         </div>
                     </div>
                    <div class="row mt-2">
                        Name:
                        <div class="col-md-12"><input type="text" class="form-control" placeholder="Enter your name" value=""></div>
                      </div>
                    <div class="row mt-3">
                        Email Address:
                        <div class="col-md-12"><input type="text" class="form-control" placeholder="Enter your email" value=""></div>
                       </div>
                    <div class="row mt-3">
                        Account Number:
                        <div class="col-md-12"><input type="text" class="form-control" value="" placeholder="Account Number"></div>
                    </div>
                    <div class="row mt-3">
                      Expire Date:
                      <div class="col-md-12"><input type="text" class="form-control" value="" placeholder="Expire Date"></div>
                    </div>
                    <div class="row mt-3">
                      Amount:
                      <div class="col-md-12"><input type="text" class="form-control" value="" placeholder="Amount"></div>
                    </div>
                    <br><br>
                    <div ><button class="btn btn-primary profile-button" type="button">Pay Now</button>&nbsp;</div>
                
                  </div>
            </div>
        </div>
    </div>

    <br>
    <br>
          </div>




</div>

</body>
</html>