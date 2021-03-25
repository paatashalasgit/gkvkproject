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
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
                <h1>
                    Welcome to GKVK
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Crop Lists</li>
                </ol>
            </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Crops Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>DATE</th>
                  <th>PAPER NO</th>
                  <th>CROP NAME</th>
                  <th>GENUS NAME</th>
                  <th>SPECIES NAME</th>
                  <th>FAMILY NAME</th>
                  <th>ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                    
                    
                    <?php
                    
                    $r1= mysql_query("select se.time_entered, se.paper_no, se.resource_name, spe.name_species, spe.name_genus, spe.classification_family, se.last_modified
                                        from source_entry se
                                        left outer join data_entry de on se.source_entry_id = de.source_entry_id
                                        left outer join species_entry spe on de.species = spe.name_species order by se.paper_no desc ");
                        
                        if ($user_role == "admin"){
                        $i=1;
                        // <td>".date('d-m-Y', strtotime($date))."</td>
                    	while(list($date, $paper_no,$resource_name,$species,$genus,$family,$last_modified)=mysql_fetch_array($r1)){
                    	     
                                if($last_modified === '0000-00-00 00:00:00'){
                                    $last_date = date('d-m-Y', strtotime($date));
                                }
                                else{
                                    $last_date = $last_modified;
                                }
                    	    echo "
                    	        <tr>
                                     
                                     <td>".$last_date."</td>
                                     <td>".$paper_no."</td>
                                     <td>".$resource_name."</td>
                                     <td>".$genus."</td>
                                     <td>".$species."</td>
                                     <td>".$family."</td>
                                     <td>
                                        <div class='text-center'>
                                            <a class='btn btn-social-icon btn-bitbucket' href='view_source.php?paperno=".$paper_no."' data-toggle='tooltip' title='View'><i class='fa fa-book'></i></a>
                                            <a class='btn btn-social-icon btn-dropbox'   href='edit_sourceentry.php?paperno=".$paper_no."' data-toggle='tooltip' title='Edit'><i class='fa fa-edit'></i></a>
                                            <a class='btn btn-social-icon btn-google'  onClick=\"javascript: return confirm('Please confirm deletion');\" href='delsource.php?paperno=".$paper_no."' data-toggle='tooltip' title='Delete'><i class='fa fa-trash'></i></a>
                                        </div>    
                                    </td>
                                </tr>
                    	    
                    	    ";
                    	    $i++;
                     	}
                   
                        }
                        else{
                            $j=1;
                            while(list($date,$paper_no,$resource_name,$species,$genus,$family,$last_modified)=mysql_fetch_array($r1)){
                                
                                if($last_modified === '0000-00-00 00:00:00'){
                                    $last_date = date('d-m-Y', strtotime($date));
                                }
                                else{
                                    $last_date = $last_modified;
                                }
                    	    
                    	    echo "
                    	        <tr>
                                     <td>".$last_date."</td>
                                     <td>".$paper_no."</td>
                                     <td>".$resource_name."</td>
                                     <td>".$species."</td>
                                     <td>".$genus."</td>
                                     <td>".$family."</td>
                                     <td>
                                        <div class='text-center'>
                                            <a class='btn btn-social-icon btn-bitbucket' href='view_source.php?paperno=".$paper_no."' data-toggle='tooltip' title='View'><i class='fa fa-book'></i></a>
                                            <a class='btn btn-social-icon btn-dropbox'   href='edit_sourceentry.php?paperno=".$paper_no."' data-toggle='tooltip' title='Edit'><i class='fa fa-edit'></i></a>
                                            
                                        </div>    
                                    </td>
                                </tr>
                    	    
                    	    ";
                    	    $j++;
                     	}
                            
                            
                        }
                    
                    ?>
                
                
              
                </tbody>
                <tfoot>
                <tr>
                  <th>DATE</th>
                  <th>PAPER NO</th>
                  <th>CROP NAME</th>
                  <th>GENUS NAME</th>
                  <th>SPECIES NAME</th>
                  <th>FAMILY NAME</th>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright <a href="">GKVK</strong>.
  </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>


<script>
  $(function () {
    // $('#example1').DataTable()
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>


