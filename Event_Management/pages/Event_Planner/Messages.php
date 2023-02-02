<?php
include('eventplanner_sidenav.php');
include('eventplanner_header.php');
include('../controllers/commonFunctions.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/viewSuppliersEP.css">
    <link rel="stylesheet" href="../../css/filterEP.css">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
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
    <div class="grid-container-payments" style="height: calc(100%-60px);">
        <div class="wrapper">
            <section class="users">
                <div class="search">
                    <span class="text">Select an user to start chat</span>
                    <input type="text" placeholder="Enter name to search">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="users-list">
                    <!-- <a href="chat.php?user_id='.$row['unique_id'].'"> -->
                    <div class="users-area">
                        <div class="content">
                            <img src="../../images/customer.png" alt="">
                            <div class="details">
                                <span>Shamin Fernando</span>
                                <p>Hello</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>

                        <!-- </a> -->
                    </div>
                    <div class="users-area">
                        <div class="content">
                            <img src="../../images/supplier.png" alt="">
                            <div class="details">
                                <span>Sachintha Gunaratne</span>
                                <p>Hi</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>

                        <!-- </a> -->
                    </div>
                    <div class="users-area">
                        <div class="content">
                            <img src="../../images/d_supplier.png" alt="">
                            <div class="details">
                                <span>Rashmina Senadheera</span>
                                <p>Hi</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>

                        <!-- </a> -->
                    </div>
                </div>
            </section>
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
                    <img src="../../images/evt_planner.jfif" alt="">
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
                        <img src="../../images/evt_planner.jfif" alt="">
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
    </div>



</body>

</html>