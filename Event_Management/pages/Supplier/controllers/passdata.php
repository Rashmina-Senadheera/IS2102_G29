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

    $title = validate($_POST['title']);
    $descript = validate($_POST['descript']);
    $other = validate($_POST['other']);
    $sup_ID = $_SESSION['user_id'];
    $images = $_FILES['images'];
    $ptype = validate($_POST['ptype']);

    if($ptype == 'venue'){
        $venueIn = validate($_POST['venueIn']);
        $location = validate($_POST['location']);
        $maxCap = validate($_POST['maxCap']);
        $minCap = validate($_POST['minCap']);
        $type = validate($_POST['type']);
    }
    if($ptype == 'foodbev'){
        $cater_type = validate($_POST['cater-type']);
        $cater_transport = validate($_POST['cater-transport']);
        $available_as_fb = validate($_POST['available-as-fb']);
        $available_for_fb = validate($_POST['available-for-fb']);
    }



    // Validation patters
    $onlyPositiveNumbers = "/^[1-9][0-9]*$/";

    // Validate package name
    if (empty($title)) {
        $_SESSION['error-title'] = "Package name is required";
    }

    // Validate event type
    if (empty($descript)) {
        $_SESSION['error-descript'] = "Event type is required";
    }

    // If there are any errors go back
    if (
        isset($_SESSION['error-title']) ||
        isset($_SESSION['error-descript'])
    ) {
        echo "<script> history.back(); </script>";
    } else {
        // Prepare an insert statement
        $sql = "INSERT INTO  sup_product_general( supplier_ID,title,description,other_details,type) 
        VALUES(?,?,?,?,?)";

        //,venloc,venlocation,ventype,maxCap,minCap,?,?,?,?,?

        if ($stmt = $conn->prepare($sql)) {


            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('issss',$sup_ID, $param_title, $param_descript,$param_other,$param_ptype);
            // Set parameters
            $param_title = $title;
            $param_descript = $descript ;
            $param_other = $other ;
            $param_ptype = $ptype ;
            

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Get the last inserted id
                $product_id  = $conn->insert_id;

                if($ptype == 'venue'){
                    $sql1 = "INSERT INTO  supplier_venue( product_id,venloc,venlocation,ventype,maxCap,minCap) VALUES(?,?,?,?,?,?)";
                }
                if($ptype == 'foodbev'){
                    $sql1 = "INSERT INTO  supplier_foodbev( product_id,catered_for,transport,available_as,available_for) VALUES(?,?,?,?,?)";
                }

                if ($stmt1 = $conn->prepare($sql1)) {

                    if($ptype == 'venue'){
                        $stmt1->bind_param('isssii',$product_id, $param_venueIn, $param_location, $param_type,$param_maxCap,$param_minCap);
                        $param_venueIn = $venueIn ;
                        $param_location = $location;
                        $param_type = $type;
                        $param_maxCap = $maxCap ;
                        $param_minCap = $minCap;
                    }
                    if($ptype == 'foodbev'){
                        $stmt1->bind_param('issss',$product_id, $param_catType, $param_catTransport, $param_availAsFb,$param_availForFb);
                        $param_availAsFb = $available_as_fb;
                        $param_availForFb = $available_for_fb;
                        $param_catTransport = $cater_transport;
                        $param_catType = $cater_type;
                    }
                    

                    if ($stmt1->execute()) {
                        // Loop through the images array with count
                        foreach ($images['tmp_name'] as $index => $tmp_name) {
                            $name = mysqli_real_escape_string($conn, $images['name'][$index]);
                            $type = mysqli_real_escape_string($conn, $images['type'][$index]);
                            if (file_exists($tmp_name)) {
                                $image = file_get_contents($tmp_name);
                            } else {
                                $image = null;
                                continue;
                            }
                            $image = mysqli_real_escape_string($conn, $image);

                            $sql = "INSERT INTO supplier_product_images (product_id, image_id, image, name, type) VALUES ('$product_id', '$index', '$image', '$name', '$type')";

                            mysqli_query($conn, $sql);
                            echo mysqli_error($conn);
                        }
                    }
                }
                // Redirect package services page
                $_SESSION['success'] = "Package added successfully".$package_id;
                header("location: ../form-venue.php?product_type=".$ptype);
            } else {
                $_SESSION['error'] =  "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $conn->close();
    }
}
