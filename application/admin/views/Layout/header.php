<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="assets/ap/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="assets/ap/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="assets/ap/dist/css/skins/skin-blue.min.css">
        <link href="assets/ap/dropzone.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="assets/ap/aasksoft editor/editor.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/jquery.toastmessage.css" rel="stylesheet" type="text/css"/>
        <!-- jQuery 2.1.4 -->
        <script src="assets/ap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- REQUIRED JS SCRIPTS -->


        <!-- Bootstrap 3.3.5 -->
        <script src="assets/ap/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/ap/aasksoft editor/jquery.lazy.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="assets/ap/dist/js/app.min.js"></script>
        <script src="assets/ap/dropzone.js" type="text/javascript"></script>
        <script src="assets/ap/aasksoft editor/editor.js" type="text/javascript"></script>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
        <script src="assets/css/jquery.toastmessage.js" type="text/javascript"></script>
        <link rel="alternate" type="application/json+oembed" href="http://api.jquery.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fapi.jquery.com%2FjQuery.parseJSON%2F" />
        <link rel="alternate" type="text/xml+oembed" href="http:///api.jquery.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fapi.jquery.com%2FjQuery.parseJSON%2F&#038;format=xml" />

        <style>
            img {
                width: 100%;
                height: auto;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="/" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b></span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu" >
                        <ul class="nav navbar-nav">
                            <li class="dropdown tasks-menu" id="noti">
                                <!-- Menu Toggle Button -->

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger"></span>
                                </a>

                            </li>
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="assets/ap/dist/img/avatar5.png" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?php
                                        if (isset($_SESSION["login"])) {
                                            echo $_SESSION["login"];
                                        } else {
                                            echo "Admin";
                                        }
                                        ?></span>
                                </a>
                                <ul class="dropdown-menu" style="width: 10px;">
                                    <!-- The user image in the menu -->
                                    <li>
                                        <a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VProfile"); ?>" >Profile</a>
                                    </li>
                                    <li>
                                        <a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VChangePassword"); ?>"  >Change Password</a>
                                    </li>
                                    <li>
                                        <a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VLogout"); ?>" >Sign out</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="assets/ap/dist/img/avatar5.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>Admin</p>
                            <!-- Status -->
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- search form (Optional) --
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">HEADER</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li class="active"><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-asterisk"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VCategory"); ?>" >Create Category</a></li>

                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-asterisk"></i> <span>New Post's</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPostGUI"); ?>" >Post</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPostDataTable"); ?>" >View Post Data</a></li>
                            </ul>
                        </li>

                    </ul><!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->

                <div id="msg" style="position: fixed; z-index: 900; margin-left: 300px; width: 300px;">

                    <?php
                    if (!empty($_SESSION["msg"])) {
                        echo '<div class="col-lg-4 col-lg-offset-4">';
                        echo $main->printMessage($_SESSION["msg"], "danger");
                        echo "</div>";
                        $_SESSION["msg"] = "";
                    }
                    ?>

                </div>

                <div id="main">

                </div>

