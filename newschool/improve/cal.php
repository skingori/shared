<?php
error_reporting("E_NOTICE");
?>

<?php
////include('header.php');
include('../connection.php');
session_start();

if (!isset($_SESSION['user_id'])){
header('location:../index.php');
}
//
?>
<?php
//mag show sang information sang user nga nag login
$user_id=$_SESSION['user_id'];

$result=mysql_query("select * from users where user_id='$user_id'");
$row=mysql_fetch_array($result);

$FirstName=$row['FNAME'];
$LastName=$row['LNAME'];
?>
<div style="float:right; margin-right:24px;" ;>
		<?php
echo '<img src="../images/admin.png"><font color="orange"> &nbsp;'.$FirstName." ".$LastName .'</font>';?>
		<a href="../logout.php" class="logout">Logout</a></div>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Name of school</title>
<link rel="icon" type="image/ico" href="../images/BOOKS.ico"/>
<meta name="keywords" content="school management system" />
<meta name="description" content="school management system" />
<link href="../school.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="../nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/ddsmoothmenu.css" />
<link href="date/htmlDatepicker.css" rel="stylesheet" />
<script language="JavaScript" src="../date/htmlDatepicker.js" type="text/javascript"></script>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>

<body>

<div id="school_body_wrapper">
<div id="school_wrapper">

<!-- end of header -->

    <div id="school_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
				<ul>
						<li><a href="../home.php?action=home" >Home</a></li>
						<li><a href="#">Update</a>
								<ul>
										<li><a href='../home.php?action=teacher'> register teacher</a></li>
										<li><a href='../home.php?action=non'>register nonstaff</a></li>
										<li><a href='../home.php?action=studentmoney'>enter pupil pay</a></li>
								</ul>
						</li>
						<li><a href="#">View records</a>
								<ul>
										<li><a href='../home.php?action=recordstudent'>Pupils </a></li>
										<li><a href='../home.php?action=recordteacher'>teachers </a></li>
										<li><a href='../home.php?action=tattend'>teachers' attendance</a></li>
										<li><a href='../home.php?action=recordnonstaff'>nonstaff</a></li>
										<li><a href='../home.php?action=report'> Pupil report card</a></li>
										<li><a href='../home.php?action=viewpay'>Pupil pay</a></li>
								</ul>
						</li>
						<li><a href="#">School Clubs</a>
								<ul>
										<li><a href='../home.php?action=viewclubs'>available clubs</a></li>
										<li><a href='../home.php?action=rclubs'>register a club</a></li>
										<li><a href='../home.php?action=member'>enter students</a></li>
										<li><a href='../home.php?action=clubmember'>clubs members</a></li>
								</ul>
						</li>
						<li><a href="#calendar.php">Veiw calender</a></li>
				</ul>

		</div>
        <div id="school_search"> <form action="../home.php?action=search" method="post">

              <select value=" " name="search" id="keyword" title="student name"  class="txt_field" required >

			  <option><option><?php
						$result = mysql_query("SELECT STNAME FROM student ");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['STNAME'].'">';
								echo $row['STNAME'];
								echo '</option>';
							}
						?>


			  </select>
              <input type="submit" name="submit" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> <!-- END of school_menubar -->

    <div id="school_main">
    	<div id="sidebar" class="float_r">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>THE STAFF</h3>
                <div class="content">

                    	Move the mouse here to PAUSE the slide<br/>
                    <marquee behavior="scroll" direction="up"  height="150" scrollamount="1" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 2, 0);">

                 <?php
				$teacher=mysql_query("select * from teacher");
				$gets=mysql_fetch_array($teacher);
				$counts=mysql_num_rows($teacher);
				$num=1;
				echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['NAMES'].'<br/>';
				$num=2;

				while($gets=mysql_fetch_array($teacher)){

				echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['NAMES'].'<br/>';
				$num++;
				}
				?></marquee><br/>


						</div>
				<h3>PUPILS</h3>
						 <div class="content">
 <marquee behavior="scroll" direction="up"  height="150" scrollamount="2" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 2, 0);">

				<?php
				$student=mysql_query("select *from student");
				$gets=mysql_fetch_array($student);
				$count2=mysql_num_rows($student);
				$num=1;
				echo '<font color=red> '.$num. ' </font>&raquo;  ' .$gets['STNAME'].'<br/>';
				$num=2;
				while($gets=mysql_fetch_array($student)){

				echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['STNAME'].'<br/>';
				$num++;
				}
				?>

        </MARQUEE>
		</div>
            </div>

        </div>
         <div id="content" class="float_l">
	  <br/></br>

	<?php

error_reporting("E_NOTICE");

	include('calender.php');


?><div class="cleaner"></div>
    </div>
    <!-- END of school_main -->

    <div id="school_footer">
    	      <div align=center> Copyright &copy; 2013 Your School Name.  </div>

    </div> <!-- END of school_footer -->

</div> <!-- END of school_wrapper -->
</div> <!-- END of school_body_wrapper -->

</ul></body>
</html>
