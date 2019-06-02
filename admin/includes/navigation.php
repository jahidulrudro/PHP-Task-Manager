<?php

if (isset($_SESSION['admin_id'])) {
    $admin = Admin::find_by_id($_SESSION['admin_id']);
}

?>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php if($admin->role == 'admin'){?>
        <a class="navbar-brand" href="index.php"><?= $admin->name; ?></a>
        <?php } else {?>
            <a class="navbar-brand" href="fax.php"><?= $admin->name; ?></a>
        <?php }?>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
       <li class="dropdown">
       <a class="dropdown-toggle" data-toggle="dropdown" href="#">Change Language
                <i class="fa fa-caret-down"></i>
            </a>
             <ul class="dropdown-menu dropdown-user">
                <li><a href="?lang=en"> <img src="dist/img/english.png"> English</a>
                </li>
                <li class="divider"></li>
                <li><a href="?lang=arabic"><img src="dist/img/arabic.png"> Arabic</a>
                </li>
            </ul></li>
        <li class="dropdown" style="">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $admin->name; ?>
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="user.php?source=edit_admin&admin_id=<?php echo $admin->id; ?>"><i
                                class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                </li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->


    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <?php if ($admin->role == 'admin') { ?>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> <?=$lang['create_new'];?></a>
                    </li>
                <?php } ?>
                <li>
                    <a href="fax.php"><i class="fa fa-dashboard fa-fw"></i> <?=$lang['view_fax'];?></a>
                </li>
                <?php if ($admin->role == 'admin') { ?>
                    <li>
                        <a href="user.php?source=add_user"><i class="fa fa-dashboard fa-fw"></i> <?=$lang['create_user'];?></a>
                    </li>
                    <li>
                        <a href="user.php"><i class="fa fa-dashboard fa-fw"></i> <?=$lang['view_user'];?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>