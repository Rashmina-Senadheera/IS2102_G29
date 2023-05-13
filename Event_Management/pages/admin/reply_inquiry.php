<?php 
    
    include("admin_header.php");
    include("admin_nav.php");
    include_once("../controllers/commonFunctions.php");
    
    $id = $_GET['id'];

    $sql = "SELECT * FROM `complaints` WHERE id = $id";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

    ?>
<main class="admin_main">
<div class="contact-form-div">
            <!-- <div class="close_div"><i class="fa-solid fa-xmark close" ></i></div> -->
            <form action="php/reply_inquiry.php" method="POST" class="contact-form">
            
                <!-- <div class="form-in"> -->
                    <div class="row-start">
                        <div class="input-group">
                            <label for="name">Name *</label>
                            <input type="text" name="name" value="<?php echo $row['name'] ?>" disabled>
                            
                        </div>
                        <div class="input-group">
                            <label for="email">Email *</label>
                            <input type="email" name="email" value="<?php echo $row['email'] ?>" diabled>
                            
                        </div>
                    </div>
                    <div class="single-row">
                        <div class="input-group">
                            <label for="name">Subject *</label>
                            <input type="text" name="subject" value="<?php echo $row['subject'] ?>" disabled>
                            
                        </div>
                    </div>
                    <div class="single-row">

                        <div class="input-group">
                        <label class="label" >Remarks *</label>
                        <textarea class="txt_remarks" name="remarks" rows="4" cols="20" placeholder="..." disabled><?php echo $row['remarks'] ?></textarea>
                        
                        </div>
                    </div>
                    <div class="single-row">

                        <div class="input-group">
                        <label class="label" >Reply *</label>
                        <textarea class="txt_remarks" name="reply" rows="4" cols="20" placeholder="..." ></textarea>
                        <div class="error"><?php echo showSessionMessage('error-reply') ?></div>
                        <input type="text" name="id" value="<?php echo $id ?>" hidden>
                        <input type="text" name="name" value="<?php echo $row['name'] ?>" hidden>
                        <input type="email" name="email" value="<?php echo $row['email'] ?>" hidden>

                        </div>
                    </div>
                    <div class="single-row">
                        <div class="input-group submit_div">
                        <input type="submit" value="Submit" class="btn-submit">
                        <div class="success"><?php echo showSessionMessage('data-inserted') ?></div>
                        
                        </div>
                    </div>
                <!-- </div> -->

            </form>
        </div>
</main>