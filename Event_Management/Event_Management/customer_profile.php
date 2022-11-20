<?php
    
    include('customer_header.php');
    include('customer_nav.php');
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    
</head>
<body>
    <main>
        <span id="profile"></span>
        <section class="profile " >
            <h3>Update Your Profile</h3>
            <form class="profile-form flex-column" >
                
                <span class="flex-row">
                <label>Name</label>
                <input type="text">
                <label>Address</label>
                <input type="text">
                </span>
                <span class="flex-row">
                <label>Phone Number</label>
                <input type="text">
                <label>Profile Picture</label>
                <input type="file" value="Choose a Picture">
                </span>
                <span class="btn">
                    <input type="submit" value="Update" >
                </span>

            </form>
        </section>
        <span id="profile1">
        <section class="profile1" >
            <h3>Update Your Profile</h3>
            <form class="profile-form flex-column">
                <span class="flex-row">
                <label>Name</label>
                <input type="text">
                <label>Address</label>
                <input type="text">
                </span>
                <span class="flex-row">
                <label>Phone Number</label>
                <input type="text">
                <label>Profile Picture</label>
                <input type="file" value="Choose a Picture">
                </span>
                <span class="btn">
                    <input type="submit" value="Update" >
                </span>

            </form>
        </section>
    </main>
</body>
</html>

