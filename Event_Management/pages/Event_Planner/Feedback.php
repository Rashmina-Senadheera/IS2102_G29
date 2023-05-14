<?php
require_once('eventplanner_sidenav.php');
require_once('eventplanner_header.php');

$epID = $_SESSION['user_id'];
$sql = "SELECT f.date as date, name, text, rate FROM feedback f, request_ep_quotation r
        WHERE f.req_id = r.request_id
        AND r.EP_id = $epID";

$result = mysqli_query($conn, $sql);
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
            font-size: 12px;
        }

        .feedback-message {
            font-size: 14px;
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
            </div>
        </div>
        <div class="gridMain">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="feedback">';
                    echo '<div class="feedback-message">' . $row['text'] . '</div>';
                    echo '<div class="feedback-rating">Rating: ';
                    for ($i = 0; $i < $row['rate']; $i++) {
                        echo '<span class="fa fa-star starChecked">&nbsp;</span>';
                    }
                    for ($i = 0; $i < 5 - $row['rate']; $i++) {
                        echo '<span class="fa fa-star">&nbsp;</span>';
                    }
                    echo '&emsp;&emsp;Date: ' . $row['date'];
                    echo '&emsp;&emsp;Customer: ' . $row['name'];
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="feedback">';
                echo '<div class="feedback-message">No feedbacks yet.</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

</body>
<script src="../../js/sortTable.js"></script>

</html>