<?php 
    
    include("admin_header.php");
    include("admin_nav.php");

    $_SESSION["page_name"] = "Profile";

?>
<!DOCTYPE html>

<body>
<main class="admin_main">
    <div class="content">
        
            <div class="flex-row width-100">
                <div class="img-grp">
                <img src="../../images/evt_planner.jfif">
                </div>
                <div class="fields">
                    <h3>Rashmina Senadheera</h3>
                    <div class="flex-col-space">
                        <div class="details">
                            <div class="input-group-row">
                                <label>E-mail</label>
                                <input type="text" value="rashminalasith@gmail.com">
                            </div>
                            <div class="input-group-row">
                                <label>Phone</label>
                                <input type="text" value="0774550849">
                            </div>
                            <div class="pwd-details">
                                <div class="input-group-row">
                                    <label>Password</label>
                                    <input type="pasword" value="">
                                </div>
                                <div class="input-group-row">
                                    <label> New Password</label>
                                    <input type="pasword" value="">
                                </div>
                                <div class="input-group-row">
                                    <label> Confirm Password</label>
                                    <input type="pasword" value="">
                                </div>
                            </div>
                        </div>
                    
                    <div class="input-group-row">
                        <div class="buttons">
                        <button class="btn_search">
                            <i class="fa-solid fa-lock"></i>
                            Reset Password
                        </button>
                        <button class="btn_search">
                            <i class="fa-solid fa-user-pen"></i>
                            Update
                        </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        
    </div>
</main>