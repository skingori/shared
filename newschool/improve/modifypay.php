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
          <li><a href="homeb.php?action=home" >Home</a></li>
          <li><a href="#">Record</a>
            <ul>
              <li><a href='homeb.php?action=pay'> student pay</a></li>
            </ul>
          </li>
          <li><a href="homeb.php?action=viewpay">view student pay</a></li>
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
 $id=$_REQUEST['id'];
$sel=mysql_query("SELECT * FROM payments WHERE STUDENT_ID=$id");

$fetch=mysql_fetch_array($sel);


?>
        <form  method="post" name="myform">
          <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
            <tr>
              <td  height="24">Names</td>
              <td >&nbsp;</td>
              <td ><input type="hidden" name="id" value="<?php echo $fetch[0] ?>"  />
                <input type="text" name="fname" size="30" id='in' value="<?php echo $fetch['STNAME'] ?>"  readonly />
              </td>
            </tr>
            <tr>
              <td>class</td>
              <td>&nbsp;</td>
              <td><select name="class" required >
                  <?php     echo '<option value="'.$fetch['CLASS'].'">'.$fetch['CLASS'].'</option>'; 
							 
							  ?>
                  <option value="SENIOR ONE">SENIOR ONE</option>
                  <option value="SENIOR TWO">SENIOR TWO</option>
                  <option value="SENIOR THREE">SENIOR THREE</option>
                  <option value="SENIOR FOUR">SENIOR FOUR</option>
                  <option value="SENIOR FIVE">SENIOR FIVE</option>
                  <option value="SENIOR SIX">SENIOR SIX</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>term</td>
              <td>&nbsp;</td>
              <td><select name="term" required >
                  <?php     echo '<option value="'.$fetch['TERM'].'">'.$fetch['TERM'].'</option>'; 
							 
							  ?>
                  <option value="FIRST TERM">FIRST TERM</option>
                  <option value="SECOND TERM">SECOND TERM</option>
                  <option value="THIRD TERM">THIRD TERM</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>year</td>
              <td>&nbsp;</td>
              <td><?php
						$options=0;
							for($ya=2016; $ya<=2016; $ya++)
							{
								$options.="<option value=".$ya.">".$ya."</option>";
							}
						?>
                <select name="year">
                  <?php 
		  echo '<option value="'.$fetch['YEAR'].'">'.$fetch['YEAR'].'</option>';
		  echo $options; ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>amount paid</td>
              <td>&nbsp;</td>
              <td><input type="text" name="amount" size="30" id='in' value="<?php echo $fetch['AMOUNT'] ?>" required />
                <?php if($fetch['TUTION']>$fetch['AMOUNT']){
		echo '<br><font color="yellow" size="-2">Replace the above figure 2complete student pay</font>';
		}else
		echo  '<br><font color="red" size="-1"><blink>fully paid<blink></font>';
		?>
              </td>
            </tr>
            <tr>
              <td>dues</td>
              <td>&nbsp;</td>
              <td><input type="text" name="due" size="30" id='in' value="<?php echo $fetch['DUES'] ?>" readonly /></td>
            </tr>
            <tr>
              <td>balance</td>
              <td>&nbsp;</td>
              <td><input type="text" name="balance" size="30" id='in' value="<?php echo $fetch['BALANCE'] ?>" readonly  /></td>
            </tr>
            <tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right"><input type="submit" name="send" id='send'value="modify" />
                <input type='reset' id='clear'name="clear" value="cancel"  /></td>
            </tr>
          </table>
        </form>
        <?php
					if (isset($_POST['send'])){ 
$id=$_REQUEST['id'];
$fname =$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$class=$_REQUEST['class'];
$term=$_POST['term'];
$year=$_POST['year'];
$amount=$_REQUEST['amount'];
$balance;
$due;
//$date=$_REQUEST['date'];

$sel=mysql_query("select TUTION from payments where STUDENT_ID=$id");
$tut=mysql_fetch_array($sel);
$tution= $tut['TUTION'];
echo $id.'<br>';
echo $tution.'<br>';

$due=$tution-$amount;
$balance=$amount-$tution;


echo $balance.' balance<br>';
echo $due.' due <br>';
echo $amount.' amount<br>';

$insert= mysql_query("UPDATE payments SET STNAME='$fname',CLASS='$class', TERM='$term', YEAR='$year',
AMOUNT=$amount,DUES=$due, BALANCE=$balance WHERE STUDENT_ID=$id");

if($insert){
echo '<img src="images/492.png" /> &nbsp;! data updated successfully';
 echo '<meta content="2;homeb.php?action=viewpay" http-equiv="refresh" />';

}else 
echo 'failed to insert data';
echo mysql_error();
//echo '<meta content="2;modifyst.php" http-equiv="refresh" />';
}else  if($action=='search'){//------------------------------------------------------------
      
 $search=$_POST['search'];
 
 
$query=mysql_query("SELECT * from student , image where image.image_id='$search' AND student.STNAME='$search'")or die(mysql_error());
$array=mysql_fetch_array($query);
$count=mysql_num_rows($query);

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
