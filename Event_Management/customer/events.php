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

  <!-- CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
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
			top: 10px;
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
  <main id="main">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
    <h2>Events</h2>
    <p>EHave the best experiences with us and make your day memorable</p>
  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Events Section ======= -->
<section id="events" class="events">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-md-6 d-flex align-items-stretch">
        <div class="card">
          <div class="card-img">
            <img src="assets/img/events-1.jpg" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Out Door(A)</h5>
            <p class="fst-italic text-center">Weeendand Week Days we are open</p>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 d-flex align-items-stretch">
        <div class="card">
          <div class="card-img">
            <img src="assets/img/events-2.jpg" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Out Door(B)</h5>
            <p class="fst-italic text-center">Weendand Week Days we are open </p>
            <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
          </div>
        </div>

      </div>
    </div>

  </div>
</section><!-- End Events Section -->

</main><!-- End #main -->
  </div>






  <!-- ======= Footer ======= -->
 <!-- End Footer -->
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!--  Main JS File -->
  <script src="assets/js/main.js"></script>




</div>
</body>

</html>