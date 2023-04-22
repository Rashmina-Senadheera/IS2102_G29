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
    <script type="text/javascript" src="../../js/sendCustomerQuotation_ep.js"></script>
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
            function getQuotationDetails($reqID, $conn, $type)
            {
                // display supplier quotations related to this event
                $sql = "SELECT * FROM supplier_quotation WHERE for_cus_req = '$reqID' AND type = '$type'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<div class='row'>
                            <div class='input'>
                                <label class='input-label'>Supplier Quotations related to this event:</label>
                                    <table>";

                    while ($row = $result->fetch_assoc()) {
                        $qid = $row['quotation_id'];
                        $title = $row['title'];
                        $cost = $row['cost'];

                        // select js function to set the title and cost
                        if ($type == "foodbev") {
                            $setFunction = "setFoodBevCost";
                        } else if ($type == "venue") {
                            $setFunction = "setVenueCost";
                        } else if ($type == "photo") {
                            $setFunction = "setPVCost";
                        } else if ($type == "ent") {
                            $setFunction = "setSLCost";
                        }

                        echo "<tr onClick='$setFunction(`$qid`, `$title`, `$cost`)'>
                                <td>$title</td>
                                <td>Rs. " . formatCurrency($cost) . "</td>
                            </tr>";
                    }
                    echo "          </table>
                                </div>
                            </div>";
                }
            }

            if ($result_food->num_rows > 0) {
                $food_row = $result_food->fetch_assoc();
                $food_available_in = $food_row['available_in'];
                $food_available_at = $food_row['available_at'];
                $food_preferences = $food_row['preferences'];
                $food_remarks = !empty($food_row['remarks']) ? $food_row['remarks'] : "No remarks";

                echo "<div class='formSection'>Food & Beverages
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
                        </div>";
                getQuotationDetails($reqID, $conn, "foodbev");
                echo "</div>";
            }

            if ($result_venue->num_rows > 0) {
                $venue_row = $result_venue->fetch_assoc();
                $venue_type = $venue_row['venue'];
                $venue_remarks = !empty($venue_row['remarks']) ? $venue_row['remarks'] : "No remarks";

                echo "<div class='formSection'>Venue
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
                        </div>";
                getQuotationDetails($reqID, $conn, "venue");
                echo "</div>";
            }

            if ($result_pv->num_rows > 0) {
                $pv_row = $result_pv->fetch_assoc();
                $pv_photoPref = !empty($pv_row['photo_pref']) ? $pv_row['photo_pref'] : "Not Set";
                $pv_videoPref = !empty($pv_row['video_pref']) ? $pv_row['video_pref'] : "Not Set";
                $pv_remarks = !empty($pv_row['remarks']) ? $pv_row['remarks'] : "No remarks";

                echo "<div class='formSection'>Photography & Videography
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
                        </div>";
                getQuotationDetails($reqID, $conn, "photo");
                echo "</div>";
            }

            if ($result_sl->num_rows > 0) {
                $sl_row = $result_sl->fetch_assoc();
                $sl_sound = !empty($sl_row['sound_type']) ? $sl_row['sound_type'] : "Not Set";
                $sl_light = !empty($sl_row['light_type']) ? $sl_row['light_type'] : "Not Set";
                $sl_remarks = !empty($sl_row['remarks']) ? $sl_row['remarks'] : "No remarks";

                echo "<div class='formSection'>Sound & Lighting
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
                        </div>";
                getQuotationDetails($reqID, $conn, "ent");
                echo "</div>";
            }
            ?>

        </div>

        <div class="form-card scrollable">
            <form method="POST" action="controllers/sendQuotation.php" enctype="multipart/form-data">
                <div class="form-title">Send Quotation</div>
                <input type="hidden" name="reqID" value="<?php echo $reqID; ?>" />
                <input type="hidden" name="cusId" value="<?php echo $customerID; ?>" />
                <div class="row">
                    <div class="input">
                        <label class="input-label">Event Planner's Cost</label>
                        <input id="epCost" onkeyup="calcTotalCost()" onchange="calcTotalCost()" value="0" type="number" class="input-field" name="epCost" placeholder="Cost" />
                    </div>
                    <?php if ($result_food->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Food & Beverages</label>
                                <input id="foodBevId" type="hidden" value="0" name="foodBevId" />
                                <input id="foodBevName" type="text" class="input-field" name="foodBevName" placeholder="Supplier Name / Product Name" />
                                <input id="foodBevCost" onkeyup="calcTotalCost()" onchange="calcTotalCost()" value="0" type="number" class="input-field" name="foodBevCost" placeholder="Cost" style="margin-top: 5px;" />
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($result_venue->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Venue</label>
                                <input id="venueId" type="hidden" value="0" name="venueId" />
                                <input id="venueName" type="text" class="input-field" name="venueName" placeholder="Supplier Name / Product Name" />
                                <input id="venueCost" onkeyup="calcTotalCost()" onchange="calcTotalCost()" value="0" type="number" class="input-field" name="venueCost" placeholder="Cost" style="margin-top: 5px;" />

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($result_pv->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Photography & Videography</label>
                                <input id="pvId" type="hidden" value="0" name="pvId" />
                                <input id="pvName" type="text" class="input-field" name="pvName" placeholder="Supplier Name / Product Name" />
                                <input id="pvCost" onkeyup="calcTotalCost()" onchange="calcTotalCost()" value="0" type="number" class="input-field" name="pvCost" placeholder="Cost" style="margin-top: 5px;" />

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($result_sl->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Sound & Lighting</label>
                                <input id="slId" type="hidden" value="0" name="slId" />
                                <input id="slName" type="text" class="input-field" name="slName" placeholder="Supplier Name / Product Name" />
                                <input id="pvCost" onkeyup="calcTotalCost()" onchange="calcTotalCost()" value="0" type="number" class="input-field" name="pvCost" placeholder="Cost" style="margin-top: 5px;" />

                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Total Cost</label>
                            <input id="totalCost" type="text" class="input-field" name="totalCost" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Remarks <span class="desc">(You can specify other expenses or special notes here.)</span></label>
                            <textarea class="input-field" rows="5" name="remarks"></textarea>
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