<?php
    include('../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    if(isset($_SESSION['user_name'])){

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
                        <div class = 'page-title'>Order Request</div>
                    </div>
                </div>
            </div>
        <div class="ps-list">
            <div class ='grid-main' id='rs-list'>
                <div class="cards" >
                    <div class='ps-card-title' id='title'>
                            <div class='ps-card-desc' id="rs">
                                <div class='rs-title' id = 'oid' >Order</div>
                                <div class='rs-title' id = 'oid' >Quotation</div>
                                <div class='rs-title' id = 'tit'>Event Date </div>
                                <div class='rs-title' id = 'tit'>Event Planner </div>
                                <div class='rs-title' id = 'tit'>Cost </div>
                                <div class='rs-title' id = 'tit'>Status </div>
                            </div>
                        </div>

                        <?php
                        
                        $sql1 = "SELECT *, b.status AS orderStatus
                                FROM supplier_booking b
                                JOIN supplier_quotation q
                                ON b.supplier_quote_id = q.quotation_id
                                JOIN request_supplier_quotation r 
                                ON b.EP_quotation_id= r.request_id 
                                JOIN User u
                                ON u.user_id = b.supplier_id
                                WHERE b.supplier_id = $id; ";

                        $result1 = mysqli_query($conn, $sql1);
                        
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row = mysqli_fetch_assoc($result1)) {
                                echo 
                                "<a href='order-view.php?id=".$row['booking_id']."' id='a-card'>
                                    <div class='ps-card'>
                                        <div class='ps-card-desc' id='rs'>
                                            <div class='rs-title' id = 'rid' style='max-width:12%;min-width:12%;''>".$row['booking_id']."</div>
                                            <div class='rs-title' id = 'rid' style='max-width:12%;min-width:12%;'>".$row['EP_id']."</div>
                                            <div class='rs-type'>".$row['date']."</div>
                                            <div class='rs-type'>".$row['name']."</div>
                                            <div class='rs-type'>".$row['cost']."</div>
                                            <div class='rs-type'>".$row['orderStatus']."</div>
                                        </div>
                                    </div>
                                </a> " ;
                            }
                        } else {
                            echo "No Requests for Quoatations found";
                        }
                    ?>
                        

                </div>         
            </div>
            <?php require_once 'components/productFilter.php'; ?>
        </div>
        
    </body>

</html>

<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>
