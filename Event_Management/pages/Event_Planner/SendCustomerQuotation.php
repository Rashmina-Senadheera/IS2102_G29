<?php
require_once('../controllers/commonFunctions.php');
require_once './controllers/getRequestDetails.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/formEP.css">
    <script type="text/javascript" src="../../js/sendCustomerQuotation_ep.js"></script>
</head>

<body>
    <div class="main-body">
        <?php require_once './components/CustomerRequestDetails.php'; ?>

        <div class="form-card scrollable">
            <form id="sendCustomerQuotation" method="POST" action="controllers/sendQuotation.php">
                <div class="form-title">Send Quotation</div>
                <input type="hidden" name="reqID" value="<?php echo $reqID; ?>" />
                <input type="hidden" name="cusId" value="<?php echo $customerID; ?>" />
                <div class="row">
                    <div class="input">
                        <label class="input-label">Event Planner's Cost</label>
                        <input id="epCost" onkeyup="calcTotalCost()" onchange="calcTotalCost()" value="0" type="number" class="input-field" name="epCost" placeholder="Cost" />
                    </div>
                    <?php if ($result_food->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Food & Beverages</label>
                                <input id="foodBevqId" type="hidden" value="0" name="foodBevqId" />
                                <input id="foodBevId" type="hidden" value="0" name="foodBevId" />
                                <input id="foodBevName" type="text" class="input-field" name="foodBevName" placeholder="Supplier Name / Product Name" />
                                <input id="foodBevCost" onkeyup="calcTotalCost()" onchange="calcTotalCost()" value="0" type="number" class="input-field" name="foodBevCost" placeholder="Cost" style="margin-top: 5px;" />
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($result_venue->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Venue</label>
                                <input id="venueqId" type="hidden" value="0" name="venueqId" />
                                <input id="venueId" type="hidden" value="0" name="venueId" />
                                <input id="venueName" type="text" class="input-field" name="venueName" placeholder="Supplier Name / Product Name" />
                                <input id="venueCost" onkeyup="calcTotalCost()" onchange="calcTotalCost()" value="0" type="number" class="input-field" name="venueCost" placeholder="Cost" style="margin-top: 5px;" />

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($result_pv->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Photography & Videography</label>
                                <input id="pvqId" type="hidden" value="0" name="pvqId" />
                                <input id="pvId" type="hidden" value="0" name="pvId" />
                                <input id="pvName" type="text" class="input-field" name="pvName" placeholder="Supplier Name / Product Name" />
                                <input id="pvCost" onkeyup="calcTotalCost()" onchange="calcTotalCost()" value="0" type="number" class="input-field" name="pvCost" placeholder="Cost" style="margin-top: 5px;" />

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($result_sl->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Sound & Lighting</label>
                                <input id="slqId" type="hidden" value="0" name="slqId" />
                                <input id="slId" type="hidden" value="0" name="slId" />
                                <input id="slName" type="text" class="input-field" name="slName" placeholder="Supplier Name / Product Name" />
                                <input id="slCost" onkeyup="calcTotalCost()" onchange="calcTotalCost()" value="0" type="number" class="input-field" name="pvCost" placeholder="Cost" style="margin-top: 5px;" />

                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Total Cost</label>
                            <input id="totalCost" type="text" class="input-field" name="totalCost" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Remarks <span class="desc">(You can specify other expenses or special notes here.)</span></label>
                            <textarea class="input-field" rows="5" name="remarks"></textarea>
                        </div>
                    </div>
                    <div class="action btnSend">
                        <!-- <input type="submit" value="Send" class="action-button" /> -->
                        <button type="button" onclick="<?php echo 'sendCustomerQuotation()'; ?>" class="action-button" style="margin-left: 0;">
                            Send
                        </button>
                    </div>
            </form>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-decline">
            <div class="modal-header">
                <span class="close">&times;</span>
                Confirm sending the quotation to the customer?
            </div>
            <div class="modal-body">
                <div class="decline-reason">
                    <label>Please check everything before sending the quotation to the customer. You cannot modify the quotation after sending it to the customer.</label>
                    <div id="formErrors"></div>
                </div>
                <div class="actionBtn">
                    <button type="button" onclick="closeModal2()" class="rejected" id="modal_cancel" style="margin-left: 0;">
                        Cancel
                    </button>
                    <button type="button" onclick="sendCustomerQuotationConfirm()" class="accepted" style="margin-left: 0;">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="../../js/epHandleCusReq.js"></script>

</html>