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
            location.replace('pages/admin/dashboard.php');
        } else if (role === 'customer') {
            location.replace('pages/customer/customer_quotation.php');
        } else if (role === 'event_planner') {
            location.replace('pages/Event_Planner/Requests.php');
        } else if (role === 'supplier') {
            location.replace('Supplier/dashboard.php');
        }
    </script>
</body>

</html>