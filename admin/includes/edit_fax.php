<?php

if (isset($_GET['fax_id'])) {
    $fax = Fax::find_by_id($_GET['fax_id']);
}
$persons = Admin::find_all();
$message = '';
if (isset($_POST['submit'])) {
    $fax->receive_date = $_POST['receive_date'];
    $fax->description = $_POST['description'];
    $fax->received_from = $_POST['receive_from'];
    $fax->exution_date = $_POST['exution_date'];
    $fax->status = $_POST['status'];
    if ($_FILES['upload_file']['name'] != '' && $_FILES['upload_file']['size'] != 0) {
        $fax->file = Fax::set_file($_FILES['upload_file']);
        unlink("./upload/" . $_POST['old_file']);
    } else {
        $fax->file = $_POST['old_file'];
    }
    $fax->save();
    //if ($fax->save()) {
    follow_up::delete_record($fax->id);
    $persons = $_POST['person'];
    for ($i = 0; $i < count($persons); $i++) {
        $follow_up = new follow_up();
        $follow_up->person_id = $persons[$i];
        $follow_up->fax_id = $fax->id;
        $follow_up->save();
    }
    $message = '<div class="alert alert-success">Record Updated Successfully</div>';
    $_SESSION['message'] = $message;
    header("Location: fax.php");
    //} else {
    //  $message = '<div class="alert alert-danger">Record Updated Failed</div>';
    // $_SESSION['message'] = $message;
    //}
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
                <?=$lang['edit'];?> <?=$lang['fax'];?>
            </div>
            <div class="panel-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><?=$lang['receive_date'];?></label>
                        <input class="form-control datepicker" value="<?= $fax->receive_date; ?>" name="receive_date"
                               type="text">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['description'];?></label>
                        <textarea class="form-control" id="mymce" name="description" rows="3"
                                  cols="3"><?= $fax->description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label><?=$lang['receive_from'];?></label>
                        <input class="form-control" value="<?= $fax->received_from; ?>" name="receive_from"
                               type="text">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['follow_up'];?></label>
                        <select class="form-control select2" multiple="multiple" name="person[]">
                            <?php foreach ($persons as $person):
                                $result = follow_up::get_record($fax->id, $person->id);
                                if ($result) {
                                    ?>
                                    <option value="<?= $person->id; ?>" selected><?= $person->name; ?></option>
                                <?php } else { ?>
                                    <option value="<?= $person->id; ?>"><?= $person->name; ?></option>
                                <?php } endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><?=$lang['execution_date'];?></label>
                        <input class="form-control datepicker" value="<?= $fax->exution_date; ?>" name="exution_date"
                               type="text">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['status'];?></label>
                        <select class="form-control" name="status">
                            <option value="">--Select--</option>
                            <?php if ($fax->status == 'finished') { ?>
                                <option value="finished" selected>Finished</option>
                                <option value="not_finished">Not Finished</option>
                            <?php } else { ?>
                                <option value="finished">Finished</option>
                                <option value="not_finished" selected>Not Finished</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><?=$lang['file'];?></label>
                        <input class="form-control" name="upload_file" type="file">
                        <input type="hidden" name="old_file" value="<?= $fax->file; ?>">
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