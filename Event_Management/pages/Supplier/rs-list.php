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
                <div class="cards" >
                    <div class='ps-card-title' id='title'>
                        <div class='ps-card-desc' id="rs">
                            <div class='rs-title' id = 'rid' ></div>
                            <div class='rs-title'  >Quotation Request</div>
                            <div class='rs-title' id = 'tit' >Requested Date</div>
                            <div class='rs-title' id = 'tit'>Tentative Event Date</div>
                            <div class='rs-title' id = 'tit'>Event Type </div>
                            <div class='rs-title' id = 'tit'>Product Type </div>
                        </div>
                    </div>

                    <?php
                        $sql = "SELECT * FROM request_supplier_quotation WHERE status='Pending' AND supplierId = $id";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $request_id  = $row['request_id'];
                                $date = $row['date'];
                                $theme = $row['theme'];
                                $product_type = $row['product_type'];
                                $remarks = $row['remarks'];
                                $event_type = $row['event_type'];
                                $status = $row['status'];
                                $EP_id = $row['EP_id'];
                                $urgency = $row['urgency'];
                                $supplierId = $row['supplierId'];
                                $title = $row['product_title'];
                                $requested_date = $row['requested_on'];
                                
                                echo 
                                "<a href='quote-view.php?id=".$request_id."' id='a-card'>
                                    <div class='ps-card'>
                                        <div class='ps-card-desc' id='rs'>
                                            <div class='rs-title' id = 'rid'>".$request_id."</div>
                                            <div class='rs-title'>".$title."</div>
                                            <div class='rs-type'>".$requested_date."</div>
                                            <div class='rs-type'>".$date."</div>
                                            <div class='rs-type'>".$event_type."</div>
                                            <div class='rs-type'>".$product_type."</div>
                                        </div>
                                    </div>
                                </a> " ;
                        } }else {
                            echo "No Requests for Quoatations found";
                        }
                    ?>
                </div>         
            </div>
        </div>
    </body>

</html>

