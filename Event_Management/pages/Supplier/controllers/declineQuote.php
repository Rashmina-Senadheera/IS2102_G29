<?php
// Check the method of the request
// If request methot is not POST redirect to the register page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../404.php");
} else {
    require_once '../../constants.php';
    require_once '../../controllers/commonFunctions.php';

    // define variables and set to empty values
    $reason = $requestID = $customerID = "";
    $requestID = checkInput($_POST['request_id']);
    $spID = checkInput($_POST['customer_id']);
    $reason = checkInput($_POST['reason']);
    $supName = $_SESSION['user_name'];

    // Validate reason
    if (empty($reason)) {
        $_SESSION['error'] = "Reason is required";
        echo "<script> history.back(); </script>";
    } else {
        // query to update the request status
        $query = "UPDATE request_supplier_quotation SET `status` = 'declined', ep_notes = '$reason' WHERE request_id = '$requestID'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // // get the customer email
            // $query = "SELECT `name`, email FROM user WHERE user_id = '$customerID'";
            // $result = mysqli_query($conn, $query);
            // if ($result) {
            //     $row = mysqli_fetch_assoc($result);
            //     $customerName = $row['name'];
            //     $customerEmail = $row['email'];

            //     // send email to the customer
            //     $subject = "Event Planner Quotation Request Declined";
            //     $message = "Dear $customerName, Your quotation request to Event Planner $epName has been declined.<br/>
            //                 Reason: $reason. <br/><br/> Please contact the event planner for more details.<br/><br/>Thank you! <br/>Eventra Team";

            //     sendEmail($customerEmail, $customerName, $subject, $message);
            // }

            $_SESSION['success'] = "Request declined successfully";
            header("location: ../quote-view.php?id={$requestID}");
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again";
            header("location: ../quote-view.php?id={$requestID}");
        }
    }
}
?>