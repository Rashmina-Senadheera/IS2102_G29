<?php

// Check the method of the request
// If request methot is not POST redirect to the register page
    
    // include the database config file
    require_once '../../constants.php';
    require_once 'commonFunctions.php';

    $p_id = $_GET['id'];

    $sql = "DELETE FROM sup_product_general WHERE product_id= ?;";

        
    if ($stmt = $conn->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('i', $param_pid);
            // Set parameters
            $param_pid = $p_id;
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect package services page
                $_SESSION['success'] = "Product Deleted Successfully".$p_id;
                header("location: ../form-venue.php?product_type=".$ptype);
            } else {
                $_SESSION['error'] =  "Something went wrong. Please try again later.";
            }
            // Close statement
            $stmt->close();
        }

        // Close connection
        $conn->close();
?>

