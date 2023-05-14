<?php 
    
    include("admin_header.php");
    include("admin_nav.php");
    
    ?>
<main class="admin_main">
<table class="details_table">
                   
                        <?php 
                           $sql = "SELECT * FROM `complaints` ";
                           $res = mysqli_query($conn,$sql);
                           if($res==TRUE){
                               $count = mysqli_num_rows($res);
                               $num = 1;
                               $output = "";
                               if($count >0){
                                    ?>
                                     <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th >Name</th>
                                            <th >Email</th>
                                            <th>Message</th>
                                            <th>Subject</th>
                                            
                                            <th>Replied</th>
                                            
                                            
                                        </tr>
                                        </thead>
                                            <tbody class="table_body">
                                    
                                    <?php
                                   while($rows = mysqli_fetch_assoc($res)){
                                        $id = $rows['id'];
                                       $name = $rows['name'];
                                       $email = $rows['email'];
                                       $subject = $rows['subject'];
                                       $message = $rows['remarks'];
                                       $replied = $rows['replied'];

                                       ?>
                                       
                                       <tr data-href="reply_inquiry.php?id=<?php echo $id ?>">
                                                    
                                                    <td><?php echo $num++ ?></td>
                                                    <td><?php echo $name ?></td>
                                                    <td><?php echo $email ?></td>
                                                    <td><?php echo $message ?></td> 
                                                    <td><?php echo $subject ?></td>    
                                                    <td><?php if($replied == 1){
                                                        echo "Yes";
                                                    } else{
                                                        echo "No";
                                                    }
                                                        ?></td> 
                                                   

                                       <?php
                                       
                       
                                       
                                                    
                                   }
                               }
                               
                           }
                        
                        ?>
                    
                    </tbody>
                    
                </table>
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