<?php 
    
    include("admin_header.php");
    include("admin_nav.php");

    $_SESSION["page_name"] = "Customer Information";

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
<main class="admin_main">
    <div class="content">
        
            <div class="flex-row">
                <div class="img-grp">
                <img src="../images/evt_planner.jfif">
                </div>
                <div class="fields">
                    <div class="input-group">
                        <label for="name">Name</label>
                        <input type="text" value="Rashmina Senadheera" name="name">
                    </div>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="text" value="rashminalasith@gmail.com" name="email">
                    </div>
                    <div class="input-group">
                        <label for="number1">Contact Number 1</label>
                        <input type="text" value="0774550849" name="number1">
                    </div>
                    <div class="input-group">
                        <label for="number2">Contact Number 2</label>
                        <input type="text" value="0112257155" name="number2">
                    </div>
                </div>
            </div>
        
    </div>
</main>