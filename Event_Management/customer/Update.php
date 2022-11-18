<?php 
session_start();
?>
<!DOCTYPE html>
<html>
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

  
    <!--Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    

  <style>
    body
    {
      background: rgb(99, 39, 120)
    }
    .form-control:focus
    {
      box-shadow: none;border-color: #BA68C8
    }
    .profile-button
    {
      background: rgb(99, 39, 120);box-shadow: none;border: none
    }
    .profile-button:hover
    {
      background: #682773
    }
    .profile-button:focus
    {
      background: #682773;box-shadow: none
    }
    .profile-button:active
    {
      background: #682773;box-shadow: none
    }
    .back:hover
    {
      color: #682773;cursor: pointer
    }
    .labels
    {
      font-size: 11px
    }

    .add-experience:hover
    {
      background: #BA68C8;color: #fff;cursor: pointer;border: solid 1px #BA68C8
    }

    /* ##################### IMPORTANT */
      body {
        color: #44444400; /* Hide Php error text */
        overflow-y: hidden; /* Hide vertical scrollbar */
        overflow-x: hidden; /* Hide horizontal scrollbar */
      }
      #otherStuff {
        display: inline-block;
        width: 80vw;
        position: absolute;
        top: 98px;
        left: 260px;
      }
      h4, label, p {
        color:#444444;
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
            <br><br><br><br>
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
        <div class="container rounded bg-white mt-5 mb-5">
          <div class="row">
            <div class="col-md-3 border-right">
              <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <img src="upload/<?=$_SESSION['pp']?>"
                  class="img-fluid rounded-circle">

                <span> </span>
              </div> </div> <div class="col-md-5 border-right"> 
                <div class="p-3 py-5"> 
                  <div class="d-flex justify-content-between align-items-center mb-3"> 
                    <h4 class="text-right">Profile Settings</h4>
                  </div> 
                  <div class="row mt-3"> 
                    <div class="col-md-12">
                      <label class="labels">Name</label>
                      <input type="text" class="form-control" placeholder="first name" value="<?=$_SESSION['fname']?>">
                    
                    </div>
                    
                    </div> 
                    <div class="row mt-3"> 
                      <div class="col-md-12">
                        <label class="labels">Email Address</label>
                        <input type="text" class="form-control" placeholder="Enter Email Address" value="<?=$_SESSION['username']?>">
                        <br>
                        
                      </div>
                    
                      <div class="col-md-12">
                        <label class="labels">Phone Number</label>
                        <input type="text" class="form-control" placeholder="Enter Phone Number" value="<?=$_SESSION['tel']?>">
                        <br>
                        <br>
                      </div> 
                      
                        
                      </div> 
                      
                      <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="button">Update Profile</button>
                      </div> 
                    </div>
                  </div>
                  
                    <div class="col-md-4">
                      <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience">
                          <fieldset><br><br><br><br><br>
                            <p>Upload File</p>
                            <input type="file" id="file" required class="form-control">
                        </fieldset>  </div>
                        <br> 

                      
                        
                  </div>
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>



  <!-- ======= Footer ======= -->
  <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>
</body>  
</html>