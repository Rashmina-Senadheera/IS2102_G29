<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/navigationBar.css">
</head>

<body>
    <?php include('../components/navigationBar.php'); ?>
    <div class="grid-container-payments">
        <div class="gridHeader">
            Quotations
        </div>
        <div class="gridMenu">
            <?php include('../components/eventPlannerMenu.php'); ?>
        </div>
        <div class="gridSearch">
            <div class="searchSec">
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search quotation" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button>
            </div>
        </div>
        <div class="gridMain">
            <table>
                <thead>
                    <tr>
                        <th>Quotation ID</th>
                        <th>Event Type</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Services</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tr>
                    <td>Q001</td>
                    <td>Wedding</td>
                    <td>2021-09-01</td>
                    <td>This is the description about quotaion 01.</td>
                    <td>Full package</td>
                    <td>Rs. 10000.00</td>
                    <td>Approved</td>
                    <td>&#10247</td>
                </tr>
                <tr>
                    <td>Q002</td>
                    <td>Birthday</td>
                    <td>2021-09-01</td>
                    <td>This is the description about quotaion 02.</td>
                    <td>Birthday cake, decorations, dinner</td>
                    <td>Rs. 20000.00</td>
                    <td>Approved</td>
                    <td>&#10247</td>
                </tr>
                <tr>
                    <td>Q003</td>
                    <td>Exhibition</td>
                    <td>2021-09-01</td>
                    <td>This is the description about quotaion 03.</td>
                    <td>Invitations, hall arrangement, decorations</td>
                    <td>Rs. 30000.00</td>
                    <td>Pending</td>
                    <td>&#10247</td>
                </tr>

            </table>
        </div>
    </div>

</body>

</html>