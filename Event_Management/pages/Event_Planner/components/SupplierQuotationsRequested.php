<div class="ps-list">
    <div class='grid-main' id='rs-list'>
        <div class="cards">

            <?php
            if (!empty($reqID)) {
                $sql = "SELECT * FROM request_supplier_quotation WHERE (status='Pending' OR status='Completed') AND EP_id='$_SESSION[user_id]' AND for_cus_req='$reqID' ORDER BY request_id DESC";
            } else {
                $sql = "SELECT * FROM request_supplier_quotation WHERE (status='Pending' OR status='Completed') AND EP_id='$_SESSION[user_id]' ORDER BY request_id DESC";
            }

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
            ?>
                    <div class='ps-card-title' id='title'>
                        <div class='rs-title t2'></div>
                        <div class='rs-title sq'>Product / Service</div>
                        <div class='rs-title sq'>For Request</div>
                        <div class='rs-title sq'>Event Type</div>
                        <div class='rs-title sq'>Product Type</div>
                        <div class='rs-title sq'>Date</div>
                    </div>
            <?php
                    while ($row = $result->fetch_assoc()) {
                        $r_id = $row['request_id'];
                        $r_title = $row['product_title'];
                        $r_reqFor = $row['for_cus_req'];
                        $r_type = $row['event_type'];
                        $p_type = $row['product_type'];
                        // $r_location = !empty($row['location']) ? $row['location'] : 'Not set';
                        $r_requested_on = $row['requested_on'];
                        echo "<div class='ps-card'>
                                <div class='ps-card-desc' id='rs'>
                                    <div class='rs-title t2'>#SQR$r_id</div>
                                    <div class='rs-type sq'>Request for $r_title</div>
                                    <div class='rs-type sq'>#CR$r_reqFor</div>
                                    <div class='rs-type sq'>$r_type</div>
                                    <div class='rs-type sq'>" . ucwords($p_type) . "</div>
                                    <div class='rs-type sq'>$r_requested_on</div>
                                </div>
                            </div>";
                    }
                } else {
                    echo "<div class='no-records'>
                            No Records Found
                            <img src='../../images/no-record.png' alt='No Requests'>
                        </div>";
                }
            }
            ?>

        </div>
    </div>
</div>