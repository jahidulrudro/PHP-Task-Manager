<?php

$persons = Admin::find_all();

$insert_id = '';
$message = '';
if (isset($_POST['submit'])) {
    $persons = $_POST['person'];

    $fax = new Fax();
    $fax->receive_date = $_POST['receive_date'];
    $fax->description = $_POST['description'];
    $fax->received_from = $_POST['receive_from'];
    $fax->exution_date = $_POST['exution_date'];
    $fax->status = $_POST['status'];
    $fax->file = Fax::set_file($_FILES['upload_file']);

    if ($fax->save()) {
        $insert_id = $database->the_insert_id();
    }

    for ($i = 0; $i < count($persons); $i++) {
        $follow_up = new follow_up();
        $follow_up->person_id = $persons[$i];
        $follow_up->fax_id = $insert_id;
        $follow_up->save();
    }

    $message = '<div class="alert alert-success">Record Inserted Successfully</div>';
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
                <?=$lang['add_fax'];?>
            </div>
            <div class="panel-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><?=$lang['receive_date'];?></label>
                        <input class="form-control datepicker" name="receive_date" type="text">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['description'];?></label>
                        <textarea class="form-control" id="mymce" name="description" rows="3" cols="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label><?=$lang['receive_from'];?></label>
                        <input class="form-control" name="receive_from" type="text">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['follow_up'];?></label>
                        <select class="form-control select2" multiple="multiple" name="person[]">
                            <?php foreach ($persons as $person): ?>
                                <option value="<?= $person->id; ?>"><?= $person->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><?=$lang['execution_date'];?></label>
                        <input class="form-control datepicker" name="exution_date" type="text">
                    </div>
                    <div class="form-group">
                        <label><?=$lang['status'];?></label>
                        <select class="form-control" name="status" required>
                            <option value="">--Select--</option>
                            <option value="finished">Finished</option>
                            <option value="not_finished">Not Finished</option>
                            <option value="not_there">Not There</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><?=$lang['file'];?></label>
                        <input class="form-control" name="upload_file" type="file">
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