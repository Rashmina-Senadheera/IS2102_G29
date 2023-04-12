<?php
    include('../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    include('../controllers/commonFunctions.php');
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
                        <div class='rs-card-img'>
                        </div>
                        <div class='ps-card-desc' id="rs">
                            <div class='rs-title'>Quotation Request</div>
                            <div class='rs-title' id = 'tit'>Event Date</div>
                            <div class='rs-title' id = 'tit'>Event Type </div>
                            <div class='rs-title' id = 'tit'>Urgency </div>
                        </div>
                    </div>

                    <?php
                        $sql = "SELECT * FROM request_supplier_quotation WHERE status='Pending'";
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
                                
                                echo 
                                "<a href='quote-view.php?id=".$request_id."' id='a-card'>
                                    <div class='ps-card'>
                                        <div class='rs-card-img'>
                                            <img src= '../../images/S1.jpeg' alt=''>
                                        </div>
                                        <div class='ps-card-desc' id='rs'>
                                            <div class='rs-title'>".$title."</div>
                                            <div class='rs-type'>".$date."</div>
                                            <div class='rs-type'>".$event_type."</div>
                                            <div class='rs-type' id='urg'>".$urgency."</div>
                                        </div>
                                    </div>
                                </a> " ;
                        } }else {
                            echo "No supplier found";
                        }
                    ?>
                </div>         
            </div>
            <div class="filter">
                <div class="search">
                    <div class = 'input-container'>
                        <input class = 'input-field-filter' type = 'text' placeholder = 'Search payments' name = 'search'>
                        <i class = 'fa fa-search icon'></i>
                    </div>
                </div>
                <div class="status">
                    <div class="filter-heading">Filter by Status</div>
                    <div class="status-list">
                        <ul>
                            <li><a href="#">
                                <div class="li-heading" id="out">Urgent</div>
                            </a></li>
                            <li><a href="#">
                                <div class="li-heading" id="in">Not Urgent</div>
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="category">
                    <div class="filter-heading">Filter by Category</div>
                    <div class="category-list">
                        <ul>
                            <li><input type="checkbox">All</li>
                            <li><input type="checkbox">Venue</li>
                            <li><input type="checkbox">Entertainment</li>
                            <li><input type="checkbox">Catering</li>
                            <li><input type="checkbox">Photography</li>
                            <li><input type="checkbox">Transport</li>
                            <li><input type="checkbox">Beverages</li>
                            <li><input type="checkbox">Florists</li>
                            <li><input type="checkbox">Decoration</li>
                            <li><input type="checkbox">Lighting</li>
                            <li><input type="checkbox">Audio/Vedio</li>
                        </ul>
                    </div>
                    <div class="sort">
                    <div class="filter-heading">Filter by Date</div>
                    <div class="sort-list">
                        <ul>
                            <li>
                                <select name="date" id="date-sort">
                                    <option value="oldest">Oldest on Top</option>
                                    <option value="newest">Newest on Top</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>

