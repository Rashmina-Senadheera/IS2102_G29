<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
if(isset($_GET['id'])){
    $req_id = $_GET['id'];
}

$sql = "SELECT * FROM `cust_req_general` 
JOIN request_ep_quotation
ON cust_req_general.request_id = request_ep_quotation.request_id
JOIN user
ON request_ep_quotation.EP_id = user.user_id WHERE cust_req_general.request_id=$req_id";
// $sql = "SELECT * FROM users WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute();
        if($stmt->rowCount() == 1){
            $row = $stmt->fetch();
        }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/Custcss2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <form method="post" action="php/Feedbackend.php" class="feedback_form">
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['error']; ?>
                            </div>
                         <?php } 
                                              
                        ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['success']; ?>
                            </div>
                        <?php } ?>
                        <div >
                        <div >
                            <!-- </div>
                            <center>Date:&nbsp;&nbsp;<center>
                            <div ><center><input type="date" class="form-control" placeholder=""  name="date"  min="2022-12-23" max="2025-12-31" style="width:300px;" value="<?php echo $date; ?>" readonly></div> -->
                        </div><br>
                        <div>
                        <center>Event Planner's Name:&nbsp;&nbsp;<center>
                            <div ><center><input type="text" class="form-control" placeholder="Event Planner's Name" name="name" style="width:300px;" min="5" max="25" value="<?php if(isset($row)){echo $row['name']; }else{echo "Invalid";}  ?>" readonly></div>
                        </div>
                    </div>
                <div >
                        <center>Feedback:&nbsp;&nbsp;
                <div ><center><textarea class="form-control" placeholder="Write Your Feedback Here.." name="text" min="5" max="250" style="width:300px;" value="<?php echo (isset($_GET['text'])) ? $_GET['text'] : "" ?>" required></textarea>
                </div>
            </div>
            <div ><br >
            <center>Rate:&nbsp;&nbsp;
            <div class="center">
              <span class="star-rating">
              <a>★</a>
              <a>★</a>
              <a>★</a>
              <a>★</a>
              <a>★</a>
              </span>
	    </div>
        <div ><center><input type="text" class="form-control"  name="rate"  id="rate" style="width:300px;" min="5" max="25" value="" hidden></div>
        <div ><center><input type="text" class="form-control"  name="req_id"  id="rate" style="width:300px;" min="5" max="25" value="<?php echo $req_id ?>" hidden></div>
        
   </div>
</center>        
            <br>
            <center><div><input type="submit" class="srcButton send_feedback" name="send_feedback"></div><br >
            </form>
             <a href="ViewFeedback.php"><inpye type='submit' class="srcButton" >View FeedBacks</button></a></center><br />
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../../js/feedback.js"></script>
</body>
</html>
