<?php 
include('constants.php');
if(isset($_SESSION['user_id'])){
    include('reg_header.php');
}
else{
    include('unreg_header.php');
}
function showSessionMessage($error)
            {
                if (isset($_SESSION[$error])) {
                    $tempErr = $_SESSION[$error];
                    unset($_SESSION[$error]);
                    return $tempErr;
                }
            }
?>

<body>
    <main  class="contact-main flex-column-center font-poppins">
    <h2>Contact Form</h2>
        <div class="contact-form-div">
            
            <form action="php/contactUs.php" method="POST" class="contact-form">
                <!-- <div class="form-in"> -->
                    <div class="row-start">
                        <div class="input-group">
                            <label for="name">Name *</label>
                            <input type="text" name="name">
                            <div class="error"><?php echo showSessionMessage('name-error') ?></div>
                        </div>
                        <div class="input-group">
                            <label for="email">Email *</label>
                            <input type="email" name="email">
                            <div class="error"><?php echo showSessionMessage('email-error') ?></div>
                        </div>
                    </div>
                    <div class="single-row">
                        <div class="input-group">
                            <label for="name">Subject *</label>
                            <input type="text" name="subject">
                            <div class="error"><?php echo showSessionMessage('subject-error') ?></div>
                        </div>
                    </div>
                    <div class="single-row">

                        <div class="input-group">
                        <label class="label" >Remarks *</label>
                        <textarea class="txt_remarks" name="remarks" rows="4" cols="20" placeholder="..."></textarea>
                        <div class="error"><?php echo showSessionMessage('remarks-error') ?></div>
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
    
        
    
    
</body>
<?php 
    include("footer.php");
?>
</html>