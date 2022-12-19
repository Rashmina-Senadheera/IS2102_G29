<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
// if (isset($_SESSION['fname'])){
//     header("location:./home.php");
//     }


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/Custcss2.css">
</head>

<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Pay Now! </div>
                <div class="input-container">
                </div>
            </div>
        </div>
        <!--<div class="gridMain">-->
        <div class="other">
                <div class="info">
                    <div class="personal-info">
            
                    <form method="post" action="./php/paymentbackend.php">
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['error']; ?>
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['success']; ?>
                            </div>
                        <?php } ?>

                        <div >

                        <div >

                            </div>

                            <center>Name:&nbsp;&nbsp;<center>
                            <div ><center><input type="name" class="form-control" placeholder="Event Planner's name"  name="name" style="width:400px;" value="<?php echo (isset($_GET['uname'])) ? $_GET['uname'] : "" ?>" required></div>
                        </div><br>
                        <div>
                        <center>Email Address:&nbsp;&nbsp;<center>
                            <div ><center><input type="email" class="form-control" placeholder="Event Planner's email" name="email" style="width:400px;" value="<?php echo (isset($_GET['email'])) ? $_GET['email'] : "" ?>" required></div>
                        </div>
                </div>

                
                <div >
                <center> Account Number:&nbsp;&nbsp;
                    <div ><center><input type="number" class="form-control" placeholder="Account Number" name="account" style="width:200px;" value="<?php echo (isset($_GET['account'])) ? $_GET['account'] : "" ?>" required></div>
                </div>
           <br>
            <div >
            <center>Date:&nbsp;&nbsp;
                <div ><center><input type="date" class="form-control" placeholder="" name="date" style="width:200px;" value="<?php echo (isset($_GET['date'])) ? $_GET['date'] : "" ?>" required>
                </div>
            </div><br>
            <div >
            <center>Amount:&nbsp;&nbsp;
                <div><center><input type="number" class="form-control" placeholder="Amount" name="ammount" style="width:200px;" value="<?php echo (isset($_GET['ammount'])) ? $_GET['ammount'] : "" ?>" required>
                </div></center>
            </div>
            <br>
            <center><div><button type="submit" class="srcButton">Pay Now</button></div><br >
            </form>
             <a href=<?php echo  'http://localhost:8080/Event_Management002/customer/ViewPayments.php'  ?>><button type="submit" class="srcButton" >View Payments</button></a></center><br />
        </div>

    </div>
    </div>
    </div>

</body>

</html>