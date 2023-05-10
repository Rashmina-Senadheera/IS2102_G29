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
                                <div class='rs-title'>Order Request</div>
                                <div class='rs-title' id = 'tit'>Quotation Number</div>
                                <div class='rs-title' id = 'tit'>Event Type </div>
                                <div class='rs-title' id = 'tit'>Requested </div>
                            </div>
                        </div>

                        <?php
                        $sql = "SELECT * FROM supplier_booking 
                                JOIN supplier_quotation 
                                ON supplier_booking.EP_quotation_id = supplier_quotation.req_id 
                                JOIN request_supplier_quotation
                                ON supplier_booking.EP_quotation_id = request_supplier_quotation.request_id 
                                WHERE supplier_booking.supplier_id = $id ";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $title  = $row['title'];
                                $type  = $row['type'];
                                $cost  = $row['cost'];
                                $date  = $row['date'];
                                $EP_id   = $row['EP_id '];


                                $sql1 = "SELECT * FROM supplier_booking JOIN user ON supplier_booking.EP_id = user.user_id WHERE supplier_booking.EP_id = $EP_id AND supplier_booking.EP_quotation_id = $request_id; ";
                                $result1 = mysqli_query($conn, $sql1);
                                
                                if (mysqli_num_rows($result1) > 0) {
                                    while ($row = mysqli_fetch_assoc($result1)) {
                                        $ep = $row['name'];
                                    }
                                }
                                echo 
                                "<a href='quote-view.php?id=".$request_id."' id='a-card'>
                                    <div class='ps-card'>
                                        <div class='ps-card-desc' id='rs'>
                                            <div class='rs-title' id = 'rid'>".$request_id."</div>
                                            <div class='rs-title'>".$title."</div>
                                            <div class='rs-type'>".$ep."</div>
                                            <div class='rs-type'>".$date."</div>
                                            <div class='rs-type'>".$type."</div>
                                            <div class='rs-type'>".$cost ."</div>
                                        </div>
                                    </div>
                                </a> " ;
                        } }else {
                            echo "No Requests for Quoatations found";
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

<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>
