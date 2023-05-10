<div class="ps-list">
    <div class='grid-main' id='rs-list'>
        <div class="cards">

            <?php
            $sql = "SELECT * FROM request_supplier_quotation WHERE status='Declined' AND EP_id='$_SESSION[user_id]' ORDER BY request_id DESC";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $r_id = $row['request_id'];
                        $r_title = $row['product_title'];
                        $r_type = $row['event_type'];
                        $r_requested_on = $row['requested_on'];
                        echo "<a href='order-view.php' id='a-card'>
                                    <div class='ps-card'>
                                        <div class='rs-card-img'>
                                            <img src='../../images/cs1.jpg' alt=''>
                                        </div>
                                        <div class='ps-card-desc' id='rs'>
                                            <div class='rs-title'>Request for $r_title</div>
                                            <div class='rs-type'>#Q$r_id</div>
                                            <div class='rs-type'>$r_type</div>
                                            <div class='rs-type' id='urg'>$r_requested_on</div>
                                        </div>
                                    </div>
                                    </a>";
                    }
                } else {
                    echo "<div class='no-records'>
                            No Declined Quotations
                            <img src='../../images/no-record.png' alt='No Requests'>
                        </div>";
                }
            }
            ?>

        </div>
    </div>
</div>