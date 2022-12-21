<?php 
    // include_once("php/config.php");
    // session_start();
    // if(!isset($_SESSION['unique_id'])){
    //     header('location:login.php');
    // }
    include('customer_sidenav.php');
    //include('customer_header.php');
    include('header.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="chat.css">
    <script src="https://kit.fontawesome.com/bf10032598.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
    <div class="wrapper">
        <section class="chat-area">
            <header>
            <?php 
                // $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                // $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id = '{$user_id}'");
                // if(mysqli_num_rows($sql)>0){
                //     $row = mysqli_fetch_assoc($sql);
                // }
                
                
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="../images/evt_planner.jfif" alt="">
                    <div class="details">
                        <span>Rashmina Senadheera</span>
                        <p>Active Now</p>
                    </div>
            </header>
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>Hi</p>
                     </div>
                </div>
                <div class="chat incoming">
                        <img src="../images/evt_planner.jfif" alt="">
                        <div class="details">
                            <p>Hello</p>
                        </div>
                </div>
          
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                        
                <input type="text" name="outgoing_id" value="" hidden>
                <input type="text" name="incoming_id" value="" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </section>
    </div>
                </main>
    <!-- <script src="javascript/chat.js"></script> -->
</body>
</html>