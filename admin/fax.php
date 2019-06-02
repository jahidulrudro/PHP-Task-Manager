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
        case 'edit_fax':
            require_once("includes/edit_fax.php");
            break;
        default:
            require_once("includes/view_fax.php");
            break;
    }
    ?>
</div>
<!-- /#page-wrapper -->

<?php include('includes/footer.php'); ?>
