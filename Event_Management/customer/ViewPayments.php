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
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
</head>

<body>
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
                <tbody>

                    <?php
                    $sName = "localhost";
                    $uName = "root";
                    $pass = "";
                    $db_name = "auth_db";

                    // Create connection
                    $conn = mysqli_connect($sName, $uName, $pass, $db_name);
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // include "./db_conn.php";
                    $sql = "SELECT * FROM `payments`";
                    $result = $conn->query($sql);

                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['ammount'] ?></td>

                            <td>&#10247</td>
                        <?php
                    }
                        ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>