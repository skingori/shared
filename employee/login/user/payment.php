<?php
// Inialize session
session_start();
include_once '../connection/conn.php';

if (!isset($_SESSION['login_username'])) {
	header("Location: index.php");
}


      
$username=$_SESSION['login_username'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Daima || Home</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="../js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Nairobi </span>City Council</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<!--<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>-->
							<li><a href="../logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Homepage</a></li>
<!-- 000 
			<li class="parent">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span>Payments
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> View All
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Payment
						</a>
					</li>

				</ul>
			</li>
111 -->
			<li><a href="message.php"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Messages</a></li>
			<!--<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-app-window"></use></svg> Reports</a></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span>Control panel
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> All users
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Activate users
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Deactivate users
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Delete Users
						</a>
					</li>
				</ul>
			</li>-->
			<li role="presentation" class="divider"></li>
			<li><a href="../logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">dashboard</li>
			</ol>
		</div><!--/.row-->

		<!-- ADD CONTENT HERE -->
		<table width="100%" border="0" cellpadding="1" cellspacing="1">
			<tr>
				<td width="358" height="20" valign="middle" bgcolor="#8FC4F7">
					<div align="center"><b><font color="#FFFFFF">Confirm Payment <?php echo $_SESSION['username'];?></font></b></div>
				</td>
			</tr>

		</table>
		<?php
		include("../connection/connector.php");
		$record_id=$_REQUEST['record_id'];
		$query="SELECT * FROM record_table WHERE record_id='".$record_id."'";

		$resource=mysql_query($query,$conn) or die ("An unexpected error occured while <b>Activating</b> the record, Please try again!");
		$result=mysql_fetch_array($resource);

		?>

		<form name="form" method="post" >
			<div class="form-group">
				<input name="" type="hidden"/>
			</div>

			<div class="form-group">
				<label>Full Name:</label>
				<input name="" type="text" id="textfield" class="form-control" value="<?php echo $result[1] ?>" readonly />
			</div>
				<label>Milk(in ltrs):</label>
			<div class="form-group">
				<input name="" type="text" id="textfield" class="form-control" value="<?php echo $result[3] ?>" readonly />
			</div>
			<label>Total Amount:</label>
			<div class="form-group">
				<input name="" type="text" id="textfield" class="form-control" value="<?php echo $result[4] ?>" readonly />
			</div>
			<label>Bank Reference:</label>
			<div class="form-group">
				<input name="bankref" type="text" id="textfield" class="form-control"  placeholder="D564XXXXX" required />
			</div>
			<label>Other Details:</label>
			<div class="form-group">
				<textarea autofocus rows="5" cols="40" required placeholder="Other Details" name="odetails"  ></textarea>
			</div>


			<input type="submit" name="de" class="button" value="Confirm Payment" />

		</form>

		<?php
		if (isset($_POST['de'])){
			include("../connection/connector.php");

			$bankref=$_POST['bankref'];
			$odetails=$_POST['odetails'];


			$query="UPDATE record_table SET record_bank_ref='$bankref' , record_odetails='$odetails' , record_status='Paid' WHERE record_id='".$record_id."'";

			if(!mysql_query($query,$conn))
			{die ("An unexpected error occured while updating Please try again!");}

			?>

			<script type="text/javascript">
				alert('The Farmer Payment has been done!');
				window.location="index.php";
			</script>

			<?php
		}
		?>
		<!-- END OF CONTENT HERE -->
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
