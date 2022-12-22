<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
include('db_conn.php');
$sql = "SELECT * FROM events WHERE id=?";
// $sql = "SELECT * FROM users WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([1]);
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
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/Custcss2.css">
<style>

</style>
</head>
<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Gihani's Wedding Day </div>
                <div class="input-container">
                </div>
            </div>
        </div>
        <div class="other">
                <div class="info">
                    <div class="personal-info">
                        <center><img src="../images/event.jpg" style="width:550px; height:300px;"></center><br>
                        <center>We don’t want you to wait for information, to compromise your dream, to apologise to family and friends for the quality of ceremony music or the food not being delicious.</center><br><br>
                        <center><b>Event Planner:</b> <?php echo $row['name']; ?><br>
                                <b>Event Type:</b> Wedding<br>
                                <b>Theme:</b> Garden<br>
                                <b>Date:</b> 2022-01-01<br><br>
                        <a href="Events.php"><button type="submit" class="srcButton"  data-inline="true">Back</button></a>
                        <a href="Feedback.php?name= <?php echo $row['name'] ?>"><button type="submit" class="srcButton"  data-inline="true">Give FeedBack</button></a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
