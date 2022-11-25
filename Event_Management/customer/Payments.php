<?php
include('customer_sidenav.php');
include('customer_header.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
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
        <div class="gridMain">
           <div class="row">
           
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">

                     </div>
                   <br>
                        Name:
                        <div class="col-md-12"><input type="text" class="form-control" placeholder="Event Planner's name" value=""></div>
                      </div><br >
               <div class="row mt-2">
                        Email Address:&nbsp;&nbsp;
                        <div class="col-md-12"><input type="text" class="form-control" placeholder="Event Planner's email" value=""></div>
                       </div><br >
                    <div class="row mt-2">
                        Account Number:&nbsp;&nbsp;
                        <div class="col-md-12"><input type="text" class="form-control" value="" placeholder="Account Number"></div>
                    </div><br >
                     <div class="row mt-2">
                      Date:&nbsp;&nbsp;
                      <div class="col-md-12"><input type="text" class="form-control" value="" placeholder="Date"></div>
                    </div><br >
                    <div class="row mt-3">
                      Amount:&nbsp;&nbsp;
                      <div class="col-md-12"><input type="text" class="form-control" value="" placeholder="Amount"></div>
                    </div>
                    <br>
                    <div ><button type="submit" class="srcButton">Pay Now</button></div><br>
                
                  </div></div>
        </div>
    </div>
 <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
            <div class="page-title"> View Payments </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search payments" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button>
            </div>
        </div>
        <div class="gridMain">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Event Planner Name</th>
                        <th>Event Planner Email</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tr>
                    <td>2021-09-01</td>
                    <td>Himasha</td>
                    <td>hima@gmail.com</td>
                    <td>Rs. 25000.00</td>
                    <td>&#10247</td>
                </tr>
                <tr>
                    <td>2021-09-01</td>
                    <td>Pawani</td>
                    <td>pawani@gmail.com</td>
                    <td>Rs. 20000.00</td>
                    <td>&#10247</td>
                </tr>
                <tr>
                    <td>2021-09-01</td>
                    <td>Sarala</td>
                    <td>sarala12@gmail.com</td>
                    <td>Rs. 50000.00</td>
                    <td>&#10247</td>
                </tr>

            </table>
        </div>
    </div>
</body>

</html>