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
    <link rel="stylesheet" href="../../css/profileEP.css">
</head>

<body>

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

?>

<!-- <div class="gridMain"> -->
<div class="container-profile">
    <div class="flex-container-profile">
        <div class="about">
            <div class="personal-info-heading" style="width:90%;">
                General Details
            </div>
            <?php
            $sql = "select * 
                    from cust_req_general 
                    JOIN request_ep_quotation 
                    ON cust_req_general.request_id = request_ep_quotation.request_id 
                    JOIN user 
                    ON request_ep_quotation.EP_id = user.user_id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $sql_food = "SELECT * FROM cust_req_food WHERE request_id = $id";
            $sql_venue = "SELECT * FROM cust_req_venue WHERE request_id = $id";
            $sql_pv = "SELECT * FROM cust_req_pv WHERE request_id = $id";
            $sql_sl = "SELECT * FROM cust_req_sl WHERE request_id = $id";

            $result_food = $conn->query($sql_food);
            $result_venue = $conn->query($sql_venue);
            $result_pv = $conn->query($sql_pv);
            $result_sl = $conn->query($sql_sl);

            $row1 = $result_food->fetch_assoc();
            $row2 = $result_venue->fetch_assoc();
            $row3 = $result_pv->fetch_assoc();
            $row4 = $result_sl->fetch_assoc();
            ?>
            <div>
                <div class="sm-all">
                    <div class="sm-name">Event Type:</div>
                    <div class="sm-link"><?php echo $row['event_type'] ?></div>
                </div>
                <div class="sm-all">
                    <div class="sm-name">Number of Participants:</div>
                    <div class="sm-link"><?php echo $row['no_of_pax'] ?></div>
                </div>
                <div class="sm-all">
                    <div class="sm-name">Theme:</div>
                    <div class="sm-link"><?php echo $row['theme'] ?></div>
                </div>
                <div class="sm-all">
                    <div class="sm-name">Tentative date:</div>
                    <div class="sm-link">From: <?php echo $row['from_date'] ?> <br> To : <?php echo $row['to_date'] ?></div>
                </div>
                <div class="sm-all">
                    <div class="sm-name">Budget:</div>
                    <div class="sm-link">Min: <?php echo $row['min_budget'] ?> <br> Max: <?php echo $row['max_budget'] ?></div>
                </div>
                <div class="sm-all">
                    <div class="sm-name">Time:</div>
                    <div class="sm-link">From: <?php echo $row['from_time'] ?><br> To : <?php echo $row['to_time'] ?></div>
                </div>
            </div>
            <br>
            <div class="personal-info-heading" style="width:90%;">
                Event Planner Details
            </div>
            <div class="sm-all">
                <div class="sm-name">Name:</div>
                <div class="sm-link"><?php echo $row['name'] ?></div>
            </div>
            <div class="sm-all">
                <div class="sm-name">Email:</div>
                <div class="sm-link"><?php echo $row['email'] ?></div>
            </div>
        </div>
        <div class="other">
            <div class="info">
                <div class="personal-info">
                    <div class="personal-info-heading">
                        Event Details
                    </div>
                    <div class="profile-name">
                        Venue
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Location:</div>
                        <div class="prof-data"><?php echo $row2['venue'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Remarks:</div>
                        <div class="prof-data"><?php echo $row2['remarks'] ?></div>
                    </div>
                    <div class="profile-name">
                        Food & Beverages
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Available in:</div>
                        <div class="prof-data"><?php echo $row1['available_in'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Available at:</div>
                        <div class="prof-data"><?php echo $row1['available_at'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Preferences:</div>
                        <div class="prof-data"><?php echo $row1['preferences'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Remarks:</div>
                        <div class="prof-data"><?php echo $row1['remarks'] ?></div>
                    </div>
                    <div class="profile-name">
                        Sound & Lightning
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Sound Type:</div>
                        <div class="prof-data"><?php echo $row4['sound_type'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Light:</div>
                        <div class="prof-data"><?php echo $row4['light_type'] ?></div>
                    </div>
                    <!-- <div class="prof-all">
                        <div class="prof-name">Light Type:</div>
                        <div class="prof-data"><?php echo $row4['light_type'] ?></div>
                    </div> -->
                    <div class="prof-all">
                        <div class="prof-name">Remarks:</div>
                        <div class="prof-data"><?php echo $row4['remarks'] ?></div>
                    </div>
                    <div class="profile-name">
                        Photography & Videography
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Photography Preferences:</div>
                        <div class="prof-data"><?php echo $row3['photo_pref'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Videography Preferences:</div>
                        <div class="prof-data"><?php echo $row3['video_pref'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Remarks:</div>
                        <div class="prof-data"><?php echo $row3['remarks'] ?></div>
                    </div>
                    <br>
                    <center>
                        <a href="order.php">
                            <button type="submit" class="srcButton" data-inline="true">Back</button>
                        </a>
                        <a href="quotationView.php">
                            <button type="submit" class="srcButton" data-inline="true">View Quotation</button>
                        </a>
                    </center>
                </div>
            </div>

        </div>
    </div>

</div>
</body>


</html>