
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
                    <img src="../../images/d_customer.png">
                </div>
                    
                </label>
                <p>Users</p>
            </div>
            <a href="manage_customers.php">
            <div class="summary_box customer_summary">
                <label class="customers_num">
                    <?php echo $amount[0]; ?>
                    <div class="d_icon">
                    <img src="../../images/d_supplier.png">
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
                    <img src="../../images/d_event_planner.png" class="d_event_planner">
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
                    <img src="../../images/d_supplier.png">
                    </div>
                    
                </label>
                <p>Suppliers</p>
                
            </div>
            </a>
            
            
            </div>
        </div>
        <div class="inquiry_table">
            <h3>Recent Inquiries</h3>
        <table class="details_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th >Name</th>
                        <th >Email</th>
                        <th>Message</th>
                        <th>Subject</th>
                        
                        
                    </tr>
                    </thead>
                    <tbody class="table_body">
                        <?php 
                           $sql = "SELECT * FROM `complaints` WHERE replied= 0 ORDER BY date ASC LIMIT 3 ";
                           $res = mysqli_query($conn,$sql);
                           if($res==TRUE){
                               $count = mysqli_num_rows($res);
                               $num = 1;
                               $output = "";
                               if($count >0){
                                   while($rows = mysqli_fetch_assoc($res)){
                                        $id = $rows['id'];
                                       $name = $rows['name'];
                                       $email = $rows['email'];
                                       $subject = $rows['subject'];
                                       $message = $rows['remarks'];
                                       
                       
                                       $output .=  '
                                                    <tr data-href="reply_inquiry.php?id='.$id.'">
                                                    
                                                   <td>'.$num++.'</td>
                                                   <td>'.$name.'</td>
                                                   <td>'.$email .'</td>
                                                   <td>'.$message.'</td> 
                                                   <td>'.$subject.'</td>    
                                                    
                                                   ';
                                   }
                               }
                               echo $output;
                           }
                        
                        ?>
                    
                    </tbody>
                    
                </table>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const rows = document.querySelectorAll("tr[data-href]");
            rows.forEach( row => {
                row.addEventListener("click", ()=>{
                    window.location.href = row.dataset.href;
                });
            });
        });
    </script>

</body>
</html>



