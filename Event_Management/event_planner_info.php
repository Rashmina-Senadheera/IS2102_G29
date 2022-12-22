<?php 
include('constants.php');
if(isset($_SESSION['user'])){
    include('reg_header.php');
}
else{
    include('unreg_header.php');
}
$email = mysqli_real_escape_string($conn,$_GET['email']);
$sql = "SELECT * FROM user WHERE email='{$email}'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res) >0){
    $row = mysqli_fetch_assoc($res);
}
else{
    header("location:".SITEURL."event_planners.php");
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <main class="font-poppins flex-column-center event_planner_info">
        <div class="flex-column-center details">
            <h1><?php echo $row['name']; ?></h1>
            <h3 class="flex-row-center">Event Planner's Information</h3>
            <span class="flex-row-center information">
                <img src="images/evt_planner.jfif" class="evt_img">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio sequi molestiae 
                    accusantium omnis? Aspernatur a vitae sapiente dignissimos eaque, quaerat omnis fugiat 
                    animi ab suscipit, obcaecati mollitia itaque deserunt minus.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio sequi molestiae 
                    accusantium omnis? Aspernatur a vitae sapiente dignissimos eaque, quaerat omnis fugiat 
                    animi ab suscipit, obcaecati mollitia itaque deserunt minus.
                    animi ab suscipit, obcaecati mollitia itaque deserunt minus.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio sequi molestiae 
                    accusantium omnis? Aspernatur a vitae sapiente dignissimos eaque, quaerat omnis fugiat 
                    animi ab suscipit, obcaecati mollitia itaque deserunt minus.</p>
               
            </span>
                <span class="flex-row btns_info txt-white">
                    <a href="chat.php?email=<?php echo $email;?>" class="btn a-txt-deco-none txt-white contact_btn">Contact</a>
                    <a href="#" class="btn a-txt-deco-none txt-white">Get a Quote</a>
                <form method="POST" action="chat/chat.php" class="contact-names" hidden >
                    <input type="text" name="user_id" value="<?php echo $_SESSION['user'];  ?>" >
                    <input type="text" name="event_id" value="<?php echo $email;  ?>" >

                </form>
                
            </span>
            <h3 class="flex-row">Events</h3>
            <div class="events_cards flex-row">

                <span class="card flex-column">
                    <img src="images/event.jpg" >
                    <h4>Lorem Ipsum</h4>
                    <p>Lorem ipsum dolor sitamet, consectetur
                    </p>
                </span>

                <span class="card flex-column">
                    <img src="images/event.jpg" >
                    <h4>Lorem Ipsum</h4>
                    <p>Lorem ipsum dolor sitamet, consectetur
                    </p>
                </span>

                <span class="card flex-column">
                    <img src="images/event.jpg" />
                    <h4>Lorem Ipsum</h4>
                    <p>
                    Lorem ipsum dolor sit
                    amet, consectetur
                    </p>
                </span>

                <span class="card flex-column">
                    <img src="images/event.jpg" >
                    <h4>Lorem Ipsum</h4>
                    <p>
                    Lorem ipsum dolor sit
                    amet, consectetur
                    </p>
                </span>
            </div>

        </div>
        <!--<script src="javascript/contact-names.js"></script>-->
    </main>
</body>
</html>