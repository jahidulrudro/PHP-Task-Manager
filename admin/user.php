<?php
ob_start();
require_once("classes/init.php");

if (!$session->is_signed_in()) {
    header("Location: ../");
}

?>

<?php include('includes/header.php'); ?>

<!-- Navigation -->
<?php include('includes/navigation.php'); ?>

<div id="page-wrapper">
    <?php
    if (isset($_GET['source'])) {
        $source = $_GET['source'];
    } else {
        $source = '';
    }
    switch ($source) {
        case 'add_user':
            require_once("includes/add_user.php");
            break;
        case 'edit_admin':
            require_once("includes/edit_user.php");
            break;
        default:
            require_once("includes/view_user.php");
            break;
    }
    ?>
</div>
<!-- /#page-wrapper -->

<?php include('includes/footer.php'); ?>
