<?php
    include('../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    include('../controllers/commonFunctions.php');
    $id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset = 'UTF-8'>
        <meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
        <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel = 'stylesheet' href = '../../css/supplierMain.css'>
        <link rel = 'stylesheet' href = '../../css/ps-list.css'>
    </head>
        
    <body>
        <div class = 'container-main'>
            <div class = 'flex-container-main'>
                <div class="title-search">
                    <div class = 'searchSec'>
                        <div class = 'page-title'>Quotation Request</div>
                    </div>
                </div>
            </div>
        <div class="ps-list">
            <div class ='grid-main' id='rs-list'>

                <div class="tab">
                    <button class="tablinks" onclick="openTab(event, 'Pending')" id="defaultOpen" data-value="Pending">Pending</button>
                    <button class="tablinks" onclick="openTab(event, 'Completed')" data-value="Completed">Completed</button>
                    <button class="tablinks" onclick="openTab(event, 'Declined')" data-value="Declined">Declined</button>
                </div>

                <div class='.ps-card-message'>
                        <?php if (isset($_SESSION['success'])) { 
                            echo '<p class="success" id="quote">' . showSessionMessage("success") . '</p>';
                            echo "<script>setTimeout(() => window.location.reload(), 700);</script>"; 
                        }?>
                        <?php if (isset($_SESSION['error'])) { 
                            echo '<p class="error" id="quote">' . showSessionMessage("error") . '</p>';
                            echo "<script>setTimeout(() => window.location.reload(), 700);</script>"; 
                        } ?>
                </div>

                <div id="Pending" class="tabcontent">
                    <?php require_once('components/SupQuotPending.php'); ?>
                </div>

                <div id="Completed" class="tabcontent">
                    <?php require_once('components/SupQuotCompleted.php'); ?>
                </div>

                <div id="Declined" class="tabcontent">
                    <?php require_once('components/SupQuotDeclined.php'); ?>
                </div>         
            </div>
            <?php require_once 'components/quotationFilter.php'; ?>
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
    <script src="../../js/quoteSupplierFilter.js"></script>


</html>

