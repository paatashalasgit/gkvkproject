<?php

include('connection.php');
include('session.php');

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
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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

  <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAisw1A-g7XKtzgUFhCUuHuFWdNqvy7gAw&libraries=places"></script>-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  

  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
    
    * Important part */
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 60vh;
    overflow-y: auto;
}
  </style>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="submitnewspecies.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-collapse">
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
        
        <li class="active">Admin Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Main row -->
      
      <!-- SELECT2 EXAMPLE -->
      
   
	  
	  <form action="" method="post"  enctype="multipart/form-data">    

       
   
		<div class="box box-default">
            
            <div class=" tabs-wrap">
			<div class="box-header with-border">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#users" aria-controls="taxonomy" role="tab" data-toggle="tab" aria-expanded="true">Users</a>
                </li>
                <li>
                  <a href="#species" aria-controls="distribution" role="tab" data-toggle="tab" aria-expanded="false">Species Entry</a>
                </li>
                <li>
                  <a href="#acceptedspecies" aria-controls="introduction" role="tab" data-toggle="tab" aria-expanded="false">Accepted Species Entry</a>
                </li>
                <li>
                  <a href="#crops" aria-controls="lifecycle" role="tab" data-toggle="tab" aria-expanded="true">Crops</a>
                </li>
                
              </ul>
            </div>
			<div class="box-body">
            <div class="tab-content">
            
              <div role="tabpanel" class="tab-pane active" id="users"> 
                <!--<h4>Taxonomy</h4>-->
                
                           <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Users List</h3>
                                            </div>
                                            
                                            <div class= "col-lg-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"></label>
                                                        <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-newuser">Enter New User</button>
                                                </div>
                                            </div>
                                            
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>FULL NAME</th>
                                                            <th>EMAIL</th>
                                                            <th>PHONE NUMBER</th>
                                                            <th>USERNAME</th>
                                                            <th>DEPARTMENT</th>
                                                            <th>ACTIONS</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                    
                    
                                                        <?php
                    
                                                        $r1= mysql_query("select user_cred_id, username, name, email, phone, department from user_cred ");
                    
                                                            $i =1;
                    	                                    while(list($user_cred_id,$username,$name,$email,$phone,$department)=mysql_fetch_array($r1)){
                    	                                        
                    	                                        echo "
                    	                                            <tr>
                                                                        <td>".$i."</td>
                                                                        <td>".$name."</td>
                                                                        <td>".$email."</td>
                                                                        <td>".$phone."</td>
                                                                        <td>".$username."</td>
                                                                        <td>".$department."</td>
                                                                        <td>
                                                                            <div class='text-center'>
                                                                               
                                                                                <a class='btn btn-social-icon btn-google' onClick=\"javascript: return confirm('Please confirm deletion');\" href='deluser.php?userid=".$user_cred_id."'   data-toggle='tooltip' title='Delete'><i class='fa fa-trash'></i></a>
                                                                            </div>    
                                                                        </td>
                                                                        
                                                                    </tr>
                    	    
                    	                                        ";
                    	                                        $i++;
                     	                                    }
                    
                                                        ?>
                                                    
                                                
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>FULL NAME</th>
                                                            <th>EMAIL</th>
                                                            <th>PHONE NUMBER</th>
                                                            <th>USERNAME</th>
                                                            <th>DEPARTMENT</th>
                                                            <th>ACTIONS</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                 <!-- /.row -->
                        </section>

              </div>
            
              <div role="tabpanel" class="tab-pane" id="species">
                
                
                             <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Species Table</h3>
                                            </div>
                                            
                                            <div class= "col-lg-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"></label>
                                                        <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-newspecies">Enter New Species</button>
                                                </div>
                                            </div>
                                            
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example2" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>SPECIES ID</th>
                                                            <th>SPECIES NAME</th>
                                                            <th>GENUS NAME</th>
                                                            <th>ACTIONS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                    
                                                        $r2= mysql_query("select species_entry_id, name_species, name_genus from species_entry order by species_entry_id ");
                    
                                                            $i =1;
                    	                                    while(list($species_entry_id, $name_species, $name_genus)=mysql_fetch_array($r2)){
                    	    
                    	                                        echo "
                    	                                            <tr>
                                                                        <td>".$i."</td>
                                                                        <td>".$name_species."</td>
                                                                        <td>".$name_genus."</td>
                                                                       
                                                                        <td>
                                                                            <div class='text-center'>
                                                                                
                                                                                <a class='btn btn-social-icon btn-google' onClick=\"javascript: return confirm('Please confirm deletion');\"  href='delspecies.php?speciesid=".$species_entry_id."'   data-toggle='tooltip' title='Delete'><i class='fa fa-trash'></i></a>
                                                                            </div>    
                                                                        </td>
                                                                    </tr>
                    	    
                    	                                        ";
                    	                                        $i++;
                     	                                    }
                    
                                                        ?>
                
                                                
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>SPECIES ID</th>
                                                            <th>SPECIES NAME</th>
                                                            <th>GENUS NAME</th>
                                                            <th>ACTIONS</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                 <!-- /.row -->
                        </section>

              </div>
              
              <div role="tabpanel" class="tab-pane" id="acceptedspecies">
                <!--<h3 class="">Introduction, Hosts  &amp; Symptoms</h3>-->
                
                
                           <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Accepted Species Table</h3>
                                            </div>
                                            
                                            <div class= "col-lg-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"></label>
                                                        <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-newaccepted">Enter New Accepted Species</button>
                                                </div>
                                            </div>
                                            
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example3" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>ACCEPTED SPECIES NAME</th>
                                                            <th>ACCEPTED GENUS NAME</th>
                                                            <th>ACTIONS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                    

                                                        
    
                                                        <?php
                    
                                                        $r3= mysql_query("select accepted_species_entry_id,	accepted_genus,	accepted_species from accepted_species_entry order by accepted_species_entry_id");
                    
                                                            $i =1;
                    	                                    while(list($accepted_species_entry_id,	$accepted_genus,	$accepted_species)=mysql_fetch_array($r3)){
                    	    
                    	                                        echo "
                    	                                            <tr>
                                                                        <td>".$i."</td>
                                                                        <td>".$accepted_species."</td>
                                                                        <td>".$accepted_genus."</td>
                                                                       
                                                                        <td>
                                                                            <div class='text-center'>
                                                                              
                                                                                <a class='btn btn-social-icon btn-google' onClick=\"javascript: return confirm('Please confirm deletion');\" href='delacceptedspecies.php?acceptedspeciesid=".$accepted_species_entry_id."'   data-toggle='tooltip' title='Delete'><i class='fa fa-trash'></i></a>
                                                                            </div>    
                                                                        </td>
                                                                    </tr>
                    	    
                    	                                        ";
                    	                                        $i++;
                     	                                    }
                    
                                                        ?>
                
                                                
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>ACCEPTED SPECIES NAME</th>
                                                            <th>ACCEPTED GENUS NAME</th>
                                                            <th>ACTIONS</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                 <!-- /.row -->
                        </section>

              </div>
              
              <div role="tabpanel" class="tab-pane" id="crops">
                           <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Crops Table</h3>
                                            </div>
                                            
                                            <div class= "col-lg-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"></label>
                                                        <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-newcrop">Enter New Crop</button>
                                                </div>
                                            </div>
                                            
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example4" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>CROP ID</th>
                                                            <th>CROP NAME</th>
                                                           
                                                            <th>ACTIONS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                    
                                                        $r4= mysql_query("select distinct resource_name from  resource_crop order by  resource_name asc");
                    
                                                             $i =1;
                    	                                    while(list($resource_name)=mysql_fetch_array($r4)){
                    	    
                    	                                        echo "
                    	                                            <tr>
                                                                        <td>".$i."</td>
                                                                        <td>".$resource_name."</td>
                                                                       
                                                                        <td>
                                                                            <div class='text-center'>
                                                                               
                                                                                <a class='btn btn-social-icon btn-google' onClick=\"javascript: return confirm('Please confirm deletion');\"  href='delcrops.php?cropid=".$resource_crop_id."'   data-toggle='tooltip' title='Delete'><i class='fa fa-trash'></i></a>
                                                                            </div>    
                                                                        </td>
                                                                    </tr>
                    	    
                    	                                        ";
                    	                                        $i++;
                     	                                    }
                    
                                                        ?>
                
                                                
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>CROP ID</th>
                                                            <th>CROP NAME</th>
                                                           
                                                            <th>ACTIONS</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                 <!-- /.row -->
                        </section>

            </div>
            
        
			</div>

		   
            <div id="push"></div>
        
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>
     
	  </form> 
      <!-- /.box -->
      
      
      <div class="modal fade" id="modal-newcrop">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <form id="new-crop" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title" style="text-align:center;">Enter New Crops</h2>
                        </div>
                        <div class="modal-body">
                            <div class="box box-default">
                               <div class="row">
                                        <div class="col-lg-7 col-sm-12">
                                            <label> New Crop</label>
                                            <input list="crop_text" name="crop" id="crop" class="form-control"  onkeyup="dropDown(this.value,'crop_text')">
                            <datalist id= "crop_text" >
                                                    
                            </datalist>
                                        </div>
                                    </div>
                                    
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                           
                                    <input type="button" class="btn btn-primary" name="submit_newcrop" id="submit_newcrop" onclick="SubmitNewCrop();" data-dismiss="modal" value="Submit" />
                        </div>
                  </form>
              </div>
          </div>
      </div>
      
      
      <div class="modal fade" id="modal-newaccepted">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <form id="new-accepted" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title" style="text-align:center;">Enter Accepted Species</h2>
                        </div>
                        <div class="modal-body">
                            <div class="box box-default">
                               <div class="row">
                                        <div class="col-lg-7 col-sm-12">
                                            <label> Accepted Genus</label>
                                            <input list="accepted-genus" name="accepted_genus" id="accepted_genus" class="form-control select2" onkeyup="dropDown(this.value,'accepted-genus')" >
                                                <datalist id="accepted-genus" >
                                                    
                                                </datalist>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7 col-sm-12">
                                            <label>Accepted Species</label>
                                            <input list="accepted-species" name="accepted_species" id="accepted_species" class="form-control select2"  onkeyup="dropDown(this.value,'accepted-species')">
                                                <datalist id="accepted-species" >
                                                    
                                                </datalist>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7 col-sm-12">
                                            <label>Accepted Author</label>
                                            <input list="accepted-author" name="accepted_author" id="accepted_author" class="form-control select2" onkeyup="dropDown(this.value,'accepeted-author')" >
                                                <datalist id="accepeted-author" >
                                                    
                                                </datalist>
                                        </div>
                                        <div class="col-lg-7 col-sm-12">
                                            <label>Year</label>
                                            <input list="accepted-year" name="accepted_year" id="accepted_year" class="form-control select2" >
                                                
                                        </div>
                                    </div>
    								<div class="row">
                                        <div class="col-lg-7 col-sm-12">
                                            <label>URL</label>
                                            <input list="accepted-url" name="accepted_url" id="accepted_url" class="form-control select2" >
                                                
                                        </div>
                                    </div>
    								<div class="row">
                                        <div class="col-lg-7 col-sm-12">
                                            <label>PDF</label>
                                            <input list="accepted-pdf" name="accepted_pdf" id="accepted_pdf" class="form-control select2" >
                                                
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                           
                            <input type="button" class="btn btn-primary" name="submit_newaccepted" id="submit_newaccepted" onclick="SubmitNewAccepted();" data-dismiss="modal" value="Submit" />
                  </div>
                  </form>
              </div>
          </div>
      </div>
      
      
      <div class="modal fade" id="modal-newuser">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <form id="new-user" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title" style="text-align:center;">Enter New User</h2>
                        </div>
                        <div class="modal-body">
                            <div class="box box-default">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <label>Full Name</label>
                                            <input type="text" name="full_name" id="full_name" class="form-control select2"  >
                                                
                                    </div>
                                    
                                    <div class="col-lg-12 col-sm-12">
                                        <label>User Name</label>
                                            <input type="text" name="user_name" id="user_name" class="form-control select2"  >
                                                
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <label>Email</label>
                                            <input type="email" name="user_email" id="user_email" class="form-control select2"  >
                                                
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <label>Phone Number</label>
                                            <input type="text" name="user_phone" id="user_phone" class="form-control select2"  >
                                                
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <label>Password</label>
                                            <input type="password" name="user_password" id="user_password" class="form-control select2"  >
                                                
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <label>Department</label>
                                            <input type="text" name="user_department" id="user_department" class="form-control select2"  >
                                                
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <label>User Role</label>
                                            <select name="user_role" id="user_role" class="form-control">
                                                <option value="admin">Admin</option>
                                                <option value="researcher">Researcher</option>
                                            </select>
                                                
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="exampleInputPassword1">User Image</label>
                                            <input type="file" name="user_image" id="user_image" >
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                           
                            <input type="button" class="btn btn-primary" name="submit_newsuser" id="submit_newsuser" onclick="SubmitNewUser();" data-dismiss="modal" value="Submit" />
                  </div>
                  </form>
              </div>
          </div>
      </div>
      
      
      
        <div class="modal fade" id="modal-newspecies">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                    <form id="new_species" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title" style="text-align:center;">Enter New Species</h2>
                    </div>
                    <div class="modal-body" >
                        <div class="box box-default">
                            <div class="row">
    			                <div class="col-lg-6 col-sm-12">
    			                    <div class="row">
    			                        <div class="box box-default">
                                            <div class="box-header">
                                                <h3 class="box-title">Name from PDF</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-lg-7 col-sm-12">
                                                        <label>Genus</label>
                                                        <input list="name-genus" name="name_genus" id="name_genus" class="form-control select2" onkeyup="dropDown(this.value,'name-genus')" >
                                                            <datalist id="name-genus" >
                                                    
                                                            </datalist>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <label>Species</label>
                                                        <input list="name-species" name="name_species" id="name_species" class="form-control select2" onkeyup="dropDown(this.value,'name-species')" >
                                                            <datalist id="name-species" >
                                                    
                                                            </datalist>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8 col-sm-12">
                                                        <label>Author</label>
                                                        <input list="name-author" name="name_author" id="name_author" class="form-control select2" onkeyup="dropDown(this.value,'name-author')" >
                                                            <datalist id="name-author" >
                                                    
                                                            </datalist>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label>Year</label>
                                                        <input list="name-year" name="name_year" id="name_year" class="form-control select2"  >
                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    				                </div>
    				
    				                <div class="row">
    						            <div class="box box-default">
                                <div class="box-header">
                                    <h3 class="box-title">Accepted Name</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-lg-7 col-sm-12">
                                            <label> Accepted Genus</label>
                                            <input list="accepted-genus" name="accepted_genus" id="accepted_genus" class="form-control select2" onkeyup="dropDown(this.value,'accepted-genus')" >
                                                <datalist id="accepted-genus" >
                                                    
                                                </datalist>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label>Accepted Species</label>
                                            <input list="accepted-species" name="accepted_species" id="accepted_species" class="form-control select2"  onkeyup="dropDown(this.value,'accepted-species')">
                                                <datalist id="accepted-species" >
                                                    
                                                </datalist>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-sm-12">
                                            <label>Accepted Author</label>
                                            <input list="accepted-author" name="accepted_author" id="accepted_author" class="form-control select2" onkeyup="dropDown(this.value,'accepeted-author')" >
                                                <datalist id="accepeted-author" >
                                                    
                                                </datalist>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label>Year</label>
                                            <input list="accepted-year" name="accepted_year" id="accepted_year" class="form-control select2" >
                                                
                                        </div>
                                    </div>
    								<div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label>URL</label>
                                            <input list="accepted-url" name="accepted_url" id="accepted_url" class="form-control select2" >
                                                
                                        </div>
                                    </div>
    								<div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label>PDF</label>
                                            <input list="accepted-pdf" name="accepted_pdf" id="accepted_pdf" class="form-control select2" >
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
    				                </div>
    			                </div>
    			                <div class="col-lg-6 col-sm-12">
    				                <div class="box box-default">
                                        <div class="box-header">
                                            <h3 class="box-title">Classification</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label>Kingdom</label>
                                                        <input list="classification-kingdom" name="classification_kingdom" id="classification_kingdom" class="form-control select2" >
                                                
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label>Phylum</label>
                                                        <input list="classification-phylum" name="classification_phylum" id="classification_phylum" class="form-control select2" >
                                                
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label>Class</label>
                                                    <input list="classification-class" name="classification_class" id="classification_class" class="form-control select2" >
                                                
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label>Order</label>
                                                    <input list="classification-order" name="classification_order" id="classification_order" class="form-control select2" onkeyup="dropDown(this.value,'classification-order')">
                                                        <datalist id="classification-order" >
                                                    
                                                        </datalist> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label>Family</label>
                                                        <input list="classification-family" name="classification_family" id="classification_family" class="form-control select2" onkeyup="dropDown(this.value,'classification-family')" >
                                                            <datalist id="classification-family" >
                                                    
                                                            </datalist> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    			                </div>
    		                </div>
    	                </div>
    	                
    	                <div class="box box-default">
    	                    <div class="box-header">
    	                        <h3 class="box-title">
    	                            Synonyms
    	                        </h3>
    	                    </div>
    	                    <div class="box-body">
    	                        <table class="table table-bordered" id="synonyms">
    	                            <thead>
    	                                <th>&nbsp;</th>
    	                                <th>Genus</th>
    	                                <th>Species</th>
    	                                <th>Author</th>
    	                                <th>Year</th>
    	                                <th>PDF</th>
    	                                <th>URL</th>
    	                            </thead>
    	                            <tbody id="modify-synonyms">
    	                                <tr id="clone-synonyms">
    	                                    <td>
                                                <button type="button" class="btn btn-block btn-danger" onclick="delRow(this,'synonyms')"><i class="fa fa-fw fa-close"></i></button>
                                            </td>
    	                                    <td>
                                                    <input list="synonyms-genus" name="synonyms_genus[]" id="synonyms_genus[]" class="form-control select2" onkeyup="dropDown(this.value,'synonyms-genus')" >
                                                        <datalist id= "synonyms-genus" >
                                                    
                                                        </datalist>
                                                </td>
                                                <td>
                                                    <input type="text" name="synonyms-species[]" id="synonyms-species[]" class="form-control select2" >
                                                            
                                                </td>
                                                <td>
                                                    <input type="text" name="synonyms-author[]" id="synonyms-author[]" class="form-control select2" >
                                                            
                                                </td>
                                                <td>
                                                    <input type="text" name="synonyms-year[]" id="synonyms-year[]" class="form-control select2" >
                                                            
                                                </td>
                                                <td>
                                                    <input type="text" name="synonyms-pdf[]" id="synonyms-pdf[]" class="form-control select2" >
                                                            
                                                </td>
                                                <td>
                                                    <input type="text" name="synonyms-url[]" id="synonyms-url[]" class="form-control select2" >
                                                            
                                                </td>
    	                                </tr>
    	                            </tbody>
    	                        </table>
    	                        <INPUT type="button" value="Add Row" onclick="cloneRow('modify-synonyms','clone-synonyms')" />
    	                    </div>
    	                </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <!--<input type="submit" class="btn btn-primary" name="submit_newspecies" id="submit_newspecies"></button>-->
                    <input type="button" class="btn btn-primary" name="submit_newspecies" id="submit_newspecies" onclick="SubmitNewSpecies();" data-dismiss="modal" value="Submit" />
                  </div>
              </form>
            </div>
             
          </div>
           
          
        </div>
      
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
  
  <script>
      
      //$document.ready(function(){
      //    
      //    
      //   $(#submit_newspecies).click(function(e){
      //       e.preventDefault();
      //       e.stopPropagation();
      //       
      //      var name_species = $('#name_species').val();
      //      var name_genus = $('#name_genus').val();
      //      var name_author = $('#name_author').val();
      //      var name_year = $('#name_year').val();
      //      
      //      var accepted_genus = $('#accepted_genus').val();
      //      var accepted_species = $('#accepted_species').val(); 
      //      var accepted_author = $('#accepted_author').val();
      //      var accepted_year = $('#accepted_year').val();
      //      var accepted_pdf = $('#accepted_pdf').val();
      //      var accepted_url = $('#accepted_url').val();
      //      
      //      var classification_kingdom = $('#classification_kingdom').val();
      //      var classification_phylum = $('#classification_phylum').val();
      //      var classification_class = $('#classification_class').val();
      //      var classification_order = $('#classification_order').val();
      //      var classification_family = $('#classification_family').val();
      //      
      //      var synonyms_genus = $('#synonyms_genus').val();
      //      var synonyms_species =$('#synonyms-species').val();
      //      var synonyms_author = $('#synonyms-author').val();
      //      var synonyms_year =  $('#synonyms-year').val();
      //      var synonyms_pdf =$('#synonyms-pdf').val();
      //      var synonyms_url = $('#synonyms-url').val();
      //      
      //      
      //      $.ajax({
      //          
      //          type : "POST",
      //          url : "newspecies_done.php",
      //          data : {
      //            
      //              name_species : name_species,
      //              name_genus : name_genus,
      //              name_author : name_author,
      //              name_year : name_year,
      //              accepted_genus : accepted_genus,
      //              accepted_species : accepted_species,
      //              accepted_author : accepted_author,
      //              accepted_year :  accepted_year,
      //              accepted_pdf : accepted_pdf,
      //              accepted_url : accepted_url,
      //              classification_kingdom : classification_kingdom,
      //              classification_phylum  : classification_phylum,
      //              classification_class :  classification_class,
      //              classification_order : classification_order,
      //              classification_family  :  classification_family,
      //              synonyms_genus : synonyms_genus, 
      //              synonyms_species : synonyms_species,
      //              synonyms_author :  synonyms_author,
      //              synonyms_year : synonyms_year,
      //              synonyms_pdf : synonyms_pdf,
      //              synonyms_url  : synonyms_url
      //              
      //          },
      //          success: function(data){
      //              $('#modal-newspecies').modal('hide');
      //              alert(Data added successfully !);
      //          }
      //      });
      //      
      //   }); 
      //});
      
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
    
    function cloneRow(tbId,trId) {
      
      var row = document.getElementById(trId); // find row to copy
      var table = document.getElementById(tbId); // find table to append to
      var clone = row.cloneNode(true); // copy children too
    
      clone.id = trId;  // change id or other attributes/contents
      table.appendChild(clone); // add new row to end of table
      

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



<script>
    
     $(document).ready(function () {    
      var world_input = document.getElementById('worlddistribution_world');
      var india_input = document.getElementById('indiadistribution_states');
     
      var autocomplete = new google.maps.places.Autocomplete(world_input,
      {
          types: ['(regions)']
          
      });
      
      
      google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        
        document.getElementById('worlddistribution_world').innerHTML = near_place.formatted_address;

        });
        
    
      var autocomplete1 = new google.maps.places.Autocomplete(india_input,{
          types: ['(cities)'],
            componentRestrictions: {country: "in"}

      });
      
      
      google.maps.event.addListener(autocomplete1, 'place_changed', function () {
        var near_place1 = autocomplete1.getPlace();
        
        document.getElementById('indiadistribution_states').innerHTML = near_place1.formatted_address;

        });    
    });  
</script>

<script>
    function delRow(row,table){
        var i = row.parentNode.parentNode.rowIndex;
       document.getElementById(table).deleteRow(i);
        
        
    }
    
</script>


<script>
    $(function () {
    var input_file = document.getElementById('introduction_image');
    var deleted_file_ids = [];
    var dynm_id = 0;
    $("#introduction_image").change(function (event) {
        var len = input_file.files.length;
        $('#introduction_image_preview ul').html("");
        
        for(var j=0; j<len; j++) {
            var src = "";
            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if(mime_type[0] == "image") {
              src = URL.createObjectURL(event.target.files[j]);
            } else if(mime_type[0] == "video") {
              src = 'icons/video.png';
            } else {
              src = 'icons/file.png';
            }
            $('#introduction_image_preview ul').append("<li style='height:100px;width:150px;' id='" + dynm_id + "'><div class='ic-sing-file'><img style='height:100px;width:150px;' id='" + dynm_id + "' src='"+src+"' title='"+name+"'><p class='close' id='" + dynm_id + "'>X</p></div></li>");
            dynm_id++;
        }
    });
    $(document).on('click','p.close', function() {
        var id = $(this).attr('id');
        deleted_file_ids.push(id);
        $('li#'+id).remove();
        if(("li").length == 0) document.getElementById('introduction_image').value="";
    });
    // $("form#form-upload-file").submit(function(e) {
    //     e.preventDefault();
    //     var formData = new FormData(this);
    //     formData.append("deleted_file_ids", deleted_file_ids);
    //     $.ajax({
    //           url: 'upload.php',
    //           type: 'POST',
    //           data: formData,
    //           processData: false, 
    //           contentType: false,
              
    //           success: function(data) {
    //              $('#preview_file_div ul').html("<li class='text-success'>Files uploaded successfully!</li>");
    //              $('#upload_files').val("");
    //           },
    //           error: function(e) {
    //               $('#preview_file_div ul').html("<li class='text-danger'>Something wrong! Please try again.</li>");                    
    //           }    
    //     });
    // });
});
    
</script>

<script>
    $(function () {
    var input_file = document.getElementById('symptoms_image');
    var deleted_file_ids = [];
    var dynm_id = 0;
    $("#symptoms_image").change(function (event) {
        var len = input_file.files.length;
        $('#symptoms_image_preview ul').html("");
        
        for(var j=0; j<len; j++) {
            var src = "";
            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if(mime_type[0] == "image") {
              src = URL.createObjectURL(event.target.files[j]);
            } else if(mime_type[0] == "video") {
              src = 'icons/video.png';
            } else {
              src = 'icons/file.png';
            }
            $('#symptoms_image_preview ul').append("<li style='height:100px;width:150px;' id='" + dynm_id + "'><div class='ic-sing-file'><img style='height:100px;width:150px;' id='" + dynm_id + "' src='"+src+"' title='"+name+"'><p class='close' id='" + dynm_id + "'>X</p></div></li>");
            dynm_id++;
        }
    });
    $(document).on('click','p.close', function() {
        var id = $(this).attr('id');
        deleted_file_ids.push(id);
        $('li#'+id).remove();
        if(("li").length == 0) document.getElementById('introduction_image').value="";
    });
    // $("form#form-upload-file").submit(function(e) {
    //     e.preventDefault();
    //     var formData = new FormData(this);
    //     formData.append("deleted_file_ids", deleted_file_ids);
    //     $.ajax({
    //           url: 'upload.php',
    //           type: 'POST',
    //           data: formData,
    //           processData: false, 
    //           contentType: false,
              
    //           success: function(data) {
    //              $('#preview_file_div ul').html("<li class='text-success'>Files uploaded successfully!</li>");
    //              $('#upload_files').val("");
    //           },
    //           error: function(e) {
    //               $('#preview_file_div ul').html("<li class='text-danger'>Something wrong! Please try again.</li>");                    
    //           }    
    //     });
    // });
});
    
</script>

<script>
       $("#accepted_genus[name=accepted_genus]").focusout(function(){
           $("#accepted-species[name=accepted_species]").focusout(function(){
          var acceptedspecies = $("accepted-species[name=accepted-species]").val();
          var acceptedgenus = $("#accepted_genus[name=accepted-genus]").val();
          
          console.log(acceptedspecies, acceptedgenus);
          
          $.post("synonyms_pop.php",
              
                data : {
                  
                    
                    acceptedgenus : acceptedgenus,
                    acceptedspecies : acceptedspecies
                   
                    
                },
                function(data){
                    // console.log(data);
                    $('.modify-synonyms').html(data);
                // alert(Data added successfully !);
                }
           );    
          });
       }); 

    
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
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

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

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>


<script>
  $(function () {
    
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>
</html>
