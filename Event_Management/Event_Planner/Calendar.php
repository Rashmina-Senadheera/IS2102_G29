<?php
include('eventplanner_sidenav.php');
include('eventplanner_header.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/calendarEP.css">
    <link href='../lib/fullcalendar/main.css' rel='stylesheet' />
    <script src='../lib/fullcalendar/main.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 650, 
            });
            calendar.render();
        });
    </script>
</head>

<body>
    <div class="calendar-body">
        <div id='calendar'></div>
    </div>

</body>

</html>