
<?php
    include('../../constants.php');
$msg = ""; 

// check if the user has clicked the button "UPLOAD" 

if (isset($_POST['uploadfile'])) {
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $filename = $_FILES["choosefile"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];  

    $folder = '../images/'.$filename;   

    // connect with the database

        // query to insert the submitted data

        $sql = "INSERT INTO images (file_name) VALUES ('$filename')";

        // function to execute above query

        mysqli_query($conn, $sql);       

        // Add the image to the "image" folder"
        if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";

        }else{

            $msg = "Failed to upload image";

    }

}

$result = mysqli_query($conn, "SELECT * FROM images");

?>