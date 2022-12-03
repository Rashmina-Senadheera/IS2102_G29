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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
} 
</style>
</head>

<body>

 <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
            <div class="page-title"> Give Feedbacks </div>
                <div class="input-container">
                    
                </div>
               
            </div>
        </div>
        <div class="gridMain">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Event Planner Name</th>
                        <th>Event Planner Email</th>
                        <th>Rate</th>
                    </tr>
                </thead>
                <tr>
                    <td>2021-09-01</td>
                    <td>Himasha</td>
                    <td>hima@gmail.com</td>
                    <td><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </td>
                    <td>&#10247</td>
                </tr>
                <tr>
                    <td>2021-09-01</td>
                    <td>Pawani</td>
                    <td>pawani@gmail.com</td>
                    <td><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </td>
                    <td>&#10247</td>
                </tr>
                <tr>
                    <td>2021-09-01</td>
                    <td>Sarala</td>
                    <td>sarala12@gmail.com</td>
                    <td><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </td>
                    <td>&#10247</td>
                </tr>

            </table>
        </div>
    </div>
</body>

</html>