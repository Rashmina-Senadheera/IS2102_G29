<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/Custcss2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

</style>

</head>

<body>

 <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
            <div class="page-title"> Give Feedbacks </div>
                <div class="input-container">                  
                </div>             
            </div>
        </div>
       <!--<div class="gridMain">-->
       <div class="other">
                <div class="info">
                    <div class="personal-info">           
                    <form method="post" action="./php/Feedbackend.php">
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['error']; ?>
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['success']; ?>
                            </div>
                        <?php } ?>
                        <div >
                        <div >
                            </div>
                            <center>Date:&nbsp;&nbsp;<center>
                            <div ><center><input type="date" class="form-control" placeholder=""  name="date" style="width:200px;" value="<?php echo (isset($_GET['date'])) ? $_GET['date'] : "" ?>" required></div>
                        </div><br>
                        <div>
                        <center>Event Planner's Name:&nbsp;&nbsp;<center>
                            <div ><center><input type="name" class="form-control" placeholder="Event Planner's Name" name="name" style="width:400px;" value="<?php echo (isset($_GET['name'])) ? $_GET['name'] : "" ?>" required></div>
                        </div>
                    </div>
                <div >
                        <center>Feedback:&nbsp;&nbsp;
                <div ><center><textarea class="form-control" placeholder="Write Your Feedback Here.." name="text" style="width:400px;" value="<?php echo (isset($_GET['text'])) ? $_GET['text'] : "" ?>" required></textarea>
                </div>
            </div>
            <div ><br >
            <center>Rate:&nbsp;&nbsp;
            <div class="center">
              <span class="star-rating">
              <!--RADIO 1-->
               <input type='checkbox' class="radio_item" value="1" name="item" id="radio1">
               <label class="label_item" for="radio1"> &#9734 </label>

              <!--RADIO 2-->
              <input type='checkbox' class="radio_item" value="2" name="item2" id="radio2">
              <label class="label_item" for="radio2"> &#9734 </label>

              <!--RADIO 3-->
              <input type='checkbox' class="radio_item" value="3" name="item3" id="radio3">
              <label class="label_item" for="radio3"> &#9734 </label>

              <!--RADIO 4-->
              <input type='checkbox' class="radio_item" value="4" name="item4" id="radio4">
              <label class="label_item" for="radio4"> &#9734 </label>

              <!--RADIO 5-->
              <input type='checkbox' class="radio_item" value="5" name="item5" id="radio5">
              <label class="label_item" for="radio5"> &#9734 </label>
              </span>
			</div>
   </div>
</center>        
            <br>
            <center><div><button type="submit" class="srcButton">Send Feedback</button></div><br >
            </form>
             <a href=<?php echo  'http://localhost:8080/Event_Management002/customer/ViewFeedback.php'  ?>><button type="submit" class="srcButton" >View FeedBacks</button></a></center><br />
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>