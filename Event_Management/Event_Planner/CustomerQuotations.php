<?php
include('eventplanner_sidenav.php');
include('eventplanner_header.php');
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
                <div class="page-title"> Customer Quotations </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search quotation" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button>
            </div>
        </div>
        <div class="gridMain">
            <table id="tableToSort" class="ep-table">
                <thead>
                    <tr>
                        <th onclick="sortTable(0)">Quotation ID</th>
                        <th onclick="sortTable(1)">Customer</th>
                        <th onclick="sortTable(2)">Event Type</th>
                        <th onclick="sortTable(3)">Date</th>
                        <th onclick="sortTable(4)">Services</th>
                        <!-- <th>Remarks</th> -->
                        <th onclick="sortTable(5)">Price</th>
                        <th onclick="sortTable(6)">Status</th>
                    </tr>
                </thead>
                <tr>
                    <td onclick="window.location='ViewCustomerQuotation.php';">Q001</td>
                    <td onclick="window.location='ViewCustomerQuotation.php';">Shamin</td>
                    <td onclick="window.location='ViewCustomerQuotation.php';">Wedding</td>
                    <td onclick="window.location='ViewCustomerQuotation.php';">2021-09-01</td>
                    <td onclick="window.location='ViewCustomerQuotation.php';">Full package</td>
                    <!-- <td onclick="window.location='ViewCustomerQuotation.php';">This is the description about quotaion 01.</td> -->
                    <td onclick="window.location='ViewCustomerQuotation.php';">Rs. 10000.00</td>
                    <td onclick="window.location='ViewCustomerQuotation.php';">Approved</td>
                    <!-- <td>&#10247</td> -->
                </tr>
                <tr>
                    <td>Q002</td>
                    <td>Rashmina</td>
                    <td>Birthday</td>
                    <td>2021-09-01</td>
                    <td>Birthday cake, decorations, dinner</td>
                    <!-- <td>This is the description about quotaion 02.</td> -->
                    <td>Rs. 20000.00</td>
                    <td>Approved</td>
                    <!-- <td>&#10247</td> -->
                </tr>
                <tr>
                    <td>Q003</td>
                    <td>Daweendri</td>
                    <td>Exhibition</td>
                    <td>2021-09-01</td>
                    <td>Invitations, hall arrangement, decorations</td>
                    <!-- <td>This is the description about quotaion 03.</td> -->
                    <td>Rs. 30000.00</td>
                    <td>Pending</td>
                    <!-- <td>&#10247</td> -->
                </tr>

            </table>
        </div>
    </div>

</body>
<script src="../js/sortTable.js"></script>

</html>