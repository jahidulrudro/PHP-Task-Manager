<?php

if (isset($_GET['admin_id'])) {
    $admin = Admin::find_by_id($_GET['admin_id']);
}
$message = '';
if (isset($_POST['submit'])) {
    $admin->name = $_POST['name'];
    $admin->username = $_POST['username'];
    if (!empty($_POST['password'])) {
        $admin->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $admin_password = $admin->password;
        $admin->password = $admin_password;
    }
    $admin->email = $_POST['email'];
    $admin->role = $_POST['role'];
    $admin->status = $_POST['status'];

    if ($admin->save()) {
        $message = '<div class="alert alert-success">Record Updated Successfully</div>';
        $_SESSION['message'] = $message;
        header("Location: user.php");
    } else {
        $message = '<div class="alert alert-danger">Record Update Failed</div>';
        $_SESSION['message'] = $message;
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$lang['edit'];?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <?= $message; ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?=$lang['edit'];?> <?=$lang['user'];?>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label><?=$lang['name'];?></label>
                        <input class="form-control" name="name" value="<?= $admin->name; ?>" type="text">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['username'];?></label>
                        <input class="form-control" name="username" value="<?= $admin->username; ?>" type="text">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['email'];?></label>
                        <input class="form-control" name="email" value="<?= $admin->email; ?>" type="email">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['password'];?></label>
                        <input class="form-control" name="password" type="password">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['role'];?></label>
                        <select class="form-control" name="role">
                            <option value="">--Select--</option>
                            <?php if ($admin->role == 'admin') { ?>
                                <option value="admin" selected>Admin</option>
                                <option value="member">Member</option>
                            <?php } else { ?>
                                <option value="admin">Admin</option>
                                <option value="member" selected>Member</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><?=$lang['status'];?></label>
                        <select class="form-control" name="status">
                            <option value="">--Select--</option>
                            <?php if ($admin->status == 1) { ?>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            <?php } else { ?>
                                <option value="1">Active</option>
                                <option value="0" selected>Inactive</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- /.row -->