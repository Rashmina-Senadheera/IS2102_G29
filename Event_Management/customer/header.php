<?php
include('./db_conn.php');

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_quotation.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

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
                if(isset($_SESSION['user_name'])){
                    echo $_SESSION['user_name'];
                    
                }
                ?>
                
                </span>

                <img src="images/user.png" class="admin_user_logo">
                

                </div>
                </header>
        

        
            
        
</body>
</html>


