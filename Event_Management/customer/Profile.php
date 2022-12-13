<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');

// if (isset($_SESSION['fname'])){
//     header("location:./profile.php");
//     }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/navigationBar.css">
       <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>

<body>
<div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
            <div class="page-title"> Profile Details</div>
                <div class="input-container">
                </div>
            </div>
        </div>    

        <div class="gridMain">
            <div class="profile">
                <div class="row paddingLeft-2">
                    <div class="container rounded bg-white mt-5 mb-5">
         <div class="row">
           <div class="col-md-3 border-right">


              <span> </span>
            </div> </div> <div class="col-md-5 border-right"> 
              <div class="p-3 py-5"> 

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
                    </div> 
                       
                     </div> 
                  </div>
                 </div>
                 
                  <div class="col-md-4">
                     <div class="p-3 py-5">
                       <div class="d-flex justify-content-between align-items-center experience">
                        <fieldset>
                          <p>Upload File</p>
                          <input type="file" id="file" required class="form-control">
                      </fieldset>  </div>
                      <br> 
                      
                <button type="submit" class="srcButton">Update</button> 
                    </div>
                   </div> 
                  </div>
</div>
</div>
</div>

</body>

</html>
