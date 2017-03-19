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
<!------------------------------>


<div style="float:right; margin-right:24px;" ;>
  <!--<?php echo '<img src="../images/admin.png"><font color="orange"> &nbsp;'.$FirstName." ".$LastName .'</font>';?>-->
  <a href="../logout.php" class="logout">Logout</a></div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Ndiuni Primary</title>
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
    <!--<h4 align="center"><font color="skyblue"><b><br>NDUANI PRIMARY SCHOOL MANAGEMENT SYSTEM </b><br></h4>-->
    <!-- end of header -->
    <div id="school_menubar">
      <div id="top_nav" class="ddsmoothmenu">
        <ul>
          <li><a href="?action=home" >Home</a></li>
          <li><a href="#">Register</a>
            <ul>
              <li><a href='?action=student'> Pupils</a></li>
            </ul>
          </li>
          <li><a href="?action=recordstudent">View pupils</a></li>
          <li><a href="?action=upload">upload pupil photo</a></li>
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
      <!--  <div id="slider-wrapper">
          <div id="slider" class="nivoSlider"> <img src='slider/bg1.jpg' alt="image" width="680" title="photo 1"  /> <a href="#"><img src="slider/bg2.jpg" alt="" width="680" title="photo 2" /></a> <img src="slider/bg3.jpg" alt="image" width="680" title="photo 3" /> <img src="slider/bg4.jpg" alt="image" width="680" title="photo 4" /> <img src="slider/bg5.jpg" alt="image" width="680" title="photo 5" title="##htmlcaption"   /> <img src="slider/bg6.jpg" alt="image" width="680" title="photo 6" /> <img src="slider/bg7.jpg" alt="image" width="680" title="photo 7" /> <img src="slider/bg1.jpg" alt="image" width="680" title="photo 1"  /> </div>
          <div id="htmlcaption" class="nivo-html-caption"> j<a href="#">j </a> j. </div>
        </div>-->
        <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
        <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            </script>
        <p>&nbsp;</p>
        <!--<h1>NDUANI PRIMARY SCHOOL</h1>-->

          <?php }
	 else  if($action=='search'){//------------------------------------------------------------

 $search=$_POST['search'];


$query=mysql_query("SELECT * from student , image where image.image_id='$search' AND student.STNAME='$search'")or die(mysql_error());
$array=mysql_fetch_array($query);
$count=mysql_num_rows($query);

?>
          <table style="border: 3px double #FF6600; background:url(../images/powder.gif);background-size:cover; padding:12px; color:#003366">
            <tr>
              <td scope="col" colspan="3" align="center">NDUANI PRIMARY SCHOOL </td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="175" height="34">Pupil name</td>
              <td width="251"><?php echo $array['STNAME'];?> </td>
              <td rowspan="5"><img src="<?php echo $array['location']; ?>" width="200" height="200"  id="images"/></td>
            </tr>
            <tr>
              <td>Gender </td>
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

}else if($action=='student'){//-------------------------------------------------------------------------------------------------
?>
          <p>Register pupils </p>
          <p>&nbsp;</p>
          <form action="?action=registered" method="post" name="myform">
            <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
              <tr>
                <td  height="24">Pupil name</td>
                <td >&nbsp;</td>
                <td ><input type="text" name="fname" size="30" id='in'title="enter you first name here" required minlength ="2">

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
                </td>
              </tr>
              <tr>
                <td>gender</td>
                <td>&nbsp;</td>
                <td><input type="radio"  name="sex" value="M" title="choose either male by clicking here" required />
                  male
                  <input type="radio" name="sex" value="F" title='choose female by clicking here' required />
                  female</td>
              </tr>
              <tr>
                <td>age</td>
                <td>&nbsp;</td>
                <td><?php
	  $op;
	  for($t=6;$t<=30;$t++){
	 $op.="<option value=".$t.">".$t."</option>";

	  }
	  ?>
                  <select name="age"  required>
                    <?php  echo $op; ?>
                  </select></td>
              </tr>
              <tr>
                <td>district</td>
                <td>&nbsp;</td>
                <td><input type="text" name="dis" size="30" id='dis' title="you district here" required />
                  <script>
                                  $(document).ready(function(){
                      $("#dis").keypress(function(event){
                          var inputValue = event.charCode;
                          if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
                              event.preventDefault();
                          }
                      });
                  });
                  </script>

                </td>
              </tr>
              <tr>
                <td>Parent/Guardian name</td>
                <td>&nbsp;</td>
                <td><input type="text" name="pname" size="30" id='pname'title="parents name here" required />
                  <script>
                                  $(document).ready(function()
                                  {
                      $("#pname").keypress(function(event)

                      {
                          var inputValue = event.charCode;
                          if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0))

                          {
                            alert("Numbers not allowed!");
                              event.preventDefault();

                          }
                      });
                  });
                  </script>

                </td>
              </tr>
              <tr>
                <td>Parent Contacts</td>
                <td>&nbsp;</td>
                <td><input type="text" name="pcontact" size="30" id='phone' title="parents contact" required onkeypress="return isNumber(event)"/>
<script>
                  function isNumber(evt)

                   {

                      evt = (evt) ? evt : window.event;
                      var charCode = (evt.which) ? evt.which : evt.keyCode;
                      if (charCode > 31 && (charCode < 48 || charCode > 57))

                      {
                        alert("Alphabet not allowed!");

                          return false;

                      }
                      return true;
                  }
</script>

                </td>

              </tr>
              <tr>
                <td>Scholar</td>
                <td>&nbsp;</td>
                <td><input type="radio"  name="type" value="DAY" id='in'title="day student" required/>
                  Day
                  <!--<input type="radio" name="type" value="BORDING" id='in'title='bording student'required/>
                  Bording-->
                </td>
              </tr>
              <tr>
                <td>Class</td>
                <td>&nbsp;</td>
                <td><select name="class" size="1" title="senior ?" required>
                    <option ></option>
                    <option value="CLASS ONE">Class.1</option>
                    <option value="CLASS TWO">Class.2</option>
                    <option value="CLASS THREE">Class.3</option>
                    <option value="CLASS FOUR">Class.4</option>
                    <option value="CLASS FIVE">Class.5</option>
                    <option value="CLASS SIX">Class.6</option>
                    <option value="CLASS SEVEN">Class.7</option>
                    <option value="CLASS EIGHT">Class.8</option>
                  </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input type="submit" name="send" id='send'value="send data" />
                  <input type='reset' id='clear'name="clear" value=" cancel"  /></td>
              </tr>
            </table>
          </form>

        <?php
}else if($action=='registered'){//---------------------------------------------------------------------------------------------
$id=$_POST['id'];
$fname =$_POST['fname'];
$lname=$_POST['lname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$dis=$_POST['dis'];
$pname=$_POST['pname'];
$dbstudent=$_POST['type'];
$room=$_POST['room'];
$form=$_POST['class'];
if($dbstudent=='DAY'){
$room='NONE';
}
//$inse= mysql_query("INSERT INTO  studentmark (STUDENT_ID)VALUES ('$id')");
$insert= "INSERT INTO  student VALUES ('','$fname','$sex', '$age', '$dis','$pname', '$dbstudent', '$form','Active',curdate())";
mysql_query("update table student set status='Active' where offering='day'");
$query=mysql_query($insert);
if($query){
echo '<img src="images/492.png" /> &nbsp;! data inserted successfully';
 echo '<meta content="2;home.php?action=student" http-equiv="refresh" />';

}else
echo 'failed to insert data'. mysql_error();
echo '<meta content="2;home.php?action=student" http-equiv="refresh" />';

}else if($action=='recordstudent'){//------------------------------------------------------------------------------------
?><style type="text/css">

th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
</style>
        <a href="print.php?action=print">print the record</a>
        <?php
$sel=mysql_query("SELECT * FROM student");
echo '<table class="out">';
echo '<th>NAMES</th><th>GENDER</th><th>DISTRICT</th><th>PARENT</th><th>OFFERTYPE</th><th>CLASS</th><th>STATUS</th><th colspan=1>ACTION</th>';

while($fetch=mysql_fetch_array($sel)){

echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['SEX'].'</td><td>'.$fetch['DISTRICT'].'</td><td>'.$fetch['GUARDIAN'].'</td><td>'.$fetch['OFFERING'].'</td><td>'.$fetch['CLASS'].'</td><td>'.$fetch['STATUS'].'</td><td><a href=modifyst.php?id='.$fetch['STUDENT_ID'].'><img src="../images/edit-icon.png" width=30 height=30 title=MODIFY_RECORD /></a></td></tr>';

}
echo '</table>';
}else if($action=='upload'){//---------------------------------------------------------------------------------------------

echo '<br/>About to upload';
?>
        <form  method="POST" enctype="multipart/form-data" id="mytable">
          <table>
            <tr>
              <td>Pupil Name:</td>
              <td><select name="owner" required >
                  <option>
                  <option>
                  <?php
						$result = mysql_query("SELECT STNAME FROM student WHERE STNAME NOT IN (SELECT image_id FROM image)");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['STNAME'].'">';
								echo $row['STNAME'];
								echo '</option>';
							}
						?>
                </select>
              </td>
            </tr>
            <tr>
              <td>PHOTO:</td>
              <td><input type="file" name="image"  id="in" required /></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" name="submit" value="Upload"  />
                <input type="reset" name="reset" value="Cancel Upload"  /></td>
            </tr>
          </table>
        </form>
        <?php

 if (isset($_POST['submit'])) {

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];
								$owner=$_POST['owner'];
                                mysql_query("insert into image (image_id,location)
values ('$owner','$location')
") or die(mysql_error());



	 $query=mysql_query("select * from image, student where image.image_id='$owner' and student.STNAME='$owner'")or die(mysql_error());
	 while($row=mysql_fetch_array($query)){

	 echo 'THE STUDENT IS '.$row['STNAME'].'<BR/>';
	 ?>
        <img src="<?php echo $row['location']; ?>" width="100" height="100" alt="" class="img-rounded">
        <?php
	}

    echo '<meta content="4;home.php?action=upload" http-equiv="refresh" />';
                            }
}else if($action=='search'){//------------------------------------------------------------

 $search=$_POST['search'];

$do=mysql_query("SELECT * from student , image where image.image_id='$search' AND student.STNAME='$search'")or die(mysql_error());
$array=mysql_fetch_array($do);
$count=mysql_num_rows($do);
if($count >0){


?>
        <table style="border: 3px double #FF6600; background:url(images/powder.gif);background-size:cover; padding:12px; color:#003366">
          <tr>
            <td scope="col" colspan="3" align="center">NDUANI PRIMARY SCHOOL </td>
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
}

}
?>
      <div class="cleaner"></div>
    </div>
    <!-- END of school_main -->
<div id="school_footer">
          <div align=center> Copyright &copy; 2016 SMS </div>

  </div>
  <!-- END of school_footer -->
</div>
<!-- END of school_wrapper -->
</div>
<!-- END of school_body_wrapper -->
</div>
</div>
</body>
</html>
