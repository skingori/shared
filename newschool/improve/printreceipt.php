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
  <!--<?php echo '<img src="../images/admin.png"><font color="orange"> &nbsp;'.$FirstName." ".$LastName .'</font>';?>-->
  <a href="../logout.php" class="logout">Logout</a></div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ndiuni primary school</title>
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

    <!-- end of header -->
    <div id="school_menubar">
      <div id="top_nav" class="ddsmoothmenu">
        <ul>
          <li><a href="homeb.php?action=home" >Home</a></li>
          <li><a href="#">Record</a>
            <ul>
              <li><a href='homeb.ph?action=pay'> pupils pay</a></li>
            </ul>
          </li>
          <li><a href="homeb.php?action=viewpay">view pupil pay</a></li>
          <li><a href="homeb.php?action=account">accountability</a></li>
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
        <?PHP
$confirmation;
function create(){
			//$chars = "abcdefghijkmnopqrstuvwxyz023456789";
			$chars = "023456789";
			srand((double)microtime()*1000000);
			$i = 0;
			$pass = '' ;
			while ($i <= 4) {
				$num = rand() % 3;
				$tmp = substr($chars, $num, 1);
				$pass = $pass . $tmp;
				$i++;
			}
			return $pass;
		}
		$confirmation = create(); 
?>
        <script language="javascript">
function Visionprintreceipt()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>ndiuni primary school powered by s</title>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:12px; font-family:arial Narrow;text-shadow:0 1px 1px rgba(0,0,0,.1);  padding-left:60px; ">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
        <p align="right"><a href="javascript:Visionprintreceipt()"><img src="images/Print.png" width="30" height="30" title=print_out_receipt /></a></p>
        <div id="print_content" style="width: 1000px;"> <br>
          <?php
 $id=$_REQUEST['id'];
 
$sel=mysql_query("SELECT * FROM payments where STUDENT_ID=$id");
$fetch=mysql_fetch_array($sel)

 ?>
          <table border="1"cellpadding="0"  cellspacing="0" style="width:70%">
            <tr>
              <td height="63" colspan="3"  >Pupil copy
                <center>
                  <font size="+1" style="letter-spacing:5px; font-weight:900;">NDIUNI PRIMARY SCHOOL<br>
                  </font><font size="+0" style="letter-spacing:0px;"> P.O BOX 96,Katangi Machakos<br>
                  Tel:0721-458-528
                  <hr>
                  OFFICIAL COPY </font>
                </center></td>
            </tr>
            <tr>
              <td width="15%"  height="43">receipt no. <?php echo 'A'.$confirmation; ?></td>
              <td >&nbsp;</td>
              <td >date paid:
                <?php   echo ''.$fetch['9'].''      ?></td>
            </tr>
            <tr>
              <td>Pupil  no.
                <?php  echo ''.$fetch['0'].'' ?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Pupil name:
                <?php  echo ''.$fetch['1'] ?></td>
              <td>&nbsp;</td>
              <td>academic year :
                <?php  echo ''.$fetch['4'].'' ?></td>
            </tr>
            <tr>
              <td>class:
                <?php  echo ''.$fetch['2'].'' ?></td>
              <td>&nbsp;</td>
              <td>term:
                <?php  echo ''.$fetch['3'].'' ?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>arreas: <strike>76800000</strike></td>
              <td>tution fee :
                <?php  echo ''.$fetch['5'].'' ?></td>
              <td>amount due :
                <?php  echo ''.$fetch['7'].'' ?></td>
            </tr>
            <tr>
              <td>amount paid :
                <?php  echo ''.$fetch['6'].'' ?>
              </td>
              <td>balance:
                <?php  echo ''.$fetch['8'].'' ?></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3"  align="center"><i>
                <hr>
                parents and guardians are to note that they have only two payments plans to settle fees in full
                <hr/>
                </i></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td rowspan="2"  valign="top">authorised signatory & stamp</td>
              <td>&nbsp;</td>
              <td rowspan="2">this data was printed on:<br/>
                <?php
	 						
                       
					  
					   $time=mysql_query("SELECT now() as time");
					  $jj= mysql_fetch_array($time);
					  $if =$jj['time'];
					  
						echo $if;
						 ?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><p>.........................................................</p>
                <p>Headmaster................... </p></td>
              <td><p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="28">E &amp; 0.E </td>
              <td> Thank you </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="46" colspan="3" align="center"><p>Official receipt</p></td>
            </tr>
          </table>
          <?php
 if($action=='search'){//------------------------------------------------------------
      
 $search=$_POST['search'];
 
 
$query=mysql_query("SELECT * from student , image where image.image_id='$search' AND student.STNAME='$search'")or die(mysql_error());
$array=mysql_fetch_array($query);
$count=mysql_num_rows($query);

?>
          <table style="border: 3px double #FF6600; background:url(images/powder.gif);background-size:cover; padding:12px; color:#003366">
            <tr>
              <td scope="col" colspan="3" align="center">NDIUNI PRIMARY SCHOOL </td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="175" height="34">NAME</td>
              <td width="251"><?php echo $array['STNAME'];?> </td>
              <td rowspan="5"><img src="<?php echo ''.$array['location']; ?>" width="200" height="200"  id="images"/></td>
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

}?><div class="cleaner"></div>
    </div>
    <!-- END of school_main -->
    <div id="school_footer">
            <div align=center> Copyright &copy; 2013 Your School Name. </div>

    </div>
    <!-- END of school_footer -->
  </div>
  <!-- END of school_wrapper -->
</div>
<!-- END of school_body_wrapper -->
</ul>
</body>
</html>
