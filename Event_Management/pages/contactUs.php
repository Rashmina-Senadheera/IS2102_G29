<?php 
include('constants.php');
if(isset($_SESSION['user_id'])){
    include('reg_header.php');
}
else{
    include('unreg_header.php');
}

?>

<body>
    <main  class="contact-main flex-column-center font-poppins">
    <h2>Contact Form</h2>
        <div class="contact-form-div">
            
            <form action="" method="POST" class="contact-form">
                <!-- <div class="form-in"> -->
                    <div class="row-start">
                        <div class="input-group">
                            <label for="name">Name </label>
                            <input type="text" name="name">
                        </div>
                        <div class="input-group">
                            <label for="email">Email </label>
                            <input type="email" name="email">
                        </div>
                    </div>
                    <div class="single-row">
                        <div class="input-group">
                            <label for="name">Subject </label>
                            <input type="email" name="name">
                        </div>
                    </div>
                    <div class="single-row">

                        <div class="input-group">
                        <label class="label" >Remarks</label>
                        <textarea class="txt_remarks" rows="4" cols="20" placeholder="Any remarks regarding the 'Other' options chosen"></textarea>
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