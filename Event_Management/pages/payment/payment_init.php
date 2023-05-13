<?php 
 
// Include the configuration file 
require_once '../constants.php'; 

// Include the Stripe PHP library 
require_once 'stripe-php-master/init.php'; 
 
// Set API key 
$stripe = new \Stripe\StripeClient(STRIPE_API_KEY);

 
$response = array( 
    'status' => 0, 
    'error' => array( 
        'message' => 'Invalid Request!'    
    ) 
); 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $input = file_get_contents('php://input'); 
    $request = json_decode($input);     
} 
 
if (json_last_error() !== JSON_ERROR_NONE) { 
    http_response_code(400); 
    echo json_encode($response); 
    exit; 
} 
 
if(!empty($request->createCheckoutSession)){ 
    // Convert product price to cent 
    $stripeAmount = round($request->productPrice*100, 2); 

    $epId = $request->ep_Id;
    $supId = $request->sup_Id;
    $cusId = $request->cus_Id;
    $epQuotId = $request->ep_QuotId;
    $supQuoteId = $request->sup_QuotId;

    $params = array(
        'epId' => $epId,
        'supId' => $supId,
        'cusId' => $cusId,
        'epQuotId' => $epQuotId,
        'supQuotId' => $supQuoteId
        
    );
    
    // Encode the array as a query string
    $queryString = http_build_query($params);
    
    // Append the query string to the URL
    // $url = 'https://example.com/page.php?' . $queryString;
 
    // Create new Checkout Session for the order 
    try { 
        $checkout_session = $stripe->checkout->sessions->create([ 
            'line_items' => [[ 
                'price_data' => [ 
                    'product_data' => [ 
                        'name' => $request->event, 
                        'metadata' => [ 
                            'pro_id' => $request->productID 
                        ] 
                    ], 
                    'unit_amount' => $stripeAmount, 
                    'currency' => $request->currency, 
                ], 
                'quantity' => 1 
            ]], 
            'mode' => 'payment', 
            'success_url' => STRIPE_SUCCESS_URL.'?session_id={CHECKOUT_SESSION_ID}&'.$queryString, 
            'cancel_url' => STRIPE_CANCEL_URL, 
        ]); 
    } catch(Exception $e) {  
        $api_error = $e->getMessage();  
    } 
     
    if(empty($api_error) && $checkout_session){ 
        $response = array( 
            'status' => 1, 
            'message' => 'Checkout Session created successfully!', 
            'sessionId' => $checkout_session->id 
        ); 
    }else{ 
        $response = array( 
            'status' => 0, 
            'error' => array( 
                'message' => 'Checkout Session creation failed! '.$api_error    
            ) 
        ); 
    } 
} 
 
// Return response 
echo json_encode($response); 
 
?>