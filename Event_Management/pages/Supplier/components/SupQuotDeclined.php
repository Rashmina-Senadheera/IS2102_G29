    <div class='ps-card-title' id='title'>
        <div class='ps-card-desc' id="rs">
            <div class='rs-title' id = 'rid' ></div>
            <div class='rs-title'  >Quotation Request</div>
            <div class='rs-title' id = 'tit' >Req.Date</div>
            <div class='rs-title' id = 'tit'>Event Date</div>
            <div class='rs-title' id = 'tit'>Event Type </div>
            <div class='rs-title' id = 'tit'>Reason </div>
        </div>
    </div>
<div class="cards" id="rs" >


    <?php
        $sql = "SELECT * FROM request_supplier_quotation r
        JOIN sup_product_general p
        ON r.psId = p.product_id
        WHERE r.status='declined' AND r.supplierId = $id";

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
                $decline_reason = $row['ep_notes'];
                
                echo 
                "<a href='quote-view.php?id=".$request_id."' id='a-card'>
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
        } }else {
            echo "No Requests for Quoatations found";
        }
    ?>
</div>