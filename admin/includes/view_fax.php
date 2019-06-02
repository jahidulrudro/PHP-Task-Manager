<?php

if (isset($_SESSION['admin_id'])) {
    $admin = Admin::find_by_id($_SESSION['admin_id']);
}
$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

if ($admin->role == 'admin') {
    $faxes = Fax::get_faxes_by_admin();
} else {
    $faxes = Fax::get_faxes_by_member($_SESSION['admin_id']);
}

if (isset($_GET['delete_fax'])) {
    $fax = Fax::find_by_id($_GET['delete_fax']);
    if ($fax->delete()) {
        $message = '<div class="alert alert-success">Record Deleted Successfully</div>';
        $_SESSION['message'] = $message;
        header("Location: fax.php");
    } else {
        $message = '<div class="alert alert-danger">Record Delete Failed</div>';
        $_SESSION['message'] = $message;
    }
}

?>
<div class="row">
    <div class="col-lg-12">
        <h5 class="text-right">Date : <?php echo date('m-d-Y'); ?></h5>
        <h5 class="text-right">User : <?= $admin->name; ?></h5>
        <h3 class="page-header"><?=$lang['all'];?> <?=$lang['fax'];?></h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <?= $message; ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?=$lang['view'];?> <?=$lang['fax'];?> <?=$lang['follow_up'];?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th><?=$lang['serial_no'];?></th>
                        <th><?=$lang['receive_date'];?></th>
                        <th><?=$lang['description'];?></th>
                        <th><?=$lang['receive_from'];?></th>
                        <th><?=$lang['follow_up'];?></th>
                        <th><?=$lang['execution_date'];?></th>
                        <th><?=$lang['status'];?></th>
                        <th><?=$lang['file'];?></th>
                        <?php if ($admin->role == 'admin') { ?>
                            <th><?=$lang['action'];?></th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    while ($row = mysqli_fetch_assoc($faxes)) {
                        $found_person = follow_up::found($row['id']);
                        $data = array();
                        $j = 0;
                        while ($person = mysqli_fetch_assoc($found_person)) {
                            $name = Admin::find_by_id($person['person_id']);
                            $data[$j] = $name->name;
                            $j++;
                        }
                        $output = implode(", ", $data);
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $row['receive_date']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['received_from']; ?></td>
                            <td><?php echo $output; ?></td>
                            <td><?php echo $row['exution_date']; ?></td>
                            <?php if($row['status'] == 'finished'){?>
                            <td><p class="text-success">Finished</p></td>
                            <?php } elseif($row['status'] == 'not_finished') { ?>
                            <td><p class="text-danger">Not Finished</p></td>
                            <?php } else { ?>
                            <td><p class="text-danger">Not There</p></td>
                            <?php } ?>
                            <td><a href="upload/<?= $row['file']; ?>" target="_blank"><?php echo $row['file']; ?></a>
                            </td>
                            
                                <td>
                                    <a href="fax.php?source=edit_fax&fax_id=<?php echo $row['id']; ?>"
                                       class="btn btn-success" title="Edit"><span
                                                class="glyphicon glyphicon-edit"></span></a>
                                    <a href="fax.php?delete_fax=<?php echo $row['id']; ?>"
                                       class="btn btn-danger"
                                       title="Delete" onclick="return confirm('Are you sure want to delete!!')"><span
                                                class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            
                        </tr>
                    <?php } ?>
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