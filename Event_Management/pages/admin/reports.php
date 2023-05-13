<?php
    include('admin_header.php');
    include('admin_nav.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>
  <main class="admin_main">
    <div class="report_main" >
      <div class="report_item1">
        
        <form action="" id="dataForm">
          <ul>
            <li>
              <input type="radio" name="data" id="month" class="checkBox" value="month">
              <label for="month">Event Planners and Quotations Received (Monthly)</label>
            </li>
            <li>
              <input type="radio" name="data" id="ep" class="checkBox" value="ep">
              <label for="ep">Event Planners and Quotations Received (Overall)</label>
            </li>
            <li>
              <input type="radio" name="data" id="users" class="checkBox" value="users">
              <label for="users">Users</label>
            </li>
          </ul>
        <!-- <input type="radio" name="data" id="data2" class="checkBox">
        <label for="data">Click2</label> -->
        
        </form>
      </div>
        
    <div class="report_item2">
    <form method="POST" action="loadpdf.php">
  <input type="text"  id="imgData" name="image" value="" hidden>
  
  <input type="submit" name="viewpdf" value="View" >
  <input type="submit" name="downloadpdf" value="Download">
  
  
  </form>
    </div>
    <div class="report_item3" >
    <canvas id="myChart" ></canvas>
    </div>
    </div>
  </main>

    <script src="../../js/reports.js"></script>
</body>
</html>