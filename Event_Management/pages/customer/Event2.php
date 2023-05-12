<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
include('db_conn.php');
$sql = "SELECT * FROM events_c WHERE id=?";
// $sql = "SELECT * FROM users WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([2]);
        if($stmt->rowCount() == 1){
            $row = $stmt->fetch();
        }
?>
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

</style>
</head>
<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"><?php echo $row['eventtype'] ?></div>
                <div class="input-container">
                </div>
            </div>
        </div>
        <div class="other">
                <div class="info">
                     <div class="personal-info">
                        <center><img src="../../images/event2.jpg" style="width:550px; height:300px;"></center><br>
                        <center>Ten little fingers, ten little toes, two little eyes and one little nose, boy or a girl, no-one knows! Pink or blue, our dream came true! Blue or pink, what do you think? We're tickled pink and happy to say, a little princess is on her way!</center><br><br>
                        <center><b>Event Planner:</b><?php echo $row['planner_name'] ?><br>
                                <b>Event Type:</b><?php echo $row['event_type'] ?><br>
                                <b>Theme:</b> <?php echo $row['venue'] ?><br>
                                <b>Date:</b> <?php echo $row['date_from'] ?><br><br>
                                <a href="OngoingEvents.php"><button type="submit" class="srcButton"  data-inline="true">Back</button></a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
