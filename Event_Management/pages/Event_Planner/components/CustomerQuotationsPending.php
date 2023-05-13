<div class="ps-list">
    <div class='grid-main' id='rs-list'>
        <div class="cards">

            <?php
            $sql = "SELECT e.*, u.name, c.event_type, SUM(ei.cost) AS sCost
            FROM ep_quotation e, user u, cust_req_general c, ep_quotation_items ei 
            WHERE 
            e.epId = '$_SESSION[user_id]' AND 
            e.cusId = u.user_id AND 
            e.reqId = c.request_id AND
            e.qId = ei.qId AND
            e.status = 'pending'
            GROUP BY e.qId
            ORDER BY e.qId DESC";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
            ?>
                    <div class='ps-card-title' id='title'>
                        <div class='rs-title t2'></div>
                        <div class='rs-title sq'>Customer</div>
                        <div class='rs-title sq'>Event Type</div>
                        <div class='rs-title sq'>Date</div>
                        <div class='rs-title sq'>Budget (Rs.)</div>
                        <div class='rs-title sq'>Status</div>
                        <!-- <div class='rs-title t2'></div> -->
                    </div>
            <?php
                    while ($row = $result->fetch_assoc()) {
                        $qid = $row['qId'];
                        $cusName = $row['name'];
                        $eventType = $row['event_type'];
                        $date = $row['date'];
                        $cost = $row['sCost'];
                        $cost = $cost + $row['epCost'];
                        $cost = formatCurrency($cost);
                        $status = ucwords($row['status']);

                        echo "<div class='ps-card'>
                                    <div class='ps-card-desc' id='rs'>
                                        <a class='rs-title t2' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>#CQ$qid</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>$cusName</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>$eventType</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>$date</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>$cost</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>$status</div>
                                        </a>
                                    </div>
                                </div>";
                    }
                } else {
                    echo "<div class='no-records'>
                            No Quotations Accepted
                            <img src='../../images/no-record.png' alt='No Requests'>
                        </div>";
                }
            }
            ?>

        </div>
    </div>
</div>