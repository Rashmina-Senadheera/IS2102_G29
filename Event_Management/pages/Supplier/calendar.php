<?php
    session_start();
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/calendarEP.css">
    <link rel="stylesheet" href="../../css/supplierMain.css">
    <link href='../../vendor/fullcalendar/main.css' rel='stylesheet' />
    <script src='../../vendor/fullcalendar/main.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 600, 
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