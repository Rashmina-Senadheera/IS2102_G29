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
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
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
                <!-- <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search suppliers" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button> -->
            </div>
        </div>
        <div class="gridMain">
            <table id="tableToSort" class="ep-table">

                <?php
                $sql = "SELECT * FROM request_ep_quotation";
                $result = mysqli_query($conn, $sql);
                // if (true) {
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">Req. ID</th>
                            <th onclick="sortTable(1)">Requested On</th>
                            <th onclick="sortTable(2)">Event Type</th>
                            <th>Participants</th>
                            <th onclick="sortTable(4)">Theme</th>
                            <th onclick="sortTable(5)">Tentative Dates</th>
                            <th onclick="sortTable(6)">Budget (Rs.)</th>
                        </tr>
                    </thead>
                    <!-- <tr>
                        <td onclick="window.location='Request-view.php';">1</td>
                        <td onclick="window.location='Request-view.php';">2022-05-01</td>
                        <td onclick="window.location='Request-view.php';">Wedding</td>
                        <td onclick="window.location='Request-view.php';">170</td>
                        <td onclick="window.location='Request-view.php';">Classic</td>
                        <td onclick="window.location='Request-view.php';">2022-07-15</td>
                        <td onclick="window.location='Request-view.php';">Rs. 560,000</td>
                        <td class="tCenter menu">&#10247
                            <ul>
                                <li>
                                    <a href="Request-view.php">View</a>
                                </li>
                                <li>
                                    <a href="SendCustomerQuotation.php">Send Quotation</a>
                                </li>
                                <li>
                                    <a href="#">Message Customer</a>
                                </li>
                                <li>
                                    <button type="button" id="btnDecline" class="destructive">Decline</button>
                                </li>
                            </ul>
                        </td>
                    </tr> -->
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $request_id = !empty($row['request_id']) ? $row['request_id'] : "Not Set";
                        $reqdate = !empty($row['requested_on']) ? $row['requested_on'] : "Not Set";
                        $event_type = !empty($row['event_type']) ? $row['event_type'] : "Not Set";
                        $no_of_guests = !empty($row['no_of_guests']) ? $row['no_of_guests'] : "Not Set";
                        $theme = !empty($row['theme']) ? $row['theme'] : "Not Set";
                        $date = !empty($row['date']) ? $row['date'] : "Not Set";
                        $budget1 = !empty($row['budget_min']) ? $row['budget_min'] : "0";
                        $budget2 = !empty($row['budget_max']) ? "- " . $row['budget_max'] : " ";
                        $customer_id = $row['customer_id'];

                        echo "<tr>";
                        echo "<td onclick='requestView($request_id)'>$request_id</td>";
                        echo "<td onclick='requestView($request_id)'>$reqdate</td>";
                        echo "<td onclick='requestView($request_id)'>$event_type</td>";
                        echo "<td onclick='requestView($request_id)'>$no_of_guests</td>";
                        echo "<td onclick='requestView($request_id)'>$theme</td>";
                        echo "<td onclick='requestView($request_id)'>$date</td>";
                        echo "<td onclick='requestView($request_id)'>$budget1 $budget2</td>";


                        echo '<td class="tCenter menu">&#10247
                                <ul>
                                        <li>
                                            <a href="Request-view.php?reqID=' . $request_id . '">View</a>
                                        </li>
                                        <li>
                                            <a href="SendCustomerQuotation.php?reqID=' . $request_id . '">Send Quotation</a>
                                        </li>
                                        <li>
                                            <a href="Messages.php">Message Customer</a>
                                        </li>
                                        <li>
                                        <button type="button" onclick="declineRequest(' . $request_id . ')" class="destructive">Decline</button>
                                        </li>
                                    </ul>
                                </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No requests found</td></tr>";
                }
                ?>
            </table>
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
                <div class="actionBtn">
                    <button type="button" class="rejected" style="margin-left: 0;">
                        Cancel
                    </button>
                    <button type="button" class="accepted" style="margin-left: 0;">
                        Yes, Decline
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

</body>
<script src="../js/sortTable.js"></script>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Request view
    requestView = (requestID) => {
        window.location = "Request-view.php?reqID=" + requestID
    }

    // Decline request
    declineRequest = (requestID) => {
        modal.style.display = "block";
    }
</script>

</html>