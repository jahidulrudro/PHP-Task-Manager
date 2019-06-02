<?php

class follow_up extends DB_object
{
    protected static $db_table = "tbl_follow_up";
    protected static $db_table_field = array('person_id', 'fax_id');

    public $id;
    public $person_id;
    public $fax_id;

    public static function found($fax_id)
    {
        global $database;
        $query = "SELECT * FROM tbl_follow_up WHERE fax_id = {$fax_id}";
        return $database->query($query);
    }

    public static function get_record($fax_id, $person_id)
    {
        global $database;
        $query = "SELECT * FROM tbl_follow_up WHERE fax_id = {$fax_id} AND person_id = {$person_id}";
        $result = $database->query($query);
        $row = mysqli_fetch_assoc($result);
        return $row['person_id'];
    }

    public static function delete_record($fax_id)
    {
        global $database;
        $query = "DELETE FROM tbl_follow_up WHERE fax_id = {$fax_id}";
        return $database->query($query);
    }
}