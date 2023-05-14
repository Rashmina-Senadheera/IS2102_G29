<?php 
// Include configuration file  
// require_once 'config.php'; 
// $conn = new mysqli(conn_HOST, conn_USERNAME, conn_PASSWORD, conn_NAME);   
require_once '../constants.php';
// Display error if failed to connect   
if ($conn->connect_errno) {   
    printf("Connect failed: %s\n", $conn->connect_error);   
    exit();   
}
// Include database connection file  
// include_once '../customer/db_conn.php'; 
$productName = "Eventra";  
$productID = "DP12345";  
$productPrice = 150; 
$currency = "lkr";

$payment_id = $statusMsg = ''; 
$status = 'error'; 
 
// Check whether stripe checkout session is not empty 
if(!empty($_GET['session_id'])){ 
    $session_id = $_GET['session_id']; 
    // $session_id = 18; 
    $ep_id = $_GET['epId'];
    $sup_id = $_GET['supId'];
    $cus_id = $_GET['cusId'];
    $epQuotId = $_GET['epQuotId'];
    $supQuotId = $_GET['supQuotId'];
    $reqId = $_GET['reqId'];
     
    // Fetch transaction data from the database if already exists 
    $sqlQ = "SELECT * FROM transactions WHERE stripe_checkout_session_id = ?"; 
    $stmt = $conn->prepare($sqlQ);  
    $stmt->bind_param("s", $db_session_id); 
    $db_session_id = $session_id; 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
    
    if($result->num_rows > 0){ 
        // Transaction details 
        $transData = $result->fetch_assoc(); 
        $payment_id = $transData['id']; 
        $transactionID = $transData['txn_id']; 
        $paidAmount = $transData['paid_amount']; 
        $paidCurrency = $transData['paid_amount_currency']; 
        $payment_status = $transData['payment_status']; 
         
        $customer_name = $transData['customer_name']; 
        $customer_email = $transData['customer_email']; 
         
        $status = 'success'; 
        $statusMsg = 'Your Payment has been Successful!'; 
    }else{ 
        // Include the Stripe PHP library 
        require_once 'stripe-php-master/init.php'; 
         
        // Set API key 
        $stripe = new \Stripe\StripeClient(STRIPE_API_KEY); 
         
        // Fetch the Checkout Session to display the JSON result on the success page 
        try { 
            $checkout_session = $stripe->checkout->sessions->retrieve($session_id); 
        } catch(Exception $e) {  
            $api_error = $e->getMessage();  
        } 
         
        if(empty($api_error) && $checkout_session){ 
            // Get customer details 
            $customer_details = $checkout_session->customer_details; 
 
            // Retrieve the details of a PaymentIntent 
            try { 
                $paymentIntent = $stripe->paymentIntents->retrieve($checkout_session->payment_intent); 
            } catch (\Stripe\Exception\ApiErrorException $e) { 
                $api_error = $e->getMessage(); 
            } 
             
            if(empty($api_error) && $paymentIntent){ 
                // Check whether the payment was successful 
                if(!empty($paymentIntent) && $paymentIntent->status == 'succeeded'){ 
                    // Transaction details  
                    $transactionID = $paymentIntent->id; 
                    $paidAmount = $paymentIntent->amount; 
                    $paidAmount = ($paidAmount/100); 
                    $itemPrice = ($paidAmount*2);
                    $paidCurrency = $paymentIntent->currency; 
                    $payment_status = $paymentIntent->status; 
                     
                    // Customer info 
                    $customer_name = $customer_email = ''; 
                    if(!empty($customer_details)){ 
                        $customer_name = !empty($customer_details->name)?$customer_details->name:''; 
                        $customer_email = !empty($customer_details->email)?$customer_details->email:''; 
                    } 
                     
                    // Check if any transaction data is exists already with the same TXN ID 
                    $sqlQ = "SELECT id FROM transactions WHERE txn_id = ?"; 
                    $stmt = $conn->prepare($sqlQ);  
                    $stmt->bind_param("s", $transactionID); 
                    $stmt->execute(); 
                    $result = $stmt->get_result(); 
                    $prevRow = $result->fetch_assoc(); 
                     
                    if(!empty($prevRow)){ 
                        $payment_id = $prevRow['id']; 
                    }else{ 
                        // Insert transaction data into the database 
                        $eventName = "hello";
                        $sqlQ = "INSERT INTO transactions (customer_name,customer_email,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,stripe_checkout_session_id,created,modified) VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())"; 
                        $stmt = $conn->prepare($sqlQ); 
                        $stmt->bind_param("ssssdsdssss",  $customer_name, $customer_email, $productName, $productID, $itemPrice, $currency, $paidAmount, $paidCurrency, $transactionID, $payment_status, $session_id); 
                        $insert = $stmt->execute(); 
                         
                        if($insert){ 
                            $payment_id = $stmt->insert_id; 
                        } 
                    } 
                     
                    $status = 'success'; 
                    $statusMsg = 'Your Payment has been Successful!'; 
                }else{ 
                    $statusMsg = "Transaction has been failed!"; 
                } 
            }else{ 
                $statusMsg = "Unable to fetch the transaction details! $api_error";  
            } 
        }else{ 
            $statusMsg = "Invalid Transaction! $api_error";  
        } 
    } 
}else{ 
    $statusMsg = "Invalid Request!"; 
} 
?>

<?php if(!empty($payment_id)){ 
    
    $status = "Ongoing";
    
    
    $sql_sup_booking = "INSERT INTO `supplier_booking`( `EP_id`, `supplier_id`, `EP_quotation_id`, `supplier_quote_id`, `payment_id`,`status`) VALUES ('$ep_id','$sup_id','$epQuotId','$supQuotId','$payment_id','$status')"; 
    $sql_ep_booking = "INSERT INTO `ep_booking`(`customer_id`, `EP_id`, `ep_quot_id`, `payment_id`,`status`) VALUES ('$cus_id','$ep_id','$epQuotId','$payment_id','$status')";
    $cus_req = "UPDATE `request_ep_quotation` SET `status`='$status' WHERE request_id=$reqId";
    $sup_req = "UPDATE `request_supplier_quotation` SET `status`='$status' WHERE for_cus_req=$reqId";
    $res = mysqli_query($conn,$sql_sup_booking);
    $res1 = mysqli_query($conn,$sql_ep_booking);
    $res2 = mysqli_query($conn,$cus_req);
    $res3 = mysqli_query($conn,$sup_req);


    if($res && $res1 && $res2 && $res3){
        echo "<script> location.replace('http://localhost/file_struct/Event_Management/pages/customer/OngoingEvents.php'); </script>";
    }else{
        echo "Error in inserting data";
    }
      ?>
    
    
<?php }else{ ?>
    <h1 class="error">Your Payment been failed!</h1>
    <p class="error"><?php echo $statusMsg; ?></p>
<?php } ?>

