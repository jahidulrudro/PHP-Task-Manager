<?php

class Fax extends DB_object
{
    protected static $db_table = "tbl_fax";
    protected static $db_table_field = array('receive_date', 'description', 'received_from', 'exution_date', 'status', 'file');

    public $id;
    public $receive_date;
    public $description;
    public $received_from;
    public $exution_date;
    public $status;
    public $file;

    public function file_path()
    {
        $location = 'upload/';
        return $location . $this->file;
    }

    public static function get_file($file)
    {
        $file = $file['name'];
        return $file;
    }

    public static function get_faxes_by_admin()
    {
        global $database;
        $query = "SELECT * FROM tbl_fax";
        return $database->query($query);
    }

    public static function get_faxes_by_member($id)
    {
        global $database;
        $query = "SELECT * FROM tbl_fax WHERE person_id = {$id}";
        return $database->query($query);
    }
}