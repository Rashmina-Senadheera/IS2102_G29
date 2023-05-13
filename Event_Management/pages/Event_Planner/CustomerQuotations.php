<?php
require_once('eventplanner_sidenav.php');
require_once('eventplanner_header.php');
require_once('../controllers/commonFunctions.php');

$isAccepted = $isPending = $isDeclined = "";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == "accepted") {
        $isAccepted = 'id="defaultOpen"';
    } else if ($page == "pending") {
        $isPending = 'id="defaultOpen"';
    } else if ($page == "declined") {
        $isDeclined = 'id="defaultOpen"';
    } else {
        $isAccepted = 'id="defaultOpen"';
    }
} else {
    $isAccepted = 'id="defaultOpen"';
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/filterEP.css">
    <link rel='stylesheet' href='../../css/req-list.css'>
</head>

<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title">Customer Quotations </div>
                <!-- <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search quotation" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button> -->
            </div>
        </div>
        <div class="gridMain">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Accepted')" <?php echo $isAccepted ?>>Accepted</button>
                <button class="tablinks" onclick="openTab(event, 'Pending')" <?php echo $isPending ?>>Pending</button>
                <button class="tablinks" onclick="openTab(event, 'Declined')" <?php echo $isDeclined ?>>Declined</button>
            </div>

            <div id="Accepted" class="tabcontent">
                <?php
                $sql = "SELECT e.*, u.name, c.event_type, SUM(ei.cost) AS sCost
                FROM ep_quotation e, user u, cust_req_general c, ep_quotation_items ei 
                WHERE 
                e.epId = '$_SESSION[user_id]' AND 
                e.cusId = u.user_id AND 
                e.reqId = c.request_id AND
                e.qId = ei.qId AND
                e.status = 'Accepted'
                GROUP BY e.qId
                ORDER BY e.qId DESC";

                include('components/CustomerQuotationsRow.php'); ?>
            </div>

            <div id="Pending" class="tabcontent">
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

                include('components/CustomerQuotationsRow.php'); ?>
            </div>

            <div id="Declined" class="tabcontent">
                <?php
                $sql = "SELECT e.*, u.name, c.event_type, SUM(ei.cost) AS sCost
                FROM ep_quotation e, user u, cust_req_general c, ep_quotation_items ei 
                WHERE 
                e.epId = '$_SESSION[user_id]' AND 
                e.cusId = u.user_id AND 
                e.reqId = c.request_id AND
                e.qId = ei.qId AND
                e.status = 'declined'
                GROUP BY e.qId
                ORDER BY e.qId DESC";

                include('components/CustomerQuotationsRow.php'); ?>
            </div>
        </div>
    </div>

</body>
<!-- <script src="../../js/sortTable.js"></script> -->
<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

</html>