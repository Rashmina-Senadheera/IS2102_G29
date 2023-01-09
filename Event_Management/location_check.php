<?php
include('constants.php');
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
} else { ?>
    <script>
        location.replace('index.php');
    </script>
<?php
}
?>
<html>

<body>
    <script>
        var role = <?php echo json_encode($role); ?>;
        if (role === 'admin') {
            location.replace('admin/dashboard.php');
        } else if (role === 'customer') {
            location.replace('customer/customer_quotation.php');
        } else if (role === 'event_planner') {
            location.replace('Event_Planner/Requests.php');
        } else if (role === 'supplier') {
            location.replace('Supplier/pages/dashboard.php');
        }
    </script>
</body>

</html>