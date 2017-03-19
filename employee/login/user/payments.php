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
    
<!-- font awesome --> 
<link rel="stylesheet" href="../css/font-awesome.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
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
        <div>
					<button class="btn btn-sm btn-link"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></button>
                    <button class="btn btn-sm btn-link"><i class="fa fa-file fa-2x" aria-hidden="true"></i></button>
                    <button class="btn btn-sm btn-link"><i class="fa fa-print fa-2x" aria-hidden="true"></i></button>
        </div>
		<?php
		include("../connection/conn.php");

		$query="SELECT * FROM record_table WHERE record_status='Paid'";

		$resource=mysql_query($query,$conn);
		echo "
		<table align=\"center\" border=\"0\" width=\"90%\" class=\"table table-bordered table-striped\" id=\"printTable\">
		<thread><tr>
		<th><b>ID</b></th><th><b>Full Name</b></th><th><b>Milk(in ltrs)</b></th> <th><b>Delivery Date</b></th><th><b>Total</b></th></th><th><b>Status</b></th></tr></thread> ";
        
            $tmilk=mysql_query("select SUM( record_total_milk) AS totalmilk FROM record_table WHERE record_status='Paid'");
                $fetch1=mysql_fetch_array($tmilk);

            $oamount=mysql_query("select SUM( record_total_cash) AS tamount FROM record_table WHERE record_status='Paid'");
                $fetch=mysql_fetch_array($oamount);
        
        //totals
        
        echo "<tfoot><tr><td>#</td><td><b>Total Milk(ltr)</b></td><td>".$fetch1['totalmilk']."</td><td><b>Total Amount</b></td><td>".$fetch['tamount']."</td></tr></tfoot>";
        
        //end of totals
        
		while($result=mysql_fetch_array($resource))
		{
            
			echo "<tbody><tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[3]."</td><td>".$result[6]."</td><td>".$result[4]."</td><td>".$result[5]."</td></tbody></tr>";
            
            //get to tal amount
                //$tmilk=mysql_query("select SUM( total_collected) AS totalmilk FROM cost_table WHERE farmer_username='$username'");
                //$fetch1=mysql_fetch_array($tmilk);
            
                //$oamount=mysql_query("select SUM( total_cash) AS tamount FROM cost_table WHERE farmer_username='$username'");
                //$fetch=mysql_fetch_array($oamount);
            
           
            
		} echo "</table>";
        
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
    
    
    <script>
    function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
    </script>
</body>

</html>
