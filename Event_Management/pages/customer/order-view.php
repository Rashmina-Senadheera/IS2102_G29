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
            $sql = "select * from quotation where id = '$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc()
            ?>
            <div>
                <div class="sm-all">
                    <div class="sm-name">Event Type:</div>
                    <div class="sm-link"><?php echo $row['event-type'] ?></div>
                </div>
                <div class="sm-all">
                    <div class="sm-name">Number of Participants:</div>
                    <div class="sm-link"><?php echo $row['no-pax'] ?></div>
                </div>
                <div class="sm-all">
                    <div class="sm-name">Theme:</div>
                    <div class="sm-link"><?php echo $row['theme'] ?></div>
                </div>
                <div class="sm-all">
                    <div class="sm-name">Tentative date:</div>
                    <div class="sm-link">From: <?php echo $row['from-date'] ?> <br> To : <?php echo $row['to-date'] ?></div>
                </div>
                <div class="sm-all">
                    <div class="sm-name">Budget:</div>
                    <div class="sm-link">Min: <?php echo $row['min-budget'] ?> <br> Max: <?php echo $row['max-budget'] ?></div>
                </div>
                <div class="sm-all">
                    <div class="sm-name">Time:</div>
                    <div class="sm-link">From: <?php echo $row['from-time'] ?><br> To : <?php echo $row['to-time'] ?></div>
                </div>
            </div>
            <br>
            <div class="personal-info-heading" style="width:90%;">
                Event Planner Details
            </div>
            <div class="sm-all">
                <div class="sm-name">Name:</div>
                <div class="sm-link"><?php echo $row['planner-name'] ?></div>
            </div>
            <div class="sm-all">
                <div class="sm-name">Email:</div>
                <div class="sm-link"><?php echo $row['planner-email'] ?></div>
            </div>
            <div class="sm-all">
                <div class="sm-name">Contact:</div>
                <div class="sm-link"><?php echo $row['contact'] ?></div>
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
                        <div class="prof-name">Type:</div>
                        <div class="prof-data"><?php echo $row['venue'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Location:</div>
                        <div class="prof-data"><?php echo $row['venue-type'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Remarks:</div>
                        <div class="prof-data"><?php echo $row['venue-remarks'] ?></div>
                    </div>
                    <div class="profile-name">
                        Food & Beverages
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Available in:</div>
                        <div class="prof-data"><?php echo $row['food-availability'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Available at:</div>
                        <div class="prof-data"><?php echo $row['food-type'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Preferences:</div>
                        <div class="prof-data"><?php echo $row['food-pref'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Remarks:</div>
                        <div class="prof-data"><?php echo $row['food-remarks'] ?></div>
                    </div>
                    <div class="profile-name">
                        Sound & Lightning
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Sound Type:</div>
                        <div class="prof-data"><?php echo $row['sound-type'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Light:</div>
                        <div class="prof-data"><?php echo $row['light'] ?></div>
                    </div>
                    <!-- <div class="prof-all">
                        <div class="prof-name">Light Type:</div>
                        <div class="prof-data"><?php echo $row['light_type'] ?></div>
                    </div> -->
                    <div class="prof-all">
                        <div class="prof-name">Remarks:</div>
                        <div class="prof-data"><?php echo $row['s_l-remarks'] ?></div>
                    </div>
                    <div class="profile-name">
                        Photography & Videography
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Photography Preferences:</div>
                        <div class="prof-data"><?php echo $row['photo_pref'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Videography Preferences:</div>
                        <div class="prof-data"><?php echo $row['video_pref'] ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name">Remarks:</div>
                        <div class="prof-data"><?php echo $row['p_v-remarks'] ?></div>
                    </div>
                    <br>
                    <center>
                        <a href="order.php">
                            <button type="submit" class="srcButton">Back</button>
                    </center>
                </div>
            </div>

        </div>
    </div>

</div>
</body>


</html>