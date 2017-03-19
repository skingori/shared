

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
<title>Nairobi || Home</title>

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
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Homepage</a></li>
            <li class=""><a href="allmessage.php"><svg class="glyph stroked open letter"><use xlink:href="#stroked-open-letter"/>


                    <?php
                    $result = mysql_query("SELECT COUNT(1) FROM messages_table WHERE message_recipient='$username'");
                    $row = mysql_fetch_array($result);

                    $total = $row[0];
                    ?>


            </svg>All Messages <?php echo "($total)";?></a></li>

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

		<div class="row">
			<div class="col-lg-12">
				<h4></h4>
			</div>
		</div><!--/.row-->
<div class="alert bg-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-empty-message"></use></svg> Welcome <?php echo "$username"; ?> :<a href="#" class="pull-right"><span class=""></span></a>
    <?php

    //farmer approval
    $result = mysql_query("SELECT COUNT(1) FROM attendance_table WHERE DATE(employee_attendance_date)=CURDATE()");
    $row = mysql_fetch_array($result);

    $total = $row[0];
    echo " You have  " . $total. " logs today";
    ?>

				</div>
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">


                            <?php
                            $result = mysql_query("SELECT COUNT(1) FROM messages_table WHERE message_status='UNREAD' AND message_recipient='$username'");
                            $row = mysql_fetch_array($result);

                            $total = $row[0];
                            ?>

                            <svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg>
                            <p style="color: orangered">
                                <?php echo "$total";?>
                            </p>

						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="text-muted"><?php echo date("D,M,Y");?></div>
							<div class="text-success"><a href="message.php">Messages</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="text-muted"><?php echo date("D,M,Y");?></div>
							<div class="text-success"><a href="news.php"> Get News</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="text-muted"><?php echo date("D,M,Y");?></div>
							<div class="text-success"><a href="profile.php"> My Profile</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></svg>
                        </div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="text-muted"><?php echo date("D,M,Y");?></div>
							<div class="text-success"><a href="uattend.php"> Attendance</a></div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<!-- ADD CONTENT HERE -->
        <div class="alert bg-primary" role="alert">
            <svg class="glyph stroked checkmark"><use xlink:href="#stroked-calendar"></use></svg> Attendance logs<a href="#" class="pull-right"><span class=""></span></a>

        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Latest
                    </div>
                    <div class="panel-body">
                        <?php
                        include("../connection/connector.php");
                        $query="SELECT * FROM attendance_table WHERE `employee_attendance_username`='".$username."' AND `employee_attendance_date` > timestampadd(day, -1, now());";

                        $resource=mysql_query($query,$conn);

                        while($result=mysql_fetch_array($resource))
                        {
                            echo "<br>Date: ".$result[3]."
                <br>
                <font color='forestgreen'>
                Time in: ".$result[4]." </font>
                <br>
                <font color='forestgreen'>
                Time Out: ".$result[4]." </font>";

                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        Recent
                    </div>
                    <div class="panel-body">
                        <?php
                        include("../connection/connector.php");
                        $query="SELECT * FROM attendance_table WHERE `employee_attendance_username`='".$username."' AND `employee_attendance_date` > timestampadd(day, -14, now());";

                        $resource=mysql_query($query,$conn);

                        while($result=mysql_fetch_array($resource))
                        {
                            echo "<br>Date: ".$result[3]."
                <br>
                <font color='gold'>
                Time in: ".$result[4]." </font>

                <br>
                <font color='gold'>
                Time Out: ".$result[5]." </font>";

                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Month+
                    </div>
                    <div class="panel-body">
                        <?php
                        include("..connection/connector.php");
                        $query="SELECT * FROM attendance_table WHERE `employee_attendance_username`='".$username."' AND `employee_attendance_date` < date_sub(now(), interval 1 month);";

                        $resource=mysql_query($query,$conn);

                        while($result=mysql_fetch_array($resource))
                        {
                            echo "<br>Date: ".$result[3]."
                            <br>
                            <font color='red'>
                            Time in: ".$result[4]." </font>
                            <br>
                            <font color='red'>
                            Time Out: ".$result[5]." </font>";

                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Year+
                    </div>
                    <div class="panel-body">
                        <?php
                        include("..connection/connector.php");
                        $query="SELECT * FROM attendance_table WHERE `employee_attendance_username`='".$username."' AND `employee_attendance_date` < date_sub(now(), interval 12 month);";

                        $resource=mysql_query($query,$conn);

                        while($result=mysql_fetch_array($resource))
                        {
                            echo "<br>Date: ".$result[3]."
                            <br>
                            <font color='red'>
                            Time in: ".$result[4]." </font>
                            <br>
                            <font color='red'>
                            Time Out: ".$result[5]." </font>";

                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>


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
