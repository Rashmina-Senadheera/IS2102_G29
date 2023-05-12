    <div class='ps-card-title' id='title'>
        <div class='ps-card-desc' id="rs">
            <div class='rs-title' id = 'rid' ></div>
            <div class='rs-title'  >Quotation Request</div>
            <div class='rs-title' id = 'tit' >Event Date</div>
            <div class='rs-title' id = 'tit'>Event Type </div>
            <div class='rs-title' id = 'tit'>Cost</div>
            <div class='rs-title' id = 'tit'>Status </div>
        </div>
    </div>
<div class="cards" id="rs" >


    <?php
        $sql = "SELECT *, q.status AS orderStatus FROM 
                request_supplier_quotation r
                JOIN supplier_quotation q
                ON r.request_id = q.req_id 
                JOIN sup_product_general p
                ON r.psId = p.product_id
                WHERE r.status='Completed' AND 
                supplierId = $id";

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
        } }else {
            echo "No Requests for Quoatations found";
        }
    ?>
</div>