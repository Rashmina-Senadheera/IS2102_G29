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
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/Custcss.css">

</head>

<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
            <div class="page-title"> Change Passsword </div>
                <div class="input-container"></div>
            </div>
        </div>

        <!--<div class="gridMain">-->
        <div class="flex-container-profile">
            <div class="about">
                <center><br >
                 Current Password:<br >
		<input type="password" placeholder="Current Password" id="txtOldPassword" required><br ><br >
                 New Password:<br >
		<input type="password" placeholder="New Password" id="password1" required><br ><br >
                 Confirm Password:<br >
		<input type="password" placeholder="Confirm Password" id="password2" required><br ><br >
		<input id="terms" type="checkbox"> <label for="terms"></label>
		<span>
			Agree with
			<a href="#">Terms & Conditions</a>
		</span><br ><br ><br >
		<input type="button" id="btnChangePW" class="srcButton" value="Change Password"><br ><br >
	</div></center><br >
        </div>
    </div>
</body>
<script>

    $("#btnChangePW").click(function(){
        UpdatePW();
    });

    function UpdatePW(){

    var password1=$('#password1').val();
    var password2=$('#password2').val();
    var oldPassword=$('#txtOldPassword').val();

    if(password1 !=password2){
        swal("Fail!", "The password does not match!", "warning");
    }
   else{
    $.ajax({
                type: "POST",
                url: "php/ProfileBackend.php?method=updatePW",
                data: { "NEW_PASSWORD": password1,"OLD_PASSWORD": oldPassword},
                success: function(response){
                    console.log(response);
                    swal("Good job!", "Password Updated!", "success");
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
        });
    }
        
    }
</script>
</html>
