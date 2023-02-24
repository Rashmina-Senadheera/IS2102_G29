<?php

// Check the method of the request
// If request methot is not POST redirect to the register page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../../sign_up_form.php");
} else {
    
    // include the database config file
    require_once '../../constants.php';
    require_once 'commonFunctions.php';

    // define variables and set to empty values
     function validate($data){
        $data =trim($data);
        $data =stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $title = validate($_POST['packageName']);
    $descript = validate($_POST['description']);
    $quote_id = validate($_POST['ptype']);

    $sql = "INSERT INTO  supplier_quotation( quotation_id,description,estimated_price) VALUES(?,?,?)";

        if ($stmt = $conn->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('iss', $param_quote_id,$param_title, $param_descript);
            // Set parameters
            $param_title = $title;
            $param_descript = $descript ;
            $param_quote_id = $quote_id ;

        }
    }
    ?>