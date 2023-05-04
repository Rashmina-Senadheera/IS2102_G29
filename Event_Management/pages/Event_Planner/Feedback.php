<?php
require_once('eventplanner_sidenav.php');
require_once('eventplanner_header.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <style>
        .feedback {
            background-color: #f2f2f2;
            border-radius: .5rem;
            padding: 1rem;
            margin: 1rem 0;
        }
        .starChecked {
            color: orange;
        }
        .reply-btn {
            display: flex;
            justify-content: flex-end;
        }
        .reply-btn .reply {
            border: none;
            background-color: #f2f2f2;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Feedbacks </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search..." name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button>
            </div>
        </div>
        <div class="gridMain">
            <div class="feedback">
                <div class="feedback-rating">Rating: 
                    <span class="fa fa-star starChecked"></span>
                    <span class="fa fa-star starChecked"></span>
                    <span class="fa fa-star starChecked"></span>
                    <span class="fa fa-star starChecked"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="feedback-message">Offer more variety in food options: It can be helpful to provide a range of food options to cater to different dietary restrictions and preferences. This could include vegetarian, vegan, gluten-free, and other options.</div>
                <!-- <div class="reply-btn">
                    <button type="button" class="reply">Reply <i class='bx bx-send'></i></button>
                </div> -->
            </div>
            <div class="feedback">
                <div class="feedback-rating">Rating: 
                    <span class="fa fa-star starChecked"></span>
                    <span class="fa fa-star starChecked"></span>
                    <span class="fa fa-star starChecked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="feedback-message">Improve communication with attendees: It's important to keep attendees informed about important details such as the schedule, location, and any changes to the event. Consider using a variety of communication channels, such as email, text, and social media, to reach as many people as possible.</div>
                <!-- <div class="reply-btn">
                    <button type="button" class="reply">Reply <i class='bx bx-send'></i></button>
                </div> -->
            </div>
            <div class="feedback">
                <div class="feedback-rating">Rating: 
                    <span class="fa fa-star starChecked"></span>
                    <span class="fa fa-star starChecked"></span>
                    <span class="fa fa-star starChecked"></span>
                    <span class="fa fa-star starChecked"></span>
                    <span class="fa fa-star starChecked"></span>
                </div>
                <div class="feedback-message">Consider offering additional activities: In addition to the main event, consider offering additional activities or attractions to keep attendees engaged. This could include break-out sessions, networking opportunities, or recreational activities.</div>
                <!-- <div class="reply-btn">
                    <button type="button" class="reply">Reply <i class='bx bx-send'></i></button>
                </div> -->
            </div>
        </div>
    </div>

</body>
<script src="../../js/sortTable.js"></script>

</html>