<?php
if (isset($_GET['reqID'])) {
    // Start output buffering
    ob_start();

    include('eventplanner_sidenav.php');
    include('eventplanner_header.php');

    $reqID = $_GET['reqID'];
    $sql = "SELECT * FROM request_ep_quotation WHERE request_id = $reqID";

    // execute query and check if successful
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // check if the user is the owner of the package
            if ($row['EP_id'] == $_SESSION['user_id']) {
                $date = !empty($row['date']) ? $row['date'] : "Not Set";
                $description = !empty($row['description']) ? $row['description'] : "Not Set";
                $theme = !empty($row['theme']) ? $row['theme'] : "Not Set";
                $catering_type = !empty($row['catering_type']) ? $row['catering_type'] : "Not Set";
                $event_type = !empty($row['event_type']) ? $row['event_type'] : "Not Set";
                $vanue_type = !empty($row['vanue_type']) ? $row['vanue_type'] : "Not Set";
                $no_of_guests = !empty($row['no_of_guests']) ? $row['no_of_guests'] : "Not Set";
                $status = !empty($row['status']) ? $row['status'] : "Not Set";
                $time_from = !empty($row['time_from']) ? $row['time_from'] : "Not Set";
                $time_to = !empty($row['time_to']) ? $row['time_to'] : "Not Set";
                $budget1 = !empty($row['budget_min']) ? $row['budget_min'] : "0";
                $budget2 = !empty($row['budget_max']) ? "- " . $row['budget_max'] : " ";
                $requested_on = $row['requested_on'];

                $getUser_sql = "SELECT `name`, `email` FROM user WHERE user_id = " . $row['customer_id'];
                $getPhone_sql = "SELECT phone_number FROM user_phone WHERE user_id = " . $row['customer_id'];

                $getUser_result = $conn->query($getUser_sql);
                $getPhone_result = $conn->query($getPhone_sql);

                if ($getUser_result->num_rows > 0) {
                    $user_row = $getUser_result->fetch_assoc();
                    $name = $user_row['name'];
                    $email = $user_row['email'];
                } else {
                    $name = "Undefined";
                    $email = "Undefined";
                }

                if ($getPhone_result->num_rows > 0) {
                    $phone_row = $getPhone_result->fetch_assoc();
                    $phone = $phone_row['phone_number'];
                } else {
                    $phone = "Undefined";
                }
            } else {
                header("Location: ./403.php");
                exit();
            }
        } else {
            header("Location: ./404.php");
            exit();
        }
    }

    // Send the output buffer to the browser and turn off output buffering
    ob_end_flush();
} else {
    header("Location: Requests.php");
    exit();
}
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
    <!-- Show success message -->
    <?php
    if (isset($_SESSION['success'])) {
        echo '<div class="success-message">' . showSessionMessage("success") . '</div>';
    }
    ?>
    <div class="container-profile" style="padding-left: 20px;">
        <div class="gridSearch" style="margin-top: 10px;">
            <div class="searchSec">
                <div class="page-title">Quotation Request</div>
            </div>
        </div>
        <div class="flex-container-profile" style="height: 95%;">
            <div class="about">
                <div class="personal-info">
                    <div class="personal-info-heading">
                        General
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Requested On:</div>
                        <div class="prof-data"><?php echo $requested_on ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Event Type:</div>
                        <div class="prof-data"><?php echo $event_type ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Participants:</div>
                        <div class="prof-data"><?php echo $no_of_guests ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Theme:</div>
                        <div class="prof-data"><?php echo $theme ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Tentative Date:</div>
                        <div class="prof-data"><?php echo $date ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Time:</div>
                        <div class="prof-data"><?php echo "$time_from - $time_to" ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Budget (Rs.):</div>
                        <div class="prof-data"><?php echo "$budget1 $budget2" ?></div>
                    </div>

                    <div class="personal-info-heading" style="width: 50%; margin-top: 40px;">
                        Customer Profile
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Name:</div>
                        <div class="prof-data"><?php echo "$name" ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Email:</div>
                        <div class="prof-data"><?php echo "$email" ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Contact:</div>
                        <div class="prof-data"><?php echo "$phone" ?></div>
                    </div>
                    <div class="actionBtn">
                        <button type="button" class="rejected" style="margin-left: 0;" onclick="window.location='Messages.php';">
                            Message
                        </button>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="info">
                    <div class="personal-info">
                        <div class="personal-info-heading">
                            Venue
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Type:</div>
                            <div class="prof-data">Banquet Hall</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Remarks:</div>
                            <div class="prof-data">We want a hall that looks good on the outside as well. And the seats should be comfortable.</div>
                        </div>

                        <div class="personal-info-heading">
                            Food & Beverages
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Need as:</div>
                            <div class="prof-data">Buffet</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Need for:</div>
                            <div class="prof-data">Lunch</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Preferences:</div>
                            <div class="prof-data">Non Veg</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Remarks:</div>
                            <div class="prof-data">Grilled chicken salad with mixed greens, cherry tomatoes, cucumbers, and a honey mustard dressing.</div>
                        </div>
                    </div>
                    <div class="actionBtn">
                        <button type="button" id="btnDecline" class="rejected" style="margin-left: 0;">
                            Decline
                        </button>
                        <a href="SendCustomerQuotation.php">
                            <button type="button" class="accepted" style="margin-left: 0;">
                                Send Quotation
                            </button>
                        </a>
                    </div>
                </div>
                <!-- <div class="p-s-info">
                    <main role="main">
                        <div class="personal-info-heading">
                            Customer Profile
                        </div>
                        <a href="#"><span class="tag tag-javascript tag-lg">#ListOfEventTypes</span></a>
                    </main>
                </div> -->
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-decline">
            <div class="modal-header">
                <span class="close">&times;</span>
                Are you sure you want to decline this request?
            </div>
            <div class="modal-body">
                <div class="actionBtn">
                    <button type="button" class="rejected" style="margin-left: 0;">
                        Cancel
                    </button>
                    <a href="SendCustomerQuotation.php">
                        <button type="button" class="accepted" style="margin-left: 0;">
                            Yes, Decline
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

</body>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btnDecline.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</html>