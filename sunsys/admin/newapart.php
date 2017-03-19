<?php
// Inialize session
session_start();
include '../connection/conn.php';
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userid']) && isset($_SESSION['category'])) {
  switch($_SESSION['category']) {

    case 1:
      header('location:../index.php');//redirect to  page
      break;

    case 2:
      header('location:../index.php');//redirect to  page
      break;

    case 3:
      header('location:../index.php');//redirect to  page
      break;

  }
}else
{

  header('Location:index.php');
}

?>

<?php
//mag show sang information sang user nga nag login
$userid=$_SESSION['userid'];

$result=mysql_query("SELECT * from users where userid='$userid'")or die(mysql_error);
$row=mysql_fetch_array($result);

$SirName=$row['sirname'];
$OtherNames=$row['othernames'];
$UserName=$row['username'];
$mobnum=$row['phonenum'];
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sun || Apartments</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

  <!-- SELECT 2-->
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <!--<link rel="stylesheet" href="../plugins/select2/select2.css">-->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Sun</b> Apartments</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sun</b> Apartments</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo "".$UserName."";?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo "".$SirName."&nbsp". $OtherNames."";?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="poprof.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
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
          <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
        </div>
        <div class="pull-left info">
          <!--<p>Alexander Pierce</p>
          <!-- Status -->
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>

      <!-- search form (Optional)
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

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Properties</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="newapart.php">Add new</a></li>
            <li><a href="viewapart.php">View Properties</a></li>
            <li><a href="viewallapart.php">All Properties</a></li>
            <li><a href="viewapart.php">Cancel Appication</a></li>
            <li><a href="viewapart.php">Pay Application</a></li>
          </ul>
        </li>
        <li class="active"><a href="booking.php"><i class="fa fa-link"></i> <span>Book | Rent</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="canceled.php">Canceled Lease</a></li>
            <li><a href="fullypaid.php">Paid Lease</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Admin Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="activator.php">Activate User</a></li>
            <li><a href="deactivator.php">De-ctivate User</a></li>
            <li><a href="deleter.php">Delete User</a></li>
            <li><a href="adminprof.php">Admin Profile</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- add heaher here-->
        <small> Properties 2016</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!--................<!-- Your Page Content Here by samson --.................................content here -->


      <div class="box-body">
        <!--<p class="login-box-msg">Register a new Apartment </p>-->
        <form id="newapartment" method="POST" action="">
          <div class="form-group has-feedback">
            <label>Apartment Name:</label><input type="text" name="apartname" placeholder="Enter Name" id="apartname" value="" class="form-control" required="">
          </div>
          <div class="form-group has-feedback">
            <label>Location:</label><input type="Text" placeholder="Location" name="apartloc" id="apartloc" value="" class="form-control">
          </div>
          <div class="form-group has-feedback">
            <label>Owner Name:</label><input type="Text" placeholder="" name="ownername"  id="ownername" value="<?php echo "".$OtherNames."";?>" class="form-control" required="">
          </div>
          <div class="form-group has-feedback">
            <label>Mobile Number:</label><input type="Text" placeholder="" name="mobilenum" id="mobilenum"  value="<?php echo $mobnum;?>" class="form-control" required="">
          </div>
          <div class="form-group has-feedback">
            <label>Units:</label><input type="Text" placeholder="Units Available" name="numunits" id="" value="" class="form-control">
          </div>
          <div class="form-group has-feedback">
            <label>Status:</label><select name="status" id="status" value="" class="form-control" required>
              <option value="new">New</option>
              <option value="good">Good condition</option>
              <option value="old"> Old </option>
            </select>
          </div>
          <div class="form-group has-feedback">
            <label>Pricing:</label><input type="text" placeholder="Amount" name="price" id="price" value="" class="form-control" required="" />
          </div>

          <!---  upload code
          <div class="form-group has-feedback">
            <label>Upload Property Image:</label>
            <input type="file" name="image"  id="in" class="form-control" required />
          </div>
           upload code end     -->


          <div class="form-group has-feedback">
            <label>Registration date:</label><input type="datetime" autocomplete="off"  placeholder="End date" name="regdate" id="datepicker" value="" class="form-control" required>
          </div>
          <!-- My personal code -->
          <link rel="stylesheet" href="../custom/css/pikaday.css">

          <script src="../custom/pikaday.js"></script>
          <script>

            var picker2months = new Pikaday(
                {
                  numberOfMonths: 2,
                  field: document.getElementById('datepicker'),
                  firstDay: 1,
                  minDate: new Date(2000, 0, 1),
                  maxDate: new Date(2020, 12, 31),
                  yearRange: [2000, 2020]
                });



          </script>

          <!-- my personal code -->
          <!--<div class="form-group has-feedback">
            <label>Cancelation Charges:<i><font color="red"> *To be used in case of canceled booking* </i></font> </label><input type="number" placeholder="Add charges" name="cancelcharge" id="regdate" value="" class="form-control">
          </div>-->
          <div class="form-group has-feedback">
            <label>Furniture</label><textarea placeholder="Items to find from this apartment" name="furniture" id="" value="" class="form-control"></textarea>

          </div>

          <div class="form-group has-feedback">
            <label>Other Details:</label><textarea placeholder="Other details" name="otherdet" id="" value="" class="form-control"></textarea>
          </div>

          <div class="col-xs-4">
            <input type="submit" value="New Apartment" name="create" class="btn btn-primary">
            <input type="button" onclick="location.href='upload.php';" value="Next" class="btn btn-primary"/>
          </div>

        </form>




      </div>


      <?php include '../connection/dbconn.php'; ?>
      <?php
      if (isset($_POST['create'])){
        $apartname=$_POST['apartname'];
        $apartloc=$_POST['apartloc'];
        $ownername=$_POST['ownername'];
        $mobilenum=$_POST['mobilenum'];
        $status=$_POST['status'];
        $price=$_POST['price'];
        $regdate=$_POST['regdate'];
        $numunits=$_POST['numunits'];
        //$cancelcharge=$_POST['cancelcharge'];
        $furniture=$_POST['furniture'];
        $otherdet=$_POST['otherdet'];


        ///your insert code//
//$encrypted = md5($password); // Encrypting pssword using md5 algo

        $query=mysql_query("INSERT INTO apartments(`apart_name`,`apart_loc`,`owner_name`,`mobile_num`,`apart_status`,`apart_price`,`regdate`, `num_units`,`furniture` ,`other_det` ,`logs`)
VALUES('$apartname','$apartloc','$ownername','$mobilenum','$status','$price','$regdate', '$numunits', '$furniture' ,'$otherdet' ,'Apartment added')
")or die(mysql_error());
        echo '<font color="Green"><b> Apartment added to list </font></b>';




      }?>


      <!-- end of your contet --------------<!--  END Your Page Content Here by samson -------------------------->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      version 1.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="http://tarclink.com">tarclink</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->



<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstra.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2-->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- InputMas->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script>
  $("#e1").select2();
</script>

</body>
</html>
