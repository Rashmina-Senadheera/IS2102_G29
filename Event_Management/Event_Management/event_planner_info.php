<?php 
include('constants.php');
if(isset($_SESSION['user'])){
    include('reg_header.php');
}
else{
    include('unreg_header.php');
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
    <main class="font-poppins flex-column event_planner_info">
        <div class="flex-column details">
            <h1>Shamin Fernando</h1>
            <h3 class="flex-row">Event Planner's Information</h3>
            <span class="flex-row information">
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
                <a href="#" class="btn a-txt-deco-none txt-white">Contact</a>
                <a href="#" class="btn a-txt-deco-none txt-white">Get a Quote</a>
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
    </main>
</body>
</html>