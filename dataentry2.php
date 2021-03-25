<?php
include('connection.php');
include('session.php');

if(isset($_POST['submit_entersource']))
{
    
    $paper_no = $_POST['papernumber'];
    //echo "<script>alert('$paper_no')</script>";
    // $resource_cat = $_POST['resource_cat']; 	
    $resource_name	= $_POST['crop'];
    $title	= $_POST['title'];
    $author	= $_POST['author'];
    $journal	= $_POST['journal'];
    $issue	= $_POST['issue'];
    $page	= $_POST['page'];
    $year	= $_POST['year'];
    $publisher	= $_POST['publisher'];
    $url	= $_POST['url'];
    $email	= $_POST['email'];
    
    $q1 = "insert into source_entry(paper_no, 	resource_name, title, author, journal, issue, page, year, publisher, url, email) 
            values('$paper_no', '$resource_name', '$title', '$author', '$journal', '$issue', '$page', '$year', '$publisher', '$url', '$email')";
    
    $r1 = mysql_query($q1);
    
    // echo"$r1";
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
        <!--<li>-->
        <!--  <a href="viewsource.php">-->
        <!--    <i class="fa fa-table"></i> <span>View Source</span>-->
            
        <!--  </a>-->
        <!--</li>-->
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
        <li class="active">Data Entry</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Main row -->
      
      <!-- SELECT2 EXAMPLE -->
	  
	  <form action="dataentry_done.php" method="post">    
      <div class="box box-default">
        <div class="box-header with-border">
          <h2 class="box-title">Data Entry Form</h2>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        
        
            
          
                    
                    <div class="row">
                <div class= "col-lg-3 col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Select Genus</label>
                        <input list="selectgenus" name="select-genus" id="select-genus" class="form-control select2" style="width: 100%;" onkeyup="dropDown(this.value,'selectgenus')">
                                <datalist id="selectgenus" >
                                  
                                </datalist>
                        </input>        
                    </div>
                </div>
                <div class= "col-lg-3 col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Select Type</label>
                        <input list="st" name="s-t" id="s-t" class="form-control select2" style="width: 100%;">
                                <datalist id="st" >
                                  
                                </datalist>
                        </input>        
                    </div>
                </div>
                <div class= "col-lg-3 col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1"></label>
                        <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-newspecies">Enter New Species</button>
                    </div>
                </div>
                <div class= "col-lg-3 col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1"></label>
                        <input type="submit" class="btn btn-block btn-primary" name="submit_dataentry" id="submit_dataentry">
                    </div>
                </div>
                
            </div>
            
            <div class="row ">
                <div class="col-lg-6 col-sm-12">
                    <label for="">Select Species</label>
                        <input list="select-species" name="selectspecies" id="selectspecies" class="form-control select2" style="width: 100%;">
                                <datalist id="select-species" >
                                  
                                </datalist>
                        </input>
                        <!--<select class="form-control select2" name="selectspecies" style="width: 100%;">-->
                        <!--    <option value="">-->
                                  
                        <!--    </option>-->
                        <!--</select>-->
                </div>
            </div>
            
        </div>
		</div>
		
		<div class="box box-default">
            
            <div class=" tabs-wrap">
			<div class="box-header with-border">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#taxonomy" aria-controls="taxonomy" role="tab" data-toggle="tab" aria-expanded="true">Taxonomy</a>
                </li>
                <li>
                  <a href="#distribution" aria-controls="distribution" role="tab" data-toggle="tab" aria-expanded="false">Distribution</a>
                </li>
                <li>
                  <a href="#introduction" aria-controls="introduction" role="tab" data-toggle="tab" aria-expanded="false">Introduction,<br> Hosts  &amp; Symptoms</a>
                </li>
                <li>
                  <a href="#lifecycle" aria-controls="lifecycle" role="tab" data-toggle="tab" aria-expanded="true">Life Cycle <br>& Ecology</a>
                </li>
                <li>
                  <a href="#prevention" aria-controls="prevention" role="tab" data-toggle="tab" aria-expanded="false">Prevention <br>& Management</a>
                </li>
                <li>
                  <a href="#naturalenemies" aria-controls="naturalenemies" role="tab" data-toggle="tab" aria-expanded="false">Natural Enemies</a>
                </li>
                <li>
                  <a href="#yieldloss" aria-controls="yieldloss" role="tab" data-toggle="tab" aria-expanded="false">Yield Loss <br> & Economics</a>
                </li>
                <li>
                  <a href="#additionalinfo" aria-controls="additionalinfo" role="tab" data-toggle="tab" aria-expanded="false">Additional Information</a>
                </li>
              </ul>
            </div>
			<div class="box-body">
            <div class="tab-content">
            
              <div role="tabpanel" class="tab-pane active" id="taxonomy">
                <!--<h4>Taxonomy</h4>-->
                
                        <div class="row">
                    
                            <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Common Name </h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Language</th>
                                            <th>Common Name</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-commonnametable">
                                        <tr id="clone-commonnamerow">
                                            <td>
                                                <input type="checkbox"  name="commonname_check[]" id="commonname_check" class="form-control select2" >
                                                   
                                            </td>
                                            <td>
                                                <input list="commonname-language" name="commonname_language" id="commonname_language" class="form-control select2" >
                                                    <datalist id="commonname-language" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input list="commonname-name" name="commonname_name" id="commonname_name" class="form-control select2" >
                                                        <datalist id="commonname-name" >
                                                
                                                        </datalist>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <INPUT type="button" value="Add Row" onclick="cloneRow('modify-commonnametable','clone-commonnamerow')" />
                                <input type="button"  value="Del Row" onClick="deleteRow('modify-commonnametable','clone-commonnamerow');" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Local/Vernacular Name </h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="localname">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Language</th>
                                            <th>Common Name</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-localnametable">
                                        <tr id="clone-localnamerow">
                                            
                                            <td>
                                                <input type="checkbox"  name="localname_check[]" id="localname_check" class="form-control select2" >
                                                   
                                            </td>
                                            <td>
                                                <input list="localname-language" name="localname_language" id="localname_language" class="form-control select2" >
                                                    <datalist id="localname-language" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input list="localname-name" name="localname_name" id="localname_name" class="form-control select2" >
                                                        <datalist id="localname-name" >
                                                
                                                        </datalist>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <INPUT type="button" value="Add Row" onclick="cloneRow('modify-localnametable','clone-localnamerow')" />
                                <input type="button"  value="Del Row" onClick="deleteRow('modify-localnametable','clone-localnamerow');" />
                            </div>
                        </div>
                    </div>
                        
                </div>
                    
                <br>
                <a class="btn btn-primary continue" onclick="return nextTab();">Next</a>
              </div>
            
              <div role="tabpanel" class="tab-pane" id="distribution">
                
                
                        <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">World Distribution</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>World Distribution</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-worlddistribution">
                                        <tr id="clone-worlddistribution">
                                            <td>
                                                <input list="worlddistribution-world" name="worlddistribution_world" id="worlddistribution_world" class="form-control select2" >
                                                    <datalist id="worlddistribution-world" >
                                                
                                                    </datalist>
                                            </td>       
                                        </tr>
                                    </tbody>
                                    <INPUT type="button" value="Add Row" onclick="cloneRow('modify-worlddistribution','clone-worlddistribution')" />
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">India Distribution</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>States</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-indiadistribution">
                                        <tr id="clone-indiadistribution">
                                            <td>
                                                <input list="indiadistribution-states" name="indiadistribution_states" id="indiadistribution_states" class="form-control select2" >
                                                    <datalist id="indiadistribution-states" >
                                                
                                                    </datalist>
                                            </td>       
                                        </tr>
                                    </tbody>
                                    <INPUT type="button" value="Add Row" onclick="cloneRow('modify-indiadistribution','clone-indiadistribution')" />
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
                    
                
                
                <a class="btn btn-primary back" onclick="return previousTab();">Previous</a>
                <a class="btn btn-primary continue" onclick="return nextTab();">Next</a>
              </div>
              
              <div role="tabpanel" class="tab-pane" id="introduction">
                <!--<h3 class="">Introduction, Hosts  &amp; Symptoms</h3>-->
                
                
                        <div class="row ">
                    <div class="col-lg-6 col-sm-12">
                        <label for="exampleInputPassword1">Introduction</label>
                        <textarea rows="2" type="text" name="introduction" id="introduction" class="form-control" > </textarea>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-lg-6 col-sm-12">
                        <label for="exampleInputPassword1">Stage of Pests Attacked</label>
                            <input list="stageofpest-sattacked" name="stageofpests_attacked" id="stageofpests_attacked" class="form-control select2" >
                                <datalist id="stageofpests-attacked" >
                                                
                                </datalist>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-lg-6 col-sm-12">
                        <label for="exampleInputPassword1">Oviposition Site</label>
                        <input type="text" name="oviposition" id="oviposition" class="form-control" > 
                    </div>
                    
                     <div class="col-lg-6 col-sm-12">
                        <label for="exampleInputPassword1">Pupation Site</label>
                        <input type="text" name="pupation" id="pupation" class="form-control" > 
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-lg-6 col-sm-12">
                        <label for="exampleInputPassword1">Diapause</label>
                        <textarea rows="2" type="text" name="diapause" id="diapause" class="form-control" > </textarea>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-lg-6 col-sm-12">
                        <label for="exampleInputPassword1">Images</label>
                            <input type="file" name="introduction_image" id="fileToUpload">
                            <!--<input type="submit" value="Upload Image" name="submit">                    -->
                            
                    </div>
                </div>
                    
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <label for="exampleInputPassword1">Symptoms</label>
                            <table class="table table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th>Plant Part Affected</th>
                                            <th>Damage Symptoms</th>
                                            <th>Images</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-symptoms">
                                        <tr id="clone-symptoms">
                                            <td>
                                                <input list="symptoms-ppa" name="symptoms_ppa" id="symptoms_ppa" class="form-control select2" >
                                                    <datalist id="symptoms-ppa" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input list="symptoms-damage" name="symptoms_damage" id="symptoms_damage" class="form-control select2" >
                                                        <datalist id="symptoms-damage" >
                                                
                                                        </datalist>
                                            </td>
                                            <td>
                                                <input type="file" name="symptoms_image" id="fileToUpload">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <INPUT type="button" value="Add Row" onclick="cloneRow('modify-symptoms','clone-symptoms')" />
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                        
                    
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <label for="exampleInputPassword1">Alternate host</label>
                            <table class="table table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th>Scientific Name</th>
                                            <th>Common Name</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="modify-alternatehost">
                                        <tr id="clone-alternatehost">
                                            <td>
                                                <input list="alternatehost-sn" name="alternatehost_sn" id="alternatehost_sn" class="form-control select2" >
                                                    <datalist id= "alternatehost-sn" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input list="alternatehost-cn" name="alternatehost-cn" id="alternatehost-cn" class="form-control select2" >
                                                        <datalist id="alternatehost-cn" >
                                                
                                                        </datalist>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                <INPUT type="button" value="Add Row" onclick="cloneRow('modify-alternatehost','clone-alternatehost')" />
                    </div>
                </div>
                    </div>
                </div>
                
                   
                <a class="btn btn-primary back" onclick="return previousTab();">Previous</a>
                <a class="btn btn-primary continue" onclick="return nextTab();">Next</a>
              </div>
              
              <div role="tabpanel" class="tab-pane" id="lifecycle">
                <!--<h3 class="">Life Cycle & Ecology</h3>-->
                
                
                        <div class="row ">
                            <div class="col-lg-6 col-sm-12">
                                <label for="exampleInputPassword1">Life Cycle in Field Condition</label>
                                <textarea rows="2" type="text" name="lifecyclefield" id="lifecyclefield" class="form-control" > </textarea>
                            </div>
                        </div>
                
                        <div class="row ">
                            <div class="col-lg-6 col-sm-12">
                             <label for="exampleInputPassword1">Life Cycle in Lab Condition</label>
                                <textarea rows="2" type="text" name="lifecyclelab" id="lifecyclelab" class="form-control" > </textarea>
                            </div>
                        </div>
                
                        <div class="row ">
                            <div class="col-lg-6 col-sm-12">
                                <label for="exampleInputPassword1">Bio Ecology</label>
                                <textarea rows="2" type="text" name="bioecology" id="bioecology" class="form-control" > </textarea>
                            </div>
                        </div>
                    
                
                <br>
                <a class="btn btn-primary back" onclick="return previousTab();">Previous</a>
                <a class="btn btn-primary continue" onclick="return nextTab();">Next</a>
              </div>
              
              <div role="tabpanel" class="tab-pane" id="prevention">
                <!--<h3 class="">Prevention & Management</h3>-->
                
                
                        <div class="row ">
                            <div class="col-lg-6 col-sm-12">
                                <label for="exampleInputPassword1">ETL</label>
                                <textarea rows="2" type="text" name="etl" id="etl" class="form-control" > </textarea>
                            </div>
                        </div>
                
                        <div class="row ">
                            <div class="col-lg-6 col-sm-12">
                             <label for="exampleInputPassword1">Cutural Control</label>
                                <textarea rows="2" type="text" name="culturalcontrol" id="culturalcontrol" class="form-control" > </textarea>
                            </div>
                        </div>
                
                        <div class="row ">
                            <div class="col-lg-6 col-sm-12">
                                <label for="exampleInputPassword1">Mechanical Control</label>
                                <textarea rows="2" type="text" name="mechainicalcontrol" id="mechainicalcontrol" class="form-control" > </textarea>
                            </div>
                        </div>
                        
                        <div class="row ">
                            <div class="col-lg-6 col-sm-12">
                                <label for="exampleInputPassword1">Physical Control</label>
                                <textarea rows="2" type="text" name="physicalcontrol" id="physicalcontrol" class="form-control" > </textarea>
                            </div>
                        </div>
                    
                
                        <div class="box">
                            <div class="box-body">
                                <label for="exampleInputPassword1">Chemical Control</label>
                        <div class="row">
                            <table class="table table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th>Method of Application </th>
                                            <th>Insecticide Name</th>
                                            <th>Weight</th>
                                            <th>Bio Pesticide</th>
                                            <th>Stage of Plant</th>
                                            <th>Trade Name</th>
                                            <th>Company & AI</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="modify-chemicalcontrol">
                                        <tr id="clone-chemicalcontrol">
                                            <td>
                                                <input list="chemicalcontrol-moa" name="chemicalcontrol_moa" id="chemicalcontrol_moa" class="form-control select2" >
                                                    <datalist id= "chemicalcontrol-moa" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-in" id="chemicalcontrol-in" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-weight" id="chemicalcontrol-weight" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-bp" id="chemicalcontrol-bp" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-sop" id="chemicalcontrol-sop" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-tn" id="chemicalcontrol-tn" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-cm" id="chemicalcontrol-cm" class="form-control select2" >
                                                        
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <INPUT type="button" value="Add Row" onclick="cloneRow('modify-chemicalcontrol','clone-chemicalcontrol')" />
                        </div>
                            </div>
                            
                        </div>
                        
         
                        <div class="box">
                            <div class="box-body">
                                <label for="exampleInputPassword1">Biological Control</label>
                        <div class="row">
                            <table class="table table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th>Name </th>
                                            <th>Bio Agents</th>
                                            <th>Dosage</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="modify-biologicalcontrol">
                                        <tr id="clone-biologicalcontrol">
                                            <td>
                                                <input list="biologicalcontrol-name" name="biologicalcontrol_name" id="biologicalcontrol_name" class="form-control select2" >
                                                    <datalist id= "biologicalcontrol-name" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input type="text" name="biologicalcontrol-ba" id="biologicalcontrol-ba" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="biologicalcontrol-dosage" id="biologicalcontrol-dosage" class="form-control select2" >
                                                        
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                <INPUT type="button" value="Add Row" onclick="cloneRow('modify-biologicalcontrol','clone-biologicalcontrol')" />
                        </div>
                            </div>
                        </div>
                        
           
                
                        <div class="box">
                            <div class="box-body">
                                <label for="exampleInputPassword1">Resistant / Tolerant Varities</label>
                        <div class="row">
                            <table class="table table-bordered" id="">
                                    
                                    <tbody id="modify-resistant">
                                        <tr id="clone-resistant">
                                            <td>
                                                <input list="resistant-name" name="resistant_name" id="resistant_name" class="form-control select2" >
                                                    <datalist id= "resistant-name" >
                                                
                                                    </datalist>
                                            </td>
                                            
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                <INPUT type="button" value="Add Row" onclick="cloneRow('modify-resistant','clone-resistant')" />
                        </div>
                            </div>
                        </div>
                
    
                <a class="btn btn-primary back" onclick="return previousTab();">Previous</a>
                <a class="btn btn-primary continue" onclick="return nextTab();">Next</a>
              </div>
              
              <div role="tabpanel" class="tab-pane" id="naturalenemies">
                <!--<h3 class="">Natural Enemies</h3>-->
                
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                    <table class="table table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th>Name </th>
                                            <th>Type</th>
                                            <th>Stage of Pests Attacked</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="modify-naturalenemies">
                                        <tr id="clone-naturalenemies">
                                            <td>
                                                <input list="naturalenemies-name" name="naturalenemies_name" id="naturalenemies_name" class="form-control select2" >
                                                    <datalist id= "naturalenemies-name" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input type="text" name="naturalenemies-type" id="naturalenemies-type" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="naturalenemies-sopa" id="naturalenemies-sopa" class="form-control select2" >
                                                        
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                <INPUT type="button" value="Add Row" onclick="cloneRow('modify-naturalenemies','clone-naturalenemies')" />
                    </div>
                        </div>
                    </div>
                        
                
                
                    
                
                <a class="btn btn-primary back" onclick="return previousTab();">Previous</a>
                <a class="btn btn-primary continue" onclick="return nextTab();">Next</a>
              </div>
              
              <div role="tabpanel" class="tab-pane" id="yieldloss">
                <!--<h3 class="">Yield Loss & Economics</h3>-->
                
                
                        <div class="row ">
                            <div class="col-lg-6 col-sm-12">
                             <label for="exampleInputPassword1">Yield Loss %</label>
                                <textarea rows="3" type="text" name="yieldloss" id="yieldloss" class="form-control" > </textarea>
                            </div>
                        </div>
                
                        <div class="row ">
                            <div class="col-lg-6 col-sm-12">
                                <label for="exampleInputPassword1">Economic Loss</label>
                                <textarea rows="3" type="text" name="economicloss" id="economicloss" class="form-control" > </textarea>
                            </div>
                        </div>
                
                    
                 <br>
                <a class="btn btn-primary back" onclick="return previousTab();">Previous</a>
                <a class="btn btn-primary continue" onclick="return nextTab();">Next</a>
              </div>
            
              <div role="tabpanel" class="tab-pane" id="additionalinfo">
                <h3 class="">Additional Information</h3>
            
                <div class="row ">
                            <div class="col-lg-6 col-sm-12">
                                
                                <textarea rows="3" type="text" name="additionalinfo" id="additionalinfo" class="form-control" > </textarea>
                            </div>
                        </div>
                <br>
                <a class="btn btn-primary back" onclick="return previousTab();">Previous</a>
                <!--<a class="btn btn-primary" >Submit</a>-->
              </div>
            </div>
            
        
			</div>

		   
            <div id="push"></div>
        
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>
      
      
      
        <!-- /.modal -->
	  
	  </form> 
      <!-- /.box -->
      
      
      
      
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
                                                        <input list="name-genus" name="name_genus" id="name_genus" class="form-control select2" >
                                                            <datalist id="name-genus" >
                                                    
                                                            </datalist>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <label>Species</label>
                                                        <input list="name-species" name="name_species" id="name_species" class="form-control select2" >
                                                            <datalist id="name-species" >
                                                    
                                                            </datalist>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8 col-sm-12">
                                                        <label>Author</label>
                                                        <input list="name-author" name="name_author" id="name_author" class="form-control select2" >
                                                            <datalist id="name-author" >
                                                    
                                                            </datalist>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label>Year</label>
                                                        <input list="name-year" name="name_year" id="name_year" class="form-control select2" >
                                                
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
                                            <input list="accepted-genus" name="accepted_genus" id="accepted_genus" class="form-control select2" >
                                                <datalist id="accepted-genus" >
                                                    
                                                </datalist>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label>Accepted Species</label>
                                            <input list="accepted-species" name="accepted_species" id="accepted_species" class="form-control select2" >
                                                <datalist id="accepeted-species" >
                                                    
                                                </datalist>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-sm-12">
                                            <label>Accepted Author</label>
                                            <input list="accepted-author" name="accepted_author" id="accepted_author" class="form-control select2" >
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
                                                    <input list="classification-order" name="classification_order" id="classification_order" class="form-control select2" >
                                                        <datalist id="classification-order" >
                                                    
                                                        </datalist> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label>Family</label>
                                                        <input list="classification-family" name="classification_family" id="classification_family" class="form-control select2" >
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
    	                        <table class="table table-bordered">
    	                            <thead>
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
                                                    <input list="synonyms-genus" name="synonyms_genus" id="synonyms_genus" class="form-control select2" >
                                                        <datalist id= "synonyms-genus" >
                                                    
                                                        </datalist>
                                                </td>
                                                <td>
                                                    <input type="text" name="synonyms-species" id="synonyms-species" class="form-control select2" >
                                                            
                                                </td>
                                                <td>
                                                    <input type="text" name="synonyms-author" id="synonyms-author" class="form-control select2" >
                                                            
                                                </td>
                                                <td>
                                                    <input type="text" name="synonyms-year" id="synonyms-year" class="form-control select2" >
                                                            
                                                </td>
                                                <td>
                                                    <input type="text" name="synonyms-pdf" id="synonyms-pdf" class="form-control select2" >
                                                            
                                                </td>
                                                <td>
                                                    <input type="text" name="synonyms-url" id="synonyms-url" class="form-control select2" >
                                                            
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
            
                <strong>Copyright &copy; <a href="">Paatashalas.com</a>.</strong> 
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
      
    //   var row = document.getElementById(trId); // find row to copy
    //   var table = document.getElementById(tbId); // find table to append to
    //   var clone = row.cloneNode(true); // copy children too
    
    //   clone.id = trId;  // change id or other attributes/contents
    //   table.appendChild(clone); // add new row to end of table
      
      var tbid = tbId;
      vartbidFirst = $('#' + tbid)
      var clonedRow = $('#' + tbid).clone();
      clonedRow.find('input').val('');
      var htmlRow = $(clonedRow).html();
      $('#' + tbid).append(htmlRow);

    }
    
    
    function deleteRow(tbId,trId) {
    
    var tbid = tbId;
    var trid = trId;
	$('#' + trid).each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
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
      var input = document.getElementById('worlddistribution_world');
      var autocomplete = new google.maps.places.Autocomplete(input);
      
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAisw1A-g7XKtzgUFhCUuHuFWdNqvy7gAw&libraries=places"></script>
</body>
</html>
