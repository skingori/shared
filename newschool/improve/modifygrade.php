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
          <li><a href="homet.php?action=home" >Home</a></li>
          <li><a href="#">Register</a>
            <ul>
              <li><a href='../?action=register'> presence</a></li>
            </ul>
          </li>
          <li><a href="homet.php?action=studentm">Enter student mark</a></li>
          <li><a href="homet.php?action=students">update student mark</a></li>
          <li><a href="homet.php?action=report">student report</a></li>
		  <li><a href="#">Grading</a>
		   <ul>
		   <li><a href="homet.php?action=ssub">Register subjects</a></li>
		   <li><a href="homet.php?action=vsub">view subjects</a></li>
		   <li><a href="homet.php?action=smark">set marks/aggregates</a></li>
          <li><a href="homet.php?action=usmark">GRADING</a></li>
        </ul></li>
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
$sel=mysql_query("SELECT * FROM grades WHERE ID=$id");

$fetch=mysql_fetch_array($sel);


?>
        <form  method="post" name="myform">
          <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
            <tr>
              <td  height="24">SUBJECT CODE</td>
              <td >&nbsp;</td>
              <td ><input type="hidden" name="id" value="<?php echo $fetch[0] ?>"  />
                 <select value=" " name="code" >
            
            <?php
						$resultS = mysql_query("SELECT SUB_ID FROM grades where ID=$id");
						$fetch = mysql_fetch_array($resultS);
				        echo '<option value="'.$fetch['SUB_ID'].'">'.$fetch['SUB_ID'].'<option>';

						$result = mysql_query("SELECT * FROM subject");
						      
						while($row = mysql_fetch_array($result))
							{  
								echo '<option value="'.$row['CODE'].'">';
								echo $row['CODE'];
								echo '</option>';
							}
						?>
          </select>
              </td>
            </tr>
           
           
            <tr>
              <td>LOWEST MARK</td>
              <td>&nbsp;</td>
              <td><?php
			  			$resultt = mysql_query("SELECT * FROM grades where ID=$id ");
                        $fetch= mysql_fetch_array($resultt);
						$options=0;
							for($ya=0; $ya<=99; $ya++)
							{
								$options.="<option value=".$ya.">".$ya."</option>";
							}
						?>
                <select name="lm">
                  <?php 
		  echo '<option value="'.$fetch['LMARK'].'">'.$fetch['LMARK'].'</option>';
		  echo $options; ?>
                </select>
              </td>
            </tr>
           
            <tr>
              <td>HIGHEST MARK</td>
              <td>&nbsp;</td>
              <td><?php
						$options=0;
							for($ya=1; $ya<=100; $ya++)
							{
								$options.="<option value=".$ya.">".$ya."</option>";
							}
						?>
                <select name="hm">
                  <?php 
		  echo '<option value="'.$fetch['HMARK'].'">'.$fetch['HMARK'].'</option>';
		  echo $options; ?>
                </select></td>
            </tr>
            <tr>
              <td>AGGREGATE</td>
              <td>&nbsp;</td>
              <td><?php
						$options=0;
							for($ya=1; $ya<=9; $ya++)
							{
								$options.="<option value=".$ya.">".$ya."</option>";
							}
						?>
                <select name="ag">
                  <?php 
		  echo '<option value="'.$fetch['AGGREGATE'].'">'.$fetch['AGGREGATE'].'</option>';
		  echo $options; ?>
                </select></td>
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
$code =$_REQUEST['code'];
$lm=$_REQUEST['lm'];
$hm=$_REQUEST['hm'];
$ag=$_POST['ag'];
$selec=mysql_query("select *from grades where SUB_ID='$code' and LMARK=$lm and HMARK=$hm") or die(mysql_error());
	$cout=mysql_num_rows($selec);
	if($cout > 0){
	echo 'No change has been made';
		 echo '<meta content="3;homet.php?action=usmark" http-equiv="refresh" />';

	}else
{
$insert= mysql_query("UPDATE grades SET SUB_ID='$code',LMARK=$lm, HMARK=$hm, AGGREGATE=$ag WHERE ID=$id ");

if($insert){
echo '<img src="images/492.png" /> &nbsp;! data updated successfully';
 echo '<meta content="2;homet.php?action=usmark" http-equiv="refresh" />';

}else 
echo 'failed to insert data<br>';
echo mysql_error();
//echo '<meta content="2;modifyst.php" http-equiv="refresh" />';

}
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
            <td rowspan="5"><img src="<?php echo 'upload/'.$array['location']; ?>" width="200" height="200"  id="images"/></td>
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
