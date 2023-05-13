<div class="ps-list">
    <div class='grid-main' id='rs-list'>
        <div class="cards">

            <?php
            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
            ?>
                    <div class='ps-card-title' id='title'>
                        <div class='rs-title t2'></div>
                        <div class='rs-title sq'>Customer</div>
                        <div class='rs-title sq'>Event Type</div>
                        <div class='rs-title sq'>Date</div>
                        <div class='rs-title sq'>Event Planner Cost (Rs.)</div>
                        <div class='rs-title sq'>Total Budget (Rs.)</div>
                        <!-- <div class='rs-title t2'></div> -->
                    </div>
            <?php
                    while ($row = $result->fetch_assoc()) {
                        $qid = $row['qId'];
                        $cusName = $row['name'];
                        $eventType = $row['event_type'];
                        $date = $row['date'];
                        $epCost = $row['epCost'];
                        $cost = $row['sCost'];
                        $cost = $cost + $epCost;
                        $cost = formatCurrency($cost);
                        $epCost = formatCurrency($epCost);
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
                                            <div>$epCost</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>$cost</div>
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