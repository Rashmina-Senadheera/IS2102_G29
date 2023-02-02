<?php
    session_start();
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    if(isset($_SESSION['user_name'])){
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = 'stylesheet' href = '../../css/supplierMain.css'>
</head>

<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Payments </div>
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
                        <th>Event ID</th>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tr>
                    <td>E001</td>
                    <td>2021-09-01</td>
                    <td>Saman Kumara</td>
                    <td>customer_email_1@email.com</td>
                    <td>Payment for event 1</td>
                    <td>Rs. 10000.00</td>
                    <td>Completed</td>
                    <td>&#10247</td>
                </tr>
                <tr>
                    <td>E002</td>
                    <td>2021-09-01</td>
                    <td>Gotabaya Rajapaksha</td>
                    <td>customer_email_2@email.com</td>
                    <td>Payment for event 2</td>
                    <td>Rs. 20000.00</td>
                    <td>Completed</td>
                    <td>&#10247</td>
                </tr>
                <tr>
                    <td>E003</td>
                    <td>2021-09-01</td>
                    <td>Sachintha Gunaratne</td>
                    <td>customer_email_3@email.com</td>
                    <td>Payment for event 3</td>
                    <td>Rs. 30000.00</td>
                    <td>Completed</td>
                    <td>&#10247</td>
                </tr>

            </table>
        </div>
    </div>

</body>

</html>
<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>