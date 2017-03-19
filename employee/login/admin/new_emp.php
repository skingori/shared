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
<title>Employee || Register</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script src="../custom/incl/jquery.js"></script>
<script src="../custom/incl/script.js"></script>
<script src="../custom/incl/script.responsive.js"></script>

<!-- ghf -->

<link rel="stylesheet" href="../custom/css/pikaday.css">
<script src="../custom/pikaday.js"></script>



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
				<a class="navbar-brand" href="#"><span> Nairobi City</span> Council</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<!--<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>-->
							<!--<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>-->
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
<!-- 000 -->
			<li class="parent">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Messages
				</a>
			</li>
<!-- 111 -->

			<!-- 111 -->

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

		<div class="content">
			<!--<p class="login-box-msg">Register a new Apartment </p>-->
			<!--<p><h4><font color="lightblue">All Employees </font></h4></p>-->

			<form class=""  method="POST" id="form1">
				<fieldset>
					<div class="form-group">
						<label for="">Employee title:</label>
						<input class="form-control" placeholder="" id="email" name="employeetitle" type="text" autofocus="">
					</div>
					<div class="form-group">
						<label for="">Employee department:</label>
						<select name="employee_department" required class="form-control">
							<?php

							include("../connection/connector.php");
							$query = "SELECT * FROM department_table";
							$result = mysql_query($query);
							echo "<option></option>";
							while($row = mysql_fetch_array($result))
							{
								$department_id = $row[0];
								$department_name = $row[1];
								$department_faculty = $row[2];
								echo "<option>$department_name &nbsp $department_faculty</option>";
							}

							?>
						</select>
					</div>
					<div class="form-group">
						<label for="">First name:</label>
						<input class="form-control" type="text" name="employeefirstname" id="firstname" placeholder="">
					</div>
					<div class="form-group">
						<label for="">Last name:</label>
						<input class="form-control" type="text" name="employeelastname" id="lastname" placeholder="">
					</div>

					<div class="form-group">
					<label for="">Employee address:</label>
						<input class="form-control" type="text" name="employee_address" id="employee_address" placeholder="">
					</div>
												<div class="form-group">
											<label for="">Date employed:</label>
						<input class="form-control" type="date" name="employee_dateemployed" id="datepicker" placeholder="">
												</div>
														<!-- My personal code -->

					<div class="form-group">
						<label for="phonenumber">Mobile number:</label>
						<input class="form-control" type="text" name="employeephonenumber" id="phonenumber" placeholder="">
					</div>
					<div class="form-group">
						<label for="phonenumber">Employee rights:</label>
						<select name="category" id="category"  class="form-control" required>
																<option value=''>--Select--</option>
							<option value='3'>User*</option>
							<option value='4'>Admin*</option>
							<span class="glyphicon glyphicon-envelope form-control"></span>
						</select>
					</div>
					<div class="form-group">
						<label for="Username">Employee Number:</label>
						<input type="text" class="form-control" placeholder="" name="employeeusername" autocomplete="off"  minlength="4" required/>
						<!--<span class="" id="user-result"></span>-->
						<td> <span id="user-result"></span></td>
					</div>
					<div class="form-group">
						<label for="phonenumber">Default Password:</label>
						<input class="form-control" placeholder="" name="password" id="password" type="password" value="">
					</div>
					<!--<div>
						<label>Confirm Password:</label>
						<input class="form-control" type="password" name="conf_pass" placeholder="">
					</div>-->


					<button type="submit" name="create" class="btn btn-primary btn-success">Register Employee</button>

				</fieldset>
			</form>

			<div class="form-horizontal">


			</div>
		</div>

		<!-- start of php -->
		<?php
		include "../connection/mysqlicon.php";

		if(isset($_POST['create'])) {
		$eusername = $_POST['employeeusername'];
		$efirstname = $_POST['employeefirstname'];
		$elastname = $_POST['employeelastname'];
		$ephone = $_POST['employeephonenumber'];
		$employee_address =$_POST['employee_address'];
		$employee_dateemployed = $_POST['$employee_dateemployed'];
		$employee_department = $_POST['$employee_department'];
		$etitle = $_POST['employeetitle'];
		$category=$_POST['category'];
		$mypassword=$_POST['password'];
		$epassword=hash("sha256" ,$mypassword);
		// checking empty fields
		if(empty($eusername) || empty($etitle) || empty($epassword)) {

		if(empty($eusername)) {
		echo "<font color='red'>Username field is empty.</font><br/>";
		}

		if(empty($etitle)) {
		echo "<font color='red'>Email field is empty.</font><br/>";
		}

		if(empty($epassword)) {
		echo "<font color='red'>Password field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO employee_table(employee_firstname , employee_lastname, employee_username ,employee_title ,employee_contact ,employee_address ,employee_dateemployed ,employee_department ,employee_password , employee_regdate)
VALUES('$efirstname','$elastname','$eusername' ,'$etitle' ,'$ephone' ,'$employee_address' ,'$employee_dateemployed' ,'$employee_department' ,'$epassword' ,now())");

			$result = mysqli_query($mysqli, "INSERT INTO login_table(login_username ,login_password ,login_category ,login_status)
VALUES('$eusername','$epassword','$category' ,'inactive')");

		//display success message
		echo "<font color='green'>Data added successfully.";
			}
			}
			?>


		<!-- END OF CONTENT HERE -->
	</div>
</div><!-- /.col-->
</div><!-- /.row -->

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/chart.min.js"></script>
		<script src="js/chart-data.js"></script>
		<script src="js/easypiechart.js"></script>
		<script src="js/easypiechart-data.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script>
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
		<script>
			$(document).ready(function(){
				$("#username").keypress(function(event){
					var inputValue = event.charCode;
					if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
						event.preventDefault();
						alert("Wrong input for username | Number not allowed");
					}

				});

			});
			//for username
			$(document).ready(function(){
				$("#employeeusername").keypress(function(event){
					var inputValue = event.charCode;
					if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
						event.preventDefault();
						alert("Wrong input for Sirname | Number not allowed");
					}
				});
			});
			//for username
			$(document).ready(function(){
				$("#employeefirstname").keypress(function(event){
					var inputValue = event.charCode;
					if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
						event.preventDefault();
						alert("Wrong input for Name | Number not allowed");
					}
				});
			});

			//for username
			$(document).ready(function(){
				$("#employeelastname").keypress(function(event){
					var inputValue = event.charCode;
					if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
						event.preventDefault();
						alert("Wrong input for Name | Number not allowed");
					}
				});
			});
			//for username
			$(document).ready(function(){
				$("#lastname").keypress(function(event){
					var inputValue = event.charCode;
					if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
						event.preventDefault();
						alert("Wrong input for Name | Number not allowed");
					}
				});
			});
		</script>



		<script type="text/javascript">
			$(document).ready(function() {
				$("#username").keyup(function (e) {

					//removes spaces from username
					$(this).val($(this).val().replace(/\s/g, ''));

					var username = $(this).val();
					if(username.length < 1){$("#user-result").html('');return;}

					if(username.length >= 1){
						$("#user-result").html('<img src="images/loader.gif" />');
						$.post('check-uname.php', {'username':username}, function(data) {
							$("#user-result").html(data);
						});
					}
				});
			});
		</script>

	     <script>

	        var picker2months = new Pikaday(
	            {
	              numberOfMonths: 1,
	              field: document.getElementById('datepicker'),
	              firstDay: 1,
	              minDate: new Date(2000, 0, 1),
	              maxDate: new Date(9090, 12, 31),
	              yearRange: [2000, 9090]
	            });

	    </script>


	</body>

	</html>

	<?php
	mysql_free_result($Recordset1);
	?>
