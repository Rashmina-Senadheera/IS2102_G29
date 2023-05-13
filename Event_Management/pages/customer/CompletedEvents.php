<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
include('db_conn.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <!-- <link rel="stylesheet" href="../../css/eventPlannerMyevents.css"> -->
    <link rel="stylesheet" href="../../css/viewSuppliersEP.css">
<style>
    .imgbx:hover{
        transform: scale(1.1);
        z-index: 1;

    }

    .sci:hover{
        transform: scale(1.1);
        z-index: 1;

    }
</style>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventra";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Completed Events </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search events" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button>
            </div>
        </div>
        <div class="gridSuppliers">
            <div class="suppliers-cards-container" id="supplier_items">
                <?php

                $sql = "select id, eventtype, info, planner_email, event_type, `status` from quotation where status='Completed'";

                $result = $conn->query($sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

                ?>
                        <div class="card">
                            <div class="content">
                                <div class="imgBx">
                                    <img src="../../images/event.jpg">
                                </div>

                                <div class="contentBx">
                                    <h3><?php echo $row['eventtype'] ?><br><span>
                                            <?php echo $row['info'] ?>
                                        </span></h3>
                                </div>
                            </div>
                            <ul class="sci">
                                <li>

                                    <a href="Event1.php?id=<?php echo $row['id'] ?>">View</a>
                                </li>
                            </ul>
                        </div>

                <?php
                    }
                }

                $conn->close();
                ?>

            </div>
        </div>
    </div>
</body>

</html>