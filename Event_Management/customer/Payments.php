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
                <div class="page-title"> Pay Now! </div>
                <div class="input-container">
                </div>
            </div>
        </div>
        <div class="gridMain">
            <div class="row">

                <div class="col-md-8">
                    <form method="post" action="./php/paymentbackend.php">
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

                        <div class="p-3 py-5">

                            <div class="d-flex justify-content-between align-items-center mb-3">

                            </div>
                            <br>

                            Name:
                            <div class="col-md-12"><input type="text" class="form-control" placeholder="Event Planner's name"  name="name" value="<?php echo (isset($_GET['uname'])) ? $_GET['uname'] : "" ?>" required></div>
                        </div><br><br><br><br>
                        <div class="row mt-2">
                            Email Address:&nbsp;&nbsp;
                            <div class="col-md-12"><input type="text" class="form-control" placeholder="Event Planner's email" name="email" value="<?php echo (isset($_GET['email'])) ? $_GET['email'] : "" ?>" required></div>
                        </div>
                </div>


                <div class="row mt-2">
                    Account Number:&nbsp;&nbsp;
                    <div class="col-md-12"><input type="text" class="form-control" placeholder="Account Number" name="account" value="<?php echo (isset($_GET['account'])) ? $_GET['account'] : "" ?>" required></div>
                </div>
            </div><br>
            <div class="row mt-2">
                Date:&nbsp;&nbsp;
                <div class="col-md-12"><input type="text" class="form-control" placeholder="Date" name="date" value="<?php echo (isset($_GET['date'])) ? $_GET['date'] : "" ?>" required>
                </div>
            </div><br>
            <div class="row mt-3">
                Amount:&nbsp;&nbsp;
                <div class="col-md-12"><input type="text" class="form-control" placeholder="Amount" name="ammount" value="<?php echo (isset($_GET['ammount'])) ? $_GET['ammount'] : "" ?>" required>
                </div>
            </div>
            <br>
            <div><button type="submit" class="srcButton">Pay Now</button></div><br>
            </form>
        </div>

    </div>
    </div>
    </div>

    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> View Payments </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search payments" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button>
            </div>
        </div>
        <div class="gridMain">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Event Planner Name</th>
                        <th>Event Planner Email</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sName = "localhost";
                    $uName = "root";
                    $pass = "";
                    $db_name = "auth_db";

                    // Create connection
                    $conn = mysqli_connect($sName, $uName, $pass, $db_name);
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }


                    // include "./db_conn.php";
                    $sql = "SELECT * FROM `payments`";
                    $result = $conn->query($sql);

                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['ammount'] ?></td>

                            <td>&#10247</td>
                        <?php
                    }
                        ?>

                        </tr>
                </tbody>


            </table>
        </div>
    </div>
</body>

</html>