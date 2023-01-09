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
    <link rel="stylesheet" href="../css/viewSuppliersEP.css">
    <link rel="stylesheet" href="../css/filterEP.css">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">

    <style>
    .chartTitle {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
        color: #3a0247;
    }

    .summary {
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 20px;
        padding-top: 0;
        background-color: #f2f2f2;
        border-radius: .5rem;
        margin-left: 50px;
    }

    .summaryItem {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .summaryItemTitle {
        font-size: 16px;
        font-weight: bold;
        color: #3a0247;
    }

    .summaryItemValue {
        font-size: 16px;
        font-weight: bold;
        color: #3a0247;
    }

    .chart {
        margin-bottom: 20px;
        padding: 20px;
        padding-top: 0;
        border-radius: .5rem;
    }
    </style>
</head>

<body>
    <div class="grid-container-payments">
        <!-- <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title">Reports</div>
            </div>
        </div> -->

        <div class="gridMain" style="display: inline;">
            <div style="width: 75%;  margin: auto;" class="chart">
                <div class="chartTitle">Profit Chart for 2022</div>
                <canvas id="myChart" width="100%"></canvas>
            </div>
            <br>
            <div class="row" style="justify-content: space-around; align-items: flex-start">
                <div style="width: 30%;" class="chart">
                    <div class="chartTitle">Events Planned</div>
                    <canvas id="pieChart"></canvas>
                </div>
                <div style="width: 50%;">
                    <div class="summary">
                        <div class="chartTitle">Summary</div>
                        <div class="summaryItem">
                            <div class="summaryItemTitle">Total Income</div>
                            <div class="summaryItemValue">Rs. 1,500,000</div>
                        </div>
                        <div class="summaryItem">
                            <div class="summaryItemTitle">Total Expenses</div>
                            <div class="summaryItemValue">Rs. 1,000,000</div>
                        </div>
                        <div class="summaryItem">
                            <div class="summaryItemTitle">Total Profit</div>
                            <div class="summaryItemValue">Rs. 500,000</div>
                        </div>
                        <div class="summaryItem">
                            <div class="summaryItemTitle">Total Events Planned</div>
                            <div class="summaryItemValue">90</div>
                        </div>
                        <div class="summaryItem">
                            <div class="summaryItemTitle">Total Events Cancelled</div>
                            <div class="summaryItemValue">8</div>
                        </div>
                        <div class="summaryItem">
                            <div class="summaryItemTitle">Total Events Ongoing</div>
                            <div class="summaryItemValue">5</div>
                        </div>
                        <div class="summaryItem">
                            <div class="summaryItemTitle">Total Events Pending</div>
                            <div class="summaryItemValue">12</div>
                        </div>
                        <div class="summaryItem">
                            <div class="summaryItemTitle">Total Events Rejected</div>
                            <div class="summaryItemValue">0</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('myChart');
const pieChart = document.getElementById('pieChart');

const mixedChart = new Chart(ctx, {
    data: {
        datasets: [{
            type: 'line',
            label: 'Income',
            data: [100000, 120000, 150000, 110000, 130000, 160000, 120000, 140000, 100000, 120000,
                150000, 110000
            ],
            // borderColor: '#CCFFCC',
            backgroundColor: '#CCFFCC',
        }, {
            type: 'line',
            label: 'Expenses',
            data: [70000, 80000, 90000, 75000, 85000, 100000, 80000, 90000, 70000, 80000, 90000, 75000],
            // borderColor: '#FFCCCC',
            backgroundColor: '#FFCCCC',
        }, {
            type: 'line',
            label: 'Profit',
            data: [30000, 40000, 60000, 35000, 45000, 60000, 40000, 50000, 30000, 40000, 60000, 35000],
            borderColor: '#663399 ',
            backgroundColor: '#663399 ',
        }],
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
            'October', 'November', 'December'
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
    }
});

const pie = new Chart(pieChart, {
    type: 'pie',
    data: {
        labels: ['Wedding', 'Birthday', 'Musical Show', 'Other'],
        datasets: [{
            label: 'Events Planned',
            data: [10, 20, 30, 30],
            backgroundColor: [
                '#D6D6FF',
                '#B3B3FF',
                '#8080FF',
                '#663399'
            ],
            borderColor: [
                '#D6D6FF',
                '#B3B3FF',
                '#8080FF',
                '#663399'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
    }
});
</script>

</html>