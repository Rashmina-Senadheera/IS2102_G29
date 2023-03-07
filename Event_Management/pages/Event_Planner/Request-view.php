<?php
require_once './controllers/getRequestDetails.php';
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

                        <?php
                        if ($result_food->num_rows > 0) {
                            $food_row = $result_food->fetch_assoc();
                            $food_available_in = $food_row['available_in'];
                            $food_available_at = $food_row['available_at'];
                            $food_preferences = $food_row['preferences'];
                            $food_remarks = !empty($food_row['remarks']) ? $food_row['remarks'] : "No remarks";

                            echo "
                            <div class='row'>
                                <div class='personal-info-heading'>
                                    Food & Beverages
                                </div>
                                <a href='Suppliers.php?type=foodbev&reqID=$reqID'>Find Suppliers</a>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Available In:</div>
                                <div class='prof-data'>$food_available_in</div>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Available At:</div>
                                <div class='prof-data'>$food_available_at</div>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Preferences:</div>
                                <div class='prof-data'>$food_preferences</div>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Remarks:</div>
                                <div class='prof-data'>$food_remarks</div>
                            </div>
                            ";
                        }

                        if ($result_venue->num_rows > 0) {
                            $venue_row = $result_venue->fetch_assoc();
                            $venue_type = $venue_row['venue'];
                            $venue_remarks = !empty($venue_row['remarks']) ? $venue_row['remarks'] : "No remarks";

                            echo "
                            <div class='row'>
                                <div class='personal-info-heading'>
                                    Venue
                                </div>
                                <a href='Suppliers.php?type=venue&reqID=$reqID'>Find Suppliers</a>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Type:</div>
                                <div class='prof-data'>$venue_type</div>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Remarks:</div>
                                <div class='prof-data'>$venue_remarks</div>
                            </div>
                            ";
                        }

                        if ($result_pv->num_rows > 0) {
                            $pv_row = $result_pv->fetch_assoc();
                            $pv_photoPref = !empty($pv_row['photo_pref']) ? $pv_row['photo_pref'] : "Not Set";
                            $pv_videoPref = !empty($pv_row['video_pref']) ? $pv_row['video_pref'] : "Not Set";
                            $pv_remarks = !empty($pv_row['remarks']) ? $pv_row['remarks'] : "No remarks";

                            echo "
                            <div class='row'>
                                <div class='personal-info-heading'>
                                    Photography & Videography
                                </div>
                                <a href='Suppliers.php?type=pv&reqID=$reqID'>Find Suppliers</a>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Photography:</div>
                                <div class='prof-data'>$pv_photoPref</div>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Videography:</div>
                                <div class='prof-data'>$pv_videoPref</div>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Remarks:</div>
                                <div class='prof-data'>$pv_remarks</div>
                            </div>
                            ";
                        }

                        if ($result_sl->num_rows > 0) {
                            $sl_row = $result_sl->fetch_assoc();
                            $sl_sound = !empty($sl_row['sound_type']) ? $sl_row['sound_type'] : "Not Set";
                            $sl_light = !empty($sl_row['light_type']) ? $sl_row['light_type'] : "Not Set";
                            $sl_remarks = !empty($sl_row['remarks']) ? $sl_row['remarks'] : "No remarks";

                            echo "
                            <div class='row'>
                                <div class='personal-info-heading'>
                                    Sound & Lighting
                                </div>
                                <a href='Suppliers.php?type=sl&reqID=$reqID'>Find Suppliers</a>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Sound Type:</div>
                                <div class='prof-data'>$sl_sound</div>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Light Type:</div>
                                <div class='prof-data'>$sl_light</div>
                            </div>
                            <div class='prof-all'>
                                <div class='prof-name'>Remarks:</div>
                                <div class='prof-data'>$sl_remarks</div>
                            </div>
                            ";
                        }
                        ?>

                    </div>
                    <div class="actionBtn">
                        <button type="button" onclick="<?php echo 'declineRequest(' . $reqID . ', ' . $customerID . ')'; ?>" id="btnDecline" class="rejected" style="margin-left: 0;">
                            Decline
                        </button>
                        <a href=<?php echo "SendCustomerQuotation.php?reqID=" . $reqID; ?>>
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
                <form method="POST" action="./controllers/declineRequest.php">
                    <div class="decline-reason">
                        <input hidden type="text" name="request_id" id="modal_request_id">
                        <input hidden type="text" name="customer_id" id="modal_customer_id">
                        <label for="reason">Reason</label>
                        <textarea id="reason" name="reason" rows="4" cols="50" required></textarea>
                    </div>
                    <div class="actionBtn">
                        <button type="button" onclick="closeModal()" class="rejected" id="modal_cancel" style="margin-left: 0;">
                            Cancel
                        </button>
                        <button type="submit" class="accepted" style="margin-left: 0;">
                            Yes, Decline
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->

</body>

<script src="../../js/epHandleCusReq.js"></script>

</html>