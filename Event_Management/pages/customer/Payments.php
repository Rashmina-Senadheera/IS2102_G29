<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/Custcss2.css">
<style>
    .cards img{
        width: 100px;
    }
    .cards:hover{
        transform: scale(1.1);
        z-index: ;

    }
</style>
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
                            <div ><center><input type="name" class="form-control" placeholder="Event Planner's name"  name="name"  maxlength="30" style="width:300px;" value="<?php echo (isset($_GET['uname'])) ? $_GET['uname'] : "" ?>" required></div>
                        </div><br>
                        <div>
                        <center>Email Address:&nbsp;&nbsp;<center>
                            <div ><center><input type="email" class="form-control" placeholder="Event Planner's email" name="email" pattern=".+@globex\.com" size="30" style="width:300px;" value="<?php echo (isset($_GET['email'])) ? $_GET['email'] : "" ?>" required></div>
                        </div>
                </div>

                
                <div >
                <center> Account Number:&nbsp;&nbsp;
                    <div ><center><input type="number" class="form-control" placeholder="Account Number" name="account" min="1000" max="1000000000" style="width:300px;" value="<?php echo (isset($_GET['account'])) ? $_GET['account'] : "" ?>" required></div>
                </div>
           <br>
            <div >
            <center>Date:&nbsp;&nbsp;
                <div ><center><input type="date" class="form-control" placeholder="" name="date" min="2022-12-23" max="2025-12-31" style="width:300px;" value="<?php echo (isset($_GET['date'])) ? $_GET['date'] : "" ?>" required>
                </div>
            </div><br>
            <div >
            <center>Payment Methods:&nbsp;&nbsp;
            <div class="cards">
                <div>
                    <img src="../../images/mc.png" alt="">
                    <img src="../../images/vi.png" alt="">
                    <img src="../../images/pp.png" alt="">
                </div>
                </div>
                </center>

            <center>Amount:&nbsp;&nbsp;
                <div><center><input type="number" class="form-control" placeholder="Amount" name="amount" min="5000" style="width:300px;" value="<?php echo (isset($_GET['amount'])) ? $_GET['amount'] : "" ?>" required>
                </div></center>
            </div><br>
            
            <br>
            <center><div><button type="submit" class="srcButton">Pay Now</button></div><br >
            </form>
             <a href="ViewPayments.php"><button type="submit" class="srcButton" >View Payments</button></a></center><br />
        </div>

    </div>
    </div>
    </div>

</body>

</html>
