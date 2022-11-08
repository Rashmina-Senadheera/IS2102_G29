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
    <main  class="landing_page_main">
        <div class="latest">
            <span class="lbl_latest">
            <label>Latest</label>
            <label>View More </label>
            </span>
            <span class="latest_cards">
                <span class="card">
                    <img src="images/event.jpg" >
                    <h4>Lorem Ipsum</h4>
                    <p>Lorem ipsum dolor sitamet, consectetur
                    </p>
                </span>
                <span class="card">
                    <img src="images/event.jpg" >
                    <h4>Lorem Ipsum</h4>
                    <p>Lorem ipsum dolor sitamet, consectetur
                    </p>
                </span>
                <span class="card">
                    <img src="images/event.jpg" >
                    <h4>Lorem Ipsum</h4>
                    <p>
                    Lorem ipsum dolor sit
                    amet, consectetur
                    </p>
                </span>
                <span class="card">
                    <img src="images/event.jpg" >
                    <h4>Lorem Ipsum</h4>
                    <p>
                    Lorem ipsum dolor sit
                    amet, consectetur
                    </p>
                </span>
            </span>
        </div>
        <div class="event_planners">
            <span class="lbl_evt_planners">
            <label>Event Planners</label>
            <label ><a href="event_planners.php"> View More</a> </label>
            </span>
            <span class="evt_planner_cards">
                <span class="card">
                    <img src="images/evt_planner.jfif" >
                    <span class="name_rating">
                    <h4>Lorem Ipsum</h4>
                    <a>★★★★</a>
                    </span>
                    <a href="#" class="btn_contact btn">Contact </a>
                </span>
                <span class="card">
                    <img src="images/evt_planner.jfif" >
                    <span class="name_rating">
                    <h4>Lorem Ipsum</h4>
                    <a>★★★★</a>
                    </span>
                    <a href="#" class=" btn_contact btn">Contact </a>
                </span>
                <span class="card">
                    <img src="images/evt_planner.jfif" >
                    <span class="name_rating">
                    <h4>Lorem Ipsum</h4>
                    <a>★★★★</a>
                    </span>
                    <a href="#" class="btn_contact btn">Contact </a>
                </span>
                <span class="card">
                    <img src="images/evt_planner.jfif" >
                    <span class="name_rating">
                    <h4>Lorem Ipsum</h4>
                    <a>★★★★</a>
                    </span>
                    <a href="#" class="btn_contact btn">Contact </a>
                    
                </span>
                
                
            </span>
        </div>

    </main>
</body>
</html>