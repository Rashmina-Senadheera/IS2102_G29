<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
$cust_id = $_SESSION['user_id'];

// $sql = "SELECT * FROM `transactions`  
// JOIN `ep_booking`
// ON transactions.id = ep_booking.payment_id
// WHERE ep_booking.customer_id=$cust_id";
// // $sql = "SELECT * FROM users WHERE username = ?";
//     	$stmt = $conn->prepare($sql);
//     	$stmt->execute();
//         if($stmt->rowCount() == 1){
//             $row = $stmt->fetch();
//         }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/Custcss2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="grid-container-payments">
<div class="gridSearch">
        <div class="searchSec">
            <div class="page-title"> Payments</div>
            <div class="input-container">
                <input class="input-field" type="text" id="myInput"  placeholder="Search by names" name="search">
                <i class="fa fa-search icon"></i>
            </div>
            <button type="submit" class="srcButton">Search</button>
        </div>
    </div>
    <div class="gridMain">
        <table id="example" class="display">
            <thead>
            <tr>
                <th>Payment Date</th>
                <th>Event Name</th>
                <th>Event Planner Name</th>
                <th>Paid Amount</th>
                <th>Full Amount</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $sql = "SELECT DATE(created) AS Date, event_type, name AS EP_name, item_price as full_amount, paid_amount, supplier_booking.status as status 
             FROM `transactions`  
            JOIN `ep_booking`
            ON transactions.id = ep_booking.payment_id
            JOIN `supplier_booking`
            ON supplier_booking.payment_id = ep_booking.payment_id
            JOIN `user`
            ON ep_booking.EP_id = user.user_id
            JOIN ep_quotation
            ON ep_quotation.qId = ep_booking.ep_quot_id
            JOIN cust_req_general
            ON ep_quotation.reqId = cust_req_general.request_id
            WHERE ep_booking.customer_id=$cust_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            


            // output data of each row
            while ($row = $row = $stmt->fetch()) {

                ?>

                <tr data-href="order-view.php?id=<?php echo $row['request_id'] ?>">
                    <td><?php echo $row['Date'] ?></td>
                    <td><?php echo $row['event_type'] ?></td>
                    <td><?php echo $row['EP_name'] ?></td>
                    <td><?php echo $row['paid_amount'] ?></td>
                    <td><?php echo $row['full_amount'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    

                    <script>
                    function myFunction() {
                    location.replace("order-view.php?id=<?php echo $row['request_id'] ?>")
                    }
                    </script>

                    
                </tr>

                <?php
            }

           
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</body>
</html>
