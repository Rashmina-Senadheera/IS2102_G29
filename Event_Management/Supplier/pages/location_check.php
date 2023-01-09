<?php
include('../../constants.php');
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
} else { ?>
    <script>
        location.replace('sign_up.php');
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
            location.replace('landing_page.php');
        } else if (role === 'event_planner') {
            location.replace('Event_Planner/Suppliers.php');
        } else if (role === 'supplier') {
            location.replace('ps-list.php');
        }
    </script>
</body>

</html>