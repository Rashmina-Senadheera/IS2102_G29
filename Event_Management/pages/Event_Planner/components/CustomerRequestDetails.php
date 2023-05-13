<?php
function getQuotationDetails($reqID, $conn, $type)
{
    // display supplier quotations related to this event
    $sql = "SELECT s.*, r.psId
            FROM supplier_quotation s, request_supplier_quotation r
            WHERE s.for_cus_req = '$reqID' AND 
            type = '$type' AND 
            s.req_id = r.request_id";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='row'>
            <div class='input'>
                <label class='input-label'>Supplier Quotations related to this event:</label>
                    <table class='related-quotations'>";

        while ($row = $result->fetch_assoc()) {
            $qid = $row['quotation_id'];
            $pid = $row['psId'];
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

            echo "<tr onClick='$setFunction(`$qid`, `$pid`, `$title`, `$cost`)'>
                <td>$title</td>
                <td>Rs. " . formatCurrency($cost) . "</td>
            </tr>";
        }
        echo "          </table>
                </div>
            </div>";
    }
}
?>
<div class="form-card scrollable">
    <div class="form-title">Request Details</div>
    <div class="form-description">The customer has requested the quotation for the following details.</div>
    <div class="formSection quotation">General
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
                <div class="input-value"><?php echo ucwords($theme) ?></div>
            </div>
        </div>
        <div class="row">
            <div class="input-50">
                <label class="input-label">Tentative Date:</label>
                <div class="input-value"><?php echo $event_date ?></div>
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

        echo "<div class='formSection quotation'>Food & Beverages
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
        $venue_type = ucwords($venue_row['venue']);
        $venue_remarks = !empty($venue_row['remarks']) ? $venue_row['remarks'] : "No remarks";

        echo "<div class='formSection quotation'>Venue
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

        echo "<div class='formSection quotation'>Photography & Videography
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

        echo "<div class='formSection quotation'>Sound & Lighting
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
                                <div class='input-value'>$sl_remarks</div>
                            </div>
                        </div>";
        getQuotationDetails($reqID, $conn, "ent");
        echo "</div>";
    }
    ?>

</div>