<?php

include_once '../../constants.php';

// get the request id if it is set

$id = $_SESSION['user_id'];



if (isset($_GET['type'])) {
    $active = $_GET['active'];
    $reqDate = $_GET['reqDate'];
    $type = $_GET['type'];
    $search = $_GET['search'];
    $typeArr = explode(",", $type);
    $dbTypes = "";

    for ($i = 0; $i < count($typeArr); $i++) {
        if ($i == 0) {
            $dbTypes = $dbTypes . "`type` = '" . $typeArr[$i] . "'";
        } else {
            $dbTypes = $dbTypes . " OR `type` = '" . $typeArr[$i] . "'";
        }
    }

    
        if($active == "Pending"){
            echo "<div class='ps-card-title' id='title'>
                <div class='ps-card-desc' id='rs'>
                    <div class='rs-title' id = 'rid' ></div>
                    <div class='rs-title'  >Quotation Request</div>
                    <div class='rs-title' id = 'tit' >Req. Date</div>
                    <div class='rs-title' id = 'tit'>Event Date</div>
                    <div class='rs-title' id = 'tit'>Event Type </div>
                    <div class='rs-title' id = 'tit'>Product  </div>
                </div>
                </div>
                <div class='cards' id='rs' > ";
        }
        if($active == "Completed"){
            echo "<div class='ps-card-title' id='title'>
                <div class='ps-card-desc' id='rs'>
                    <div class='rs-title' id = 'rid' ></div>
                    <div class='rs-title'  >Quotation Request</div>
                    <div class='rs-title' id = 'tit' >Event Date</div>
                    <div class='rs-title' id = 'tit'>Event Type </div>
                    <div class='rs-title' id = 'tit'>Cost</div>
                    <div class='rs-title' id = 'tit'>Status </div>
                </div>
                </div>
                <div class='cards' id='rs' > ";
        }
        if($active == "Declined"){
            echo "<div class='ps-card-title' id='title'>
                <div class='ps-card-desc' id='rs'>
                    <div class='rs-title' id = 'rid' ></div>
                    <div class='rs-title'  >Quotation Request</div>
                    <div class='rs-title' id = 'tit' >Event Date</div>
                    <div class='rs-title' id = 'tit'>Event Type </div>
                    <div class='rs-title' id = 'tit'>Cost</div>
                    <div class='rs-title' id = 'tit'>Status </div>
                </div>
                </div>
                <div class='cards' id='rs' > ";
        } 
        
        if ($search != "" && $type != "" ) {
            if($active == "Pending") {
                $sql = "SELECT * 
                        FROM request_supplier_quotation r
                        JOIN sup_product_general p
                        ON r.psId = p.product_id 
                        WHERE  (p.title LIKE '%" . $search . "%' 
                        OR r.date LIKE '%" . $search . "%')
                        AND (" . $dbTypes . ") 
                        AND r.status='Pending'
                        AND r.supplierId = $id
                        ORDER BY r.requested_on " . $reqDate ;
            }
            if($active == "Completed") {
                $sql = "SELECT *, q.status AS orderStatus 
                        FROM request_supplier_quotation r
                        JOIN supplier_quotation q
                        ON r.request_id = q.req_id 
                        WHERE  (p.title LIKE '%" . $search . "%' 
                        OR r.date LIKE '%" . $search . "%')
                        AND (" . $dbTypes . ") 
                        AND r.status='Completed'
                        AND r.supplierId = $id
                        ORDER BY q.date  " . $reqDate ;
            }
            if($active == "Declined") {
                $sql = "SELECT * 
                        FROM request_supplier_quotation r
                        JOIN sup_product_general p
                        ON r.psId = p.product_id
                        WHERE  (p.title LIKE '%" . $search . "%' 
                        OR r.date LIKE '%" . $search . "%')
                        AND (" . $dbTypes . ") 
                        AND r.status='declined'
                        AND r.supplierId = $id
                        ORDER BY r.requested_on " . $reqDate ." , ";
            }
        } else if ($search == "" && $type != "") {
            if($active == "Pending") {    
                $sql = "SELECT * 
                        FROM request_supplier_quotation r
                        JOIN sup_product_general p
                        ON r.psId = p.product_id 
                        WHERE  (" . $dbTypes . ") 
                        AND r.status='Pending'
                        AND r.supplierId = $id
                        ORDER BY r.requested_on " . $reqDate ."";
            }
            if($active == "Completed") {    
                $sql = "SELECT * , q.status AS orderStatus
                        FROM request_supplier_quotation r
                        JOIN supplier_quotation q
                        ON r.request_id = q.req_id 
                        WHERE  (" . $dbTypes . ") 
                        AND r.status='Completed'
                        AND r.supplierId = $id
                        ORDER BY q.date  " . $reqDate ;
            }
            if($active == "Declined") {    
                $sql = "SELECT * 
                        FROM request_supplier_quotation r
                        JOIN sup_product_general p
                        ON r.psId = p.product_id 
                        WHERE  (" . $dbTypes . ") 
                        AND r.status='declined'
                        AND r.supplierId = $id
                        ORDER BY r.requested_on " . $reqDate ."";
            }
        } else if ($search != "" && $type == "") {
            if($active == "Pending") {   
                $sql = "SELECT * 
                        FROM request_supplier_quotation r
                        JOIN sup_product_general p
                        ON r.psId = p.product_id 
                        WHERE (p.title LIKE '%" . $search . "%' OR r.date LIKE '%" . $search . "%' )
                        AND r.status='Pending'
                        AND r.supplierId = $id
                        ORDER BY r.requested_on " . $reqDate ."";
            }
            if($active == "Completed") {   
                $sql = "SELECT *, q.status AS orderStatus 
                        FROM request_supplier_quotation r
                        JOIN supplier_quotation q
                        ON r.request_id = q.req_id 
                        WHERE (p.title LIKE '%" . $search . "%' OR r.date LIKE '%" . $search . "%' )
                        AND r.status='Completed'
                        AND r.supplierId = $id
                        ORDER BY q.date  " . $reqDate ;
            }
            if($active == "Declined") {   
                $sql = "SELECT * 
                        FROM request_supplier_quotation r
                        JOIN sup_product_general p
                        ON r.psId = p.product_id 
                        WHERE (p.title LIKE '%" . $search . "%' OR r.date LIKE '%" . $search . "%' )
                        AND r.status='declined'
                        AND r.supplierId = $id
                        ORDER BY r.requested_on " . $reqDate ."";
            }
        } else {
            if($active == "Pending") {  
                $sql = "SELECT * 
                        FROM request_supplier_quotation r
                        JOIN sup_product_general p
                        ON r.psId = p.product_id 
                        AND r.status='Pending'
                        AND r.supplierId = $id
                        ORDER BY  r.requested_on " . $reqDate ."";
            }
            if($active == "Completed") {  
                $sql = "SELECT *, q.status AS orderStatus 
                        FROM request_supplier_quotation r
                        JOIN supplier_quotation q
                        ON r.request_id = q.req_id 
                        AND r.status='Completed'
                        AND r.supplierId = $id
                        ORDER BY  q.date  " . $reqDate ."";
            }
            if($active == "Declined") {  
                $sql = "SELECT * 
                        FROM request_supplier_quotation r
                        JOIN sup_product_general p
                        ON r.psId = p.product_id  
                        AND r.status='declined'
                        AND r.supplierId = $id
                        ORDER BY  r.requested_on " . $reqDate ."";
            }
        }
 } else {
    if($active == "Pending"){
        $sql = "SELECT * 
                FROM request_supplier_quotation r
                JOIN sup_product_general p
                ON r.psId = p.product_id 
                AND r.status='Pending'
                AND r.supplierId = $id
                ORDER BY r.requested_on " . $reqDate .""; 
    }
    if($active == "Completed"){
        $sql = "SELECT *, q.status AS orderStatus 
                FROM request_supplier_quotation r
                JOIN supplier_quotation q
                ON r.request_id = q.req_id 
                AND r.status='Completed'
                AND r.supplierId = $id
                ORDER BY q.date " . $reqDate .""; 
    }
    if($active == "Declined"){
        $sql = "SELECT * 
                FROM request_supplier_quotation r
                JOIN sup_product_general p
                ON r.psId = p.product_id id 
                AND r.status='declined'
                AND r.supplierId = $id
                ORDER BY r.requested_on " . $reqDate .""; 
    }
}

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        if($active == "Pending"){
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
            $titleP= $row['title'];
            
            echo 
            "<a href='quote-view.php?id=".$request_id."' id='a-card'>
                <div class='ps-card'>
                    <div class='ps-card-desc' id='rs'>
                        <div class='rs-title' id = 'rid'>#Q".$request_id."</div>
                        <div class='rs-title'>Quotation for ".$titleP."</div>
                        <div class='rs-type'>".$requested_date."</div>
                        <div class='rs-type'>".$date."</div>
                        <div class='rs-type'>".$event_type."</div>
                        <div class='rs-type'>".$product_type."</div>
                    </div>
                </div>
            </a> " ;
        }

        if($active == "Completed"){
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
            $quoted_cost = $row['cost'];
            $statusOrder= $row['orderStatus'];
            $titleP= $row['title'];

            
            echo 
            "<a href='quote-view-complete.php?id=".$request_id."' id='a-card'>
                <div class='ps-card'>
                    <div class='ps-card-desc' id='rs'>
                        <div class='rs-title' id = 'rid'>#Q".$request_id."</div>
                        <div class='rs-title'>Quote for ".$titleP."</div>
                        <div class='rs-type'>".$date."</div>
                        <div class='rs-type'>".$event_type."</div>
                        <div class='rs-type'>".$quoted_cost."</div>
                        <div class='rs-type'>".$statusOrder."</div>
                    </div>
                </div>
            </a> " ;
        }

        if($active == "Declined"){
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
            $decline_reason = $row['ep_notes'];
            
            echo 
            "<a href='quote-view-decline.php?id=".$request_id."' id='a-card'>
                <div class='ps-card'>
                    <div class='ps-card-desc' id='rs'>
                        <div class='rs-title' id = 'rid'>#Q".$request_id."</div>
                        <div class='rs-title'>".$title."</div>
                        <div class='rs-type'>".$requested_date."</div>
                        <div class='rs-type'>".$date."</div>
                        <div class='rs-type'>".$event_type."</div>
                        <div class='rs-type'>".$decline_reason."</div>
                    </div>
                </div>
            </a> " ;
        }
    
    }}else {
            echo "No Requests for Quoatations found";
        }
        echo "</div>";
?>