<?php
require_once('eventplanner_sidenav.php');
require_once('eventplanner_header.php');
require_once('../controllers/commonFunctions.php');

$epID = $_SESSION['user_id'];
$pendingEvents = $pendingQuotations = $pendingRequests = $completedEvents = 0;

function getCount($conn, $sql)
{
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row[0];
}

// get the number of pending requests
$sql = "SELECT COUNT(*) FROM request_ep_quotation WHERE EP_id = $epID AND status = 'Pending'";
$pendingRequests = getCount($conn, $sql);

// get the number of pending quotations
$sql = "SELECT COUNT(*) FROM ep_quotation WHERE epId = $epID AND status = 'pending'";
$pendingQuotations = getCount($conn, $sql);

// get the number of pending events
$sql = "SELECT COUNT(*) FROM ep_booking WHERE EP_id = $epID AND `date` >= CURDATE()";
$pendingEvents = getCount($conn, $sql);

// get the number of completed events
$sql = "SELECT COUNT(*) FROM ep_booking WHERE EP_id = $epID AND `date` < CURDATE()";
$completedEvents = getCount($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='../../css/supplierMain.css'>
    <link rel='stylesheet' href='../../css/ps-list.css'>
    <link rel='stylesheet' href="../../css/calendar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>
    <div class='container-main'>
        <div class='flex-container-main'>
            <div class="title-search">
                <div class='searchSec' id="an">
                    <div class='page-title' id="an"> Hi <?php echo $_SESSION['user_name'] . ","; ?></div>
                    <div class='page-des'> Here are the analytics for you</div>
                </div>
            </div>
        </div>

        <div class="ps-list">
            <div class='grid-main' id='ps-list'>
                <div class="contain-analytics">
                    <div class="analytics">
                        <div class="icon-an">
                            <i class="fa-solid fa-handshake" id="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"><?php echo $pendingRequests; ?></div>
                            <div class="an-num">Pending Customer Requests</div>
                        </div>
                    </div>
                    <div class="analytics">
                        <div class="icon-an">
                            <i class="fa-solid fa-shop" id="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"><?php echo $pendingQuotations; ?></div>
                            <div class="an-num">Pending Customer Quotations</div>
                        </div>
                    </div>
                    <div class="analytics">
                        <div class="icon-an">
                            <i class="fa-solid fa-paper-plane" id="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"><?php echo $pendingEvents; ?></div>
                            <div class="an-num">Pending <br>Events</div>
                        </div>
                    </div>
                    <div class="analytics">
                        <div class="icon-an">
                            <i class="fa-solid fa-check" id="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"><?php echo $completedEvents; ?></div>
                            <div class="an-num">Completed <br>Events</div>
                        </div>
                    </div>
                </div>
                <div class="contain-chart">
                    <div class="tit-chart">
                        Requests received in the last 7 days
                    </div>

                    <canvas id="myChart" style="width:100%;"></canvas>
                    <?php

                    $x = $y = array();
                    for ($i = 6; $i >= 0; $i--) {
                        $date = date("Y-m-d", strtotime("-$i days"));
                        array_push($x, $date);

                        $sql = "SELECT COUNT(*) AS requests FROM cust_req_general WHERE DATE(req_date) = '$date'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            array_push($y, $row['requests']);
                        }
                    }

                    ?>

                    <script>
                        var xValues = yValues = [];
                        xValues = <?php echo json_encode($x); ?>;
                        yValues = <?php echo json_encode($y); ?>;

                        new Chart("myChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: '#3a0247',
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: ""
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="filter">
                <div class="container">
                    <!-- <div class="calendar-assets">
			            <h1 id="currentDate"></h1>
			            <div class="field">
                            <label for="date">Pesquisa por data</label>
                            <form class="form-input" id="date-search" onsubmit="setDate(this)">
                                <input type="date" class="text-field" name="date" id="date" required>
                                <button type="submit" class="btn btn-small" title="Pesquisar"><i class="fas fa-search"></i></button>
                            </form>
			            </div>
			            <div class="day-assets">
				            <button class="btn" onclick="prevDay()" title="Dia anterior"><i class="fas fa-chevron-left"></i>
				            </button>
				            <button class="btn" onclick="resetDate()" title="Dia atual"><i class="fas fa-calendar-day"></i>
					        Hoje</button>
                            <button class="btn" onclick="nextDay()" title="Próximo dia"><i class="fas fa-chevron-right"></i>
                            </button>
			            </div>
		            </div> -->
                    <div class="calendar" id="table">
                        <div class="header">
                            <!-- Aqui é onde ficará o h1 com o mês e o ano -->
                            <div class="month" id="month-header">
                            </div>
                            <div class="buttons">
                                <button class="icon" onclick="prevMonth()" title="Mês anterior"><i class="fas fa-chevron-left"></i></button>
                                <button class="icon" onclick="nextMonth()" title="Próximo mês"><i class="fas fa-chevron-right "></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="../../js/main.js"></script>
</body>

</html>