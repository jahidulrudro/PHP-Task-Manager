<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fax</title>
    <!-- Custom CSS -->
    <?php if($_SESSION['lang']==='arabic'){ ?>
    <link href="dist/css/sb-admin-rtl.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap-rtl.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
     <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php }else{ ?>
      <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <?php } ?>
    <link href="dist/css/jquery-ui.min.css" rel="stylesheet">
    <link href="dist/css/select2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">iframe.goog-te-banner-frame{ display: none !important;}</style>
    <style type="text/css">body {position: static !important; top:0px !important;}</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="nexo-overlay" style="width: 100%; height: 100%; background: rgba(255, 255, 255, 1); z-index: 5000; position: fixed; top: 0px; left: 0px;"><i class="fa fa-refresh fa-spin nexo-refresh-icon" style="color: rgb(0, 0, 0); font-size: 50px; position: absolute; top: 50%; left: 50%; margin-top: -25px; margin-left: -25px; width: 44px; height: 50px;"></i></div>
<div id="wrapper">