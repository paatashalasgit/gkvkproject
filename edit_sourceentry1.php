<?php

include('connection.php');
include('session.php');


    if (isset($_GET['paperno'])){
	    
	    $paper_no = $_GET['paperno'];
	    
	    $r1 = mysql_query("select source_entry_id from source_entry where paper_no  = $paper_no ");
	    
	    list($source_entry_id) =  mysql_fetch_row($r1);
	    
	    $r2 = mysql_query("select resource_name, title, author, journal, volume, issue, page, year, publisher, url, email from source_entry where source_entry_id = $source_entry_id");
	    
	    list($resource_name, $title, $author, $journal, $volume, $issue, $page, $year, $publisher, $url, $email) = mysql_fetch_array($r2);
	    
	   // $r3 = mysql_query("select data_entry_id, genus, species, type from data_entry where source_entry_id = $source_entry_id ");
	    
	   // list($data_entry_id, $genus, $species, $type) = mysql_fetch_array($r3);
	    
	     $_SESSION['edit_paper_no'] = $paper_no;
	    
	} 

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>School of Ecology and Conservation | Dashboard</title>
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
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>EC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SEC</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
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
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
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
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
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
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome to GKVK
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"> Home</a></li>
        <li><a href="entersource.php"> Source Entry</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Main row -->
      
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Source Entry Form</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            
        <form id="sourceentryform" name="sourceentryform" action="edit_dataentry1.php" method="post">    
            <div class="row">
                <div class= "col-lg-3 col-sm-12">
                    <div class="form-group">
                        
                        
                        <label>Paper Number</label>
                        
                        <input type="text" name="papernumber" id="papernumber" class="form-control"  value= "<?php echo $paper_no ?>"  readonly="readonly">
                        
                    </div>
                </div>
                <div class= "col-lg-3 col-sm-12">
                    <div class="form-group">
                        <label>Crop</label>
                        <input list="crop_text" name="crop" id="crop" class="form-control"  onkeyup="dropDown(this.value,'crop_text')" value="<?php echo $resource_name ?>" >
                            <datalist id= "crop_text" >
                                                    
                            </datalist>
                            
                    </div>
                </div>
                
                
            </div>
            
            <div class="row ">
                <div class="col-lg-12 col-sm-12">
                    <label>Title</label>
                    <textarea rows="2" type="text" name="title" id="title" class="form-control" > <?php echo $title ?> </textarea>
                       
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12 col-sm-12">
                    <label>Author</label>
                    <textarea rows="2" type="text" name="author" id="author" class="form-control" > <?php echo $author ?> </textarea>
                       
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12 col-sm-12">
                    <label>Journal</label>
                    <textarea rows="2" type="text" name="journal" id="journal" class="form-control" > <?php echo $journal ?> </textarea>
                       
                </div>
            </div>
            <div class="row">
                <div class= "col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>Volume</label>
                        <input type="text" name="volume" id="volume" class="form-control" value="<?php echo $volume ?>">     
                    </div>
                </div>
                <div class= "col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>Issue</label>
                        <input type="text" name="issue" id="issue" class="form-control" value="<?php echo $issue ?>" >        
                    </div>
                </div>
                
                
            </div>
            <div class="row">
                <div class= "col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>Page</label>
                        <input type="text" name="page" id="page" class="form-control" value="<?php echo $page ?>" >     
                    </div>
                </div>
                <div class= "col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" name="year" id="year" class="form-control" value="<?php echo $year ?>">        
                    </div>
                </div>
                
                
            </div>
            <div class="row">
                <div class= "col-lg-12 col-sm-12">
                    <div class="form-group">
                        <label>Publisher</label>
                        <input type="text" name="publisher" id="publisher" class="form-control" value="<?php echo $publisher ?>">     
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class= "col-lg-12 col-sm-12">
                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" name="url" id="url" class="form-control" value="<?php echo $url ?>">     
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class= "col-lg-12 col-sm-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $email ?>" >     
                    </div>
                </div>
                
            </div>
            
            <input type="submit" class="btn btn-primary" name="submit_editsource" id="submit_editsource">
            
            
            <br>
        </form>    
            
            
        </div>


            <div id="push"></div>
        
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->
      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="text-align:center;">
            
                <strong>Copyright &copy; <a href="">GKVK</a>.</strong> 
        </footer>
        <div class="control-sidebar-bg"></div>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

  <script type="text/javascript">
      
      $('.continue').click(function(){
          $('.nav-tabs > .active').next('li').find('a').trigger('click');
        });
        $('.back').click(function(){
          $('.nav-tabs > .active').prev('li').find('a').trigger('click');
        });
      
  </script>
  
  <script type="text/javascript">
    function nextTab () {
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
    }
    
    function previousTab () {
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    }
    
</script>

<script>
    function dropDown(str,id){
        
        console.log(str,id);
        if (str.length == 0){
            document.getElementById(id).innerHTML = "";
            return;
        }else{
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200){
                    console.log(this.responseText);
                    document.getElementById(id).innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","dropdown1.php?q="+str+"&col="+id , true);
            xmlhttp.send();
        }
    }
    
</script>


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
