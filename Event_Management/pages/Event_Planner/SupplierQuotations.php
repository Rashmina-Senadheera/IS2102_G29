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
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/filterEP.css">
    <!-- <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel='stylesheet' href='../../css/req-list.css'>
</head>
</head>

<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Supplier Quotations </div>
            </div>
        </div>
        <div class="gridMain">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Received')" id="defaultOpen">Received</button>
                <button class="tablinks" onclick="openTab(event, 'Requested')">Requested</button>
                <button class="tablinks" onclick="openTab(event, 'Declined')">Declined</button>
            </div>

            <div id="Received" class="tabcontent">
                <?php include('components/SupplierQuotationsReceived.php'); ?>
            </div>

            <div id="Requested" class="tabcontent">
                <?php include('components/SupplierQuotationsRequested.php'); ?>
            </div>

            <div id="Declined" class="tabcontent">
                <?php include('components/SupplierQuotationsDeclined.php'); ?>
            </div>

        </div>
    </div>

</body>
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