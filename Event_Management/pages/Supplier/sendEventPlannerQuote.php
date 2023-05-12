<?php
include('../constants.php');
include('supplier_sidenav.php');
include('header.php');
include('../controllers/commonFunctions.php');

//check if there is a id in the url
if (isset($_GET['id'])) {
    $req_id = checkInput($_GET['id']);
    $sql = "SELECT * 
                FROM request_supplier_quotation r
                JOIN sup_product_general p
                ON r.psId = p.product_id
                WHERE r.status='Pending' 
                AND r.request_id = $req_id";
    $result = mysqli_query($conn, $sql);
    

    // check if the id is valid
    if (mysqli_num_rows($result) > 0) {
        $general_details = mysqli_fetch_assoc($result);
        $p_title = $general_details['product_title'];
        $remarks = $general_details['remarks'];
        $event_type = $general_details['event_type'];
        $hours = $general_details['hours'];
        $date = $general_details['date'];
        $hours = $general_details['hours'];
        $urgency = $general_details['urgency'];
        $no_of_participants = $general_details['no_of_participants'];
        $psId = $general_details['psId'];
        $ep_id = $general_details['EP_id'];
        $requested_on = $general_details['requested_on'];
        $for_cus_req = $general_details['for_cus_req'];
        $title = $general_details['title'];

        $sql1 = "SELECT * FROM sup_product_general WHERE product_id = $psId ";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0){
            $more_details = mysqli_fetch_assoc($result1);
            $product_title = $more_details['title'];
            $product_descript = $more_details['description'];
            $product_type = $more_details['type'];
        }


    } else {
        header("Location: 404.php");
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../../css/supplierMain.css'>
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/formEP.css">
    <link rel="stylesheet" href="../../css/form.css">
</head>

<body>
    <div class="main-body">

        <div class="form-card scrollable" id="quote">
            <div class="form-title">Quotation Request Details</div>
            <div class="form-description">The Event Planner has requested the quotation for the following details.</div>

            <div class="formSection" id="quote">
                <?php 
                    $sql1 = "SELECT request_supplier_quotation.date 
                            FROM supplier_booking JOIN request_supplier_quotation 
                            ON supplier_booking.EP_quotation_id=request_supplier_quotation.request_id 
                            WHERE request_supplier_quotation.psId = $psId 
                            AND request_supplier_quotation.date = '$date'";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0){
                        $availability = 0;
                    }
                    else{
                        $availability = 1;
                    }
                
                ?>
                <div class="row" id="supQuote">
                    <div class="input-50" id="supQuote">
                        <label class="input-label" id="supQuote" >Request For:</label>
                        <div class="input-value" id="supQuoteR" >
                            <a href='more-info.php?id=<?php echo $psId;?>'><?php echo "#P".$psId; ?></a>
                            <div class="namePro"><?php echo $title; ?></div>
                        </div>
                    </div>
                    <div class="input-50" id="supQuote">
                        <label class="input-label" id="supQuote" >Requested On:</label>
                        <div class="input-value" id="supQuoteR"><?php echo $requested_on; ?></div>
                    </div>
                </div>
                <div class="row" id="supQuote">
                    <div class="input input-background"
                    <?php if($availability) echo "id='avail'"; else echo "id='notavail'"; ?>>
                        <label class="input-label" id="supQuote">Availability on Requested Date:
                        </label>
                        <div class="input-value" id="supQuote">
                            <?php if($availability) echo "Available"; else echo "Not Available"; ?></div>
                    </div>
                </div>
                <div class="other details">
                    <div class="input-50" id="other">
                        <label class="input-label" id="other" >Event Type:</label>
                        <div class="input-value" id="other" ><?php echo $event_type; ?></div>
                    </div>
                    <div class="input-50" id="other">
                        <label class="input-label" id="other" >Participants:</label>
                        <div class="input-value" id="other" ><?php echo $no_of_participants; ?></div>
                    </div>
                    <div class="input-50" id="other">
                        <label class="input-label" id="other" >Hours:</label>
                        <div class="input-value" id="other" ><?php echo $hours; ?></div>
                    </div>
                    <div class="input-50" id="other">
                        <label class="input-label" id="other" >Tentative Date:</label>
                        <div class="input-value" id="other" ><?php echo $date; ?></div>
                    </div>
                    <div class="input-50" id="other">
                        <label class="input-label" id="other" >Remarks :</label>
                        <div class="input-value" id="other" ><?php echo $remarks; ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-card scrollable">
            <form method="POST" action="controllers/addQuote.php" enctype="multipart/form-data">
                <div class="form-title">Send Quotation</div>
                <div class="form-description">The following will be provided for the request from the Event planner.</div>

                    <input type="hidden" name="title" value='<?php echo $product_title; ?>' required />
                    <input type="hidden" name="pdescript" value='<?php echo $product_descript; ?>' required /> 
                    <input type="hidden" name="ptype" value='<?php echo $product_type; ?>' required />
                    <input type="hidden" name="ep_id" value='<?php echo $ep_id; ?>' required />
                    <input type="hidden" name="req_id" value='<?php echo $req_id; ?>' required />
                    <input type="hidden" name="for_cus_req" value = '<?php echo $for_cus_req; ?>' required/>

                    <div class="formSection" id="quote">
                    <div class="input" id="supQuote">
                        <label class="input-label" id="supQuote">Event Planner's Cost <?php echo $product_type;?></label>
                        <input type="number" class="input-field" name="cost" placeholder="Cost" />
                        <div class="formInputError"><?php echo showSessionMessage('error-cost') ?></div>
                    </div>
                    <div class="row" id="supQuote">
                        <div class="input">
                            <label class="input-label" id="supQuote">Remarks <span class="desc">(You can specify other expenses or special notes here.)</span></label>
                            <textarea class="input-field" rows="5" name="description"></textarea>
                            <div class="formInputError"><?php echo showSessionMessage('error-descript') ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="tacbox">
                            <input id="checkbox" type="checkbox" name="terms" />
                            <label for="checkbox" id="tt"> I agree to these <a href="#">Terms and Conditions</a>.</label>
                        </div>
                        <div class="formInputError"><?php echo showSessionMessage('error-terms') ?></div>
                    </div>
                    <div class="action btnSend" id="quote">
                        <input type="submit" value="Send" class="action-button" id="quoteB" />
                    </div>
                        </div>
            </form>
        </div>
    </div>

</body>

</html>