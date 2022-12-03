<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');

// if (isset($_SESSION['fname'])){
//     header("location:./home.php");
//     }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
</head>

<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
            <div class="page-title"> Change Passsword </div>
                <div class="input-container">
  

                </div>

            </div>
        </div>
<br ><br ><br >
        <div class="gridMain"><br ><br >
            <div class="form-box">
                 Current Password:<br >
		<input type="password" placeholder="Current Password" id="password" required><br ><br >
                 New Password:<br >
		<input type="password" placeholder="New Password" id="password" required><br ><br >
                 Confirm Password:<br >
		<input type="password" placeholder="Confirm Password" id="confirm_password" required><br ><br >
		<input id="terms" type="checkbox"> <label for="terms"></label>
		<span>
			Agree with
			<a href="#">Terms & Conditions</a>
		</span><br ><br ><br >
		<button type="submit" class="srcButton">Change Password</button><br >
	</div><br >
        </div>
    </div>

</body>

</html>