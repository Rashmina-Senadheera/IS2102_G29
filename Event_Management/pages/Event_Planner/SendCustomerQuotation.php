<?php
include('../controllers/commonFunctions.php');
require_once './controllers/getRequestDetails.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/formEP.css">
</head>

<body>
    <div class="main-body">

        <div class="form-card scrollable">
            <div class="form-title">Request Details</div>
            <div class="form-description">The customer has requested the quotation for the following details.</div>

            <div class="formSection">General
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Requested On:</label>
                        <div class="input-value"><?php echo $requested_on ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Event Type:</label>
                        <div class="input-value"><?php echo $event_type ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Participants:</label>
                        <div class="input-value"><?php echo $no_of_guests ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Theme:</label>
                        <div class="input-value"><?php echo $theme ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Tentative Date:</label>
                        <div class="input-value"><?php echo $date ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Budget (Rs.):</label>
                        <div class="input-value"><?php echo "$budget1 $budget2" ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Time:</label>
                        <div class="input-value"><?php echo "$time_from - $time_to" ?></div>
                    </div>
                </div>
            </div>

            <?php
            if ($result_food->num_rows > 0) {
                $food_row = $result_food->fetch_assoc();
                $food_available_in = $food_row['available_in'];
                $food_available_at = $food_row['available_at'];
                $food_preferences = $food_row['preferences'];
                $food_remarks = !empty($food_row['remarks']) ? $food_row['remarks'] : "No remarks";

                echo "
                <div class='formSection'>Food & Beverages
                    <div class='row'>
                        <div class='input-50'>
                            <label class='input-label'>Need as:</label>
                            <div class='input-value'>$food_available_in</div>
                        </div>
                        <div class='input-50'>
                            <label class='input-label'>Need for:</label>
                            <div class='input-value'>$food_available_at</div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-50'>
                            <label class='input-label'>Preferences:</label>
                            <div class='input-value'>$food_preferences</div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input input-background'>
                            <label class='input-label'>Remarks:</label>
                            <div class='input-value'>$food_remarks</div>
                        </div>
                    </div>
                </div>
                ";
            }

            if ($result_venue->num_rows > 0) {
                $venue_row = $result_venue->fetch_assoc();
                $venue_type = $venue_row['venue'];
                $venue_remarks = !empty($venue_row['remarks']) ? $venue_row['remarks'] : "No remarks";

                echo "
                <div class='formSection'>Venue
                    <div class='row'>
                        <div class='input-50'>
                            <label class='input-label'>Type:</label>
                            <div class='input-value'>$venue_type</div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input input-background'>
                            <label class='input-label'>Remarks:</label>
                            <div class='input-value'>$venue_remarks</div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input'>
                            <label class='input-label'>Supplier Quotations related to this event:</label>
                            <table>
                                <tr>
                                    <td>Bravo Event Productions</td>
                                    <td>Rs. 154,000.00</td>
                                </tr>
                                <tr>
                                    <td>Bandu River Hotel</td>
                                    <td>Rs. 142,000.00</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                ";
            }

            if ($result_pv->num_rows > 0) {
                $pv_row = $result_pv->fetch_assoc();
                $pv_photoPref = !empty($pv_row['photo_pref']) ? $pv_row['photo_pref'] : "Not Set";
                $pv_videoPref = !empty($pv_row['video_pref']) ? $pv_row['video_pref'] : "Not Set";
                $pv_remarks = !empty($pv_row['remarks']) ? $pv_row['remarks'] : "No remarks";

                echo "
                <div class='formSection'>Photography & Videography
                    <div class='row'>
                        <div class='input-50'>
                            <label class='input-label'>Photography:</label>
                            <div class='input-value'>$pv_photoPref</div>
                        </div>
                        <div class='input-50'>
                            <label class='input-label'>Videography:</label>
                            <div class='input-value'>$pv_videoPref</div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input input-background'>
                            <label class='input-label'>Remarks:</label>
                            <div class='input-value'>$pv_remarks</div>
                        </div>
                    </div>
                </div>
                ";
            }

            if ($result_sl->num_rows > 0) {
                $sl_row = $result_sl->fetch_assoc();
                $sl_sound = !empty($sl_row['sound_type']) ? $sl_row['sound_type'] : "Not Set";
                $sl_light = !empty($sl_row['light_type']) ? $sl_row['light_type'] : "Not Set";
                $sl_remarks = !empty($sl_row['remarks']) ? $sl_row['remarks'] : "No remarks";

                echo "
                <div class='formSection'>Sound & Lighting
                    <div class='row'>
                        <div class='input-50'>
                            <label class='input-label'>Sound Type:</label>
                            <div class='input-value'>$sl_sound</div>
                        </div>
                        <div class='input-50'>
                            <label class='input-label'>Light Type:</label>
                            <div class='input-value'>$sl_light</div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input input-background'>
                            <label class='input-label'>Remarks:</label>
                            <div class='input-value'>$food_remarks</div>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

        </div>

        <div class="form-card scrollable">
            <form method="POST" action="controllers/addNewPackage.php" enctype="multipart/form-data">
                <div class="form-title">Send Quotation</div>
                <!-- <div class="form-description"></div> -->
                <div class="row">
                    <div class="input">
                        <label class="input-label">Event Planner's Cost</label>
                        <input type="text" class="input-field" name="packageName" placeholder="Cost" />
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Venue</label>
                            <input type="text" class="input-field" name="packageName" placeholder="Supplier Name / Product Name" />
                            <input type="text" class="input-field" name="packageName" placeholder="Cost" style="margin-top: 5px;" />

                        </div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Food & Beverages</label>
                            <input type="text" class="input-field" name="packageName" placeholder="Supplier Name / Product Name" />
                            <input type="text" class="input-field" name="packageName" placeholder="Cost" style="margin-top: 5px;" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Remarks <span class="desc">(You can specify other expenses or special notes here.)</span></label>
                            <textarea class="input-field" rows="5" name="description"></textarea>
                        </div>
                    </div>
                    <div class="action btnSend">
                        <input type="submit" value="Send" class="action-button" />
                    </div>
            </form>
        </div>
    </div>

</body>

</html>