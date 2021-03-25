<?php

include('session.php');
include('connection.php');


	if (isset($_GET['paperno'])){
	    
	    $paper_no = $_GET['paperno'];
	    
	    $r1 = mysql_query("select source_entry_id from source_entry where paper_no  = $paper_no ");
	    
	    list($source_entry_id) =  mysql_fetch_row($r1);
	    
	    $r2 = mysql_query("select resource_name, title, author, journal, volume, issue, page, year, publisher, url, email from source_entry where source_entry_id = $source_entry_id");
	    
	    list($resource_name, $title, $author, $journal, $volume, $issue, $page, $year, $publisher, $url, $email) = mysql_fetch_array($r2);
	    
	    $r3 = mysql_query("select data_entry_id, genus, species, type from data_entry where source_entry_id = $source_entry_id ");
	    
	    list($data_entry_id, $genus, $species, $type) = mysql_fetch_array($r3);
	    
	    
	    
	} 

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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-collapse">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Welcome to GKVK
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="list_crops.php">List Crops</a></li>
        <li class="active">View Source</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              

              <h3 class="profile-username text-center"><?php echo $resource_name; ?></h3>

              

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Species</b> <a class="pull-right"><?php echo $species; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Genus</b> <a class="pull-right"><?php echo $genus; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Type</b> <a class="pull-right"><?php echo $type; ?></a>
                </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Source Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong> Title</strong>

              <p class="text-muted">
                <?php echo $title; ?>
              </p>

              <hr>

              <strong> Author</strong>

              <p class="text-muted"><?php echo $author; ?></p>

              <hr>
              
              <strong> Journal</strong>

              <p class="text-muted"><?php echo $journal; ?></p>

              <hr>
              
              <strong> Volume</strong>

              <p class="text-muted"><?php echo $volume; ?></p>

              <hr>
              
              <strong> Issue</strong>

              <p class="text-muted"><?php echo $issue; ?></p>

              <hr>
              
              <strong> Page</strong>

              <p class="text-muted"><?php echo $page; ?></p>

              <hr>
              
              <strong> Year</strong>

              <p class="text-muted"><?php echo $year; ?></p>

              <hr>
              
              <strong> Publisher</strong>

              <p class="text-muted"><?php echo $publisher; ?></p>

              <hr>
              
              <strong> URL</strong>

              <p class="text-muted"><?php echo $url; ?></p>

              <hr>
              
              <strong> Email</strong>

              <p class="text-muted"><?php echo $email; ?></p>

              <hr>
                         

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      
        
        
        <div class="col-md-9">
        <div class="box box-default">   
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
                                                <th>Language</th>
                                                <th>Common Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="modify-commonnametable">
                                            <?php
                                            
                                            $r4 = mysql_query("select taxonomy_id from taxonomy where data_entry_id = $data_entry_id");
                                            list($taxonomy_id) = mysql_fetch_row($r4);
                                            
                                            $r5 = mysql_query("select common_name, language from common_name where taxonomy_id = $taxonomy_id ");
                                            
                                            while(list($common_name, $language) = mysql_fetch_array($r5))
                                            
                                                {
                                                echo 
                                                "
                                                    <tr id='clone-commonnamerow'>
                                            
                                                        <td>
                                                            $common_name

                                                        </td>
                                                        <td>
                                                        $language

                                                        </td>
                                                    </tr>
                                                
                                                ";
                                                
                                                }
        

                                            ?>                                        
                                        
                                        </tbody>
                                    </table>
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
                                                <th>Language</th>
                                                <th>Common Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="modify-localnametable">
                                            <?php
                                        
                                             $r6 = mysql_query("select vernacular_name, language from vernacular_name where taxonomy_id = $taxonomy_id ");
                                            
                                            while(list($vernacular_name, $language) = mysql_fetch_array($r6))
                                            
                                            {
                                                
                                                echo 
                                                "   
                                                    <tr id='clone-localnamerow'>
                                            
                                                    <td>
                                                    $vernacular_name

                                                    </td>
                                                    <td>
                                                    $language
                                                    </td>
                                                    </tr>
                                                
                                                ";
                                                
                                            }
                                        
                                        
                                            ?>
                                        
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                            
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
                                            <th>World Distribution</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-worlddistribution">
                                        
                                        <?php
                                            
                                            $r7 = mysql_query("select world_distribution from distribution where data_entry_id = $data_entry_id ");
                                            
                                            while(list($world_distribution) = mysql_fetch_array($r7))
                                            {
                                                
                                                echo 
                                                "
                                                    <tr id='clone-worlddistribution'>
                                            
                                                    <td>
                                                    $world_distribution

                                                     </td>       
                                                     </tr>
                                                
                                                ";
                                                
                                            }
                                            
                                        
                                        ?>
                                        
                                    </tbody>
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
                                            <th>States</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modify-indiadistribution">
                                        
                                        <?php
                                        
                                             $r8 = mysql_query("select india_distribution from india_distribution where data_entry_id = $data_entry_id ");
                                            
                                            while(list($india_distribution) = mysql_fetch_array($r8))
                                            {
                                                echo 
                                                "
                                                    <tr id='clone-indiadistribution'>
                                            
                                                        <td>
                                                        $india_distribution
                                                        

                                                         </td>       
                                                    </tr>
                                                
                                                ";
                                                
                                            }
                                        
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                            
                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="introduction">
                            
                            <?php
                        
                                 $r9 = mysql_query("select introduction_id, introduction, stage_pest_attack, oviposition_site, pupation_site, diapause from introduction where data_entry_id= $data_entry_id");
                        
                                list($introduction_id, $introduction, $stage_pest_attack, $oviposition_site, $pupation_site, $diapause) = mysql_fetch_array($r9);
                    
                            ?>
                            
                            
                            <div class="row ">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="exampleInputPassword1">Introduction</label>
                                    
                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php 
                                                echo $introduction;
                                            ?>
                                    </p>
                                        
                                </div>
                            </div>
                
                            <div class="row ">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="exampleInputPassword1">Stage of Pests Attacked</label>
                                    
                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $stage_pest_attack ;  ?>
                                    </p>
                                        
                                
                                </div>
                            </div>
                
                            <div class="row ">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="exampleInputPassword1">Oviposition Site</label>
                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $oviposition_site ;  ?>
                                    </p>
                                    
                                </div>
                    
                                
                            </div>
                            
                            <div class="row ">
                               <div class="col-lg-12 col-sm-12">
                                    <label for="exampleInputPassword1">Pupation Site</label>
                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $pupation_site ;  ?>
                                    </p>
                                    
                                </div>
                            </div>
                
                            <div class="row ">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="exampleInputPassword1">Diapause</label>
                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                           <?php echo $diapause ;  ?>
                                    </p>
                                    
                                </div>
                            </div>
                            
                            <div class="row ">
                                
                                <?php 
                                
                                $rim = mysql_query("Select ii.image from source_entry se join data_entry de on se.source_entry_id = de.source_entry_id join introduction i on de.data_entry_id = i.data_entry_id join introduction_image ii on ii.introduction_id = i.introduction_id where se.paper_no = $paper_no");
                        
                                while(list($introimage)=mysql_fetch_array($rim))
								{
								    //echo '<script>alert($introimage)</script>';
								    ?>
								        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
								            <a href = ""><img src="<?php echo $introimage; ?>" alt="Image not Uploaded" height="50" width="50" name="introimage"  onerror="this.style.display='none'" /></a>
								        </div>
								    <?php
								    
								}
                                
                                ?>
                                
                            </div>
                            
                            
                      
                
                        
                    
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="exampleInputPassword1">Symptoms</label>
                                        <table class="table table-bordered" id="symptoms">
                                            <thead>
                                                <tr>
                                                    <th>Plant Part Affected</th>
                                                    <th>Damage Symptoms</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="modify-symptoms">
                                        
                                                <?php 
                                                    $r10 = mysql_query("select plantpart_affected, damage_symptoms from symptoms where introduction_id  = $introduction_id ");
                                            
                                                    while(list ($plantpart_affected, $damage_symptoms) = mysql_fetch_array($r10))
                                            
                                                    {
                                                
                                                        echo
                                                "
                                                        <tr id='clone-symptoms'>
                                            
                                                            <td>
                                                            $plantpart_affected

                                                            </td>
                                                            <td>
                                                            $damage_symptoms
                                                                
                                                            </td>
                                                            
                                                        </tr>
                                                
                                                        ";
                                                    }
                                        
                                                ?>
                                        
                                       
                                            </tbody>
                                        </table>
                                         
                            <div class="row ">
                                
                                <?php 
                                
                                $r_si = mysql_query("Select ii.image_symptoms from source_entry se join data_entry de on se.source_entry_id = de.source_entry_id join introduction i on de.data_entry_id = i.data_entry_id join symptoms_image ii on ii.introduction_id = i.introduction_id where se.paper_no = $paper_no");
                        
                                while(list($symptomsimage)=mysql_fetch_array($r_si))
								{
								    //echo '<script>alert($introimage)</script>';
								    ?>
								        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
								            <a href = ""><img src="<?php echo $symptomsimage; ?>" alt="Image not Uploaded" height="50" width="50" name="symptomsimage"  onerror="this.style.display='none'" /></a>
								        </div>
								    <?php
								    
								}
                                
                                ?>
                                
                            </div>
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
                                                    <th>Scientific Name</th>
                                                    <th>Common Name</th>
                                            
                                                </tr>
                                            </thead>
                                            <tbody id="modify-alternatehost">
                                        
                                                <?php
                                       
                                                    $r11 = mysql_query("select scientific_name, common_name from alternate_hosts where introduction_id  = $introduction_id ");
                                            
                                                        while(list ($scientific_name, $common_name) = mysql_fetch_array($r11))
                                       
                                       
                                                {
                                           
                                                    echo
                                                        "
                                                            <tr id='clone-alternatehost'>
                                            
                                            
                                                        <td>
                                                        $scientific_name
                                                            
                                                        </td>
                                                        <td>
                                                        $common_name
                                                           
                                                        </td>
                                            
                                                    </tr>
                                            
                                                
                                                        ";
                                                }
                                       
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="lifecycle">
                            
                            
                          <?php
                            $r12 = mysql_query("select life_cycle_fc, life_cycle_lc, bio_ecology from life_cycle_ecology where data_entry_id = $data_entry_id");
                            
                            list($life_cycle_fc, $life_cycle_lc, $bio_ecology) = mysql_fetch_array($r12);
                            
                            
                        
                        ?>
                    
                    
                        <div class="row ">
                            <div class="col-lg-12 col-sm-12">
                                <label for="exampleInputPassword1">Life Cycle in Field Condition</label>
                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $life_cycle_fc; ?>
                                    </p>
                                
                            </div>
                        </div>
                
                        <div class="row ">
                            <div class="col-lg-12 col-sm-12">
                             <label for="exampleInputPassword1">Life Cycle in Lab Condition</label>
                             <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $life_cycle_lc; ?>
                                    </p>
                                
                            </div>
                        </div>
                
                        <div class="row ">
                            <div class="col-lg-12 col-sm-12">
                                <label for="exampleInputPassword1">Bio Ecology</label>
                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $bio_ecology; ?>
                                    </p>
                               
                            </div>
                        </div>
                        
                         
                            <div class="row ">
                                
                                <?php 
                                
                                $rle = mysql_query("Select ii.image_life_cycle from source_entry se join data_entry de on se.source_entry_id = de.source_entry_id join life_cycle_ecology i on de.data_entry_id = i.data_entry_id join life_cycle_ecology_image ii on ii.life_cycle_id = i.life_cycle_id where se.paper_no = $paper_no");
                        
                                while(list($leimage)=mysql_fetch_array($rle))
								{
								    //echo '<script>alert($introimage)</script>';
								    ?>
								        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
								            <a href = ""><img src="<?php echo $leimage; ?>" alt="Image not Uploaded" height="50" width="50" name="$leimage"  onerror="this.style.display='none'" /></a>
								        </div>
								    <?php
								    
								}
                                
                                ?>
                                
                            </div>
                    
                            
                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="prevention">
                            
                            <?php
                     $r13 = mysql_query("select prevention_manage_id, cultural_control, mechanical_control, physical_control, etl from prevention_manage where data_entry_id = $data_entry_id");
                            
                            list($prevention_manage_id, $cultural_control, $mechanical_control, $physical_control, $etl) = mysql_fetch_array($r13);
                  
                  
                  ?>
                    
                        <div class="row ">
                            <div class="col-lg-12 col-sm-12">
                                <label for="exampleInputPassword1">ETL</label>
                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $etl; ?>
                                    </p>
                                
                            </div>
                        </div>
                
                        <div class="row ">
                            <div class="col-lg-12 col-sm-12">
                             <label for="exampleInputPassword1">Cutural Control</label>
                              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $cultural_control; ?>
                                    </p>
                               
                            </div>
                        </div>
                
                        <div class="row ">
                            <div class="col-lg-12 col-sm-12">
                                <label for="exampleInputPassword1">Mechanical Control</label>
                                 <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $mechanical_control; ?> 
                                    </p>
                                
                            </div>
                        </div>
                        
                        <div class="row ">
                            <div class="col-lg-12 col-sm-12">
                                <label for="exampleInputPassword1">Physical Control</label>
                                 <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $physical_control; ?> 
                                    </p>
                                
                            </div>
                        </div>
                    
                
                        <div class="box">
                            <div class="box-body">
                                <label for="exampleInputPassword1">Chemical Control</label>
                                    <div class="row">
                                        <table class="table table-bordered" id="chemicalcontrol">
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
                                        
                                                    <?php
                                          
                                                        $r14 = mysql_query("select method, insecticide_name, weight, bio_pesticide	, stageof_plant, trade_name, company_name from chemical_control where prevention_manage_id = $prevention_manage_id ");
                                            
                                                        while(list($method, $insecticide_name, $weight, $bio_pesticide	, $stageof_plant, $trade_name, $company_name) = mysql_fetch_array($r14))
                                            
                                                        {
                                                
                                                            echo
                                                            "
                                                        <tr id='clone-chemicalcontrol'>
                                            
                                                <td>
                                                $method
                                                 
                                                    
                                                </td>
                                                <td>
                                                $insecticide_name
                                                    
                                                        
                                                </td>
                                                <td>
                                                $weight
                                                    
                                                        
                                                </td>
                                                <td>
                                                $bio_pesticide
                                                    
                                                        
                                                </td>
                                                <td>
                                                $stageof_plant
                                                    
                                                        
                                                </td>
                                                <td>
                                                $trade_name
                                                    
                                                        
                                                </td>
                                                <td>
                                                $company_name
                                                    
                                                        
                                                </td>
                                            </tr>
                                                
                                                ";
                                                
                                            }
                                            
                                                    ?>
                                        
                                            </tbody>
                                        </table>
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
                                            
                                                <th>Name </th>
                                                <th>Bio Agents</th>
                                                <th>Dosage</th>
                                            
                                            
                                            </tr>
                                        </thead>
                                        <tbody id="modify-biologicalcontrol">
                                        
                                            <?php
                                            
                                                $r15 = mysql_query("select bc_name,bio_agents,dosage from biological_control where prevention_manage_id = $prevention_manage_id ");
                                            
                                                while(list($bc_name,$bio_agents,$dosage) = mysql_fetch_array($r15))
                                            
                                            
                                                {
                                                
                                                    echo
                                                    "
                                                        <tr id='clone-biologicalcontrol'>
                                            
                                                <td>
                                                $bc_name
                                                    
                                                    
                                             </td>
                                                <td>
                                                $bio_agents
                                                    
                                                        
                                                </td>
                                                <td>
                                                $dosage
                                                    
                                                        
                                                </td>
                                            
                                            </tr>
                                                    
                                                ";
                                                
                                            }
                                            
                                        
                                            ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
           
                
                        <div class="box">
                            <div class="box-body">
                                <label for="exampleInputPassword1">Resistant / Tolerant Varities</label>
                                    <div class="row">
                                        <table class="table table-bordered" id="resistant">
                                    
                                            <tbody id="modify-resistant">
                                    
                                                <?php
                                    
                                                    $r16 = mysql_query("select resistants from resistant_tolarant  where prevention_manage_id = $prevention_manage_id ");
                                            
                                                        while(list($resistants) = mysql_fetch_array($r16))
                                            
                                            
                                                        {
                                                
                                                         echo
                                                
                                                            "
                                                                <tr id='clone-resistant'>
                                            
                                                        <td>
                                                        $resistants

                                                        </td>
                                            
                                            
                                                            </tr>
                                                
                                                            ";
                                                        }
                                    
                                                ?>
                                    
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                 </div>
                            </div>
                
    
                            
                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="naturalenemies">
                            
                      <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <table class="table table-bordered" id="naturalenemies">
                                    <thead>
                                        <tr>
                                            <th>Name </th>
                                            <th>Type</th>
                                            <th>Stage of Pests Attacked</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="modify-naturalenemies">
                            
                            
                                    <?php
                            
                                        $r17 = mysql_query("select ne_name, predator, stage_pests_attacked from natural_enemies where data_entry_id = $data_entry_id");
                                
                                        while(list($ne_name, $predator, $stage_pests_attacked) = mysql_fetch_array($r17))
                                
                                        {
                                    
                                            echo
                                    
                                            "
                                                <tr id='clone-naturalenemies'>
                                            
                                
                                                    <td>
                                                    $ne_name
                                                        
                                        
                                                    </td>
                                                    <td>
                                                    $predator
                                                        
                                                        
                                                    </td>
                                                    <td>
                                                    $stage_pests_attacked
                                                        
                                                         
                                                    </td>
                                            
                                                </tr>
                                      
                                            ";
                                    
                                        }
                            
                                    ?>
                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        
                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="yieldloss">
                            
                            
                              
                    <?php
                  
                  $r18 = mysql_query("select yield_loss, economic_loss	 from yield_loss where data_entry_id = $data_entry_id");
                                
                                list($yield_loss, $economic_loss) = mysql_fetch_array($r18);
                                
                  ?>
                    
                        <div class="row ">
                            <div class="col-lg-12 col-sm-12">
                             <label for="exampleInputPassword1">Yield Loss %</label>
                             <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                           <?php echo $yield_loss;?>
                                    </p>
                                
                            </div>
                        </div>
                
                        <div class="row ">
                            <div class="col-lg-12 col-sm-12">
                                <label for="exampleInputPassword1">Economic Loss</label>
                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $economic_loss;?>
                                    </p>
                                
                            </div>
                        </div>
                
                            
                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="additionalinfo">
                            
                             <h3 class="">Additional Information</h3>
                    
                    <?php
                     $r19 = mysql_query("select additional_info	 from additional_info where data_entry_id = $data_entry_id");
                                
                                list($additional_info) = mysql_fetch_array($r19);
                    ?>
                    <div class="row ">
                            <div class="col-lg-12 col-sm-12">
                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                           <?php echo $additional_info;?> 
                                    </p>
                                
                                
                            </div>
                    </div>
                    
                            
                        </div>
                    </div>
                    
                </div>
        </div>    
        </div>
        
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="text-align:center;">
            
                <strong>Copyright &copy; <a href="">GKVK</a>.</strong> 
        </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


  <script type="text/javascript">
    function nextTab () {
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
    }
    
    function previousTab () {
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    }
    
</script>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
