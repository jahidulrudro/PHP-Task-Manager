<?php

$message = '';
if (isset($_POST['submit'])) {
    $admin = new Admin();
    $admin->name = $_POST['name'];
    $admin->username = $_POST['username'];
    $admin->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $admin->email = $_POST['email'];
    $admin->role = $_POST['role'];
    $admin->status = $_POST['status'];

    if ($admin->save()) {
        $message = '<div class="alert alert-success">Record Inserted Successfully</div>';
    } else {
        $message = '<div class="alert alert-danger">Record Insert Failed</div>';
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$lang['title'];?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <?= $message; ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?=$lang['title'];?> <?=$lang['user'];?>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label><?=$lang['name'];?></label>
                        <input class="form-control" name="name" type="text">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['username'];?></label>
                        <input class="form-control" name="username" type="text">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['email'];?></label>
                        <input class="form-control" name="email" type="email">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['password'];?></label>
                        <input class="form-control" name="password" type="password">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['role'];?></label>
                        <select class="form-control" name="role">
                            <option value="">--Select--</option>
                            <option value="admin">Admin</option>
                            <option value="member">Member</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><?=$lang['status'];?></label>
                        <select class="form-control" name="status">
                            <option value="">--Select--</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
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