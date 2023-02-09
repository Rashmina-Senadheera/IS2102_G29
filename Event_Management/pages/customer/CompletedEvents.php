<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/eventPlannerMyevents.css">
<style>
    .imgbx:hover{
        transform: scale(1.1);
        z-index: 1;

    }

    .sci:hover{
        transform: scale(1.1);
        z-index: 1;

    }
</style>
</head>
<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Completed Events </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search events" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button>
            </div>
        </div>
        <div class="gridMain">
            <div class="my-events-container">

                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../../images/event.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Gihani's Wedding Day<br><span>
                                    We don’t want you to wait for information, to compromise your dream, to apologise to family and friends for the quality of ceremony music or the food not being delicious.
                                </span></h3>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="Event1.php">View</a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../../images/event2.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Chathu's Gender Reveal<br><span>
                                    Ten little fingers, ten little toes, two little eyes and one little nose, boy or a girl, no-one knows! Pink or blue, our dream came true! Blue or pink, what do you think? We're tickled pink and happy to say, a little princess is on her way!
                                </span></h3>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="Event2.php">View</a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../../images/event3.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Outdoor Wedding<br><span>The first initiative undertaken by DEVENT, an event management firm aiming to reach the pinnacle of the industry. After thorough market research, we figured out one critical attention grasping issue faced by the wider community, which is the mental instability emerging due to the hectic monotonous routines of a substantial proportion of the population, ultimately leading to the deterioration of their overall wellbeing.</span></h3>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="Event3.php">View</a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../../images/event4.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Sandali's Birthday<br><span>
                                    The lovely Sewwandi was on cloud nine when she was pleasantly surprised by her loved ones and friends on her birthday!! The atmosphere and decorum created by DEVENT, truly set the tone to create a memorable experience for her. Do not hesitate to contact us in making your dream event a reality.
                                </span></h3>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="Event4.php">View</a>
                        </li>
                    </ul>
                </div>
                <!-- <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../../images/event.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Gihani's Wedding Day<br><span>
                                    We don’t want you to wait for information, to compromise your dream, to apologise to family and friends for the quality of ceremony music or the food not being delicious.
                                </span></h3>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="Event1.php">View</a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../../images/event2.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Chathu's Gender Reveal<br><span>
                                    Ten little fingers, ten little toes, two little eyes and one little nose, boy or a girl, no-one knows! Pink or blue, our dream came true! Blue or pink, what do you think? We're tickled pink and happy to say, a little princess is on her way!
                                </span></h3>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="Event2.php">View</a>
                        </li>
                    </ul>
                </div> -->

            </div>
        </div>
    </div>
</body>

</html>
