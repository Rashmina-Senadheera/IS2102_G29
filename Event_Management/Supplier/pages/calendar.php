<?php
    session_start();
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    if(isset($_SESSION['user_name'])){
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/addps.css">
</head>

<body>
    <div class="container-profile">
    <main class="admin_main">
    <iframe src="https://calendar.google.com/calendar/embed?src=ee9ec1b40da007f0bae788767ab893461afb27a2ec5ba9c7e493a4fcfe6a7a1a%40group.calendar.google.com&ctz=Asia%2FColombo"
         style="border: 0,margin:20px" width="98%" height="600" frameborder="0" scrolling="no" ></iframe>
    </div>
    </body>
</html>

<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>
