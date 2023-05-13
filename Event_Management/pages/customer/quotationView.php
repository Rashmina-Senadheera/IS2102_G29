<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
require_once('../controllers/commonFunctions.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/formEP.css">
</head>

<body>
<script src="https://js.stripe.com/v3/"></script>
    
    <div class="main-body">

        <div class="form-card scrollable">
            <div class="form-title">Requested Details</div>
            <div class="form-description">You have requested the quotation for the following details.</div>
            <?php
            $sql = "SELECT * 
                    from cust_req_general 
                    JOIN request_ep_quotation 
                    ON cust_req_general.request_id = request_ep_quotation.request_id 
                    JOIN user 
                    ON request_ep_quotation.EP_id = user.user_id
                    WHERE cust_req_general.request_id = $id ";
            $result = $conn->query($sql);
            $row = $result->fetch();

            $sql_food = "SELECT * FROM cust_req_food WHERE request_id = $id";
            $sql_venue = "SELECT * FROM cust_req_venue WHERE request_id = $id";
            $sql_pv = "SELECT * FROM cust_req_pv WHERE request_id = $id";
            $sql_sl = "SELECT * FROM cust_req_sl WHERE request_id = $id";
            $sql_quote = "SELECT * 
            from cust_req_general 
            JOIN ep_quotation 
            ON cust_req_general.request_id = ep_quotation.reqId 
            JOIN ep_quotation_items
            ON ep_quotation_items.qId = ep_quotation.qId
            WHERE cust_req_general.request_id = $id";


            $result_food = $conn->query($sql_food);
            $result_venue = $conn->query($sql_venue);
            $result_pv = $conn->query($sql_pv);
            $result_sl = $conn->query($sql_sl);
            $result_quote = $conn->query($sql_quote);

            $row1 = $result_food->fetch();
            $row2 = $result_venue->fetch();
            $row3 = $result_pv->fetch();
            $row4 = $result_sl->fetch();
            $row5 = $result_quote->fetch();
            ?>

            <div class="formSection">General
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Requested On:</label>
                        <div class="input-value"><?php echo $row['from_date'] ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Event Type:</label>
                        <div class="input-value"><?php echo $row['event_type'] ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Participants:</label>
                        <div class="input-value"><?php echo $row['no_of_pax'] ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Theme:</label>
                        <div class="input-value"><?php echo $row['theme'] ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Tentative Date:</label>
                        <div class="input-value">From: <?php echo $row['from_date'] ?> <br> To : <?php echo $row['to_date'] ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Budget:</label>
                        <div class="input-value">Min: <?php echo $row['min_budget'] ?> <br> Max: <?php echo $row['max_budget'] ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Time:</label>
                        <div class="input-value">From: <?php echo $row['from_time'] ?><br> To : <?php echo $row['to_time'] ?></div>
                    </div>
                </div>
            </div>


            <?php if($row2){
                ?>
                    <div class="formSection">Venue
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Type:</label>
                        <div class="input-value"><?php 
                        if($row2){echo $row2['venue'];} else{ echo "None";}                   
                         ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input input-background">
                        <label class="input-label">Remarks:</label>
                        <div class="input-value"><?php if($row2){echo $row2['remarks']; }else{ echo "None" ;}  ?></div>
                    </div>
                </div>
            </div>
                <?php
            } ?>
            
            <?php if($row1){
                ?>
                <div class="formSection">Food & Beverages
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Need as:</label>
                        <div class="input-value"><?php if($row1){ echo $row1['available_in']; }else{ echo "None" ;}  ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Need for:</label>
                        <div class="input-value"><?php if($row1){ echo $row1['available_at']; }else{ echo "None" ;}  ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Preferences:</label>
                        <div class="input-value"><?php if($row1){ echo $row1['preferences']; }else{ echo "None" ;} ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input input-background">
                        <label class="input-label">Remarks:</label>
                        <div class="input-value"><?php if($row1){ echo $row1['remarks']; }else{ echo "None" ;} ?></div>
                    </div>
                </div>
            </div>

                <?php }?>



                <?php if($row4){
                ?>
                <div class="formSection">Sound & Lighting
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Sound Type:</label>
                        <div class="input-value"><?php if($row4){  echo $row4['sound_type']; }else{ echo "None" ;} ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Light Type:</label>
                        <div class="input-value"><?php if($row4){ echo $row4['light_type']; }else{ echo "None" ;}  ?></div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="input input-background">
                        <label class="input-label">Remarks:</label>
                        <div class="input-value"><?php if($row4){ echo $row4['remarks']; }else{ echo "None" ;} ?></div>
                    </div>
                </div>
            </div>

                <?php }?>

                <?php if($row3){
                ?>
                <div class="formSection">Photography & Videography
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Photography Preferences:</label>
                        <div class="input-value"><?php   if($row3){ echo $row3['photo_pref']; }else{ echo "None" ;} ?></div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Videography Preferences:</label>
                        <div class="input-value"><?php if($row3){ echo $row3['video_pref']; }else{ echo "None" ;}  ?></div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="input input-background">
                        <label class="input-label">Remarks:</label>
                        <div class="input-value"><?php if($row3){ echo $row3['remarks']; }else{ echo "None" ;} ?></div>
                    </div>
                </div>
            </div>

                <?php }?>

            
        </div>

        <div class="form-card scrollable">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-title">Quotation</div>
                <!-- <div class="form-description"></div> -->
                <div class="row">
                    <div class="input">
                        <label class="input-label">Event Planner's Cost</label>
                        <input type="text" class="input-field" name="cost" id="cost" placeholder="Cost" value="<?php if($row5){ echo $row5['epCost']; }else{ echo "None" ;} ?>" disabled />
                    </div>

                    <?php if($row['type'] = 'venue'){
                        $sql_quote_venue = "SELECT * 
                        from cust_req_general 
                        JOIN ep_quotation 
                        ON cust_req_general.request_id = ep_quotation.reqId 
                        JOIN ep_quotation_items
                        ON ep_quotation_items.qId = ep_quotation.qId
                        WHERE cust_req_general.request_id = $id AND ep_quotation_items.type='venue'";

                        $result_quote_venue = $conn->query($sql_quote_venue);

                        $row6 = $result_quote_venue->fetch();
                    ?>
                        <div class="row">
                        <div class="input">
                            <label class="input-label">Venue</label>
                            <input type="text" class="input-field" name="packageName" placeholder="Supplier Name / Product Name"  value="<?php if($row6){ echo $row6['name']; }else{ echo "None" ;} ?>" disabled/>
                            <input type="text" class="input-field" name="cost" id="cost" placeholder="Cost" style="margin-top: 5px;"  value="<?php if($row6){ echo $row6['cost']; }else{ echo "None" ;} ?>" disabled/>

                        </div>
                    </div>
                        
                        <?php
                    } ?>
                    
                    <?php if($row['type'] = 'foodbev'){
                        $sql_quote_food = "SELECT * 
                        from cust_req_general 
                        JOIN ep_quotation 
                        ON cust_req_general.request_id = ep_quotation.reqId 
                        JOIN ep_quotation_items
                        ON ep_quotation_items.qId = ep_quotation.qId
                        WHERE cust_req_general.request_id = $id AND ep_quotation_items.type='foodbev'";

                        $result_quote_food = $conn->query($sql_quote_food);

                        $row7 = $result_quote_food->fetch();
                    ?>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Food & Beverages</label>
                            <input type="text" class="input-field" name="packageName" placeholder="Supplier Name / Product Name" value="<?php if($row7){ echo $row7['name']; }else{ echo "None" ;}?>"  disabled />
                            <input type="text" class="input-field" name="cost" id="cost" placeholder="Cost" style="margin-top: 5px;" value="<?php if($row7){ echo $row7['cost']; }else{ echo "None" ;}?>" disabled />
                        </div>
                    </div>
                    <?php } ?>

                    <?php if($row['type'] = 'photo'){
                        $sql_quote_photo = "SELECT * 
                        from cust_req_general 
                        JOIN ep_quotation 
                        ON cust_req_general.request_id = ep_quotation.reqId 
                        JOIN ep_quotation_items
                        ON ep_quotation_items.qId = ep_quotation.qId
                        WHERE cust_req_general.request_id = $id AND ep_quotation_items.type='photo'";

                        $result_quote_photo = $conn->query($sql_quote_food);

                        $row8 = $result_quote_photo->fetch();
                    ?>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Photography & Videography</label>
                            <input type="text" class="input-field" name="packageName" placeholder="Supplier Name / Product Name" value="<?php if($row8){ echo $row8['name']; }else{ echo "None" ;}?>"  disabled />
                            <input type="text" class="input-field" name="cost" id="cost" placeholder="Cost" style="margin-top: 5px;" value="<?php if($row8){ echo $row8['cost']; }else{ echo "None" ;}?>" disabled />
                        </div>
                    </div>
                    <?php } ?>




                    <div class="input">
                        <label class="input-label">Total Cost</label>
                        <input type="text" class="input-field" name="packageName" id="total_cost" placeholder="Cost" value=""  />
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Remarks <span class="desc">(Other expenses or special notes.)</span></label>
                            <textarea class="input-field" rows="5" name="description" disabled>This quotation is valid only for 10 days. If you want to book, please contact us within 10 days.</textarea>
                        </div>
                    </div>
                    <!-- <div class="action btnSend">
                        <div class="spinner hidden" id="spinner"></div>
                        <input type="submit" value="Book Event Planner" class="action-button payButton" id="payButton buttonText"/>
                    </div> -->
                    <button class="stripe-button" id="payButton">
    <div class="spinner hidden" id="spinner"></div>
    <span id="buttonText">Pay Now</span>
</button>
            </form>
        </div>
    </div>
    <script>

        function totalCost() {
            var inputs = document.getElementsByName('cost'),
                result = document.getElementById('total_cost'),
                sum = 0;     
            
            for(var i=0; i<inputs.length; i++) {
                var ip = inputs[i];

                if (ip.name && ip.name.indexOf("total") < 0) {
                    sum += parseInt(ip.value) || 0;
                }

            }

            result.value = sum;

        }
        

        window.onload = function() {
            totalCost();
            
        }
        

        const stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');
        // const cost = document.querySelector("#total_cost").value;
        //     const advance_cost = cost*0.5;
        //     console.log(advance_cost);
        
        // Select payment button
        const payBtn = document.querySelector("#payButton");

        // Payment request handler
        payBtn.addEventListener("click", function (evt) {
            
            
            // console.log(advance_cost);
            setLoading(true);

            createCheckoutSession().then(function (data) {
                if(data.sessionId){
                    stripe.redirectToCheckout({
                        sessionId: data.sessionId,
                    }).then(handleResult);
                }else{
                    handleResult(data);
                }
            });
        });
    
// Create a Checkout Session with the selected product
const createCheckoutSession = function (stripe) {
    let cost = document.querySelector("#total_cost").value;
    let advance_cost = cost*0.5;
        
    return fetch("../payment/payment_init.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            createCheckoutSession: 1,
            event : "Birthday",
            productID : "DP12345",
            productPrice : advance_cost,
            currency : "lkr"
        }),
    }).then(function (result) {
        return result.json();
    });
};

// Handle any errors returned from Checkout
const handleResult = function (result) {
    if (result.error) {
        showMessage(result.error.message);
    }
    
    setLoading(false);
};

// Show a spinner on payment processing
function setLoading(isLoading) {
    if (isLoading) {
        // Disable the button and show a spinner
        payBtn.disabled = true;
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#buttonText").classList.add("hidden");
    } else {
        // Enable the button and hide spinner
        payBtn.disabled = false;
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#buttonText").classList.remove("hidden");
    }
}

// Display message
function showMessage(messageText) {
    const messageContainer = document.querySelector("#paymentResponse");
	
    messageContainer.classList.remove("hidden");
    messageContainer.textContent = messageText;
	
    setTimeout(function () {
        messageContainer.classList.add("hidden");
        messageText.textContent = "";
    }, 5000);
}




    </script>
</body>

</html>
