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
    
     $q_sourceentryid = "select max(source_entry_id) from source_entry ";
    $r_sourceentryid = mysql_query($q_sourceentryid);
    list($source_entry_id) = mysql_fetch_row($r_sourceentryid);
    
    $_SESSION['source_entry_id'] = $source_entry_id;
   
    // $last_id = mysql_insert_id($q1);
 
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

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAisw1A-g7XKtzgUFhCUuHuFWdNqvy7gAw&libraries=places"></script>

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
      
   
	  
	  <form action="dataentry_done.php" method="post"  enctype="multipart/form-data">    
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
                        <input list="st" name="s-t" id="s-t" class="form-control select2" style="width: 100%;" onkeyup="dropDown(this.value,'st')">
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
                        <input list="select-species" name="selectspecies" id="selectspecies" class="form-control select2" style="width: 100%;" onkeyup="dropDown(this.value,'select-species')">
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
                                <table class="table table-bordered" id="commonname">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Language</th>
                                            <th>Common Name</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-commonnametable">
                                        <tr id="clone-commonnamerow">
                                            <td>
                                                <button type="button" class="btn btn-block btn-danger" onclick="delRow(this,'commonname')"><i class="fa fa-fw fa-close"></i></button>
                                            </td>
                                            <td>
                                                <input list="commonname-language" name="commonname_language[]" id="commonname_language[]" class="form-control select2" onkeyup="dropDown(this.value,'commonname-language')" >
                                                    <datalist id="commonname-language" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input list="commonname-name" name="commonname_name[]" id="commonname_name[]" class="form-control select2" onkeyup="dropDown(this.value,'commonname-name')" >
                                                        <datalist id="commonname-name" >
                                                
                                                        </datalist>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <INPUT type="button" value="Add Row" onclick="cloneRow('modify-commonnametable','clone-commonnamerow')" />
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
                                            <th>&nbsp;</th>
                                            <th>Language</th>
                                            <th>Common Name</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-localnametable">
                                        <tr id="clone-localnamerow">
                                            <td>
                                                <button type="button" class="btn btn-block btn-danger" onclick="delRow(this,'localname')"><i class="fa fa-fw fa-close"></i></button>
                                            </td>
                                            <td>
                                                <input list="localname-language" name="localname_language[]" id="localname_language[]" class="form-control select2" onkeyup="dropDown(this.value,'localname-language')">
                                                    <datalist id="localname-language" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input list="localname-name" name="localname_name[]" id="localname_name[]" class="form-control select2" onkeyup="dropDown(this.value,'localname-name')" >
                                                        <datalist id="localname-name" >
                                                
                                                        </datalist>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <INPUT type="button" value="Add Row" onclick="cloneRow('modify-localnametable','clone-localnamerow')" />
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
                                <table class="table table-bordered" id="worlddistribution">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>World Distribution</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-worlddistribution">
                                        <tr id="clone-worlddistribution">
                                            <td>
                                                <button type="button" class="btn btn-block btn-danger" onclick="delRow(this,'worlddistribution')"><i class="fa fa-fw fa-close"></i></button>
                                            </td>
                                            <td>
                                                <input type="text"  name="worlddistribution_world" id="worlddistribution_world" class="form-control select2" >
                                                    
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
                                <table class="table table-bordered" id="indiadistribution">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>States</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-indiadistribution">
                                        <tr id="clone-indiadistribution">
                                            <td>
                                                <button type="button" class="btn btn-block btn-danger" onclick="delRow(this,'indiadistribution')"><i class="fa fa-fw fa-close"></i></button>
                                            </td>
                                            <td>
                                                <input type="text" name="indiadistribution_states" id="indiadistribution_states" class="form-control select2" >
                                                    
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
                            <input list="stageofpest-sattacked" name="stageofpests_attacked" id="stageofpests_attacked" class="form-control select2" onkeyup="dropDown(this.value,'stageofpests-attacked')" >
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
                        <label for="exampleInputPassword1">Upload Images</label>
                            <!--<input type="file" name="introduction_image[]" id="introduction_image" multiple="multiple">-->
                            <!--<input type="submit" value="Upload Image" name="submit">                    -->
                            <table id="introtableattach" class="table table-bordered" width="50%">
            				<!--<thead>
            					<tr class="text-center">
            						<th colspan="3" style="height:50px;">Mutiple File Upload Script</th>	
            					</tr>
            				</thead>-->
            				<tbody id="introtableattachtbody">
            					<tr class="add_row">
            						<td width="60%"><input class="file" name='introfiles[]' type='file'/></td>
            						<td width="20%"><img src="" alt="Image not Uploaded" height="50" width="50" name="introimage[]" /></td>
            						<td width="20%"></td>
            					</tr>
            				</tbody>
            				<tfoot>
            					<tr>
            						<td colspan="4"><button class="btn btn-success btn-sm" type="button" id="add" title='Add new file'/>Add new file</button></td>
            					</tr>
            					<tr class="last_row">
            						<td colspan="4" style="text-align:center;"><button class="btn btn-primary submit" name="btnSubmit" type='submit'>Upload Files</button></td>
            					</tr>
            				</tfoot>	
            			</table>
                            
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12" id="introduction_image_preview">
                        <ul class="nav navbar-nav">
                            
                        </ul>              
                            
                    </div>
                </div>
                    
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <label for="exampleInputPassword1">Symptoms</label>
                            <table class="table table-bordered" id="symptoms">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Plant Part Affected</th>
                                            <th>Damage Symptoms</th>
                                            <th>Images</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-symptoms">
                                        <tr id="clone-symptoms">
                                            <td>
                                                <button type="button" class="btn btn-block btn-danger" onclick="delRow(this,'symptoms')"><i class="fa fa-fw fa-close"></i></button>
                                            </td>
                                            <td>
                                                <input list="symptoms-ppa" name="symptoms_ppa[]" id="symptoms_ppa[]" class="form-control select2" onkeyup="dropDown(this.value,'symptoms-ppa')" >
                                                    <datalist id="symptoms-ppa" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input list="symptoms-damage" name="symptoms_damage[]" id="symptoms_damage[]" class="form-control select2"  onkeyup="dropDown(this.value,'symptoms-damage')">
                                                        <datalist id="symptoms-damage" >
                                                
                                                        </datalist>
                                            </td>
                                            <td>
                                                <input type="file" name="symptoms_image[]" id="symptoms_image" multiple="multiple"><span id="symptoms_image_preview"><ul class="nav navbar-nav"></ul></span>
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
                            <table class="table table-bordered" id="alternatehost">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Scientific Name</th>
                                            <th>Common Name</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="modify-alternatehost">
                                        <tr id="clone-alternatehost">
                                            <td>
                                                <button type="button" class="btn btn-block btn-danger" onclick="delRow(this,'alternatehost')"><i class="fa fa-fw fa-close"></i></button>
                                            </td>
                                            
                                            <td>
                                                <input list="alternatehost-sn" name="alternatehost_sn[]" id="alternatehost_sn[]" class="form-control select2" onkeyup="dropDown(this.value,'alternatehost-sn')">
                                                    <datalist id= "alternatehost-sn" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input list="alternatehost-cn" name="alternatehost-cn[]" id="alternatehost-cn[]" class="form-control select2" onkeyup="dropDown(this.value,'alternatehost-cn')" >
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
                            <table class="table table-bordered" id="chemicalcontrol">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
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
                                                <button type="button" class="btn btn-block btn-danger" onclick="delRow(this,'chemicalcontrol')"><i class="fa fa-fw fa-close"></i></button>
                                            </td>
                                            <td>
                                                <input list="chemicalcontrol-moa" name="chemicalcontrol_moa[]" id="chemicalcontrol_moa[]" class="form-control select2" onkeyup="dropDown(this.value,'chemicalcontrol-moa')" >
                                                    <datalist id= "chemicalcontrol-moa" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-in[]" id="chemicalcontrol-in[]" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-weight[]" id="chemicalcontrol-weight[]" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-bp[]" id="chemicalcontrol-bp[]" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-sop[]" id="chemicalcontrol-sop[]" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-tn[]" id="chemicalcontrol-tn[]" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="chemicalcontrol-cm[]" id="chemicalcontrol-cm[]" class="form-control select2" >
                                                        
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
                            <table class="table table-bordered" id="biologicalcontrol">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Name </th>
                                            <th>Bio Agents</th>
                                            <th>Dosage</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="modify-biologicalcontrol">
                                        <tr id="clone-biologicalcontrol">
                                            <td>
                                                <button type="button" class="btn btn-block btn-danger" onclick="delRow(this,'biologicalcontrol')"><i class="fa fa-fw fa-close"></i></button>
                                            </td>
                                            <td>
                                                <input list="biologicalcontrol-name" name="biologicalcontrol_name[]" id="biologicalcontrol_name[]" class="form-control select2" onkeyup="dropDown(this.value,'biologicalcontrol-name')" >
                                                    <datalist id= "biologicalcontrol-name" >
                                                
                                                    </datalist>
                                            </td>
                                            <td>
                                                <input type="text" name="biologicalcontrol-ba[]" id="biologicalcontrol-ba[]" class="form-control select2" >
                                                        
                                            </td>
                                            <td>
                                                <input type="text" name="biologicalcontrol-dosage[]" id="biologicalcontrol-dosage[]" class="form-control select2" >
                                                        
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
                            <table class="table table-bordered" id="resistant">
                                    
                                    <tbody id="modify-resistant">
                                        <tr id="clone-resistant">
                                            <td>
                                                <button type="button" class="btn btn-block btn-danger" onclick="delRow(this,'resistant')"><i class="fa fa-fw fa-close"></i></button>
                                            </td>
                                            <td>
                                                <input list="resistant-name" name="resistant_name[]" id="resistant_name[]" class="form-control select2" onkeyup="dropDown(this.value,'resistant-name')" >
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
                    <table class="table table-bordered" id="naturalenemies">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Name </th>
                                <th>Type</th>
                                <th>Stage of Pests Attacked</th>
                                            
                                            
                            </tr>
                        </thead>
                        <tbody id="modify-naturalenemies">
                            <tr id="clone-naturalenemies">
                                            
                                <td>
                                    <button type="button" class="btn btn-block btn-danger" onclick="delRow(this,'naturalenemies')"><i class="fa fa-fw fa-close"></i></button>
                                </td>
                                <td>
                                    <input list="naturalenemies-name" name="naturalenemies_name[]" id="naturalenemies_name[]" class="form-control select2" onkeyup="dropDown(this.value,'naturalenemies-name')" >
                                        <datalist id= "naturalenemies-name" >
                                                
                                        </datalist>
                                </td>
                                <td>
                                    <input type="text" name="naturalenemies-type[]" id="naturalenemies-type[]" class="form-control select2" >
                                                        
                                </td>
                                <td>
                                    <input type="text" name="naturalenemies-sopa[]" id="naturalenemies-sopa[]" class="form-control select2" >
                                                        
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
     
      var autocomplete = new google.maps.places.Autocomplete(world_input,{types: ['(cities)']});
      
      
      google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        
        document.getElementById('worlddistribution_world').innerHTML = near_place.formatted_address;

        });
        
    
      var autocomplete1 = new google.maps.places.Autocomplete(india_input,{
          types: ['(cities)'],
            country: ["in"]

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
		// Validation
		$(document).ready(function(){
			$('.submit').click(function(){
				var file_val = $('.file').val();
				if(file_val == "")
				{
					alert("Please select at least one file.");
					return false;
				}
				else{
					$('form').attr('action', 'index.php');
				}
			});
			
			// Append new row
			$('#introtableattach').on('click', "#add", function(e) {
				$('#introtableattachtbody').append('<tr class="add_row"><td><input name="introfiles[]" type="file"/></td><td><img src="" alt="Image not Uploaded" height="50" width="50" name="introimage[]" /></td><td class="text-center"><button type="button" class="btn btn-danger btn-sm" id="delete" title="Delete file">Delete file</button></td><tr>');
				e.preventDefault();
			});
			
			// Delete row
			$('#introtableattach').on('click', "#delete", function(e) {
				if (!confirm("Are you sure you want to delete this file?"))
				return false;
				$(this).closest('tr').remove();
				e.preventDefault();
			});
		});
		
		document.getElementsByName("introfiles[]")[0].onchange = function () {
        var reader = new FileReader();
        alert("Hello! I am an alert box!!");
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementsByName("introimage[]")[0].src = e.target.result;
        };
    
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
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
