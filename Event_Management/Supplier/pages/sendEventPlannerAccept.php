<?php
    include('../../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/formEP.css">
</head>

<body>
    <div class="main-body">

        <div class="form-card scrollable">
            <div class="form-title">Order Request Details</div>
            <div class="form-description">The Event Planner has requested an order for the following details.</div>

            <div class="formSection" id="quote">General
                <div class="row">
                    <div class="input-50" >
                        <label class="input-label">Request For:</label>
                        <div class="input-value" id="acc">Bravo Event Productions Hall</div>
                    </div>
                    <div class="input-50" >
                        <label class="input-label">Requested On:</label>
                        <div class="input-value" id="acc">2022-05-01</div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Event Type:</label>
                        <div class="input-value" id="acc">Wedding</div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Participants:</label>
                        <div class="input-value" id="acc">170</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Hours:</label>
                        <div class="input-value" id="acc" >6 hours</div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Tentative Date:</label>
                        <div class="input-value"id="acc" >2022-07-15</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input input-background">
                        <label class="input-label">Remarks:</label>
                        <div class="input-value" id="acc">Need the quotation to be submitted as soon as possible with the necessary details</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-card scrollable">
            <form method="POST" action="controllers/addNewPackage.php" enctype="multipart/form-data">
                <div class="form-title">Send Quotation</div>
                <div class="form-description">The following will be provided for the request from the Event planner.</div>

                <!-- <div class="form-description"></div> -->
                <div class="row">
                    <div class="input">
                        <label class="input-label">Quoted Cost</label>
                       <div class="input-value" id="acc">250,000LKR</div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Remarks</label>
                            <div class="input-value" id="acc">May Chnage for new services added</div></div>
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
                        <input type="submit" value="Accept" class="action-button" />
                    </div>
            </form>
        </div>
    </div>

</body>

</html>