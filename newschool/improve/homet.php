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
    <script src="graph/js/jquery.js" type="text/javascript"></script>


    <script type="application/javascript" src="graph/js/awesomechart.js">
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
          <li><a href="?action=home" >Home</a></li>
          <li><a href="#">Register</a>
            <ul>
              <li><a href='?action=register'> presence</a></li>
            </ul>
          </li>
          <li><a href="?action=studentm">Enter pupil mark</a></li>
          <li><a href="?action=students">update pupil mark</a></li>
          <li><a href="?action=report">pupil report</a></li>
		  <li><a href="#">Grading</a>
		   <ul>
		   <li><a href="?action=ssub">Register subjects</a></li>
		   <li><a href="?action=vsub">view subjects</a></li>
		   <li><a href="?action=smark">set marks/aggregates</a></li>
          <li><a href="?action=usmark">GRADING</a></li>
		<!--  <li><a href="testing.php">testing</a></li>-->
		  <!--<li><a href="?action=test">testing graph</a></li>-->
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
		$action=$_REQUEST['action'];
		if ($action=='home'){
		?>
          <?php }

				else  if($action=='register'){//-------------------------------------------------------------------------------------------------
?>
          <form action="" method="post" name="teac">
            </table>
            <br/>
            <table id="mytable">
              <tr>
                <th scope="col" colspan="2">Please fill out the register</th>


              </tr>
              <tr>
                <td>Full Name</td>
                <td><input type="text" name="name" id="in" required/>
                  <br>
                  <font color="yellow" size="-1">Correct Full Name needed</font></td>
                <script>
                  $(document).ready(function(){
                    $("#in").keypress(function(event){
                      var inputValue = event.charCode;
                      if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
                        event.preventDefault();
                      }
                    });
                  });
                </script>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value='send'id="in" />
                  <input type="reset" name="reset" value='cancel'id="in" /></td>
              </tr>
            </table>
          </form>
          <?php
if(isset($_POST['submit'])){

$name=strtoupper($_POST['name']);
$clas=$_POST['class'];

$insert=mysql_query("insert into teachercheck values('','$name', curdate(), curtime(),'')");
if(!$insert){
echo mysql_error();
}else ?>
          <img src="../images/valid.png">&nbsp; Enjoy
          <meta content="2;homet.php?action=register" http-equiv="refresh" />
          <?php
}

}else
if($action=='studentm'){//-------------------------------------------------------------------------------------------------
?>
          <form  method="post" name="markform" onSubmit="MM_validateForm('id','','R','code','','R','test','','NisNum','exam','','NisNum','tname','','R');return document.MM_returnValue">
            <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'>
              <tr>
                <td> Pupil Name </td>
                <td>&nbsp;</td>
                <td><select name="sname" required >
                    <option>
                    <option>
                    <?php
						$result = mysql_query("SELECT  * FROM student");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['STNAME'].'">';
								echo $row['STNAME'];
								echo '</option>';
							}
						?>
                  </select>
                  Hint: <font color="#666666" size="-1">press the first letter of name until you get the one you are looking for</font> </td>
              </tr>
			  <tr>
			    <td>YEAR</td>
				   <td>&nbsp;</td>
			  <td><?php
	  $ya;
	  for($t=2016;$t<=2016;$t++){
	 $ya.="<option value=".$t.">".$t."</option>";

	  }
	  ?>
                  <select name="ya"  required>
				  <option ></option>
                    <?php  echo $ya; ?>
                  </select></td></tr>
				  <tr><td>TERM</td><td>&nbsp;</td><td><select name="term"  title="term" required>
                    <option ></option>
                    <option value="FIRST TERM">1st TERM</option>
                    <option value="SECOND TERM">2nd TERM</option>
                    <option value="THIRD TERM">3nd TERM</option>

                  </select></td></tr>
              <tr>
                <td> subjectcode</td>
                <td>&nbsp;</td>
                <td><select name="code" required >
                    <option>
                    <option>
                    <?php
						$result = mysql_query("SELECT  * FROM subject");
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
                    <td>Test</td>
                    <td>&nbsp;</td>
                    <td><?php
                        $op;
                        for($t=1;$t<=100;$t++){
                            $op.="<option value=".$t.">".$t."</option>";

                        }
                        ?>
                        <select name="test"  required>
                            <?php  echo $op; ?>
                        </select></td>
              </tr>
                <tr>
                    <td>Test Score</td>
                    <td>&nbsp;</td>
                    <td><?php
                        $op;
                        for($t=0;$t<=100;$t++){
                            $op.="<option value=".$t.">".$t."</option>";

                        }
                        ?>
                        <select name="exam"  required>
                            <?php  echo $op; ?>
                        </select></td>
                </tr>
              <tr>
                <td>Teacher name </td>
                <td>&nbsp;</td>
                <td><input type="text" name="tname" size="30" id='in' /></td>

                <script>
                                  $(document).ready(function(){
                      $("#in").keypress(function(event){
                          var inputValue = event.charCode;
                          if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
                              event.preventDefault();
                          }
                      });
                  });
                  </script>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td ><input type="submit" name="send" id='send'value="SEND" />
                  <input type='reset' id='clear'name="clear" value="cancel"  /></td>
              </tr>
            </table>
          </form>
          <?php
  if (isset($_POST['send'])){


$ya=$_REQUEST['ya'];
$term=$_REQUEST['term'];
$test=$_REQUEST['test'];
$exam=$_REQUEST['exam'];
$tnam=$_REQUEST['tname'];
$sname=$_POST['sname'];
$id2=$_POST['code'];
if($exam=='')
$exam='-';

if($test=='')
$test='-';


$insert= mysql_query("insert into studentmark values($ya,'$term','$id2', '$sname', '$test', '$exam', '$tnam' )");

if($insert){
echo '<img src="../images/492.png" /> &nbsp;! data inserted successfully';
 echo '<meta content="2;homet.php?action=studentm" http-equiv="refresh" />';

}else
echo 'failed to insert data ';
echo mysql_error();
echo '<meta content="2;homet.php?action=studentm" http-equiv="refresh" />';
}

}
if($action=='students'){//-------------------------------------------------------------------------------------------------
?>
          <form action="" method="post" id="mytable">
            subject code:
            <select name="code" required  >
              <option>
              <option>
              <?php
						$result = mysql_query("SELECT  distinct(CODE) FROM studentmark");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['CODE'].'">';
								echo $row['CODE'];
								echo '</option>';
							}
						?>
            </select>
            Pupil Full Name:
            <select name="id" required >
               <option>
              <option>
              <?php
						$result = mysql_query("SELECT  distinct(STUDENT_ID) FROM studentmark");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['STUDENT_ID'].'">';
								echo $row['STUDENT_ID'];
								echo '</option>';
							}
						?>
            </select>
            &nbsp;&nbsp;
            <input type="submit" name="go" value="NEXT"  />
          </form>
          <?php
if (isset($_POST['go'])){
$idd=$_REQUEST['id'];
$code=$_POST['code'];
$sel=mysql_query("select *from student, studentmark where student.STNAME='$idd' AND studentmark.STUDENT_ID='$idd' AND studentmark.CODE='$code'");
$counta=mysql_num_rows($sel);
$fetch=mysql_fetch_array($sel);
if($counta < 1){
echo 'We are confused ! No marks to update: The student missed first test or you for got entering marks for first test';
}else{


?>
          <form  method="post" name="myform">
            <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
              <tr>
                <td  height="24">Name</td>
                <td >&nbsp;</td>
                <td ><input type="text" name="fname" size="30" id='in' value="<?php echo $fetch['STNAME'] ?>"  /></td>
              </tr>
			   <tr>
              <td>TERM</td>
              <td>&nbsp;</td>
              <td><select name="term" required >
                  <?php     echo '<option value="'.$fetch['TERM'].'">'.$fetch['TERM'].'</option>';

							  ?>
                  <option value="FIRST TERM">1stTERM</option>
                  <option value="SECOND TERM">2nd TERM</option>
                  <option value="THIRD TERM">3rd TERM </option>

                </select>
              </td>
            </tr>
			  <tr>
			    <td>YEAR</td>
				   <td>&nbsp;</td>
			  <td><?php


	  $ya;
	  for($t=2011;$t<=2015;$t++){
	 $ya.="<option value=".$t.">".$t."</option>";



	  }
	  ?>
                  <select name="ya"  required>

                    <?php
					echo '<option value="'.$fetch['YEAR'].'">'.$fetch['YEAR'].'<option>';
					 echo $ya;
					 ?>
                  </select></td></tr>
              <tr>
                <td>Gender</td>
                <td>&nbsp;</td>
                <td><input type="text" name="sex" size="30" id='in' value="<?php echo $fetch['SEX'] ?>"  /></td>
              </tr>
              <tr>
                <td> subjectcode</td>
                <td>&nbsp;</td>
                <td><input type="text" name="id1" size="30" id='in' value="<?php echo $fetch['CODE'] ?>"  /></td>
              </tr>
              <tr>
                <td>test</td>
                <td>&nbsp;</td>
                <td><input type="text" name="test" size="30" id='in' value="<?php echo $fetch['TEST'] ?>"  /></td>
              </tr>
              <tr>
                <td>exam</td>
                <td>&nbsp;</td>
                <td><input type="text" name="exam" size="30" id='in' value="<?php echo $fetch['EXAM'] ?>"  /></td>
              </tr>
              <tr>
                <td>teacher name </td>
                <td>&nbsp;</td>
                <td><input type="text" name="tname" size="30" id='in' value="<?php echo $fetch['TNAME'] ?>"  /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input type="submit" name="send" id='send'value="update" />
                  <input type='reset' id='clear'name="clear" value="cancel"  /></td>
              </tr>
            </table>
            <input type="hidden" name="id2" value="<?php echo $fetch['STUDENT_ID'] ?>"  />
          </form>
          <?php
  }
  }else if (isset($_POST['send'])){
$term =$_REQUEST['term'];
$ya =$_REQUEST['ya'];
$fname =$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$sex=$_REQUEST['sex'];
$test=$_REQUEST['test'];
$exam=$_REQUEST['exam'];
$tname=$_REQUEST['tname'];
$id1=$_POST['id1'];
$id2=$_POST['id2'];
$insert= mysql_query("UPDATE studentmark set YEAR=$ya, CODE='$id1',TEST='$test', EXAM='$exam', TNAME='$tname' WHERE CODE='$id1' AND STUDENT_ID='$id2'");

if($insert){
echo '<img src="../images/492.png" /> &nbsp;! data updated successfully';
 echo '<meta content="2;homet.php?action=students" http-equiv="refresh" />';

}else
echo 'failed to insert data';
echo mysql_error();
//echo '<meta content="2;modifyst.php" http-equiv="refresh" />';


}

}else if($action=='report'){//---------------------------------------------------------------------------------------
?>
          <form action="" method="post">
            <table id="mytable">
              <tr>
                <td> Pupil:
                  <select name="name" required >
                    <option>
                    <option>
                    <?php
						$result = mysql_query("SELECT  * FROM student");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['STNAME'].'">';
								echo $row['STNAME'];
								echo '</option>';
							}
						?>
                  </select><br/><br/>year
												<?php
								$options=0;
									for($ya=2011; $ya<=2016; $ya++)
									{
										$options.="<option value=".$ya.">".$ya."</option>";
									}
								?>
												<select name="ya"  >

														<?php echo $options; ?>
												</select>
												<select name="term">
												<option value="FIRST TERM">1stTERM</option>
                 							 <option value="SECOND TERM">2nd TERM</option>
                  							<option value="THIRD TERM">3rd TERM </option>
												</select>
                  <input type="submit" name="go"  value="get report" id='n' />
                </td>
              </tr>
            </table>
          </form>
          <?php
$se=mysql_query("select sum(TEST) as 'total' from studentmark");
$count=mysql_num_rows($se);
while($fetch=mysql_fetch_array($se)){
//echo $fetch[total];
}

  echo '<br/>';

if(isset($_POST['go']) && ($_POST['name'])!=''){
?><style type="text/css">

th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
img{ border-radius:5px;}
</style><?php

   $name=$_POST['name'];
    $ya=$_POST['ya'];
	$term=$_POST['term'];
  //$snum=$_POST['snum'];
  //$ta=$_POST['term'];
$sel=mysql_query("SELECT *FROM student, subject, studentmark
 where student.STNAME='$name' AND studentmark.student_id='$name' AND studentmark.YEAR='$ya' AND studentmark.TERM='$term' AND subject.code=studentmark.code AND student.STNAME=studentmark.student_id");
 //$hy=mysql_query("SELECT SUM(TEST) AS 'totaltest', SUM(EXAM) AS 'totalexam', AVG(TEST) AS 'avgtest', AVG(EXAM) AS 'avgexam' FROM studentmark  where FNAME='$name' AND student.STUDENT_ID='$snum' ");

 //lets get student image
 $img=mysql_query("SELECT location from image where image_id='$name'")or die(mysql_error());
 $image=mysql_fetch_array($img);


 $fetch=mysql_fetch_array($sel);
 $count=mysql_num_rows($sel);
 if ($count > 0){
$totalT =$fetch['TEST'];
$totalE =$fetch['EXAM'];
$totalA =(($fetch['TEST']+$fetch['EXAM'])/2);
//echo $fetch['TEST'];
 echo '<table   style="width:100%"><tr><th width="130">';?><img src="<?php echo $image['location']; ?>" width="130" height="130"  id="images"/><?php echo '</th><th colspan="3" align="center"><p>NDIUNI PRIMARY SCHOOL </p>
      <p> P.O BOX 96,Katangi Machakos</p>

      <p><U>REPORT CARD</U> </p>
      <p>PUPIL\'s FULL NAME: '.$fetch['STNAME'].'</p></th><th width="130">'; ?><img src="<?php echo $image['location']; ?>" width="130" height="130"  id="images"/>
	  <?php
	  echo '</th></tr><tr>
    <td>SUBJECT</td>
    <td>TEST</td>
    <td>EXAM</td>
	<td>AVERAGE</td>
<td>TEACHER</td>
  </tr>
 <tr> <td>';

 //echo $fetch['FNAME'].'' ;
 echo $fetch['SUBJECTNAME'].'</td><td>'?>
          <?php
if ($fetch['TEST']==NULL){
echo 'missed';
}else
echo $fetch['TEST'];

?>
          <?php echo '</td><td>'?>
          <?php
if ($fetch['EXAM']==NULL){
echo 'missed';
}else
echo $fetch['EXAM'];

?>
          <?php echo '</td>  <td>'.(($fetch['TEST']+$fetch['EXAM'])/2).'</td><td>'.$fetch['TNAME'].'</td></tr>';



while($fetch=mysql_fetch_array($sel)){
$totalT+=$fetch['TEST'];
$totalE+=$fetch['EXAM'];
$totalA+=(($fetch['TEST']+$fetch['EXAM'])/2);
echo '<tr><td>'.$fetch['SUBJECTNAME'].'</td><td>'?>
          <?php
if ($fetch['TEST']==NULL){
echo 'missed';
}else
echo $fetch['TEST'];

?>
          <?php echo '</td><td>'?>
          <?php
if ($fetch['EXAM']==NULL){
echo 'missed';
}else
echo $fetch['EXAM'];

?>
          <?php echo '</td> <td>'.(($fetch['TEST']+$fetch['EXAM'])/2).'</td><td>'.$fetch['TNAME'].'</td></tr>';

}
echo '
<tr>
    <td height="90" valign="bottom">TOTAL</td>
    <td valign="bottom">'.$totalT.'</td>
    <td valign="bottom">'.$totalE.'</td>
   <td valign="bottom">'.$totalA.'</td>
   <td valign="bottom">&nbsp;</td>
  </tr>
  <tr>
    <td>AVERAGE</td>
    <td>'.$totalT/$count.'</td>
    <td>'.$totalE/$count.'</td>
   <td>'.$totalA/$count.'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>AGGREGATES</td>
    <td><a href="#">'?>
          <?php

	include 'maths.php';

	echo '</a></td>
    <td><a href="#">'?>
          <?php

	include 'maths2.php';

	echo '</a></td>
  <td><a href="#">'?>
          <?php

	include 'maths3.php';

	echo '</a></td>
   <td>&nbsp;</td>
  </tr>
  <tr>
    <td>GRADE</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	 <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>Administrator\'s signature:....................Records officers signature......................<hr/>
      <center>Ndiuni primary school </center>
      </p></td>


  </tr></table>';

  include 'graph/index.php';

}else
echo $name .' does not have his marks recorded. Report not available';


}


}else  if($action=='ssub'){//------------------------------------------------------------
	?>
	REGISTER SUBJECTS<BR/>
	<form action="" method="post" >
<table id="mytable">
  <tr>
    <td>SUBJECT CODE</td>
    <td><input type="text" name="scode" maxlength="5"  required  /></td>
  </tr>
  <tr>
    <td>SUBJECT NAME</td>
    <td><input type="text" name="sname"  required  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="ssub" value="FINISH"  />&nbsp; <input type="reset" name="reset" value="CANCEL"  /></td>
  </tr>
</table>

	</form>
	<?php
	if(isset($_POST['ssub'])){
	$scode=$_POST['scode'];
	$sname=$_POST['sname'];
	$select=mysql_query("select *from subject where CODE='$scode' and SUBJECTNAME='$sname'");
	$count=mysql_num_rows($select);
	if($count > 0){
	echo 'some little problem:-    Subject already exits.';
		 echo '<meta content="3;homet.php?action=ssub" http-equiv="refresh" />';

	}else
	$insert=mysql_query("insert into subject values('', '$scode', '$sname')");
	if($insert){
	echo $sname.' registered successfully';
	 echo '<meta content="2;homet.php?action=ssub" http-equiv="refresh" />';

	}
	}


}
else  if($action=='vsub'){//---------------------
?><style type="text/css">

th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333; }
</style><?php
$se=mysql_query("select *from subject order by ID ASC ");
$count=mysql_num_rows($se);
echo 'TOTAL SUBJECTS: '.$count;
echo '<table   style="width:100%;"><tr><th>subject_id</th><th>subject code</th><th>subject name</th></tr>';
while($rows=mysql_fetch_array($se)){

echo '<tr><td>'.$rows['ID'].'</td><td>'.$rows['CODE'].'</td><td>'.$rows['SUBJECTNAME'].'</td></tr>';

}
echo '</table>';

}
else  if($action=='smark'){//------------------------------------------------------------
    ?>
	PLEASE BE CONSISTENT
		<form action="" method="post">
	<table id="mytable">
	<tr>
                <td> subjectcode</td>

                <td><select name="code" required >
                    <option>
                    <option>
                    <?php
						$result = mysql_query("SELECT  * FROM subject");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['CODE'].'">';
								echo $row['SUBJECTNAME'];
								echo '</option>';
							}
						?>
                  </select>
                </td>
              </tr>
  <tr>
    <td>Lowest mark</td>
    <td><?php
	  $lm;
	  for($t=0;$t<=99;$t++){
	 $lm.="<option value=".$t.">".$t."</option>";

	  }
	  ?>
                  <select name="lm"  required>
				  <option ></option>
                    <?php  echo $lm; ?>
                  </select></td>
  </tr>
  <tr>
    <td>highest mark</td>
    <td><?php
	  $hm;
	  for($t=1;$t<=100;$t++){
	 $hm.="<option value=".$t.">".$t."</option>";

	  }
	  ?>
                  <select name="hm"  required>
				  <option ></option>
                    <?php  echo $hm; ?>
                  </select></td>
  </tr>
  <tr>
    <td>AGGREGATE</td>
    <td><?php
	  $op;
	  for($t=1;$t<=9;$t++){
	 $op.="<option value=".$t.">".$t."</option>";

	  }
	  ?>
                  <select name="agg"  required>
				  <option ></option>
                    <?php  echo $op; ?>
                  </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="subj" value="FINISH"  />&nbsp; <input type="reset" name="reset" value="CANCEL"  /></td>
  </tr>
</table>
</form>

  <?php

	if(isset($_POST['subj'])){
	$cd=$_POST['code'];
	$lm=$_POST['lm'];
	$hm=$_POST['hm'];
	$agg=$_POST['agg'];

	$ch=mysql_query("select *from grades where SUB_ID='$cd' AND LMARK='$lm' AND HMARK='$hm' ");
	$countentry=mysql_num_rows($ch);

	if($count > 0){
	echo 'There is some little problem:- Grading exists.' ;
	echo '<meta content="4;homet.php?action=smark" http-equiv="refresh" />';

	}else{
	$selec=mysql_query("select *from grades where SUB_ID='$cd' and LMARK=$lm and HMARK=$hm") or die(mysql_error());
	$cout=mysql_num_rows($selec);
	if($cout > 0){
	echo 'some little problem:-   The entry exists';
	echo '<meta content="3;homet.php?action=smark" http-equiv="refresh" />';

	}else
	$inser=mysql_query("insert into grades values('', '$cd', $lm, $hm, $agg)") or die(mysql_error());
	if($inser){
	echo 'GRADE RANGE 	has been set successfully';
	echo '<meta content="2;homet.php?action=smark" http-equiv="refresh" />';

	}
	}
	}

}else  if($action=='usmark'){//------------------------------------------------------------
?><style type="text/css">

th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
</style><?php
$se=mysql_query("select *from grades ");
$count=mysql_query($se);

echo '<table   style="width:100%;"><tr><th>subject code</th><th>lowest mark</th><th>highest mark</th><th>aggregate</th><th colspan=2 >action</th></tr>';
while($rows=mysql_fetch_array($se)){

echo '<tr><td>'.$rows['SUB_ID'].'</td><td>'.$rows['LMARK'].'</td><td>'.$rows['HMARK'].'</td><td>'.$rows['AGGREGATE'].'</td><td><a href=modifygrade.php?id='.$rows['ID'].'><img src="images/edit-icon.png" width=30 height=30 title=MODIFY_RECORD /></a></td><td><a href=deletegrade.php?id='.$rows['ID'].'><img src="images/deletee.png" width="30" height="30" title=DELETE_RECORD /></a></td></tr>';

}
echo '</table>';
}else  if($action=='test'){//----
include 'graph/index.php';
}
else  if($action=='search'){//------------------------------------------------------------

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
              <td rowspan="5"><img src="<?php echo $array['location']; ?>" width="200" height="200"  id="images"/></td>
            </tr>
            <tr>
              <td>GENDER </td>
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

}?>
      <div class="cleaner"></div>
    </div>
    <!-- END of school_main -->
<div id="school_footer">
            <div align=center> Copyright &copy; 2013 Your School Name.</div>

    </div>
    <!-- END of school_footer -->
  </div>
  <!-- END of school_wrapper -->
</div>
<!-- END of school_body_wrapper -->
</div>
</body>
</html>
