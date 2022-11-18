<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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

	<!--  Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			font-family: poppins;
			font-size: 16px;
			color: #fff;
		}

		.form-box {
			background-color: rgba(0, 0, 0, 0.5);
			margin: auto auto;
			padding: 40px;
			border-radius: 5px;
			box-shadow: 0 0 10px #000;
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			width: 500px;
			height: 430px;
		}

		.form-box:before {
			background-image: url("assets/img/back.jpg");
			width: 100%;
			height: 100%;
			background-size: cover;
			content: "";
			position: fixed;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			z-index: -1;
			display: block;
			filter: blur(2px);
		}

		.form-box .header-text {
			font-size: 32px;
			font-weight: 600;
			padding-bottom: 30px;
			text-align: center;
		}

		.form-box input {
			margin: 10px 0px;
			border: none;
			padding: 10px;
			border-radius: 5px;
			width: 100%;
			font-size: 18px;
			font-family: poppins;
		}

		.form-box input[type=checkbox] {
			display: none;
		}

		.form-box label {
			position: relative;
			margin-left: 5px;
			margin-right: 10px;
			top: 5px;
			display: inline-block;
			width: 20px;
			height: 20px;
			cursor: pointer;
		}

		.form-box label:before {
			content: "";
			display: inline-block;
			width: 20px;
			height: 20px;
			border-radius: 5px;
			position: absolute;
			left: 0;
			bottom: 1px;
			background-color: #ddd;
		}

		.form-box input[type=checkbox]:checked+label:before {
			content: "\2713";
			font-size: 20px;
			color: #000;
			text-align: center;
			line-height: 20px;
		}

		.form-box span {
			font-size: 14px;
		}

		.form-box button {
			background-color: #6C006C;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			width: 100%;
			font-size: 18px;
			padding: 10px;
			margin: 20px 0px;
		}

		span a {
			color: #BBB;
		}


		/* ##################### IMPORTANT */
		body {
			/*color: #44444400;  Hide Php error text */
			overflow-y: hidden; /* Hide vertical scrollbar */
			overflow-x: hidden; /* Hide horizontal scrollbar */
		}
		#otherStuff {
			display: inline-block;
			width: 80vw;
			position: absolute;
			top: 380px;
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
	<div class="form-box">
		<div class="header-text">
			Change Password		</div>
		<input type="password" placeholder="Current Password" id="password" required>
		<input type="password" placeholder="New Password" id="password" required>
		<input type="password" placeholder="Confirm Password" id="confirm_password" required>
		<input id="terms" type="checkbox"> <label for="terms"></label>
		<span>
			Agree with
			<a href="#">Terms & Conditions</a>
		</span>
		<button>Change</button>
	</div>
</div>
	


	<script src="change.js"></script>
</body>
</html>
<head>
	
</head>

<body>
	


</body>

</html>