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
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
</head>

<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Supplier Quotations </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search quotation" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button>
            </div>
        </div>
        <div class="gridMain">
            <table>
                <thead>
                    <tr>
                        <th>Quotation ID</th>
                        <th>For Event</th>
                        <th>Supplier</th>
                        <th>Supply Type</th>
                        <th>Date</th>
                        <!-- <th>Services</th> -->
                        <!-- <th>Remarks</th> -->
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tr>
                    <td>Q001</td>
                    <td>E001</td>
                    <td>Shamin</td>
                    <td>Music</td>
                    <td>2021-09-01</td>
                    <!-- <td>Full package</td> -->
                    <!-- <td>This is the description about quotaion 01.</td> -->
                    <td>Rs. 10000.00</td>
                    <td>Approved</td>
                    <td>&#10247</td>
                </tr>
                <tr>
                    <td>Q002</td>
                    <td>E002</td>
                    <td>Rashmina</td>
                    <td>Decorations</td>
                    <td>2021-09-01</td>
                    <!-- <td>Birthday cake, decorations, dinner</td> -->
                    <!-- <td>This is the description about quotaion 02.</td> -->
                    <td>Rs. 20000.00</td>
                    <td>Approved</td>
                    <td>&#10247</td>
                </tr>
                <tr>
                    <td>Q003</td>
                    <td>E003</td>
                    <td>Daweendri</td>
                    <td>Cake</td>
                    <td>2021-09-01</td>
                    <!-- <td>Invitations, hall arrangement, decorations</td> -->
                    <!-- <td>This is the description about quotaion 03.</td> -->
                    <td>Rs. 30000.00</td>
                    <td>Pending</td>
                    <td>&#10247</td>
                </tr>

            </table>
        </div>
    </div>

</body>

</html>