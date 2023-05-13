<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
include('db_conn.php');
$sql = "SELECT * FROM events_c WHERE id=?";
// $sql = "SELECT * FROM users WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([1]);
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
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/Custcss2.css">
<style>

</style>
</head>
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

$id = $_GET['id'];
$sql = "select * from com_events where id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc()

?>

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
                        <center><img src="../../images/event.jpg" style="width:550px; height:300px;"></center><br>
                        <center><?php echo $row['info'] ?></center><br><br>
                        <center><b>Event Planner:</b><?php echo $row['planner_name'] ?><br>
                                <b>Event Type:</b><?php echo $row['event_type'] ?><br>
                                <!-- <b>Theme:</b> <?php echo $row['venue'] ?><br> -->
                                <b>Date:</b> <?php echo $row['date_from'] ?><br><br>
                        <a href="CompletedEvents.php"><button type="submit" class="srcButton"  data-inline="true">Back</button></a>
                        <a href="Feedback.php?name= <?php echo $row['planner_name']; ?>"><button type="submit" class="srcButton"  data-inline="true">Give FeedBack</button></a></center> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
