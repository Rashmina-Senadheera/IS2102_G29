<?php 
    
    include("admin_header.php");
    include("admin_nav.php");
     
    $_SESSION["page_name"] = "More Information";
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $rows = get_details($id);
?>


<body>
<main class="admin_main">
    <div class="info_content">
            <div class="flex-row width-100">
                <div class="img-grp">
                <img src="../../images/evt_planner.jfif">
                </div>
                <div class="fields">
                    <h3><?php echo $rows['name'];?></h3>
                    
                    <div class="input-group-row">
                        <label for="name">Email</label>
                        <input type="text" value="<?php echo $rows['email']; ?>" name="email" >
                    </div>
                    <div class="input-group-row">
                        <label for="name">Contact Number 1</label>
                        <input type="text" value="0774550849" name="num1" >
                    </div>
                    <div class="input-group-row">
                        <label for="name">Contact Number 2</label>
                        <input type="text" value="0774550849" name="num1" >
                    </div>
                    <div class="input-group-row">
                        <label for="name">Address</label>
                        <input type="text" value="L-207 , Lankalands , Peellawatta, Andiambalama" name="address" >
                    </div>
        
                </div>
            </div>
            <table class="details_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event Name</th>
                        <th>Event Planner</th>
                        <th>Actions </th>
                    </tr>
                    </thead>
                    <tbody class="table_body">
                        <tr>
                            <td>1</td>
                            <td>Rashmina Senadheera</td>
                            <td>rashminasenadheera15@gmail.com</td>
                            <td>More</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Rashmina Senadheera</td>
                            <td>rashminasenadheera15@gmail.com</td>
                            <td>More</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Rashmina Senadheera</td>
                            <td>rashminasenadheera15@gmail.com</td>
                            <td>More</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Rashmina Senadheera</td>
                            <td>rashminasenadheera15@gmail.com</td>
                            <td>More</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Rashmina Senadheera</td>
                            <td>rashminasenadheera15@gmail.com</td>
                            <td>More</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Rashmina Senadheera</td>
                            <td>rashminasenadheera15@gmail.com</td>
                            <td>More</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Rashmina Senadheera</td>
                            <td>rashminasenadheera15@gmail.com</td>
                            <td>More</td>
                        </tr>
                    </tbody>
                    
                </table>
            
        
    </div>
</main>
