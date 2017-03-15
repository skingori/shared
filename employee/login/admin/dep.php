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
				<a class="navbar-brand" href="#"><span> Company</span> Name</a>
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
			<p><h5><b></b><font color="lightblue">Departments </font></b></h5></p>

            <?php
            include("../connection/connector.php");
            $query1="SELECT * FROM department_table";

            $resource1=mysql_query($query1,$conn);
            echo "
		<table align=\"center\" border=\"0\" width=\"90%\" class=\"table table-bordered table-striped\" data-pagination=\"true\" data-sort-name=\"name\" >
		<tr>
		<td><b>Id</b></td><td><b>Department Name</b></td> <td><b>Faculty</b></td></td></tr> ";
            while($result1=mysql_fetch_array($resource1))
            {
                echo "<tr><td>".$result1[0]."</td><td>".$result1[1]."</td><td>".$result1[2]."</td></tr>";
            } echo "</table>";
            ?>


            <form class=""  method="POST" id="form1">
				<fieldset>

					<div class="form-group">
                        <label for="depname" >Department Name:</label>
                        <input type="text" class="form-control" id="depname" name="depname" required="" >

                    </div>
                    <div class="form-group">
                        <label for="faculty" >Faculty:</label>
                        <input type="text" class="form-control" id="faculty" name="faculty" required="" >

                    </div>


					<button type="submit" name="create" class="btn btn-primary btn-success">Add Department</button>

				</fieldset>
			</form>

			<div class="form-horizontal">


			</div>
		</div>

		<!-- start of php -->
        <?php
        include "../connection/mysqlicon.php";

        if(isset($_POST['create'])) {
            $depname = $_POST['depname'];
            $faculty = $_POST['faculty'];

            // checking empty fields
            if(empty($depname) || empty($faculty)) {

                if(empty($faculty)) {
                    echo "<font color='red'>Faculty field is empty.</font><br/>";
                }

                if(empty($depname)) {
                    echo "<font color='red'>Department field is empty.</font><br/>";
                }

                //link to the previous page
                echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
            } else {
                // if all the fields are filled (not empty)

                //insert data to database
                $result = mysqli_query($mysqli, "INSERT INTO department_table(department_name , department_faculty)
VALUES('$depname','$faculty')");

                //display success message
                echo "<font color='green'>Data added successfully.";
                ?>
        <meta content="2;#?action=home" http-equiv="refresh" />

        <?php

            }
        }

        ?>





        <!-- END OF CONTENT HERE -->
	</div>


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

