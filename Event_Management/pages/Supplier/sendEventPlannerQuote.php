<?php
include('../constants.php');
include('supplier_sidenav.php');
include('header.php');
include('../controllers/commonFunctions.php');

//check if there is a id in the url
if (isset($_GET['id'])) {
    $id = checkInput($_GET['id']);
    $sql = "SELECT * FROM request_supplier_quotation WHERE request_id = $id";
    $result = mysqli_query($conn, $sql);

    // check if the id is valid
    if (mysqli_num_rows($result) > 0) {
        $general_details = mysqli_fetch_assoc($result);
        $req_id = $general_details['request_id'];
        $p_title = $general_details['product_title'];
        $remarks = $general_details['remarks'];
        $event_type = $general_details['event_type'];
        $hours = $general_details['hours'];
        $requested_on = $general_details['requested_on'];
        $date = $general_details['date'];
        $hours = $general_details['hours'];
        $urgency = $general_details['urgency'];
        $no_of_participants = $general_details['no_of_participants'];
        $psId = $general_details['psId'];
        $ep_id = $general_details['EP_id'];
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
</head>

<body>
    <div class="main-body">

        <div class="form-card scrollable">
            <div class="form-title">Quotation Request Details</div>
            <div class="form-description">The Event Planner has requested the quotation for the following details.</div>

            <div class="formSection" id="quote">General
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Request For:</label>
                        <div class="input-value"><?php echo $p_title; ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Requested On:</label>
                        <div class="input-value"><?php echo $requested_on; ?></div>
                    </div>

                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Event Type:</label>
                        <div class="input-value"><?php echo $event_type; ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Participants:</label>
                        <div class="input-value"><?php echo $no_of_participants; ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Hours:</label>
                        <div class="input-value"><?php echo $hours; ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Tentative Date:</label>
                        <div class="input-value"><?php echo $date; ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input input-background">
                        <label class="input-label">Remarks:</label>
                        <div class="input-value"><?php echo $remarks; ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-card scrollable">
            <form method="POST" action="controllers/addQuote.php" enctype="multipart/form-data">
                <div class="form-title">Send Quotation</div>
                <div class="form-description">The following will be provided for the request from the Event planner.</div>

                <div class="row">
                    <input type="hidden" name="title" value='<?php echo $p_title; ?>' required />
                    <input type="hidden" name="ep_id" value='<?php echo $ep_id; ?>' required />
                    <input type="hidden" name="req_id" value='<?php echo $req_id; ?>' required />
                    <div class="input">
                        <label class="input-label">Event Planner's Cost</label>
                        <input type="number" class="input-field" name="cost" placeholder="Cost" />
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Remarks <span class="desc">(You can specify other expenses or special notes here.)</span></label>
                            <textarea class="input-field" rows="5" name="description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="tacbox">
                            <input id="checkbox" type="checkbox" />
                            <label for="checkbox" id="tt"> I agree to these <a href="#">Terms and Conditions</a>.</label>
                        </div>
                    </div>
                    <div class="action btnSend">
                        <input type="submit" value="Send" class="action-button" />
                    </div>
            </form>
        </div>
    </div>

</body>

</html>