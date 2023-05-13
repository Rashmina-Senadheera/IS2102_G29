<?php
    include('../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    $id = $_SESSION['user_id'];
    if(isset($_SESSION['user_name'])){
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset = 'UTF-8'>
        <meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
        <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel = 'stylesheet' href = '../../css/supplierMain.css'>
        <link rel = 'stylesheet' href = '../../css/ps-list.css'>
        <link rel = 'stylesheet' href="../../css/calendar.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    </head>
        
    <body>
        <div class = 'container-main'>
            <div class = 'flex-container-main'>
                <div class="title-search">
                    <div class = 'searchSec' id="an">
                        <div class = 'page-title' id="an"> Hi <?php echo $_SESSION['user_name'].",";?></div>
                        <div class = 'page-des'> Here are the analytics for you today</div>
                </div>
                </div>
            </div>

            <?php 
                $sql1 = "SELECT COUNT(request_id) AS countQ 
                        FROM request_supplier_quotation 
                        WHERE supplierId = $id 
                        AND status ='Pending'";

                $sql2 = "SELECT COUNT(quotation_id) AS countQ 
                        FROM supplier_quotation 
                        WHERE supplier_id = $id ";
                
                $sql3 = "SELECT COUNT(product_id) AS countQ 
                        FROM sup_product_general 
                        WHERE supplier_ID = $id ";

                $sql4 = "SELECT COUNT(booking_id) AS countQ 
                        FROM supplier_booking 
                        WHERE supplier_id = $id ";

                function getData($sql,$conn) {
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            return $row['countQ'];
                        }
                    }
                }
                
            ?>
    
        <div class="ps-list">
            <div class ='grid-main' id='ps-list'>
                <div class="contain-analytics">
                    <div class="analytics"> 
                        <div class="icon-an">
                            <i class="fa-solid fa-handshake" id="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"> <?php echo getData($sql1,$conn);?> </div>
                            <div class="an-num">Pending Quotations</div>
                        </div>
                     </div>
                     <div class="analytics"> 
                        <div class="icon-an">
                            <i class="fa-solid fa-paper-plane" id="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"> <?php echo getData($sql2,$conn);?> </div>
                            <div class="an-num">Submitted <br>Quotations</div>
                        </div>
                     </div>
                    <div class="analytics"> 
                        <div class="icon-an">
                            <i class="fa-solid fa-shop" id="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"> <?php echo getData($sql3,$conn);?></div>
                            <div class="an-num">Products <br>Listed</div>
                        </div>
                     </div>
                    
                     <div class="analytics"> 
                        <div class="icon-an">
                            <i class="fa-solid fa-check" id ="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"> <?php echo getData($sql4,$conn);?></div>
                            <div class="an-num">Completed Orders</div>
                        </div>
                     </div>
                </div>
                <div class="contain-chart">
                <div class="tit-chart">
                    Growth of the Orders
                </div>     
                 
                    <canvas id="myChart" style="width:100%;"></canvas>

                <script>
                var xyValues = [
                    <?php 
                        $sql = "SELECT COUNT(r.request_id) AS countQ ,p.product_id AS title FROM request_supplier_quotation r JOIN sup_product_general p ON r.psId = p.product_id GROUP BY p.title;";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "{x:".$row['title'].", y:".$row['countQ']."},";
                            }
                        }

                    ?>
                    ];

                    new Chart("myChart", {
                    type: "scatter",
                    data: {
                    datasets: [{
                        pointRadius: 4,
                        pointBackgroundColor: "rgb(0,0,255)",
                        data: xyValues
                    }]
                    },
                    options: {
                    legend: {display: false},
                    scales: {
                        xAxes: [{ticks: {min: 50, max:90}}],
                        yAxes: [{ticks: {min: 0, max:5}}],
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
                            <button class="icon" onclick="prevMonth()" title="Mês anterior"><i
                                    class="fas fa-chevron-left"></i></button>
                            <button class="icon" onclick="nextMonth()" title="Próximo mês"><i
                                    class="fas fa-chevron-right "></i></button>
				        </div>
			        </div>
		        </div>
	        </div>
        <script src="../../js/main.js"></script>
    </body>

</html>

<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>
