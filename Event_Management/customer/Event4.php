<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
include('db_conn.php');
$sql = "SELECT * FROM events_c WHERE id=?";
// $sql = "SELECT * FROM users WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([4]);
        if($stmt->rowCount() == 1){
            $row = $stmt->fetch();
        }
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
                <div class="page-title"> Sandali's Birthday </div>
                <div class="input-container">
                </div>
            </div>
        </div>
        <div class="other">
                <div class="info">
                    <div class="personal-info">
                        <img src="../images/event2.jpg" style="width:550px; height:300px;">
                        The lovely Sewwandi was on cloud nine when she was pleasantly surprised by her loved ones and friends on her birthday!! The atmosphere and decorum created by DEVENT, truly set the tone to create a memorable experience for her. Do not hesitate to contact us in making your dream event a reality.
                                </span></h3><br><br>
                        <center><b>Event Planner:</b> <?php echo $row['name']; ?><br>
                                <b>Event Type:</b> Birthday<br>
                                <b>Theme:</b> Bohemian<br>
                                <b>Date:</b> 2022-04-06<br><br>
                                <a href="Events.php"><button type="submit" class="srcButton"  data-inline="true">Back</button></a>
                        <a href="Feedback.php?name=<?php echo $row['name']; ?>"><button type="submit" class="srcButton"  data-inline="true">Give FeedBack</button></a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
