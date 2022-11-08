<?php
    include('admin_header.php');
    include('admin_main_menu.php');
    //include('header.php');
    //include('login_access.php');
    //include('constants.php');
    $_SESSION['page_name'] = "Supplier Details";
   
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>

             <main class="admin_main">
                
                <div class="search_add">
                    <span class="search">
                        <label class="search_customers">Search Suppliers</label>
                        <input type="search" name="search_box" placeholder="Search Here">
                                  
                        <img src="../images/search.png" class="icon_search">
                        <input type="submit" class="btn_search" value="Search">
                        
                    </span>
                    <a href="#" class="add-btn">Add Supplier</a>
                </div>
                
          
                <table class="details_table">
                    <tr>
                        <th>Customer ID</th>
                        <th class="tbl_name">Name</th>
                        <th></th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM tbl_customers";
                        $res = mysqli_query($conn,$sql);
                        if($res==TRUE){
                            $count = mysqli_num_rows($res);

                            $num = 1;

                            if($count >0){
                                while($rows = mysqli_fetch_assoc($res)){
                                    $id = $rows['id'];
                                    $name = $rows['name'];
                    ?>
                                    <tr>
                                        <td><?php echo $num++; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td class="action_buttons">
                                            <span class="btn btn_more">
                                            <img src="../images/more.png" class="more_icon">
                                            <a class="btn_info" href="<?php echo SITEURL; ?>customer_info.php?id=<?php echo $id ?>" >More Info</a>
                                            </span>
                                            <span class="btn btn_update">
                                            <img src="../images/update.png" class="update_icon">
                                            <a href="<?php echo SITEURL; ?>customer_update.php?id=<?php echo $id ?>" >Update</a>
                                            </span>
                                            <span class="btn btn_delete">
                                            <img src="../images/delete.png" class="delete_icon">
                                            <a  href="<?php echo SITEURL; ?>customer_delete.php?id=<?php echo $id ?>" >Delete</a>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                    
                    ?>
                    
                </table>
            </main>

</body>
</html>
