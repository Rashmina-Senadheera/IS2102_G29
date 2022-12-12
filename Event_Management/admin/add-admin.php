<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/> <br />
        <?php 
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']); //Remove session message
                } 
                
        ?>
        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>Full Name:  </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"> </td>
                </tr>
                <tr>
                    <td>User Name:  </td>
                    <td><input type="text" name="username" placeholder="Enter Your Username" autocomplete="off"> </td>
                </tr>
                <tr>
                    <td>Password:  </td>
                    <td><input type="password" name="password" placeholder="Enter Your Password" autocomplete="off"> </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-update">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php');  ?>
<?php
    //Save the data of the form to database
    
    
    if(isset($_POST['submit'])){
        $full_name = mysqli_real_escape_string($conn,$_POST['full_name']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,md5($_POST['password'])); //md5 is used for encrpyting the password 

        //insering data to the admin table
        $sql = "INSERT INTO tbl_admin SET   
                full_name = '$full_name',
                username = '$username',
                password = '$password'
        ";
        //executing query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if($res == TRUE){
            $_SESSION['add'] = '<div class="success">Admin Added Successfully</div>';
            //redirect to the manage admin page
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['add'] = '<div class="error">Failed to add admin</div>';
            //redirect to the add admin page
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }
    


?>
