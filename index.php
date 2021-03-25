<?php

include('session.php');
include('connection.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>School of Ecology and Conservation  | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
         <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    
    
    
    <div class="wrapper">
        <header class="main-header">
            <a href="index.php" class="logo">
                <span class="logo-mini"><b>S</b>EC</span>
                <span class="logo-lg">SEC</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="dist/img/avataricon1.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $user_check; ?></span>
                                </a>
                            <ul class="dropdown-menu">
                            <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/avataricon1.jpg" class="img-circle" alt="User Image">

                                <p>
                                 <?php echo $user_check; ?> - User Role
                  
                                </p>
                                </li>
              
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat"    >Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat"    >Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/avataricon1.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $user_check; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="index.php">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>    
                    </li>
                    <li>
                        <a href="entersource.php">
                            <i class="fa fa-edit"></i> <span>Source Entry</span>
                        </a>    
                    </li>
                    <li>
                        <a href="list_crops.php">
                            <i class="fa fa-table"></i> <span>List Source</span>
            
                        </a>
                    </li>
                    <?php
                    
                    if($user_role == "admin"){
                        
                        echo "
                            <li>
                        <a href='admin_settings.php'>
                            <i class='fa fa-gears'></i> <span>Admin Settings</span>
            
                        </a>
                    </li>
                            
                        ";
                        
                    }
                    
                    
                    ?>
                    
                </ul>    
            </section>
        </aside>
        
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Welcome to GKVK
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>
            
            <?php
            
                // echo date("n");
                
                $monthdate = date("n"); 
                
                $r1 = mysql_query("select count(paper_no) from source_entry where month(time_entered) = '$monthdate' ");
                list( $sourcemonthcount) = mysql_fetch_array($r1);
                    // echo  $sourcecount;
                
                $r2 = mysql_query("select count(paper_no) from source_entry");
                list($sourcecount) = mysql_fetch_array($r2);
                
                $r3 = mysql_query("select count(species_entry_id) from species_entry");
                list($speciescount) = mysql_fetch_array($r3);
                
                
                $r4 = mysql_query("select count(user_cred_id) from user_cred");
                list($userscount) = mysql_fetch_array($r4);
            
            ?>
            
            
            <section class="content">
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $speciescount ?> </h3>

                                <p>New Species</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $sourcemonthcount ?></h3>

                                <p>Entries this Month</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $sourcecount ?></h3>

                                <p>New Enrtries</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph "></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $userscount ?></h3>

                                <p>New Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer" style="text-align:center;">
            
                <strong>Copyright &copy; <a href="">GKVK</a>.</strong> 
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>    
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>


</html>

















