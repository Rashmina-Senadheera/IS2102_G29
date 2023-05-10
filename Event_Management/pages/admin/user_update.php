<?php 
    
    include("admin_header.php");
    include("admin_nav.php");
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $rows = get_details($id);

?>

<body>
<main class="admin_main">
    <div class="info_content">
            <div class="flex-row width-100">
                <div class="img-grp">
                <img src="../../images/evt_planner.jfif">
                </div>
                <div class="fields">
                    <h3><?php echo $rows['name']; ?></h3>
                    <div class="input-group-row">
                        <label for="name">Email</label>
                        <input type="text" value="<?php echo $rows['email']; ?>" name="email" >
                    </div>
                    <div class="input-group-row">
                        <label for="name">Contact Number 1</label>
                        <input type="text" value="0774550849" name="num1" >
                    </div>
                    <div class="input-group-row">
                        <label for="name">Contact Number 2</label>
                        <input type="text" value="0774550849" name="num1" >
                    </div>
                    <div class="input-group-row">
                        <label for="name">Address</label>
                        <input type="text" value="L-207 , Lankalands , Peellawatta, Andiambalama" name="address" >
                    </div>
                    <div class="input-group-row">
                        <div class="buttons">
                        <button class="btn_search">
                            <i class="fa-solid fa-user-pen"></i>
                            Update
                        </button>
                        </div>
                    </div>
                </div>
            </div>
            
            
        
    </div>
</main>