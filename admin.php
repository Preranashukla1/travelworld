<?php
session_start();
   //Auth
if(!isset($_SESSION['admin_id'])){
    header("location:loginadmin.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="admin.php">Admin </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href="feedback.php"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">More Details
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="user.php">Users</a></li>
                                    <li><a href="newad.php">Admins</a></li>
                                    <li><a href="feedback.php">Feedback</a></li>
                                    <li><a href="query.php">Query</a></li>
                                    <li><a href="booking.php">Bookings</a></li>
                                    <li><a href="package.php">Package</a></li>
                                    <li><a href="hotels.php">Hotels</a></li>
                                    <li><a href="roles.php">Roles</a></li>
                                    <li><a href="tourtypes.php">Tour Types</a></li>
                                    <li class="divider"></li>

                                </ul>
                            </li>
                            <li><a href="#">Support </a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="admin.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="newad.php"><i class="menu-icon icon-user"></i> Admins </a>
                                </li>
                                <li><a href="task.php"><i class="menu-icon icon-tasks"></i>Tasks <b class="label orange pull-right">
                                    19</b> </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="user.php"><i class="menu-icon icon-angle-right"></i> Users </a></li>
                                <li><a href="feedback.php"><i class="menu-icon icon-bell   "></i> Feedbacks </a></li>
                                <li><a href="query.php"><i class="menu-icon icon-volume-up"></i>Queries </a></li>
                                <li><a href="package.php"><i class="menu-icon icon-edit"></i> Packages </a></li>
                                <li><a href="hotels.php"><i class="menu-icon icon-building"></i> Hotels </a></li>
                                <li><a href="booking.php"><i class="menu-icon icon-book"></i> Bookings </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>More Pages </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="profile.php"><i class="icon-user"></i>Profile </a></li>
                                        <li><a href="user.php"><i class="icon-group"></i>All Users </a></li>
                                        <li><a href="roles.php"><i class="icon-check"></i>All Roles </a></li>
                                        <li><a href="tourtypes.php"><i class="icon-circle"></i>All Tour Types </a></li>
                                    </ul>
                                </li>
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
 
                                    </a><a href="#" class="btn-box big span4"><i class="icon-user"></i><b>15</b>
                                        <p class="text-muted">
                                            New Users</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-book"></i><b>bookings</b>
                                        <p class="text-muted">
                                            Booking</p>
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="feedback.php" class="btn-box small span4"><i class="icon-bell"></i><b>Feedback</b>
                                                </a><a href="query.php" class="btn-box small span4"><i class="icon-volume-up"></i><b>Query</b>
                                                </a><a href="booking.php" class="btn-box small span4"><i class="icon-book"></i><b>Booking</b>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="user.php" class="btn-box small span4"><i class="icon-group"></i><b>Users</b>
                                                </a><a href="newad.php" class="btn-box small span4"><i class="icon-user"></i><b>Admin</b>
                                                </a><a href="profile.php" class="btn-box small span4"><i class="icon-user"></i><b> Profile </b> </a>
                                            </div>
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                            <!--/#btn-controls-->

                                </div>
                            </div>
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; Travel World </b>All rights reserved.
            </div>
        </div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>
