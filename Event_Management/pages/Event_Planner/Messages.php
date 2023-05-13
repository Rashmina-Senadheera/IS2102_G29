<?php
require_once('../constants.php');
require_once('eventplanner_sidenav.php');
require_once('eventplanner_header.php');
require_once('../controllers/commonFunctions.php');

if(isset($_GET['supplier_id'])){
$supplier_id = mysqli_real_escape_string($conn,$_GET['supplier_id']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="../../css/chat.css">
    <script src="https://kit.fontawesome.com/bf10032598.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Show success message -->
    <?php
    if (isset($_SESSION['success'])) {
        echo '<div class="success-message">' . showSessionMessage("success") . '</div>';
    }
    ?>
    <div class="grid-container-payments" style="height: calc(100%-60px); ">
        <div class="wrapper" style="margin-top:30px">
            <section class="users">
                <div class="search">
                    <span class="text">Select an user to start chat</span>
                    <input type="text" placeholder="Enter name to search">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="users-list">
                    <!-- <a href="chat.php?user_id='.$row['unique_id'].'"> -->

                    <?php 
                        $sql2 = "SELECT * FROM `user` WHERE `role`= 'customer' OR `role` = 'supplier'";
                        $res2 = mysqli_query($conn,$sql2);
                        if($res2){
                            while($row = mysqli_fetch_assoc($res2)){?>
                            <div class="users-area">
                                <div class="content">
                                    <img src="../supplier/images/Udari.jpeg" alt="">
                                    <div class="details" onclick="showDetails(this)" id="message" data-id="<?php echo $row['user_id']; ?>" data-name="<?php echo $row['name']; ?>">
                                        
                                        <span><?php echo $row['name']; ?></span>
                                        <p class="role" style="font-size: 12px;"><?php echo ucfirst($row['role']); ?></p>
                                        
                                    </div>
                                </div>
                                <div class="status-dot"><i class="fas fa-circle"></i></div>

                        <!-- </a> -->
                    </div>
                            
                            
                            
                            <?php
                            }
                        }
                    ?>
                    
                    
                </div>
            </section>
            <section class="chat-area">
                <header>
                    <div class="img_name">                 
                        <!-- <img src="../supplier/images/Milindu Abeynayake.jpeg" alt=""> -->
                        <div class="details">
                            <span id="name"></span>
                            <!-- <p>Active Now</p> -->
                        </div>
                    </div>
                    <a class="back-icon"><i class="fa-solid fa-xmark"></i></a>
                    <!-- <i class="fa-solid fa-xmark"></i> -->
                </header>
                <div class="chat-box">
                    <div class="no_message">
                        <img class="select_user" src="../../images/chat/select_user.png">
                        <label>Please select a user</label>
                    </div>
                </div>
                <form action="" class="typing-area" autocomplete="off" >

                    <input type="text" name="outgoing_id" id="outgoing_id" class="outgoing_id" value="<?php echo $_SESSION['user_id']; ?>" hidden>
                    <input type="text" name="incoming_id" id="incoming_id" class="incoming_id" value="
                    <?php if(!empty($supplier_id)){
                        echo $supplier_id;
                        }else{
                            echo "";
                        }
                        ?>" hidden >
                    <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                    <button class="send_btn"><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </section>
        </div>
    </div>
    <script src="../chat/chat.js"></script>
    <!-- <script>
        const incoming_id = document.querySelector(".incoming_id").value;
        if(incoming_id != ""){
            alert("empty");
        }
    </script> -->


    


</body>

</html>