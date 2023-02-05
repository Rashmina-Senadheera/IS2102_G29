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
    <link rel="stylesheet" href="../../css/Custcss3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable();
            $('#example tbody').on('click', 'tr', function () {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
        });
    </script>
</head>

<body>
<div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Order Requests </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search requests" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button>
            </div>
        </div>
        <div class="gridMain">
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th>Reqest Date</th>
                        <th>Event Planner Name</th>
                        <th>Event Planner Email</th>
                        <th>Event Type</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2023-01-01</td>
                        <td>Sanath</td>
                        <td>sanath@gmail.com</td>
                        <td>Wedding</td>
                        <td>Accepted</td>
                        <td class="tCenter menu">&#10247
                            <ul>
                                <li>
                                    <a href="order-view.php">View</a>
                                </li>
                            </ul>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    
  

</body>

</html>
