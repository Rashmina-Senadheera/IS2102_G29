
<?php
    include('admin_header.php');
    include('admin_nav.php');

?>
<link rel="stylesheet" href="css/reports.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<main class="reports_main">
<div class="chart" style="width: 800px;">
<canvas id="line-chart" width="800" height="450"></canvas>
</div>
<div class="filter">
    <h3>Filter</h3>
    <label>Select Users</label>
    <div class="users">
    <input type="checkbox" >
    <label>Customers</label> 
    <input type="checkbox" >
    <label>Suppliers</label> 
    <input type="checkbox" >
    <label>Event Planners</label> 
    </div>
    <label>Select Date</label>
    <div class="users">
        <label>From</label>
        <input type="date">
        <label>To</label>
        <input type="date">

    </div>
</div>
<script>
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ['January','February','March','April','May','June','July','August','September','October'],
    datasets: [{ 
        data: [86,114,106,106,107,111,133,221,783,2478],
        label: "Customer",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [282,350,411,502,635,809,947,1402,3700,5267],
        label: "Event Planner",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [168,170,178,190,203,276,408,547,675,734],
        label: "Supplier",
        borderColor: "#3cba9f",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Active users in 2022'
    }
  }
});
</script>
</main>