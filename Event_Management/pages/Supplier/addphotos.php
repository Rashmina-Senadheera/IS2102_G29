<?php
    session_start();
    if(isset($_SESSION['user_name'])){
?>
<!DOCTYPE html>

<html>

<head>

    <title>Image Upload in PHP</title>

    <! link the css file to style the form >

    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>

    <div id="wrapper">

        <form method="POST" action="addphoto.php" enctype="multipart/form-data" >        

            <input type="file" name="choosefile" value="" />

            <div>

                <button type="submit" name="uploadfile">

                UPLOAD

                </button>

            </div>

        </form>

    </div>

</body>

</html>
<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>