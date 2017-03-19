<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Employee || Login</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/loginback.css" rel="stylesheet">

<!-- font awesome -->

<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">

					<!-- form 1 -->
					<form  method="post" name="form" onsubmit="return validateForm()">

						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Employee Number" name="username" type="text" autofocus="">
							</div>

							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<!--<div class="form-group">
								<select name="category" id="category"  class="form-control" required>
                                    <option selected="" value=''>--Select--</option>
									<option value='1'> Farmer<font color="red">*</font></option>
									<option value='2'> Collector*</option>
									<option value='3'> Accounts*</option>
									<option value='4'> Admin*</option>

									<span class="glyphicon glyphicon-envelope form-control"></span>
								</select>
							</div>-->
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>

							<button class="btn btn-primary btn-block btn-flat" type="submit" value="login" name="login">Sign in</button>

						<!--<button  type="reset" class="btn btn-primary btn-block btn-flat" value="Cancel" name="clear">Clear</button>-->
						</fieldset>
					</form>


					<!-- start of php coding-->
<?php
					if (isset($_POST['login'])){

					include_once("connection/conn.php");
					$username=$_POST['username'];
					//$category=$_POST['category'];
					$mypassword=$_POST['password'];
					$loginpassword=hash("sha256" ,$mypassword);
					// testfile.php

					$time=mysql_query("SELECT now() as time");
					$jj= mysql_fetch_array($time);
					$gettime=$jj['time'];

					$fh = fopen("logins.txt", 'a') or die("Failed to create file");
					//another column in a file to show failed or passed
					$text = <<<_END

[  $username | $password | $gettime
_________________________________________________________________
_END;

					fwrite($fh, $text) or die("Could not write to file");

					fclose($fh);
					/*
                    ----------------------------
                    <?php
                    $fh = fopen("testfile.txt", 'r') or
                    die("File does not exist or you lack permission to open it");
                    $text = fread($fh, 3);
                    fclose($fh);
                    echo $text;
                    ?>*/

					//$sql = mysql_query("INSERT INTO users(username,password, LEVEL) VALUES('$username', '$pass', 4)");

					$sql = "SELECT * FROM login_table WHERE login_username='$username' AND login_password='$loginpassword' AND login_status='active' ";
					$result = mysql_query($sql);

					?>
                <?php
					//check that at least one row was returned
					$rowCheck = mysql_num_rows($result);
					$row=mysql_fetch_array($result);


					if($row['login_category']==1){

					session_start();
						$_SESSION['login_username'] = $username;
						$_SESSION['login_category'] = $category;
					?>
                    <p align="center"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful</p>
                    <!--<br />
                    <br />
                     ........loading.....-->
					<p align="center">
						<meta content="2;farmer/index.php?action=home" http-equiv="refresh" />
					</p>
					<?php
					}
					else if($row['login_category'] ==1 AND ($row['pass_status']=='insecure')){
						session_start();
						$_SESSION['login_username'] = $username;
						$_SESSION['login_category'] = $category;
						?>
						<p align="center"><font color="red"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful but insecure</font></p>

						<!--<br />
                        <br />
                        ........loading.....-->
						<p align="center">
							<meta content="2;farmer/fa_prof.php" http-equiv="refresh" />
						</p>
						<?php


					}
					else if($row['login_category'] ==2 AND ($row['pass_status']=='insecure')){
						session_start();
						$_SESSION['login_username'] = $username;
						$_SESSION['login_category'] = $category;
						?>
						<p align="center"><font color="red"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful but insecure</font></p>
						<!--<br />
                        <br />
                         ........loading.....-->
						<p align="center">
							<meta content="2;collector/co_prof.php" http-equiv="refresh" />
						</p>
						<?php


					}

					else if($row['login_category']==2){
						session_start();
						$_SESSION['login_username'] = $username;
						$_SESSION['login_category'] = $category;
						?>
						<p align="center"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful</p>
						<!--<br />
                        <br />
                         ........loading.....-->
						<p align="center">
							<meta content="2;collector/index.php?action=home" http-equiv="refresh" />
						</p>
						<?php

					}else if($row['login_category']==3){
						session_start();
						$_SESSION['login_username'] = $username;
						$_SESSION['login_category'] = $category;
						?>
						<p align="center"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful</p>
						<!-- <br />
                         <br />
                          ........loading.....-->
						<p align="center">
							<meta content="2;user/index.php?action=home" http-equiv="refresh" />
						</p>
						<?php


					}
					else if($row['login_category'] ==4 AND ($row['pass_status']=='insecure')){
						session_start();
						$_SESSION['login_username'] = $username;
						$_SESSION['login_category'] = $category;
						?>
						<p align="center"><font color="red"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful but insecure</font></p>
						<!--<br />
                        <br />
                         ........loading.....-->
						<p align="center">
							<meta content="2;admin/adminprof.php" http-equiv="refresh" />
						</p>
						<?php


					}
					else if($row['login_category']==4){
						session_start();
						$_SESSION['login_username'] = $username;
						$_SESSION['login_category'] = $category;
						?>
						<p align="center"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful</p>
						<!-- <br />
                        <br />
                        ........loading.....-->
						<p align="center">
							<meta content="2;admin/index.php" http-equiv="refresh" />
						</p>
						<?php


					}
					else {

						?>
						<p align="center">Incorrect login name or password</p>
						<br />
						<br />
						........loading.....
						<p align="center">
							<meta content="2;login.php" http-equiv="refresh" />
						</p>

						<?php
					}
					}

					?>


					<!--end of php coding-->


					<div class="form-horizontal">
						<p>Don't have an account? <a href="index.php">Create here</a></p>

					</div>
				</div>
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
</body>

</html>
