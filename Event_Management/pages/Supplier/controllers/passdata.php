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
    function makeArray($arr,$reciveData){
            foreach($reciveData as $val)  
                {  
                    $arr .= $val.",";  
                } 
            return $arr;      
    }


    $title = validate($_POST['title']);
    $descript = validate($_POST['descript']);
    $other = validate($_POST['other']);
    $maxBudget = validate($_POST['maxBudget']);
    $minBudget = validate($_POST['minBudget']);
    $sup_ID = $_SESSION['user_id'];
    $images = $_FILES['images'];
    $ptype = validate($_POST['ptype']);

    if($ptype == 'venue'){
        $venueIn = $_POST['venueIn'];
        $location = $_POST['location'];
        $maxCap = $_POST['maxCap'];
        $minCap = $_POST['minCap'];
        $type = $_POST['type'];
    }
    if($ptype == 'foodbev'){
        isset($_POST['cater-transport']) ? $cater_transport = $_POST['cater-transport'] : $cater_transport = "";
        isset($_POST['cater-type']) ? $cater_type = makeArray($cater_type,$_POST['cater-type']) : $cater_type = "";
        isset($_POST['available-for-fb']) ? $available_for_fb = makeArray($available_for_fb,$_POST['available-for-fb']): $available_for_fb = "";
        isset($_POST['available-as-fb']) ? $available_as_fb = makeArray($available_as_fb,$_POST['available-as-fb'] ): $available_as_fb = "";
        
    }
    if($ptype == 'transport'){
        $transport_type = validate($_POST['transport_type']);
        $transport_Brand = validate($_POST['transport_Brand']);
        $transport_Model = validate($_POST['transport_Model']);
    }
    if($ptype == 'florist'){
        $floral_type = validate($_POST['floral-type']);
        $floral_height = validate($_POST['floral-height']);
        $floral_quant = validate($_POST['floral-quant']);
        isset($_POST['type-floral']) ? $floral_for = $_POST['type-floral'] : $floral_for = "";
    }
    if($ptype == 'deco'){
        isset($_POST['type-deco']) ? $deco_type = makeArray($deco_type,$_POST['type-deco']) : $deco_type = "";
    }
    if($ptype == 'photo'){
        isset($_POST['photo-in']) ? $photo_in = makeArray($photo_in,$_POST['photo-in']) : $photo_in = "";
        isset($_POST['type-photo']) ? $type_photo = makeArray($type_photo,$_POST['type-photo']) : $type_photo = "";
    }
    if($ptype == 'ent'){
        isset($_POST['type-ent']) ? $type_ent = makeArray($type_ent,$_POST['type-ent']) : $type_ent = "";
    }
    if($ptype == 'sound'){
        isset($_POST['type-sound']) ? $type_sound = makeArray($type_sound,$_POST['type-sound']) : $type_sound = "";
    }
    if($ptype == 'light'){
        isset($_POST['type-light']) ? $type_light = makeArray($type_light,$_POST['type-light']) : $type_light = "";
    }


    $onlyPositiveNumbers = "/^[1-9][0-9]*$/";

    // Validation patters
    if (empty($title)) {
        $_SESSION['error-title'] = "Enter the title - Can't be empty";
    }
    if (empty($descript)) {
        $_SESSION['error-descript'] = "Enter the description - Can't be empty";
    }

    if (empty($maxBudget) || empty($minBudget) ) {
        if (empty($maxBudget) && empty($minBudget) ){
            $_SESSION['error-Budget'] = "Enter the Budget - Can't be empty"; 
        }else if (empty($minBudget)){
            $_SESSION['error-Budget'] = "Enter the Minimum Budget - Can't be empty"; 
        }else{
            $_SESSION['error-Budget'] = "Enter the Maximum Budget - Can't be empty";
        }
    } else if ($maxBudget <=  $minBudget ) {
           $_SESSION['error-Budget'] = "Maximum Budget has to be greater than Minimum Budget";
    } else if ((!preg_match($onlyPositiveNumbers, $maxBudget)) || (!preg_match($onlyPositiveNumbers, $minBudget))) {
         $_SESSION['error-Budget'] = "Budget must be a positive number";
    }


    if($ptype == 'venue' ) {
        if (empty($venueIn)) {
            $_SESSION['error-venueIn'] = "Choose a Value";
        } 
        if (empty($location)) {
            $_SESSION['error-venloc'] = "Enter a Location";
        } 
        if (empty($type)) {
            $_SESSION['error-ventype'] = "Enter a Type" ;
        } 

        if (empty($maxCap) || empty($minCap) ) {
            if (empty($maxCap) && empty($minCap) ){
                $_SESSION['error-capacity'] = "Enter the Capacity- Can't be empty"; 
            }else if (empty($minCap)){
                $_SESSION['error-capacity'] = "Enter the Minimum Capacity - Can't be empty"; 
            }else{
                $_SESSION['error-capacity'] = "Enter the Maximum Capacity - Can't be empty";
            }
        } else if ($maxCap <=  $minCap ) {
            $_SESSION['error-capacity'] = "Maximum Capacity has to be greater than Minimum Capacity";
        }else if ((!preg_match($onlyPositiveNumbers, $maxCap)) || (!preg_match($onlyPositiveNumbers, $minCap))) {
            $_SESSION['error-Budget'] = "Capacity must be a positive number";
        }   
    }

    if($ptype == 'florist') {   
        if (!empty($floral_quant) && !preg_match($onlyPositiveNumbers, $floral_quant)) {
            $_SESSION['error-flowQuantity'] = "Quantity must be a positive number";
        }
    }
    if($ptype == 'foodbev') {   
        if (empty($cater_transport)) {
            $_SESSION['error-catTransport'] = "Choose an Option";
        }
    }
    if($ptype == 'transport') {   
        if (empty($transport_type)) {
            $_SESSION['error-tansportType'] = "Choose an Option";
        }
    }
    if($ptype == 'light') {   
        if (empty($type_light)) {
            $_SESSION['error-lightType'] = "Choose an Option";
        }
    }
    if($ptype == 'sound') {   
        if (empty($type_sound)) {
            $_SESSION['error-soundType'] = "Choose an Option";
        }
    }

    // Validate package name
    // If there are any errors go back
    if (
        isset($_SESSION['error-title']) ||
        isset($_SESSION['error-descript']) ||
        isset($_SESSION['error-Budget']) || 
        ( $ptype == 'venue'         &&  ( isset($_SESSION['error-venueIn']) || isset($_SESSION['error-venloc']) || isset($_SESSION['error-ventype']) ||  isset($_SESSION['error-capacity'])) ) || 
        ( $ptype == 'foodbev'       &&  ( isset($_SESSION['error-catTransport']) ) ) || 
        ( $ptype == 'transport'     &&  ( isset($_SESSION['error-tansportType']) ) ) || 
        ( $ptype == 'light'     &&  ( isset($_SESSION['error-lightType']) ) ) || 
        ( $ptype == 'sound'     &&  ( isset($_SESSION['error-soundType']) ) ) || 
        ( $ptype == 'florist'     &&  ( isset($_SESSION['error-flowQuantity']) ) )
    ) {
        echo "<script> history.back(); </script>";
    } else {
        // Prepare an insert statement
        $sql = "INSERT INTO  sup_product_general( supplier_ID,title,description,other_details,type,budget_min,budget_max) 
        VALUES(?,?,?,?,?,?,?)";

        //,venloc,venlocation,ventype,maxCap,minCap,?,?,?,?,?

        if ($stmt = $conn->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('issssii',$sup_ID, $param_title, $param_descript,$param_other,$param_ptype,$param_minBudget,$param_maxBudget);
            // Set parameters
            $param_title = $title;
            $param_descript = $descript ;
            $param_other = $other ;
            $param_maxBudget= $maxBudget ;
            $param_minBudget= $minBudget ;
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
                if($ptype == 'transport'){
                    $sql1 = "INSERT INTO  supplier_transport( product_id,type,brand,model) VALUES(?,?,?,?)";
                }
                if($ptype == 'florist'){
                    $sql1 = "INSERT INTO  supplier_florist( product_id,type_of_flowers,height,quantity,suitable_for) VALUES(?,?,?,?,?)";
                }
                if($ptype == 'deco'){
                    $sql1 = "INSERT INTO  supplier_deco( product_id,suitable_for) VALUES(?,?)";
                }
                if($ptype == 'photo'){
                    $sql1 = "INSERT INTO  supplier_photo( product_id,photo_in,available) VALUES(?,?,?)";
                }
                if($ptype == 'ent'){
                    $sql1 = "INSERT INTO  supplier_ent( product_id,provide) VALUES(?,?)";
                }
                if($ptype == 'sound'){
                    $sql1 = "INSERT INTO  supplier_sound( product_id,type_sound) VALUES(?,?)";
                }
                if($ptype == 'light'){
                    $sql1 = "INSERT INTO  supplier_light( product_id,type_light) VALUES(?,?)";
                }

                if($ptype != 'other') {
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
                    if($ptype == 'transport'){
                        $stmt1->bind_param('isss',$product_id, $param_transportType, $param_transportBrand, $param_transportModel);
                        $param_transportType = $transport_type;
                        $param_transportBrand = $transport_Brand;
                        $param_transportModel = $transport_Model;
                    }
                    if($ptype == 'florist'){
                        $stmt1->bind_param('isdis',$product_id, $param_type_of_flowers, $param_height, $param_quantity,$param_suitable_for);
                        $param_type_of_flowers = $floral_type;
                        $param_height = $floral_height;
                        $param_quantity = $floral_quant;
                        $param_suitable_for = $floral_for;
                    }
                    if($ptype == 'deco'){
                        $stmt1->bind_param('is',$product_id, $param_type_deco);
                        $param_type_deco = $deco_type;
                    }

                    if($ptype == 'photo'){
                        $stmt1->bind_param('iss',$product_id,$photo_in, $param_type_photo);
                        $param_photo_in = $photo_in;
                        $param_type_photo = $type_photo;
                    }
                    if($ptype == 'ent'){
                        $stmt1->bind_param('is',$product_id, $param_type_ent);
                        $param_type_ent = $type_ent;
                    }
                    if($ptype == 'sound'){
                        $stmt1->bind_param('is',$product_id, $param_type_sound);
                        $param_type_sound = $type_sound;
                    }
                    if($ptype == 'light'){
                        $stmt1->bind_param('is',$product_id, $param_type_light);
                        $param_type_light = $type_light;
                    }
                }
                
                    if ($stmt1->execute()) {
                            // continue the loop
                        } else {
                            echo "Something went wrong.";
                        }
                    }
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

                // Redirect package services page
                $_SESSION['success'] = "Package added successfully".$package_id;
                header("location: ../form-venue.php?product_type=".$ptype);
            } else {
                $_SESSION['error'] =  "Something went wrong. Please try again later.";
                header("location: ../form-venue.php?product_type=".$ptype);
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $conn->close();
    }
}
