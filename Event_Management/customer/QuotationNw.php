<?php 
  if(session_id() == '') {
    // session isn't started
  }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #fae9fb;
  position: relative;
}
body::before{
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  left: 0;
  top: 0;
  background: #ba24c2;
  clip-path: polygon(86% 0, 100% 0, 100% 100%, 60% 100%);
}
.container{
  z-index: 12;
  max-width: 1050px;
  width: 100%;
  background: #fff;
  border-radius: 12px;
  margin: 0 20px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}
.container .content{
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 25px 20px;
}
.content .image-box{
  max-width: 55%;
}
.content .image-box img{
  width: 100%;
}
.content .topic{
  font-size: 22px;
  font-weight: 500;
  color: #ba24c2;
}
.content form{
  width: 40%;
  margin-right: 30px;
}
.content .input-box{
  height: 30px;
  width: 100%;
  margin: 16px 0;
  position: relative;
}
.content .input-box input{
  position: absolute;
  height: 100%;
  width: 100%;
  border-radius: 6px;
  font-size: 16px;
  outline: none;
  padding-left: 16px;
  background: #fae9fb;
  border: 2px solid transparent;
  transition: all 0.3s ease;
}
.content .input-box input:focus,
.content .input-box input:valid{
  border-color: #ba24c2;
  background-color: #fff;
}
.content .input-box label{
  position: absolute;
  left: 18px;
  top: 50%;
  color: #636c72;
  font-size: 15px;
  pointer-events: none;
  transform: translateY(-50%);
  transition: all 0.3s ease;
}
.content .input-box input:focus ~ label,
.content .input-box input:valid ~ label{
  top: 0;
  left: 12px;
  display: 14px;
  color: #ba24c2;
  background: #fff;
}
.content .message-box{
  min-height: 100px;
  position: relative;
}
.content .message-box textarea{
  position: absolute;
  height: 100%;
  width: 100%;
  resize: none;
  background: #fae9fb;
  border: 2px solid transparent;
  border-radius: 6px;
  outline: none;
  
}
.content .message-box textarea:focus{
  border-color: #ba24c2;
  background-color: #fff;
}
.content .message-box label{
  position: absolute;
  font-size: 16px;
  color: #636c72;
  left: 18px;
  top: 6px;
  pointer-events: none;
  transition: all 0.3s ease;
}
.content .message-box textarea:focus ~ label{
  left: 12px;
  top: -10px;
  color: #ba24c2;
  font-size: 14px;
  background: #fff;
}
.content .input-box input[type="submit"]{
  color: #fff;
  background: #ba24c2;
  padding-left: 0;
  font-size: 18px;
  font-weight: 500;
  cursor: pointer;
  letter-spacing: 1px;
  transition: all 0.3s ease;
}
.content .input-box input[type="submit"]:hover{
  background-color: #d43ddb;
}
@media (max-width:1000px) {
  .content .image-box{
    max-width: 70%;
  }
  .content{
    padding: 10px 0;
  }
}
@media (max-width:900px) {
  .content .image-box{
    display: none;
  }
  .content form{
    width: 100%;
    margin-left: 30px;
    margin-top: 30px;
  }
}
.button1 {
  background-color: #ba24c2; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.button1:hover{
  background-color: #e248eb;
  color: white;
}

/* ****************************************************************************************** */
/* ------------------------------------------------------------------- */
#stNBR {
    background-color: white;
    font-family: "Poppins", sans-serif;
    font-size: 15px;
    font-weight: 500;
    color: #490258;
    border: none;
    border-radius: 0;
    display: inline-block;

    max-width: none;
    margin: none;
    box-shadow: none;
}
#stNBR a {
    background-color: white;
    font-family: "Poppins", sans-serif;
    font-size: 15px;
    font-weight: 500;
    color: #490258;
    border: none;
    border-radius: 0;
    padding: 10px 0 10px 0px;
    margin-right: 30px;
}
#stNBR a:hover {
    border-bottom: #490258 2px solid;
}
#eTitle a {
    font-size: 30px;
    margin: 0;
    padding: 0;
    line-height: 1;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-family: "Poppins", sans-serif;
}
#eTitle :hover {
    border: none;
}
#eTitle a:hover {
    border: none;
}

/* ------------------------------------------------------------------- */

#dnNBR {
    background-color: white;
    font-family: "Poppins", sans-serif;
    font-size: 15px;
    font-weight: 500;
    color: #490258;
    border: none;
    border-radius: 0;
    display: inline-block;
}
#dnNBR a {
    background-color: white;
    font-family: "Poppins", sans-serif;
    font-size: 15px;
    font-weight: 500;
    color: #490258;
    border: none;
    border-radius: 0;
    padding: 10px 0 10px 0px;
    margin-right: 30px;
}
#dnNBR a:hover {
    border-bottom: #490258 2px solid;
}
#eTitle a {
    font-size: 30px;
    margin: 0;
    padding: 0;
    line-height: 1;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-family: "Poppins", sans-serif;
}
#eTitle :hover {
    border: none;
}
#eTitle a:hover {
    border: none;
}
/* ------------------------------------------------------------------- */

#dropDownN a {
    border: none;
    padding-left: 20px;;
}
#dropDownN a:hover {
    border: none;
    color: black;
}





/* ****************************************************************************************** */





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
			top: 380px;
			left: 260px;
		}

    body::before {
      height: 115vh;
    }

    #sizeChange1 {
      height : 99vh;
      width : 80vw;
    }
    #sizeChange2 {
      height : 70vh;
      width : 55vw;
    }

    #sideMenu {
    display: inline-block;
    position: absolute;
    top: 45px;
    left: 0px;
    height: 100vh;
    width: 30vw;
}
#otherStuff {
    display: inline-block;
    width: 80vw;
    position: absolute;
    top: 88px;
    left: 343px;
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
<?php
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
    <div id="sizeChange1" class="container">
        <div id="sizeChange2" class="content">
          <div class="image-box">
           <img src="assets/img/undraw_booking_re_gw4j.svg" alt="">
          </div>
          
          <form action="" method="post" role="form" class="php-email-form" class="form-horizontal">
            <br>
            <br>
            <br><br><br><br><br>
            <br><br> <br>
            <center><h3>Quotation</h3></center>
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Event Date:</label>
              <div class="col-sm-12">
                 <input type="date">
                    
              </div>
              <br>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Event type</label>
              <div class="col-sm-10">
                  <select name="cars" id="cars" class="form-control">
                      <option value="5">Select the event type</option>
                      <option value="6">Morning</option>
                      <option value="7">Evening</option>
                      <option value="8">Night</option>
                    </select>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Venue Type</label>
              <div class="col-sm-10">
                  <select name="cars" id="cars" class="form-control">
                      <option value="0">Select the venue type</option>
                      <option value="1">Out Door (A)</option>
                      <option value="2">Out Door(B)</option>
                      <option value="3">In Door(A)</option>
                      <option value="4">In Door(B)</option>
                    </select>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label col-sm-6" for="pwd">Number of participants</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="pwd" placeholder="Number of Tickets">
              </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-6" for="pwd">Time</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" id="pwd" placeholder="Number of Tickets">
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-sm-4" for="email">Caterin Type</label>
                <div class="col-sm-10">
                    <select name="cars" id="caterine" class="form-control">
                        <option value="0">Select the caterin type</option>
                        <option value="9">Buffet</option>
                        <option value="8">Set Meals</option>
                        
                      </select>
                      
                </div>
              </div>
              <br>
              
              
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
             <br>
                <div>
                  <button  type="submit" class="button1 ">Submit</button>
                </div>
               
                </div>
            </div>
             
           
          </form>
            
      </div>
      </div>
    </div>

</div>
</body>
</html>
