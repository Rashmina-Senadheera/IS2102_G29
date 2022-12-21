<?php
    include('../../constants.php');
    if(isset($_SESSION['user_name'])){

    function validate($data){
        $data =trim($data);
        $data =stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $title = validate($_POST['title']);
    $descript = validate($_POST['descript']);
    $venueIn = validate($_POST['venueIn']);
    $location = validate($_POST['location']);
    $type = validate($_POST['type']);
    $maxCap = validate($_POST['maxCap']);
    $minCap = validate($_POST['minCap']);
    $sup_ID = $_SESSION['user_id'];
    $filename = $_FILES["choosefile"]["name"];
    $tempname = $_FILES["choosefile"]["tmp_name"];  
    $folder = '../images/'.$filename;    
    // $targetDir = '../images/'; 
    // $allowTypes = array('jpg','png','jpeg','gif'); 
     
    // $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    // $fileNames = array_filter($_FILES['choosefile']['name']);  

   
    if($_POST['send'] == 'create'){
        $sql = "INSERT INTO  supplier_venue( supplier_ID,title,descript,venloc,venlocation,ventype,maxCap,minCap) 
        VALUES('$sup_ID','$title','$descript','$venueIn','$location','$type','$maxCap','$minCap')";
        $result = mysqli_query($conn,$sql);
        
        if($result){
                    // Upload file to server
                    if(move_uploaded_file($tempname, $folder)){
                        // Insert image file name into database
                        mysqli_query($conn, "SELECT @item_id:=MAX(item_ID) FROM supplier_venue;");
                        $sql = "INSERT INTO images (file_name,item_ID) VALUES ('$filename',@item_id)";
                        $insert = mysqli_query($conn, $sql);  
                        if($insert){
                            $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                        }else{
                            $statusMsg = "File upload failed, please try again.";
                        } 
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
            // Display status message
            echo $statusMsg;
    //         if(!empty($fileNames)){ 
    //     foreach($_FILES['choosefile']['name'] as $key=>$val){ 
    //         // File upload path 
    //         $fileName = basename($_FILES['choosefile']['name'][$key]); 
    //         $targetFilePath = $targetDir . $fileName; 
             
    //         // Check whether file type is valid 
    //         $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    //         if(in_array($fileType, $allowTypes)){ 
    //             // Upload file to server 
    //             if(move_uploaded_file($_FILES["choosefile"]["tmp_name"][$key], $targetFilePath)){ 
    //                 // Image db insert sql 
    //                 mysqli_query($conn, "SELECT @item_id:=MAX(item_ID) FROM supplier_venue;");
    //                 $insertValuesSQL .= "('".$fileName."', NOW() , @item_id ),"; 
    //             }else{ 
    //                 $errorUpload .= $_FILES['choosefile']['name'][$key].' | '; 
    //             } 
    //         }else{ 
    //             $errorUploadType .= $_FILES['choosefile']['name'][$key].' | '; 
    //         } 
    //     } 
         
    //     // Error message 
    //     $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
    //     $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
    //     $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         
    //     if(!empty($insertValuesSQL)){ 
    //         $insertValuesSQL = trim($insertValuesSQL, ','); 
    //         // Insert image file name into database 
            
    //         $insert = $conn->query("INSERT INTO images (file_name, uploaded_on,item_ID) VALUES $insertValuesSQL"); 
    //         if($insert){ 
    //             $statusMsg = "Files are uploaded successfully.".$errorMsg; 
    //         }else{ 
    //             $statusMsg = "Sorry, there was an error uploading your file."; 
    //         } 
    //     }else{ 
    //         $statusMsg = "Upload failed! ".$errorMsg; 
    //     } 
    // }else{ 
    //     $statusMsg = 'Please select a file to upload.'; 
    // 
        } 
            header("Location: form-venue.php?successs= successfull");
            exit();
        }else {
            header("Location:  form-venue.php?errors=Try again");
            exit();
        }
    }
   else{
    header("Location:sign_in.php?");
    session_destroy();
    exit();
 }
?>
