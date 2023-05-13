<div class="ps-list">
    <div class='grid-main' id='rs-list'>
        <div class="cards">

            <?php
            if(!empty($reqID)) {
                $sql = "SELECT * FROM supplier_quotation WHERE ep_id='$_SESSION[user_id]' AND for_cus_req='$reqID' ORDER BY quotation_id DESC";
            } else {
                $sql = "SELECT * FROM supplier_quotation WHERE ep_id='$_SESSION[user_id]' ORDER BY quotation_id DESC";
            }

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
            ?>
                    <div class='ps-card-title' id='title'>
                        <div class='rs-title t2'></div>
                        <div class='rs-title sq'>Product / Service</div>
                        <div class='rs-title sq'>Request ID</div>
                        <div class='rs-title sq'>Date</div>
                        <div class='rs-title sq'>Budget (Rs.)</div>
                        <div class='rs-title sq'>Status</div>
                        <!-- <div class='rs-title t2'></div> -->
                    </div>
            <?php
                    while ($row = $result->fetch_assoc()) {
                        $qid = $row['quotation_id'];
                        $title = $row['title'];
                        $request_id = $row['req_id'];
                        $date = $row['date'];
                        $cost = formatCurrency($row['cost']);
                        $status = $row['status'];

                        echo "<div class='ps-card'>
                                    <div class='ps-card-desc' id='rs'>
                                        <a class='rs-title t2' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>#Q$qid</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>$title</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>#R$request_id</div>
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
                                        <!-- <div class='rs-type t2 menu'>&#10247
                                                <ul>
                                                <li>
                                                    <button type='button' onclick='view($request_id)' class='view'>
                                                        View
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type='button' onclick='view($request_id)' class='sendQuotation'>
                                                        Send Quotation
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type='button' onclick='view($request_id)' class='sendQuotation'>
                                                        Send Message
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type='button' onclick='view($request_id)' class='destructive'>Decline</button>
                                                </li>
                                                </ul>
                                        </div> -->
                                    </div>
                                </div>";
                    }
                } else {
                    echo "<div class='no-records'>
                            No Quotations Received
                            <img src='../../images/no-record.png' alt='No Requests'>
                        </div>";
                }
            }
            ?>

        </div>
    </div>
</div>