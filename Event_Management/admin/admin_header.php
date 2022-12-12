<?php
include('../constants.php');
include('../login_access.php');
if($_SESSION['role'] != 'admin'){
    ?>
    <script>
        alert("Acess denied");
        location.replace('../location_check.php');
    </script>
<?php
}
if(!isset($_GET['reload'])) {
    echo '<meta http-equiv="refresh" content= "0;URL=?reload=true" />';
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_header.css">
    <link rel="stylesheet" href="css/admin.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

                <header class="admin_header">
                
                <span class="detail_heading" >
                    <?php 
                    if(isset($_SESSION['page_name'])){
                        echo $_SESSION['page_name'];
                        unset($_SESSION['page_name']);
                    }
                    
                
                ?></span>
                <div class="admin_details">
                <span class="admin_name">
                   
                <?php
                if(isset($_SESSION['user'])){
                    echo $_SESSION['user'];
                    
                }
                ?>
                
                </span>

                <img src="../images/user.png" class="admin_user_logo">
                

                </div>
                </header>
        

        
            
        
</body>
</html>


