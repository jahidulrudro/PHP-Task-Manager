<?php
require_once("config.php");
require_once("database.php");
require_once("db_object.php");
require_once("session.php");
require_once("admin.php");
require_once("Fax.php");
require_once("follow_up.php");

if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "en";
}elseif(isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])){
    if($_GET['lang'] == 'en'){
        $_SESSION['lang'] = "en";
    } else {
        $_SESSION['lang'] = "arabic";
    }
}
//echo $_SESSION['lang'].".php";
require_once ($_SESSION['lang'].".php");
?>