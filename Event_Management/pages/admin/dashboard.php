
<?php
    include('admin_header.php');
    include('admin_nav.php');
    
    $_SESSION['page_name'] = "Dashboard";
    $sql2 = "SELECT COUNT(user_id) as amount,role FROM user GROUP BY role ORDER BY role asc"; 
    $res2 = mysqli_query($conn,$sql2);
    
    foreach($res2 as $data){
        $amount[] = $data['amount'];
        $roles[] = ucfirst($data['role']) ;

    }
    array_splice($roles, 0,1);
    array_splice($amount,0,1);
    $sum = array_sum($amount);

   
?>

<body>
    <main class="admin_main">
        <div class="users_summary">
        <div class="summary_boxes">
            
            <div class="summary_box customer_summary">
                <label class="customers_num">
                    <?php echo $sum;?>
                    <div class="d_icon">
                    <img src="../images/d_customer.png">
                </div>
                    
                </label>
                <p>Users</p>
            </div>
            <a href="manage_customers.php">
            <div class="summary_box customer_summary">
                <label class="customers_num">
                    <?php echo $amount[0]; ?>
                    <div class="d_icon">
                    <img src="../images/d_supplier.png">
                    </div>
                    
                </label>
                <p>Customers</p>
            </div>
            </a>
            <a href="manage_event_planners.php">
            <div class="summary_box customer_summary">
                
                <label class="customers_num">
                    <?php echo $amount[1]; ?>
                    <div class="d_icon">
                    <img src="../images/d_event_planner.png" class="d_event_planner">
                    </div>
                    
                </label>
                <p>Event Planners</p>
                
            </div>
            </a>
            <a href="manage_suppliers.php">
            <div class="summary_box customer_summary">
                <label class="customers_num">
                    <?php echo $amount[2]; ?>
                    <div class="d_icon">
                    <img src="../images/d_supplier.png">
                    </div>
                    
                </label>
                <p>Suppliers</p>
                
            </div>
            </a>
            
            </div>
        </div>
        <!-- <div class="charts_area">
            <div class="pie">
            <canvas id="pieChart"></canvas>
            </div>
            <div class="bar">
            <canvas id="barChart"></canvas>
            </div>
        </div>
            <script>
            const ctx = document.getElementById('pieChart');
            const bar = document.getElementById('barChart');

            new Chart(ctx, {
                type: 'pie',
                data: {
                labels: <?php //echo json_encode($roles)?>,
                datasets: [{
                    label: ' ',
                    data: <?php //echo json_encode($amount)?>,
                    borderWidth: 1,
                    
                }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                    },
                }
            });

            new Chart(bar, {
                type: 'bar',
                data: {
                labels: <?php //echo json_encode($roles)?>,
                datasets: [{
                    label: ' ',
                    data: <?php //echo json_encode($amount)?>,
                    borderWidth: 1,
                    
                }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                    },
                }
            });
            </script>
             -->
    </main>

</body>
</html>



