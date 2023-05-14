<?php
require_once('eventplanner_sidenav.php');
require_once('eventplanner_header.php');

$epID = $_SESSION['user_id'];
$sql = "SELECT e.*, u.name as name, c.event_type as eType, reqId 
        FROM ep_booking e, user u, ep_quotation q, cust_req_general c
        WHERE EP_id = $epID AND
        e.ep_quot_id = q.qId AND 
        e.customer_id = u.user_id AND 
        q.reqId = c.request_id";
$result = mysqli_query($conn, $sql);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/calendarEP.css">
    <link href='../lib/fullcalendar/main.css' rel='stylesheet' />
    <link href='../../vendor/fullcalendar/main.css' rel='stylesheet' />
    <script src='../../vendor/fullcalendar/main.js'></script>
    <script>
        var rawEvents = <?php echo json_encode($result); ?>;
        var events = [];
        var color = '#2196F3';
        for (var i = 0; i < rawEvents.length; i++) {
            if (rawEvents[i].status == 'Accepted') {
                color = '#04AA6D';
            }
            var event = {
                id: rawEvents[i].booking_id,
                title: rawEvents[i].eType + ' - ' + rawEvents[i].name,
                date: rawEvents[i].date,
                url: 'CustomerQuotationView.php?qid=' + rawEvents[i].ep_quot_id + '&reqID=' + rawEvents[i].reqId,
                color: color,
            }
            events.push(event);
        }

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 600,
                editable: false,
                events: events,
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
                },
                views: {
                    dayGridMonth: {
                        buttonText: "Month"
                    },
                    timeGridWeek: {
                        buttonText: "Week"
                    },
                    timeGridDay: {
                        buttonText: "Day"
                    },
                    listMonth: {
                        buttonText: "List"
                    }
                },
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