<?php
include('eventplanner_sidenav.php');
include('eventplanner_header.php');
include('../controllers/commonFunctions.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/viewSuppliersEP.css">
    <link rel="stylesheet" href="../../css/filterEP.css">
    <!-- <link rel="stylesheet" href="../../css/eventPlannerMain.css"> -->
    <link rel='stylesheet' href='../../css/req-list.css'>
</head>

<body>
    <!-- Show success message -->
    <?php
    if (isset($_SESSION['success'])) {
        echo '<div class="success-message">' . showSessionMessage("success") . '</div>';
    }
    ?>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Quotation Requests </div>
            </div>
        </div>
        <div class="ps-list">
            <div class='grid-main' id='rs-list'>
                <div class="cards">
                    <div class='ps-card-title' id='title'>
                        <div class='rs-title t2'></div>
                        <div class='rs-title'>Requested On</div>
                        <div class='rs-title'>Event Type</div>
                        <div class='rs-title'>Participants</div>
                        <div class='rs-title'>Theme</div>
                        <div class='rs-title'>Tentative Dates</div>
                        <div class='rs-title'>Budget (Rs.)</div>
                        <div class='rs-title t2'></div>
                    </div>

                    <?php
                    $sql = "SELECT * FROM cust_req_general AS c, request_ep_quotation AS r WHERE c.request_id = r.request_id AND status = 'pending'";
                    // $sql = "SELECT * FROM cust_req_general";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $request_id = !empty($row['request_id']) ? $row['request_id'] : "Not Set";
                            $reqdate = !empty($row['req_date']) ? $row['req_date'] : "Not Set";
                            $event_type = !empty($row['event_type']) ? $row['event_type'] : "Not Set";
                            $no_of_guests = !empty($row['no_of_pax']) ? $row['no_of_pax'] : "Not Set";
                            $theme = !empty($row['theme']) ? $row['theme'] : "Not Set";
                            $date1 = !empty($row['from_date']) ? $row['from_date'] : "Not Set";
                            $date = !empty($row['to_date']) ? $date1. " to " . $row['to_date'] : $date1;
                            $budget1 = !empty($row['min_budget']) ? formatCurrency($row['min_budget']) : "0";
                            $budget2 = !empty($row['max_budget']) ? "- " . formatCurrency($row['max_budget']) : " ";
                            // $customer_id = $row['customer_id'];
                            $customer_id = 46;

                            echo "
                                    <div class='ps-card'>
                                        <div class='ps-card-desc' id='rs'>
                                            <a class='rs-title t2' href='Request-view.php?reqID=$request_id' id='a-card'>
                                                <div>#R$request_id</div>
                                            </a>
                                            <a class='rs-type' href='Request-view.php?reqID=$request_id' id='a-card'>
                                                <div>$reqdate</div>
                                            </a>
                                            <a class='rs-type' href='Request-view.php?reqID=$request_id' id='a-card'>
                                                <div>$event_type</div>
                                            </a>
                                            <a class='rs-type' href='Request-view.php?reqID=$request_id' id='a-card'>
                                                <div>$no_of_guests</div>
                                            </a>
                                            <a class='rs-type' href='Request-view.php?reqID=$request_id' id='a-card'>
                                                <div>$theme</div>
                                            </a>
                                            <a class='rs-type' href='Request-view.php?reqID=$request_id' id='a-card'>
                                                <div>$date</div>
                                            </a>
                                            <a class='rs-type' href='Request-view.php?reqID=$request_id' id='a-card'>
                                                <div>$budget1 $budget2</div>
                                            </a>
                                            <div class='rs-type t2 menu'>&#10247
                                                <ul>
                                                <li>
                                                    <button type='button' onclick='view($request_id)' class='view'>
                                                        View
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type='button' onclick='sendQuotation($request_id, $customer_id)' class='sendQuotation'>
                                                        Send Quotation
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type='button' onclick='sendMessage($request_id, $customer_id)' class='sendQuotation'>
                                                        Send Message
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type='button' onclick='declineRequest($request_id, $customer_id)' class='destructive'>Decline</button>
                                                </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>";
                        }
                    } else {
                        echo "No requests found";
                    }
                    ?>
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
<script src="../../js/sortTable.js"></script>
<script src="../../js/epHandleCusReq.js"></script>
<script>
    function view(id) {
        window.location.href = "Request-view.php?reqID=" + id;
    }

    function sendQuotation(id) {
        window.location.href = "SendCustomerQuotation.php?reqID=" + id;
    }

    function sendMessage(id) {
        window.location.href = "Messages.php";
    }
</script>

</html>