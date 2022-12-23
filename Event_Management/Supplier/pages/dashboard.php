<?php
    include('../../constants.php');
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
        <link rel = 'stylesheet' href = '../css/eventPlannerMain.css'>
        <link rel = 'stylesheet' href = '../css/ps-list.css'>
        <link rel = 'stylesheet' href="../css/calendar.css">
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
    
        <div class="ps-list">
            <div class ='grid-main' id='ps-list'>
                <div class="contain-analytics">
                    <div class="analytics"> 
                        <div class="icon-an">
                            <i class="fa-solid fa-handshake" id="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"> 4 </div>
                            <div class="an-num">New Quotation Request</div>
                        </div>
                     </div>
                    <div class="analytics"> 
                        <div class="icon-an">
                            <i class="fa-solid fa-shop" id="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"> 4 </div>
                            <div class="an-num">New Order Requests</div>
                        </div>
                     </div>
                    <div class="analytics"> 
                        <div class="icon-an">
                            <i class="fa-solid fa-paper-plane" id="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"> 9 </div>
                            <div class="an-num">Ongoing <br>Orders</div>
                        </div>
                     </div>
                     <div class="analytics"> 
                        <div class="icon-an">
                            <i class="fa-solid fa-check" id ="an"></i>
                        </div>
                        <div class="an-descript">
                            <div class="an-tit"> 9 </div>
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
  {x:50, y:7},
  {x:60, y:8},
  {x:70, y:8},
  {x:80, y:9},
  {x:90, y:9},
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
      xAxes: [{ticks: {min: 40, max:100}}],
      yAxes: [{ticks: {min: 6, max:10}}],
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
        <script src="../js/main.js"></script>
    </body>

</html>

<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>
