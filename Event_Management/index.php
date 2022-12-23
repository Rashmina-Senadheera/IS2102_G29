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
                    <img src="images/event-about.jpg" >
                    <h4 style="text-align:center">Outdoor Wedding Reception</h4>
                    <p style="text-align:center; font-size:14px">This stunning event was organized for an outdoor wedding reception held during the evening
                    </p>
                </span>
                <span class="card">
                    <img src="images/event-about4.jpg" >
                    <h4 style="text-align:center">Colorful 1st Birthday Celebration </h4>
                    <p style="text-align:center; font-size:14px">This stunning event was organized for a 1st birthday celebration
                    </p>
                </span>
                <span class="card">
                    <img src="images/event-about2.jpg" >
                    <h4 style="text-align:center">Outdoor garden party for anniversary </h4>
                    <p style="text-align:center; font-size:14px">This stunning event was organized for an anniversary celebration
                    </p>
                </span>
                <span class="card">
                    <img src="images/event-about3.jpg" >
                    <h4 style="text-align:center">Colorful Proposal Party & Reception </h4>
                    <p style="text-align:center; font-size:14px">This stunning event was organized for a proposal and resception after
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
                
                
                
            </span>
        </div>
    
    </main>
    <script src="javascript/event_planners.js"></script>
</body>
<?php 
    include("footer.php");
?>
</html>