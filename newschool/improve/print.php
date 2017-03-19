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

$result=mysql_query("select * from users where user_id='$user_id'")or die(mysql_error);
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
<link href="../date/htmlDatepicker.css" rel="stylesheet" />
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
    <div id="school_header">
      <div id="site_title"> <a href="#">NAME OF SCHOOL</a> </div>
      <!-- end of site_title -->
      <div id="header_right"> <img src="../images/user-group-icon.png" width="200" height="150" /> </div>
      <div class="cleaner"></div>
    </div>
    <!-- end of header -->
    <div id="school_menubar">
      <div id="top_nav" class="ddsmoothmenu">
        <ul>
          <li><a href="home.php?action=home" >Home</a></li>
          <li><a href="#">Register</a>
            <ul>
              <li><a href='home.php?action=student'> Students</a></li>
            </ul>
          </li>
          <li><a href="home.php?action=recordstudent">View students</a></li>
          <li><a href="home.php?action=upload">upload student photo</a></li>
        </ul>
      </div>
      <div id="school_search">
        <form action="?action=search" method="post">
          <select value=" " name="search" id="keyword" title="student name"  class="txt_field" required >
            <option>
            <option>
            <?php
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
    </div>
    <!-- END of school_menubar -->
    <div id="school_main">
      <div id="sidebar" class="float_r">
        <div class="sidebar_box"><span class="bottom"></span>
          <h3>THE STAFF</h3>
          <div class="content"> Move the mouse here to PAUSE the slide<br/>
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
				?>
            </marquee>
            <br/>
          </div>
          <h3>STUDENTS</h3>
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
		$action=$_REQUEST['action'];
if($action=='print'){?>

<script language="javascript">
function Visionprintreceipt()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:12px; font-family:arial Narrow;text-shadow:0 1px 1px rgba(0,0,0,.1); border: 1px solid black;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<a href="javascript:Visionprintreceipt()">Print</a>
<div id="print_content" style="width: 1000px;">
Students Details<br><br>
<style type="text/css">

th{border-bottom:1px solid #666666;border-left:1px solid #666666;border-top:1px solid #666666; padding-bottom:12px;}
td{ border-bottom:1px solid #666666;border-left:1px solid #666666;;}
</style>
<?php
$sel=mysql_query("SELECT * FROM student");
echo '<table>';
echo '<th>NAME</th><th>SEX</th><th>AGE</th><th>DISTRICT</th><th>PARENT</th><th>OFFERTYPE</th><th>CLASS</th>';

while($fetch=mysql_fetch_array($sel)){


echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['SEX'].'</td><td>'.$fetch['AGE'].'</td><td>'.$fetch['DISTRICT'].'</td><td>'.$fetch['GUARDIAN'].'</td><td>'.$fetch['OFFERING'].'</td><td>'.$fetch['CLASS'].'</td></tr>';
 
}
echo '</table>';

}else if($action=='search'){//------------------------------------------------------------
   
 $search=$_POST['search'];
 
$do=mysql_query("SELECT * from student , image where image.image_id='$search' AND student.STNAME='$search'")or die(mysql_error());
$array=mysql_fetch_array($do);
$count=mysql_num_rows($do);
if($count >0){


?>
        <table style="border: 3px double #FF6600; background:url(images/powder.gif);background-size:cover; padding:12px; color:#003366">
          <tr>
            <td scope="col" colspan="3" align="center">NAME OF SCHOOL </td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td width="175" height="34">NAME</td>
            <td width="251"><?php echo $array['STNAME'];?> </td>
            <td rowspan="5"><img src="<?php echo $array['location']; ?>" width="200" height="200"  id="images"/></td>
          </tr>
          <tr>
            <td>SEX </td>
            <td><?php echo $array['SEX'];?></td>
          </tr>
          <tr>
            <td height="38">DATE REGISTERED </td>
            <td><?php echo $array['DATE'];?></td>
          </tr>
          <tr>
            <td height="40">PARENT NAME </td>
            <td><?php echo $array['GUARDIAN'];?> </td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="center">MOTTO OR SLOGAN</td>
          </tr>
        </table>
        <?php
}
}
?>
    
    </div>      </div>
      </div>
      <div class="cleaner"></div>
    </div>
    <!-- END of school_main -->
<div id="school_footer">
          <div align=center> Copyright &copy; 2013 Your School Name.  </div>

  </div>
  <!-- END of school_footer -->
</div>
<!-- END of school_wrapper -->
</div>
<!-- END of school_body_wrapper -->
</ul>
</body>
</html>
