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
                <div class="form-title">Quotation Details</div>
                <div class="form-description">These are the costs that you sent to the customer. You cannot edit the quotation after you send it.</div>
                <?php
                $qid = $_GET['qid'];

                $sql = "SELECT q.*, sum(i.cost) AS tCost
                        FROM ep_quotation q, ep_quotation_items i 
                        WHERE q.qId = i.qId
                        AND q.qId = $qid";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $epCost = !empty($row['epCost']) ? $row['epCost'] : 0;
                $tCost = !empty($row['tCost']) ? $row['tCost'] + $epCost : 0;
                $remarks = !empty($row['remarks']) ? $row['remarks'] : "Not Set";

                function getQuotationItem($conn, $qid, $type)
                {
                    $sql = "SELECT * FROM ep_quotation_items WHERE qId = $qid AND type = '$type'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        return $row;
                    } else {
                        return null;
                    }
                }

                ?>
                <div class="row">
                    <div class="input">
                        <label class="input-label">Event Planner's Cost</label>
                        <input id="epCost" disabled value="<?php echo $epCost ?>" type="number" class="input-field" name="epCost" placeholder="Cost" />
                    </div>
                    <?php if ($result_food->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Food & Beverages</label>
                                <?php $foodBev = getQuotationItem($conn, $qid, "foodBev"); ?>
                                <input id="foodBevName" type="text" value="<?php echo !empty($foodBev['name']) ? $foodBev['name'] : 'Not Set' ?>" disabled class="input-field" name="foodBevName" placeholder="Supplier Name / Product Name" />
                                <input id="foodBevCost" disabled value="<?php echo !empty($foodBev['cost']) ? $foodBev['cost'] : 0 ?>" type="number" class="input-field" name="foodBevCost" placeholder="Cost" style="margin-top: 5px;" />
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($result_venue->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Venue</label>
                                <?php $venue = getQuotationItem($conn, $qid, "venue"); ?>
                                <input id="venueName" type="text" value="<?php echo !empty($venue['name']) ? $venue['name'] : 'Not Set' ?>" disabled class="input-field" name="venueName" placeholder="Supplier Name / Product Name" />
                                <input id="venueCost" disabled value="<?php echo !empty($venue['cost']) ? $venue['cost'] : 0 ?>" type="number" class="input-field" name="venueCost" placeholder="Cost" style="margin-top: 5px;" />

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($result_pv->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Photography & Videography</label>
                                <?php $pv = getQuotationItem($conn, $qid, "photo"); ?>
                                <input id="pvName" type="text" value="<?php echo !empty($pv['name']) ? $pv['name'] : 'Not Set' ?>" disabled class="input-field" name="pvName" placeholder="Supplier Name / Product Name" />
                                <input id="pvCost" disabled value="<?php echo !empty($pv['cost']) ? $pv['cost'] : 0 ?>" type="number" class="input-field" name="pvCost" placeholder="Cost" style="margin-top: 5px;" />

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($result_sl->num_rows > 0) { ?>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Sounds</label>
                                <?php $s = getQuotationItem($conn, $qid, "sound"); ?>
                                <input id="sName" type="text" value="<?php echo !empty($s['name']) ? $s['name'] : 'Not Set' ?>" disabled class="input-field" name="sName" placeholder="Supplier Name / Product Name" />
                                <input id="sCost" disabled value="<?php echo !empty($s['cost']) ? $s['cost'] : 0 ?>" type="number" class="input-field" name="sCost" placeholder="Cost" style="margin-top: 5px;" />

                            </div>
                        </div>
                        <div class="row">
                            <div class="input">
                                <label class="input-label">Lighting</label>
                                <?php $l = getQuotationItem($conn, $qid, "light"); ?>
                                <input id="lName" type="text" value="<?php echo !empty($l['name']) ? $l['name'] : 'Not Set' ?>" disabled class="input-field" name="lName" placeholder="Supplier Name / Product Name" />
                                <input id="lCost" disabled value="<?php echo !empty($l['cost']) ? $l['cost'] : 0 ?>" type="number" class="input-field" name="lCost" placeholder="Cost" style="margin-top: 5px;" />

                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Total Cost</label>
                            <input id="totalCost" value="<?php echo $tCost ?>" type="text" class="input-field" name="totalCost" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Remarks <span class="desc">(Other expenses or special notes here.)</span></label>
                            <textarea class="input-field" disabled rows="5" name="remarks"><?php echo $remarks ?></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<script src="../../js/epHandleCusReq.js"></script>

</html>