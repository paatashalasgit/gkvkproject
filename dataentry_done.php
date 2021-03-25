<?php
include("connection.php");
include('session.php');

function reArrayFiles($file)
{
    $file_ary = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);
   
    for($i=0;$i<$file_count;$i++)
    {
        foreach($file_key as $val)
        {
            $file_ary[$i][$val] = $file[$val][$i];
        }
    }
    return $file_ary;
}

if(isset($_POST['submit_dataentry']))
{
    $genus   = $_POST['select-genus'];
    $species = $_POST['selectspecies'];
    $type    = $_POST['s-t'];
    
    session_start();
    $source_entry_id = $_SESSION['source_entry_id'];
    
  $r_paperno = mysql("select paper_no from source_entry where source_entry_id  = '$source_entry_id' ");
  
  list($paper_no) = mysql_fetch_row($r_paperno);
    
    $r1 = mysql_query("insert into data_entry(source_entry_id, genus, species, type) values (  '$source_entry_id' ,'$genus', '$species', '$type')");
    
    $r2 =mysql_query("select max(data_entry_id) from data_entry");
    list($data_entry_id) = mysql_fetch_row($r2);
    
    $r3 = mysql_query("insert into taxonomy(data_entry_id) value($data_entry_id)");
    
    $r4 = mysql_query("select max(taxonomy_id) from taxonomy");
    list($taxonomy_id) = mysql_fetch_row($r4);
    
    
    
    $common_name_count = count($_POST['commonname_name']);    
    $common_name_query = "insert into common_name(taxonomy_id, common_name, language) values ( ' $data_entry_id ' ,";
    $common_name_query_value = "";
    for ($i=0; $i<$common_name_count; $i++){
        
        $commonname_name = $_POST["commonname_name"][$i];
        $commonname_language = $_POST["commonname_language"][$i];
        $r5 =mysql_query( "insert into common_name (taxonomy_id, common_name, language) values ('$taxonomy_id','$commonname_name', '$commonname_language')");
    }
    
    
    $vernacular_name_count = count($_POST['localname_name']);    
    
    for ($i=0; $i<$vernacular_name_count; $i++){
        
        $vernacular_name = $_POST["localname_name"][$i];
        $vn_language = $_POST["localname_language"][$i];
        $r6   =mysql_query( "insert into vernacular_name (taxonomy_id, vernacular_name, language) values ('$taxonomy_id','$vernacular_name', '$vn_language')");
    }

    
    $world_distribution_count = count($_POST['worlddistribution_world']);
    
    for($i=0; $i<$world_distribution_count; $i++){
        $world_distribution = 	$_POST['worlddistribution_world'][$i];
        
        $r7 = mysql_query("insert into distribution(data_entry_id, world_distribution ) values ('$data_entry_id', '$world_distribution' )");
        
        // echo "<script> alert('$r7') </script>";
    }
    
    $india_distribution_count = count($_POST['indiadistribution_states']);
    
    for($i=0; $i<$india_distribution_count; $i++){
        $india_distribution = 	$_POST['indiadistribution_states'][$i];
        
        $r8 = mysql_query("insert into india_distribution(data_entry_id, india_distribution ) values ('$data_entry_id', '$india_distribution' )");
    
        // echo "<script> alert('$india_distribution') </script>";
    }
    

    
    $introduction = 	$_POST['introduction'];
    $stage_pest_attack = 	$_POST['stageofpests_attacked'];
    $oviposition_site = 	$_POST['oviposition'];
    $pupation_site = 	$_POST['pupation'];
    $diapause = 	$_POST['diapause'];
    
       
    
    $r9 = mysql_query("insert into introduction	( data_entry_id , introduction, stage_pest_attack,	oviposition_site,	pupation_site,	diapause) values ( '$data_entry_id' , '$introduction', '$stage_pest_attack' ,'$oviposition_site' ,'$pupation_site' ,'$diapause' )");


    $r10 = mysql_query("select max(introduction_id) from introduction");
    list($introduction_id) = mysql_fetch_row($r10);
   
   //Introduction_image db code
   
    $symptoms_count = count($_POST['symptoms_ppa']);
    
    for($i=0; $i<$symptoms_count;$i++){
         $plantpart_affected	= $_POST['symptoms_ppa'][$i];
         $damage_symptoms = 	$_POST['symptoms_damage'][$i];
         
         $r11 = mysql_query("insert into symptoms(introduction_id, plantpart_affected, damage_symptoms) values('$introduction_id', '$plantpart_affected', '$damage_symptoms')");
    }
    
     $r12 = mysql_query("select max(symptoms_id) from symptoms");
    list($symptoms_id) = mysql_fetch_row($r12);
    
    // $image_symptoms = $_POST['symptoms_image'];
    
    $alternate_hosts_count = count($_POST['alternatehost_sn']);
    
    for ($i=0;$i<$alternate_hosts_count;$i++){
        $scientific_name = 	$_POST['alternatehost_sn'][$i];
        $common_name_ah = $_POST['alternatehost-cn'][$i];
        $r13 = mysql_query("insert into alternate_hosts(introduction_id, scientific_name, common_name) values ('$introduction_id', '$scientific_name', '$common_name_ah') ");
    }
    
    
    
    $life_cycle_fc = 	$_POST['lifecyclefield'];
    $life_cycle_lc =	$_POST['lifecyclelab'];
    $bio_ecology = 	$_POST['bioecology'];
    
    $r14 = mysql_query("insert into life_cycle_ecology (data_entry_id, life_cycle_fc, life_cycle_lc, bio_ecology) values('$data_entry_id', '$life_cycle_fc', '$life_cycle_lc', '$bio_ecology')");
    
    // $image_life_cycle = $_POST['address'];
    
     $rlcimage = mysql_query("select max(life_cycle_id) from life_cycle_ecology");
    list($life_cycle_id) = mysql_fetch_row($rlcimage);
    
    
    
    $cultural_control = 	$_POST['culturalcontrol'];
    $mechanical_control	= $_POST['mechanicalcontrol'];
    $physical_control = 	$_POST['physicalcontrol'];
    $etl = $_POST['etl'];
    
    $r15 = mysql_query("insert into prevention_manage (data_entry_id, cultural_control, mechanical_control, physical_control, etl) values('$data_entry_id', '$cultural_control', '$mechanical_control', '$physical_control', '$etl')");
    
    
    $r16 = mysql_query("select max(prevention_manage_id) from prevention_manage");
    list($prevention_manage_id) = mysql_fetch_row($r16);
    
    
    $chemical_control_count = count($_POST['chemicalcontrol_moa']);
    
    for ($i=0;$i<$chemical_control_count;$i++){
        
        $method = 	$_POST['chemicalcontrol_moa'][$i];
        $insecticide_name = 	$_POST['chemicalcontrol-in'][$i];
        $weight	= $_POST['chemicalcontrol-weight'][$i];
        $bio_pesticide = $_POST['chemicalcontrol-bp'][$i]; 	
        $stageof_plant =	$_POST['chemicalcontrol-sop'][$i];
        $trade_name = 	$_POST['chemicalcontrol-tn'][$i];
        $company_name = $_POST['chemicalcontrol-cm'][$i];    
       
        $r17 = mysql_query("insert into chemical_control(prevention_manage_id, method, insecticide_name, weight, bio_pesticide, stageof_plant, trade_name, company_name ) 
                                values('$prevention_manage_id', '$method', '$insecticide_name', '$weight', '$bio_pesticide', '$stageof_plant', '$trade_name', '$company_name')");
    }
    
    
    $biological_control_count = count($_POST['biologicalcontrol_name']);
    
    for ($i=0;$i<$biological_control_count;$i++){
        
        $bc_name = 	$_POST['biologicalcontrol_name'][$i];
        $bio_agents = 	$_POST['biologicalcontrol-ba'][$i];
        $dosage = $_POST['biologicalcontrol-dosage'][$i];
        
        $r18 = mysql_query("insert into biological_control(prevention_manage_id, bc_name, bio_agents, dosage) values ('$prevention_manage_id', '$bc_name', '$bio_agents', '$dosage')");
        
    }
    
    $resistants_count = count($_POST['resistant_name']);
    for ($i=0;$i<$resistants_count;$i++){
        $resistants = $_POST['resistant_name'][$i];
        $r19 = mysql_query("insert into resistant_tolarant(prevention_manage_id, resistants) values ('$prevention_manage_id', '$resistants')");
    }
   
    $ne_count = count($_POST['naturalenemies_name']);
    for ($i=0;$i<$ne_count;$i++){
        $ne_name = 	$_POST['naturalenemies_name'][$i];
        $predator = 	$_POST['naturalenemies-type'][$i];
        $stage_pests_attacked = $_POST['naturalenemies-sopa'][$i];
        $r20 = mysql_query("insert into natural_enemies(data_entry_id, ne_name, predator, stage_pests_attacked) values ('$data_entry_id', '$ne_name', '$predator', '$stage_pests_attacked' )");
        
    }
 
    $yield_loss =	$_POST['yieldloss'];
    $economic_loss = $_POST['economicloss'];
    
    $r21 = mysql_query("insert into yield_loss(data_entry_id, yield_loss, economic_loss) values ('$data_entry_id', '$yield_loss', '$economic_loss' )");
    
    
    $additional_info = $_POST['additionalinfo'];
    
    $r22 = mysql_query("insert into additional_info(data_entry_id, additional_info) values ('$data_entry_id', '$additional_info')");
    
    
    $introFilesToUpload = $_FILES['introfiles'];
    //echo "File ".$fileToUpload;
    if(!empty($introFilesToUpload))
    {
        $img_desc = reArrayFiles($introFilesToUpload);
        $i=1;
        
        foreach($img_desc as $val)
        {
            $randomnum = rand(10,100);
            $newname = $data_entry_id.'_'.$introduction_id.'_'.$randomnum.'.jpg';
            move_uploaded_file($val['tmp_name'],'./images/introduction/'.$newname);
            $imagepath = "./images/introduction/".$newname;
            $q23 = "Insert into introduction_image (introduction_id, image) Values ('$introduction_id','$imagepath')";
	        $r23 = mysql_query($q23) or die('Error, query failed ');
        }
    }
    
    
    
    $lifecycleFilesToUpload = $_FILES['lifecyclefiles'];
    // echo "File ".$fileToUpload;
    if(!empty($lifecycleFilesToUpload))
    {
        $img_desc = reArrayFiles($lifecycleFilesToUpload);
        $i=1;
        
        foreach($img_desc as $val)
        {
            $randomnumlifecycle = rand(10,100);
            $newnamelifecycle = $data_entry_id.'_'.$life_cycle_id.'_'.$randomnumlifecycle.'.jpg';
            move_uploaded_file($val['tmp_name'],'./images/lifecycle/'.$newnamelifecycle);
            $imagepath = "./images/lifecycle/".$newnamelifecycle;
            $q_li = "insert into life_cycle_ecology_image (life_cycle_id, image_life_cycle) values ('$life_cycle_id','$imagepath')";
	        $r_li = mysql_query($q_li) or die('Error, query failed ');
        }
    }
    
    
    $symptomsFilesToUpload = $_FILES['symptomsfiles'];
    // echo "File ".$fileToUpload;
    if(!empty($symptomsFilesToUpload))
    {
        $img_desc = reArrayFiles($symptomsFilesToUpload);
        $i=1;
        
        foreach($img_desc as $val)
        {
            $randomnumsymptoms = rand(10,100);
            $newnamesymptoms = $data_entry_id.'_'.$introduction_id.'_'.$randomnumsymptoms.'.jpg';
            move_uploaded_file($val['tmp_name'],'./images/symptoms/'.$newnamesymptoms);
            $imagepath = "./images/symptoms/".$newnamesymptoms;
            $q_s = "insert into symptoms_image (introduction_id, image_symptoms) values ('$introduction_id','$imagepath')";
	        $r_s = mysql_query($q_s) or die('Error, query failed ');
        }
    }
    
    
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
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user_check; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  User - User Role
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
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
      <!--<ol class="breadcrumb">-->
      <!--  <li><a href="index.php"> Home</a></li>-->
      <!--  <li><a href="entersource.php"> Source Entry</a></li>-->
      <!--  <li class="active">Data Entry</li>-->
      <!--</ol>-->
    </section>
    
   

    <!-- Main content -->
    <section class="content">
      
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Entry Success</h3>

          
        </div>
        <div class="box-body" style="text-align:center;">
          The Entries have been successfully added
        </div>
        <!-- /.box-body -->
        <div class="box-footer"style="text-align:center;">
          Go back to <a href="index.php">Home Page</a> 
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

      
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

 

<?php

header( "location=view_source.php?paperno=".$paper_no."" );


?>

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
