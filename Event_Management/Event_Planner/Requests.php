<?php
include('eventplanner_sidenav.php');
include('eventplanner_header.php');
include('./controllers/commonFunctions.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/viewSuppliersEP.css">
    <link rel="stylesheet" href="../css/filterEP.css">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
</head>

<body>
    <!-- Show success message -->
    <div class="success-message">
        <?php echo showSessionMessage('success'); ?>
    </div>
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
                if (true) {
                    // if (mysqli_num_rows($result) > 0) {
                ?>
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">Req. ID</th>
                            <th onclick="sortTable(1)">Requested On</th>
                            <th onclick="sortTable(2)">Event Type</th>
                            <th>Participants</th>
                            <th onclick="sortTable(4)">Theme</th>
                            <th onclick="sortTable(5)">Tentative Dates</th>
                            <th onclick="sortTable(6)">Budget</th>
                        </tr>
                    </thead>
                    <tr>
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
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2022-05-01</td>
                        <td>Exhibition</td>
                        <td>Not provided</td>
                        <td>Classic</td>
                        <td>2022-05-15 to 2022-05-18</td>
                        <td>Not provided</td>
                        <td class="tCenter menu">&#10247
                            <ul>
                                <li>
                                    <a href="#">View</a>
                                </li>
                                <li>
                                    <a href="#">Send Quotation</a>
                                </li>
                                <li>
                                    <a href="#">Message Customer</a>
                                </li>
                                <li>
                                    <a href="#" class="destructive">Decline</a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2022-05-01</td>
                        <td>Birthday</td>
                        <td>30</td>
                        <td>Classic</td>
                        <td>2022-05-15</td>
                        <td>Rs. 100,000</td>
                        <td class="tCenter menu">&#10247
                            <ul>
                                <li>
                                    <a href="#">View</a>
                                </li>
                                <li>
                                    <a href="#">Send Quotation</a>
                                </li>
                                <li>
                                    <a href="#">Message Customer</a>
                                </li>
                                <li>
                                    <a href="#" class="destructive">Decline</a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>2022-05-01</td>
                        <td>Wedding</td>
                        <td>100</td>
                        <td>Classic</td>
                        <td>2022-05-15</td>
                        <td>Rs. 220,000</td>
                        <td class="tCenter menu">&#10247
                            <ul>
                                <li>
                                    <a href="#">View</a>
                                </li>
                                <li>
                                    <a href="#">Send Quotation</a>
                                </li>
                                <li>
                                    <a href="#">Message Customer</a>
                                </li>
                                <li>
                                    <a href="#" class="destructive">Decline</a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['request_id'] . "</td>";
                        echo "<td>" . $row['event_type'] . "</td>";
                        echo "<td>" . $row['event_date'] . "</td>";
                        echo "<td>" . $row['event_time'] . "</td>";
                        echo "<td>" . $row['theme '] . "</td>";
                        echo "<td>" . $row['event_budget'] . "</td>";
                        echo "<td>" . $row['event_description'] . "</td>";
                        echo "<td><a href='viewQuotation.php?id=" . $row['id'] . "'><button class='view-button'>View</button></a></td>";
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
                    <a href="SendCustomerQuotation.php">
                        <button type="button" class="accepted" style="margin-left: 0;">
                            Yes, Decline
                        </button>
                    </a>
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

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btnDecline.onclick = function() {
        modal.style.display = "block";
    }

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
</script>

</html>