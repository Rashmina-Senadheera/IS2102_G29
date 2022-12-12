<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br />
        <br />
        <?php 
            //check whether id is set
            if(isset($_GET['id'])){
                //get the order details
                $id =$_GET['id'];
                $sql = "SELECT * FROM tbl_order WHERE id=$id";
                //execute query
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);

                if($count==1){
                    //details are available
                    $row =mysqli_fetch_assoc($res);
                    $material = $row['material'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                }
                else{
                    //details are not available
                    //redirect to mange order page
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else{
                //redirect to manage order page
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        ?>
        <form action="" method="POST">
            <table class="table-50">
                <tr>
                    <td>Food Name</td>
                    <td><b><?php echo $material; ?></b></td>
                    
                </tr>
                <tr>
                    <td>Price</td>
                    <td><b>$<?php echo $price; ?></b></td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty; ?>">

                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?>value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?>value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?>value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Customer Name:</td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Customer Contact:</td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Customer Email:</td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Customer Address:</td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5" ><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <input class="btn-update" type="submit" name="submit" value="Update Order">

                    </td>
                </tr>
            </table>
        </form>
        <?php 
            //check whether the update button is clicked or not
            if(isset($_POST['submit'])){
                
                //get the values from form 
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $status = $_POST['status'];
                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                //update the values and redirect to manage order page
                $sql2 = "UPDATE tbl_order SET
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE id=$id

                "; 
                //execute the query
                $res2 = mysqli_query($conn,$sql2);
                //check the execution of the query
                if($res2 == true){
                    //updated
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
                else{
                    //failed to update
                    $_SESSION['update'] = "<div class='error'>Failed To Update</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>
    </div>

</div>

<?php include('partials/footer.php'); ?>