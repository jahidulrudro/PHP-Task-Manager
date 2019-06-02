<?php

if (isset($_SESSION['admin_id'])) {
    $admin = Admin::find_by_id($_SESSION['admin_id']);
}

$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

?>

<div class="row">
    <div class="col-lg-12">
        <h5 class="text-right">Date : <?php echo date('m-d-Y'); ?></h5>
        <h5 class="text-right">User : <?= $admin->name; ?></h5>
        <h3 class="page-header"><?=$lang['all'];?> <?=$lang['user'];?></h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php

$users = Admin::find_all();
/*$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
unset($_SESSION['message']);

if (isset($_GET['delete_contract'])) {
    $contract = Contract::find_by_id($_GET['delete_contract']);
    if ($contract->delete()) {
        header('Location: add.php');
    }
}*/

if (isset($_GET['active_admin_status'])) {
    $found_user = Admin::find_by_id($_GET['active_admin_status']);
    $found_user->status = 1;
    if ($found_user->save()) {
        header("Location: user.php");
    }
}

if (isset($_GET['inactive_admin_status'])) {
    $found_user = Admin::find_by_id($_GET['inactive_admin_status']);
    $found_user->status = 0;
    if ($found_user->save()) {
        header("Location: user.php");
    }
}

?>
<div class="row">
    <div class="col-lg-12">
        <?= $message; ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?=$lang['view_user'];?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th><?=$lang['serial_no'];?></th>
                        <th><?=$lang['name'];?></th>
                        <th><?=$lang['username'];?></th>
                        <th><?=$lang['email'];?></th>
                        <th><?=$lang['status'];?></th>
                        <th><?=$lang['action'];?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($users as $user):
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i += 1; ?></td>
                            <td><?php echo $user->name; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <?php if ($user->status == 1) { ?>
                                <td>Active</td>
                            <?php } else { ?>
                                <td>Inactive</td>
                            <?php } ?>
                            <td>
                                <?php if ($user->status == 0) { ?>
                                    <a class="btn btn-success" title="Active"
                                       href="user.php?active_admin_status=<?php echo $user->id; ?>">
                                        <i class="glyphicon glyphicon-thumbs-up"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-success" title="Inactive"
                                       href="user.php?inactive_admin_status=<?php echo $user->id; ?>">
                                        <i class="glyphicon glyphicon-thumbs-down"></i>
                                    </a>
                                <?php } ?>
                                <a href="user.php?source=edit_admin&admin_id=<?php echo $user->id; ?>"
                                   class="btn btn-success" title="Edit"><span
                                            class="glyphicon glyphicon-edit"></span></a>
                                <a href="user.php?delete_contract=<?php echo $user->id; ?>"
                                   class="btn btn-danger"
                                   title="Delete" onclick="return confirm('Are you sure want to delete!!')"><span
                                            class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>