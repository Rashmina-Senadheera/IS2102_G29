<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br />
        <br />
        <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
        ?>

        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>
                        Current Password:
                    </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">

                    </td>
                </tr>
                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td>
                        Confirm Password: 
                    </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-update">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
<?php 
    //check whether the submit button is click
    if(isset($_POST['submit'])){
        //get the data
        $id =$_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        //check whether the current password holder exists

        $sql = "SELECT * FROM tbl_admin WHERE id =$id AND password='$current_password'";

        //execute the query
        $res = mysqli_query($conn ,$sql);
        if($res ==TRUE){
            //check whether the data is available
            $count = mysqli_num_rows($res);
            if($count ==1 ){
                //check whether new pwd and confirm pwd match
                if($new_password == $confirm_password){
                    //update the password
                    $sql2 = "UPDATE tbl_admin SET 
                    password='$new_password' 
                    WHERE id = $id";
                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);
                    //check the query execution
                    if($res2==TRUE){
                        $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully</div>";
                        header("location:".SITEURL.'admin/manage-admin.php');
                    }
                    else{
                        $_SESSION['change-pwd'] = "<div class='error'>Failed to change password</div>";
                        header("location:".SITEURL.'admin/manage-admin.php');

                    }
                }
                else{
                    //redirect to manage admin
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password Did Not Match</div>";
                    header("location:".SITEURL.'admin/manage-admin.php');
                }

            }
            else{
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                header("location:".SITEURL.'admin/manage-admin.php');
            }
        }

        
        //change pwd 
    }

?>



<?php include('partials/footer.php') ?>