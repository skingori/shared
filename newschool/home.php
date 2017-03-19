<?php
			error_reporting("E_NOTICE");
			?>
<?php
			////include('header.php');
			include('connection.php');
			session_start();

			if (!isset($_SESSION['user_id'])){
			header('location:index.php');
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
  <!--<?php echo '<img src="images/admin.png"><font color="orange"> &nbsp;'.$FirstName." ".$LastName .'</font>';?>-->
  <a href="logout.php" class="logout"><b>Logout</a></b></div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to ndiuni primary school</title>
<link rel="icon" type="image/ico" href="images/BOOKS.ico"/>
<meta name="keywords" content="school management system" />
<meta name="description" content="school management system" />
<link href="school.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<link href="date/htmlDatepicker.css" rel="stylesheet" />
<script language="JavaScript" src="date/htmlDatepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="improve/graph/js/awesomechart.js"></script>
<script type="text/javascript" src="improve/graph/js/jquery.js"></script>

<script type="text/javascript" src="js/ddsmoothmenu.js">

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
    <!--<h5 align="center"><font color="skyblue"><b><br>NDIUNI PRIMARY SCHOOL PUPIL REGISTRATION SYSTEM </b></h5>-->
    <!-- end of header -->
    <div id="school_menubar">
      <div id="top_nav" class="ddsmoothmenu">
        <ul>
          <li><a href="?action=home" >Home</a></li>
          <li><a href="#">Update</a>
            <ul>
              <li><a href='?action=teacher'> register teacher</a></li>
              <li><a href='?action=non'>register nonstaff</a></li>
              <li><a href='?action=salaryin'>teacher pay</a></li>
              <li><a href='?action=salarynon'>nonstaff pay</a></li>
              <li><a href='?action=bursary'>Pupil on bursary</a></li>
            </ul>
          </li>
          <li><a href="#">View records</a>
            <ul>
              <li><a href='?action=recordstudent'>Pupils </a></li>
              <li><a href='?action=onbursary'>Pupils on bursary </a></li>
              <li><a href='?action=recordteacher'>teachers </a></li>
              <li><a href='?action=tattend'>teachers' attendance</a></li>
              <li><a href='?action=recordnonstaff'>nonstaff</a></li>
              <li><a href='?action=report'> Pupil report card</a></li>
			<!--  <li><a href='?action=trans'>Pupil transcript</a></li>-->

              <li><a href='?action=viewpay'>Pupil pay</a></li>
              <li><a href='?action=unpaid'>unpaid pupil</a></li>
            </ul>
          </li>
          <li><a href="#">School Clubs</a>
            <ul>
              <li><a href='?action=viewclubs'>available clubs</a></li>
              <li><a href='?action=rclubs'>register a club</a></li>
              <li><a href='?action=member'>enter pupils</a></li>
              <li><a href='?action=clubmember'>clubs members</a></li>
            </ul>
          </li>
          <li><a href="improve/cal.php">Veiw calender</a></li>
        </ul>
      </div>
      <div id="school_search">
        <form action="?action=search" method="post">
          <select value=" " name="search" id="keyword" title="Student ID"   class="txt_field" required >
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
          <input type="submit" name="submit" value=" " alt="Search" id="searchbutton" title="Student ID" class="sub_btn"  />
        </form>
      </div>
    </div>
    <!-- END of school_menubar -->
    <div id="school_main">
      <div id="sidebar" class="float_r">
        <div class="sidebar_box"><span class="bottom"></span>
          <h3>THE STAFF</h3>
          <div class="content"> Move the mouse here to PAUSE the slide<br/>
            <marquee behavior="scroll" direction="up"  height="150" scrollamount="1" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 2, 0);">
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
            <marquee behavior="scroll" direction="up"  height="150" scrollamount="2" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 2, 0);">
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
            </marquee>
          </div>
        </div>
      </div>
      <div id="content" class="float_l"> <br/>
        </br>
        <?php
					$action=$_REQUEST['action'];
					if ($action=='home'){
					?>

        <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
        <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript">
						$(window).load(function() {
							$('#slider').nivoSlider();
						});
						</script>

        <?php }
							  else if($action=='teacher'){//---------------------------------------------------------------------------------------------
			?>
        <p>Register teacher </p>
        <p>&nbsp;</p>
        <form action="?action=registered1" method="post" name="myform">
          <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
            <tr>
              <td  height="24">NAME</td>
              <td >&nbsp;</td>
              <td ><input type="text" name="fnames" size="30" id='in'title="enter you first name here" required>
							<!--validate -->
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
							<!-- End of validation -->
							
							</td>
            </tr>
            <tr>
              <td>Gender</td>
              <td>&nbsp;</td>
              <td><input type="radio" name="six" value="M" title="choose either male by clicking here" reuired/>
                male
                <input type="radio" name="six" value="F" title='choose female by clicking here' required/>
                female</td>
            </tr>
            <tr>
              <td>Age</td>
              <td>&nbsp;</td>
              <td><?php
				  $op;
				  for($t=20;$t<=50;$t++){
				 $op.="<option value=".$t.">".$t."</option>";

				  }
				  ?>
                <select name="ages"  required>
                  <?php  echo $op; ?>
                </select></td>
            </tr>
            <tr>
              <td>Qualification</td>
              <td>&nbsp;</td>
              <td><input type="text" name="quality" size="30" id='ql'title="" required/>
							 <script>
                                  $(document).ready(function(){
                      $("#ql").keypress(function(event){
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
              <td>salary</td>
              <td>&nbsp;</td>
              <td><input type="text" name="salary" size="30" id='in'title=" amount to be paid " maxlength="6" required onkeypress="return isNumber(event)"/>
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
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right"><input type="submit" name="send" id='send'value="send data" />
                <input type='reset' id='clear'name="clear" value="cancel"  /></td>
            </tr>
          </table>
        </form>

      <?php
			}else if($action=='registered1'){//------------------------------------------------------------------------------------------------
			$ids =$_POST['id'];
			$fnames =$_POST['fnames'];
			$sexs=$_POST['six'];
			$ages=$_POST['ages'];
			$qual=$_POST['quality'];
			$salary=$_POST['salary'];
			$insert= mysql_query("INSERT INTO  teachersalary (TEACH_ID, SALARY, CREDIT)VALUES ('$fnames', '$salary','$salary')");
			$ins= mysql_query("INSERT INTO  teacher VALUES ('','$fnames','$sexs','$ages','$qual','Active')");

			if($ins){
			echo '<img src="images/492.png" /> &nbsp;! data inserted successfully';
			 echo '<meta content="2;home.php?action=teacher" http-equiv="refresh" />';

			}else
			echo 'failed to insert data';
			echo mysql_error();
			//echo '<meta content="2;register1.php" http-equiv="refresh" />';

			?>
      <?php
			}else if($action=='non'){//------------------------------------------------------------------------------------------------
			?>
      <p>Register nonstaff </p>
      <p>&nbsp;</p>
      <form action="?action=registered2" method="post" name="myform">
        <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
          <tr>
            <td  height="24">NAME</td>
            <td >&nbsp;</td>
            <td ><input type="text" name="fnames" size="30" id='nname'title="enter you first name here" required>
                <script>
                                  $(document).ready(function()
                                  {
                      $("#nname").keypress(function(event)

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
            <td>gender</td>
            <td>&nbsp;</td>
            <td><input type="radio" name="six" value="M" title="choose either male by clicking here" required/>
              male
              <input type="radio" name="six" value="F" title='choose female by clicking here' required/>
              female</td>
          </tr>
          <tr>
            <td>age</td>
            <td>&nbsp;</td>
            <td><?php
				  $op;
				  for($t=18;$t<=70;$t++){
				 $op.="<option value=".$t.">".$t."</option>";

				  }
				  ?>
              <select name="ages"  required>
                <?php  echo $op; ?>
              </select></td>
          </tr>
          <tr>
            <td  height="24">DUTY</td>
            <td >&nbsp;</td>
            <td ><input type="text" name="duty" size="30" id='duty'title="" required>
						<script>
                                  $(document).ready(function()
                                  {
                      $("#duty").keypress(function(event)

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
            <td>salary</td>
            <td>&nbsp;</td>
            <td><input type="text" name="salary" size="30" maxlength="6" id='in'title=" amount to be paid " required onkeypress="return isNumber(event)"/>
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
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right"><input type="submit" name="send" id='send'value="send data" />
              <input type='reset' id='clear'name="clear" value="cancel"  /></td>
          </tr>
        </table>
      </form>

    <?php
			}else if($action=='registered2'){//------------------------------------------------------------------------------------

			$fnames =$_POST['fnames'];
			$dut=$_POST['duty'];
			$sexs=$_POST['six'];
			$ages=$_POST['ages'];

			$salary=$_POST['salary'];
			$insert= mysql_query("INSERT INTO nonstaffpay (NON_ID, SALARY, CREDIT)VALUES ('$fnames', '$salary','$salary')");
			$ins= mysql_query("INSERT INTO  nonstaff VALUES ('','$fnames','$sexs','$ages','$dut','Active')");

			if($ins){
			echo '<img src="images/492.png" /> &nbsp;! data inserted successfully';
			 echo '<meta content="2;home.php?action=non" http-equiv="refresh" />';

			}else
			echo 'failed to insert data';
			echo mysql_error();
			//echo '<meta content="2;register1.php" http-equiv="refresh" />';

			?>
    <?php
			}else if($action=='recordstudent'){//------------------------------------------------------------------------------------
			?>
    <style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
   <!-- <a href="print.php">print the record</a>-->
    <?php
			$male=mysql_query("select *from student where SEX='M'");
			$countMALE=mysql_num_rows($male);

			$female=mysql_query("select *from student where SEX='F'");
			$countfemale=mysql_num_rows($female);

			echo '<br/> Information: There are '.$countMALE. ' male students and '.$countfemale. ' female students<br/> Total number number of students is ' .($countMALE+ $countfemale) ;
			$sel=mysql_query("SELECT * FROM student");
			echo '<table style="width:100%;">';
			echo '<th>NAME</th><th>GENDER</th><th>DISTRICT</th><th>PARENT</th><th>OFFERTYPE</th><th>CLASS</th><th>STATUS</th><th colspan=2>ACTION</th>';

			while($fetch=mysql_fetch_array($sel)){


			echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['GENDER'].'</td><td>'.$fetch['DISTRICT'].'</td><td>'.$fetch['GUARDIAN'].'</td><td>'.$fetch['OFFERING'].'</td><td>'.$fetch['CLASS'].'</td><td>'.$fetch['STATUS'].'<td><a href=modifyst.php?id='.$fetch['STUDENT_ID'].'><img src="images/edit-icon.png" width=30 height=30 title=MODIFY_RECORD /></a></td><td><a href=deletest.php?id='.$fetch['STUDENT_ID'].'><img src="images/deletee.png" width="30" height="30" title=DELETE_RECORD /></a></td></tr>';

			}
			echo '</table>';
			?>

  <?php

			}else if($action=='recordteacher'){//------------------------------------------------------------------------------------
			?>
  <style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
  <?php
			$sel=mysql_query("SELECT * FROM teacher");
			echo '<table style="width:100%;">';
			echo '<th>NAMES</th><th>GENDER</th><th>AGE</th><th>QUALIFICATION</th><th>STATUS</th><th colspan=2>ACTION</th>';
			$rowcolor=0;

			$intt=mysql_num_rows($sel);

			while($fetch=mysql_fetch_array($sel)){


			echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['SEX'].'</td><td>'.$fetch['AGE'].'</td><td align="middle">'.$fetch['QUALITY'].'</td><td>'.$fetch['STATUS'].'</td><td><!--<a href=modifytr.php?id='.$fetch['TEACH_ID'].'><img src="images/edit-icon.png" width=30 height=30 title=MODIFY_RECORD /></a></td><td>--><a href=deletetr.php?id='.$fetch['TEACH_ID'].'><img src="images/deletee.png" width="30" height="30" title=DELETE_RECORD /></a></td></tr>';

			}
			echo '</table>';
			?>

<?php
			}else if($action=='recordnonstaff'){//-------------------------------------------------------------------------------------
			?>
<style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
<?php
			$sel=mysql_query("SELECT * FROM nonstaff");
			echo '<table style="width:100%;">';
			echo '<th>NAMES</th><th>GENDER</th><th>AGE</th><th>DUTY</th><th>STATUS</th><th colspan=2>ACTION</th>';

			while($fetch=mysql_fetch_array($sel)){


			echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['SEX'].'</td><td>'.$fetch['AGE'].'</td><td>'.$fetch['DUTY'].'</td><td>'.$fetch['STATUS'].'</td><td><!--<a href=modifyns.php?id='.$fetch['NONS_ID'].'><img src="images/edit-icon.png" width=30 height=30 title=MODIFY_RECORD />--></a></td><td><a href=deletens.php?id='.$fetch['NONS_ID'].'><img src="images/deletee.png" width="30" height="30" title=DELETE_RECORD /></a></td></tr>';

			}
			echo '</table>';
			?>

<?php
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
        <input type="submit" name="go"  value="getreport" id='n' />
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

			?>
<style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			img{ border-radius:5px;}
			</style>
<?php
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
			 echo '<table   style="width:100%"><tr><th width="130">';?>
<img src="<?php echo 'improve/'.$image['location']; ?>" width="130" height="130"  id="images"/><?php echo '</th><th colspan="3" align="center"><p>NDIUNI PRIMARY SCHOOL </p>
				  <p>P.O BOX 96,Katangi Machakos</p>

				  <p><U>REPORT CARD</U> </p>
				  <p>PUPIL\'s FULL NAME: '.$fetch['STNAME'].'</p></th><th width="130">'; ?><img src="<?php echo 'improve/'.$image['location']; ?>" width="130" height="130"  id="images"/>
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
				<td><a href="#maths.php">'?>
<?php

				include 'improve/maths.php';

				echo '</a></td>
				<td><a href="#maths2.php">'?>
<?php

				include 'improve/maths2.php';

				echo '</a></td>
			  <td><a href="#maths2.php">'?>
<?php

				include 'improve/maths3.php';

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
				  <center>Ndiuni Primary school </center>
				  </p></td>


			  </tr></table>';

			    include 'improve/graph/index.php';


			}else
			echo $name .' does not have his marks recorded. Report not available';


			}
			?>

<?php
			}else if($action=='tattend'){//----------------------------------------------------------------------========

			//select from tattendance
			?>
<style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
<?php
			$sel=mysql_query("SELECT * FROM teachercheck");
			echo '<table style="width:100%;">';
			echo '<th align="left">NAME</th><th align="left">DATE  </th><th align="left">TIME </th><th align="left">ACTION</th>';
			$flag = 0;
			while($fetch=mysql_fetch_array($sel)){
			echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['2'].'</td><td>'.$fetch['3'].'</td><td ><a href=trash.php?id='.$fetch['ID'].'><img src="images/deletee.png" width="30" height="30" title=DELETE_RECORD /></a></td></tr>';

			}
			echo '</table>';
			echo '<table align="center">';
			echo '<BR><BR><th align="left">NAME</th><th align="left">No OF APPEARANCE</th>';

			$selt=mysql_query("SELECT COUNT(NAME) as times , NAME FROM teachercheck GROUP BY NAME") or die (mysql_error()) ;
			while($fetch=mysql_fetch_array($selt)){
			echo '<tr><td>'.$fetch['NAME'].'</td><td align="center">'.$fetch['times'].'</td></tr>';
			}
			echo '</table>';


			}else if($action=='bursary'){//----------------------------------------------------------------------========
			?>
<p>Register pupils on bursary </p>
<p>&nbsp;</p>
<form action="" method="post" name="myform">
  <table  border="0" cellspacing="3" cellpadding="5" id="mytable" >
    <tr>
      <td  height="24">Pupil NAME</td>
      <td >&nbsp;</td>
      <td ><input type="text" name="bname" size="30" id='pname' required>
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
      <td>Amount to pay </td>
      <td>&nbsp;</td>
      <td><input type="text" name="amount" size="30" id='in' required onkeypress="return isNumber(event)"/>
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right"><input type="submit" name="sen" id='send'value="send data" />
        <input type='reset' id='clear'name="clear" value="cancel"  /></td>
    </tr>
  </table>
</form>
<?php
			if(isset($_POST['sen'])){
			echo 'ok';
			$name=$_POST['bname'];
			$amount=$_POST['amount'];
			$getst=mysql_query("select *from student where STNAME='$name' ");
			$fe=mysql_fetch_array($getst);
			$class= $fe['CLASS'];
			$sex= $fe['SEX'];

			$goburs=mysql_query("insert into bursarystudent values('','$name','$class','$sex','$amount')");

			if($goburs){
			echo '<img src="images/492.png" /> &nbsp;! data inserted successfully';
			 echo '<meta content="2;home.php?action=onbursary" http-equiv="refresh" />';

			}
			}

			}else if($action=='onbursary'){

			?>
<style type="text/css">
			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
<?php
			$sel=mysql_query("SELECT * FROM bursarystudent");
			echo '<table style="width:100%">';
			echo '<th align=left>PUPIL</th><th align=left>CLASS</th><th align=left>GENDER</th><th align=left>AMOUNT PAID</th><th align="left">ACTION</th>';
			$flag = 0;
			while($fetch=mysql_fetch_array($sel)){




			echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['2'].'</td><td>'.$fetch['3'].'</td><td>'.$fetch['4'].'</td><td><a href=deletebursary.php?id='.$fetch['ID'].'><img src="images/deletee.png" width=30 height=30 title=MODIFY_RECORD /></a></td></tr>';


			}
			echo '</table>';
			?>
<?php

			}else if($action=='studentmoney'){//----------------------------------------------------------------------========
			?>
<div style="float:left">school fees</div>
<div  style="float:right"><a href="?action=item">Other items</a> </div>
<p style="height:30px"></p>
<form action="" method="post" >
  <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
    <tr>
      <td align="right" colspan="3"><input type="text" name="tution" placeholder="CURRENT TUTION" required /></td>
      </td>
    </tr>
    <tr>
      <td  height="24">Names</td>
      <td >&nbsp;</td>
      <td ><select name="firstname" required >
          <option>
          <option>
          <?php
									$result = mysql_query("SELECT STNAME FROM student WHERE STNAME NOT IN (SELECT STNAME FROM payments)") ;
									while($row = mysql_fetch_array($result))
										{
											echo '<option value="'.$row['STNAME'].'">';
											echo $row['STNAME'];
											echo '</option>';
										}
									?>
        </select></td>
    </tr>
    <tr>
      <td>class</td>
      <td></td>
      <td><select name="class"  title="senior ?">
				<option value="CLASS ONE">CLASS ONE</option>
				<option value="CLASS TWO">CLASS TWO</option>
				<option value="CLASS THREE">CLASS THREE</option>
				<option value="CLASS FOUR">CLASS FOUR</option>
				<option value="CLASS FIVE">CLASS FIVE</option>
				<option value="CLASS SIX">CLASS SIX</option>
				<option value="CLASS SEVEN">CLASS SEVEN</option>
				<option value="CLASS EIGHT">CLASS EIGHT</option>
        </select></td>
    </tr>
    <tr>
      <td>Term</td>
      <td></td>
      <td><select name="term"  title="Term">
          <option value="FIRST TERM">1st Term</option>
          <option value="SECOND TERM">2nd Term</option>
          <option value="THIRD TERM">3rd Term</option>
        </select></td>
    </tr>
    <tr>
      <td>year</td>
      <td></td>
      <td><?php
									$options=0;
										for($ya=2011; $ya<=2017; $ya++)
										{
											$options.="<option value=".$ya.">".$ya."</option>";
										}
									?>
        <select name="year">
          <?php echo $options; ?>
        </select></td>
    </tr>
    <tr>
      <td>Amount paid</td>
      <td>&nbsp;</td>
      <td><input type="text" name="amount" size="30" id='in'title="pay money" /></td>
    </tr>
    <tr>
      <td>date</td>
      <td>&nbsp;</td>
      <td><input type="text" id="SelectedDate" name='date' readonly onclick="GetDate(this)" placeholder='select date' /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="bottom" align="center"><input type="submit" name="send" id='send'value="send data" />
        <input type='reset' id='clear'name="clear" value="cancel"  /></td>
    </tr>
  </table>
</form>
<?php
			if(isset($_POST['send'])){

			$fnames =$_POST['firstname'];

			$class=$_POST['class'];
			$term=$_POST['term'];
			$year=$_POST['year'];
			$id=$_POST['id'];
			$tution=$_POST['tution'];

			$amount =$_POST['amount'];
			$dues=0;
			$balance=0;
			$date=$_POST['date'];

			//echo $day;

			$dues=$tution-$amount;

			$balance=$amount-$tution;

			$ins= mysql_query("INSERT INTO  payments VALUES ('','$fnames','$class','$term',$year,$tution,$amount,$dues,$balance,'$date')") or die (mysql_error());

			if($ins){
			echo '<img src="images/492.png" /> &nbsp;! data inserted successfully';
			 echo '<meta content="2;home.php?action=viewpay" http-equiv="refresh" />';

			}else
			echo 'failed to insert data';
			echo mysql_error();
			//echo '<meta content="2;register1.php" http-equiv="refresh" />';

			}
			}else if($action=='unpaid'){

			?>
<style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
<?php
			echo 'unpaid';
			echo '<table style="width:100%"><th align=left>Student</th><th align=left>Gender</th><th align=left>class</th>';

			$result = mysql_query("SELECT *FROM student WHERE STNAME NOT IN (SELECT STNAME FROM payments) and STNAME NOT IN  (SELECT NAME FROM bursarystudent)") ;
			while($row = mysql_fetch_array($result))
										{
											echo '<tr><td>'.$row['STNAME'].'</td><td>'.$row['SEX'].'</td><td>'.$row['CLASS'].'</td><td>'.$row['TUTION'].'</td></tr>';

										}
									?>
</table>
<br>
Pupils on bursary are not listed here
<?php
			}
			else if($action=='item'){//-----------------------------------------------------------------------------------------
			?>
<form action="" method="post" >
  <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
    <tr>
      <td  height="24">Pupil Name</td>
      <td >&nbsp;</td>
      <td ><select name="firstname" required >
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
        </select></td>
    </tr>
    <tr>
      <td>Particulars</td>
      <td></td>
      <td><textarea name="item" placeholder="list items being paid for here" cols=40 rows=30 wrap="virtual" required></textarea></td>
    </tr>
    <tr>
      <td>Amount(total)</td>
      <td>&nbsp;</td>
      <td><input type="text" name="amount" size="30" id='in' maxlength="6"/></td>
    </tr>
    <tr>
      <td>date</td>
      <td>&nbsp;</td>
      <td><input type="text" id="SelectedDate" name='date' readonly onclick="GetDate(this)" placeholder='select date' /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="bottom" align="center"><input type="submit" name="send" id='send'value="send data" />
        <input type='reset' id='clear'name="clear" value="cancel"  /></td>
    </tr>
  </table>
</form>
<?php
			if(isset($_POST['send'])){

			$fnames =$_POST['firstname'];

			$item=$_POST['item'];

			$amount =$_POST['amount'];

			$date=$_POST['date'];

			//echo $day;

			$ins= mysql_query("INSERT INTO  itempay VALUES ('','$fnames','$item',$amount,'$date')") or die (mysql_error());

			if($ins){
			echo '<img src="images/492.png" /> &nbsp;! data inserted successfully';
			 echo '<meta content="2;home.php?action=viewitems" http-equiv="refresh" />';

			}else
			echo 'failed to insert data';
			echo mysql_error();
			//echo '<meta content="2;register1.php" http-equiv="refresh" />';

			}
			}
			else if($action=='viewitems'){//-----------------------------------------------------------------------------------------
			?>
<style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
<?php
			$sel=mysql_query("SELECT * FROM itempay");
			echo '<table style="width:100%">';
			echo '<th align=left>Student</th><th align=left>item(s)paid for</th><th align=left>Amount</th><th align=left>Date</th><th colspan=3>ACTION</th>';
			$flag = 0;
			while($fetch=mysql_fetch_array($sel)){




			echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['2'].'</td><td>'.$fetch['3'].'</td><td>'.$fetch['4'].'</td><td><a href=deleteitempay.php?id='.$fetch['ID'].'><img src="images/deletee.png" width=30 height=30 title=MODIFY_RECORD /></a></td><td><a href=printitem.php?id='.$fetch['ID'].'><img src="images/Print.png" width="30" height="30" title=print_out_receipt /></a></td></tr>';


			}
			echo '</table>';
			?>
<?php

			}else if($action=='viewpay'){//-----------------------------------------------------------------------------------------
			?>
<style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
<?php
			$sel=mysql_query("SELECT * FROM payments ORDER BY DATE DESC");
			echo '<table style="width:100%">';
			echo '<th>NAMES</th><th>CLASS</th><th>TERM</th><th>YEAR</th><th>AMOUNT PAID</th><th>DUES</th><th>BALANCE</th><th>DATE OF PAY</th>';
			$flag = 0;
			while($fetch=mysql_fetch_array($sel)){




			echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['2'].'</td><td>'.$fetch['3'].'</td><td>'.$fetch['4'].'</td><td>'.$fetch['6'].'</td><td>'.$fetch['7'].'</td><td>'.$fetch['8'].'</td><td>'.$fetch['9'].'</td></tr>';


			}
			echo '</table>';
			?>

<?php

			}else if($action=='rclubs'){//-----------------------------------------------------------------------------------------
			?>
<form action="" method="post" name="clubform" onsubmit="MM_validateForm('clubcode','','R','clubname','','R','description','','R','chairman','','R','patron','','R');return document.MM_returnValue">
  <table  id="mytable">
    <tr>
      <td>Club Code:</td>
      <td><input type="text" name="clubcode" id='in'/></td>
    </tr>
    <tr>
      <td>Club Name:</td>
      <td><input type="text" name="clubname" id='in'/></td>
    </tr>
    <tr>
      <td>description</td>
      <td><input type="text" name="description" id='in'/></td>
    </tr>
    <tr>
      <td>chairman</td>
      <td><input type="text" name="chairman" id='chairman'/>
			<script>
                                  $(document).ready(function(){
                      $("#chairman").keypress(function(event){
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
      <td>Patron</td>
      <td><input type="text" name="patron" id='patron' maxlength="16"/>
				 <script>
                                  $(document).ready(function(){
                      $("#patron").keypress(function(event){
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
      <td></td>
      <td><input type="submit" name="enter" value='Register' id='in'/>
        <input type="reset" name="reset" value='cancel' id='in'/>
      </td>
    </tr>
  </table>
</form>
<?php
			if(isset($_POST['enter'])){
			$ccode=$_POST['clubcode'];
			$name=$_POST['clubname'];
			$desc=$_POST['description'];
			$cm=$_POST['chairman'];
			$pat=$_POST['patron'];
			$insert=mysql_query("insert into club values('$ccode','$name','$desc','$cm','$pat',curdate(), 'Active')");
			if($insert){
			echo '<img src="images/492.png" /> &nbsp;! club registered successfully';
			 echo '<meta content="2;home.php?action=rclubs" http-equiv="refresh" />';
			}
			}
			}else if($action=='member'){//-----------------------------------------------------------------------------------------
			?>
<form action="" method="post" name="stclub" onsubmit="MM_validateForm('clubid','','R','studentid','','R');return document.MM_returnValue">
  <table  id="mytable">
    <tr>
      <td>club code</td>
      <td><input type="text" name="clubid"  id='in'/></td>
    </tr>
    <tr>
      <td>Pupil name</td>
      <td><select name="studentid" required >
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
        </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="sub" value="submit"  />
        <input type="reset" name="reset" value="cancel" /></td>
    </tr>
  </table>
</form>
<?php
			if(isset($_POST['sub'])){

			$ccode=$_POST['clubid'];
			$stid=$_POST['studentid'];
			$selc=mysql_query("select *from clubmember where CLUB_ID='$ccode' and MEMBER_ID='$stid'");
			$count=mysql_num_rows($selc);
			if($count >0){
			echo 'Sorry! Student is already a registered member of club';
			 echo '<meta content="3;home.php?action=member" http-equiv="refresh" />';

			}else{
			$insert=mysql_query("insert into clubmember values('$ccode', '$stid', curdate())")or die (mysql_error());
			if($insert){
			echo '<img src="images/492.png" /> &nbsp;! member registered successfully';
			 echo '<meta content="2;home.php?action=member" http-equiv="refresh" />';
			}
			}

			}
			}else if($action=='salaryin'){//-----------------------------------------------------------------------------------------

			 ?>
<form id="mytable" method="post">
  <br>
  <br/>
  Enter NAME
  <select name="tid" required >
    <option>
    <option>
    <?php
									$result = mysql_query("SELECT  * FROM teacher, teachersalary where teacher.NAMES=teachersalary.TEACH_ID");
									while($row = mysql_fetch_array($result))
										{
											echo '<option value="'.$row['NAMES'].'">';
											echo $row['NAMES'];
											echo '</option>';
										}
									?>
  </select>
  <input type="submit" name="do" value="continue" />
</form>
<?php
			if (isset($_POST['do'])){
			$id=$_REQUEST['tid'];

			$sel=mysql_query("SELECT * FROM teacher, teachersalary WHERE teacher.NAMES='$id' AND teachersalary.TEACH_ID='$id' ");

			$fetch=mysql_fetch_array($sel);
			if(($fetch['DAYPAY1']=='0000-00-00') && ($fetch['DAYPAY2']=='0000-00-00') &&( $fetch['PAYAMOUNT']==0 ) ) {
			echo $fetch['NAMES']. '<font color=#FF6633> has not been paid</font> ';
			} else
			if(($fetch['DAYPAY1']!='0000-00-00') || ($fetch['DAYPAY2']!='0000-00-00') || ($fetch['PAYAMOUNT']!=0)  ){
			echo $fetch['NAMES']. '<font color=#FF6633> has been paid </font> ';

			}
			if(($fetch['DAYPAY1']!='0000-00-00') &&($fetch['DAYPAY2']!='0000-00-00') && ($fetch['PAYAMOUNT']!=0) && ($fetch['CREDIT']==0) ){
			echo '<font color=#FF6633>, fully paid </font> ';

			}

			?>
<form  method="post" name="myform">
  <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
    <tr>
      <td  height="24">Name</td>
      <td >&nbsp;</td>
      <td ><input type="text" name="fname" size="30" id='in' value="<?php echo $fetch['NAMES'] ?>" readonly /></td>
    </tr>
    <tr>
      <td>gender</td>
      <td>&nbsp;</td>
      <td><input type="text" name="sex" size="30" id='in' value="<?php echo $fetch['SEX'] ?>" readonly /></td>
    </tr>
    <tr>
      <td>Qualifications:</td>
      <td>&nbsp;</td>
      <td><input type="text" name="ahaa" size="30" id='in' value="<?php echo $fetch['4'] ?>" readonly /></td>
    </tr>
    <tr>
      <td>SALARY</td>
      <td>&nbsp;</td>
      <td><input type="text" name="sal" size="30" id='in' value="<?php echo $fetch['SALARY'] ?>" readonly /></td>
    </tr>
    <tr>
      <td>amount PAY</td>
      <td>&nbsp;</td>
      <td><input type="text" name="paid" size="30" id='in' maxlength="6" value="<?php echo $fetch['PAYAMOUNT'] ?>" onkeypress="return isNumber(event)" />

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
				<br>
        <font size="-1">Replace the above figure to complete pay </font>
			</td>
    </tr>
    <tr>
      <td>Credit </td>
      <td>&nbsp;</td>
      <td><font color="yellow" size="-1">
        <?php if(($fetch['SALARY'])<=($fetch['PAYAMOUNT']))
					{
					echo 'Credit: '.($fetch['SALARY']-$fetch['PAYAMOUNT']). ' <font color=red><blink>Fully paid</blink></font>';

					}else

					echo 'Credit: '.($fetch['SALARY']-$fetch['PAYAMOUNT']);

					?>
        </font> </td>
    </tr>
    <tr>
      <td>Date of first pay</td>
      <td>&nbsp;</td>
      <td><input type="date" name="date1" input style="width:200px;" id='in' value="<?php echo $fetch['DAYPAY1'] ?>"  />
        <br/>
        <font color="grey" size="-1">DD-MM-YYY</font></td>
    </tr>
    <tr>
      <td>Date of LAST pay</td>
      <td>&nbsp;</td>
      <td><input type="date" name="date2" input style="width:200px;" id='in' value="<?php echo $fetch['DAYPAY2'] ?>"  /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right"><input type="submit" name="send" id='send'value="update" />
        <input type='reset' id='clear'name="clear" value="cancel"  /></td>
    </tr>
  </table>
  <input type="hidden" name="id1" value="<?php echo $fetch['TEACH_ID'] ?>"  />
  <input type="hidden" name="id2" value="<?php echo $fetch['PAY_ID'] ?>"  />
</form>
<?php
			  }
								if (isset($_POST['send'])){

			$fname =$_REQUEST['fname'];
			$sex=$_REQUEST['sex'];
			//$quality=$_REQUEST['ahaa'];
			$sal=$_REQUEST['sal'];
			$paid=$_REQUEST['paid'];
			$credit=$_REQUEST['credit'];
			$day1=$_REQUEST['date1'];
			$day2=$_REQUEST['date2'];
			$id1=$_POST['id1'];
			$id2=$_POST['id2'];
			if($paid!='' && (($day1=='0000-00-00') || ($day1=='0000-00-00') )){
			echo '<font color=yellow><blink> !</blink></font> please enter date of payments and resubmit';

			}else{

			$credit1=$sal-$paid;

			$insert= mysql_query("UPDATE teachersalary set PAYAMOUNT=$paid,CREDIT=$credit1,DAYPAY1='$day1',DAYPAY2='$day2'
			WHERE TEACH_ID='$id1' AND PAY_ID='$id2'");

			if($insert){
			echo '<img src="images/492.png" /> &nbsp;! data updated successfully';
			 echo '<meta content="2;home.php?action=salaryin" http-equiv="refresh" />';

			}else
			echo 'failed to insert data';
			echo mysql_error();
			//echo '<meta content="2;modifyst.php" http-equiv="refresh" />';
			}
			}

			}else if($action=='salarynon'){//-----------------------------------------------------------------------------------------

			 ?>
<form id="mytable" method="post">
  <br>
  <br/>
  Enter NAME
  <select name="tid" required >
    <option>
    <option>
    <?php
									$result = mysql_query("SELECT  * FROM nonstaff, nonstaffpay where nonstaff.NAME=nonstaffpay.NON_ID");
									while($row = mysql_fetch_array($result))
										{
											echo '<option value="'.$row['NAME'].'">';
											echo $row['NAME'];
											echo '</option>';
										}
									?>
  </select>
  <input type="submit" name="do" value="continue" />
</form>
<?php
			if (isset($_POST['do'])){
			$id=$_REQUEST['tid'];

			$sel=mysql_query("SELECT * FROM nonstaff, nonstaffpay WHERE nonstaff.NAME='$id' AND nonstaffpay.NON_ID='$id' ");

			$fetch=mysql_fetch_array($sel);
			if(($fetch['DAYPAY1']=='0000-00-00') && ($fetch['DAYPAY2']=='0000-00-00') &&( $fetch['PAYAMOUNT']==0 ) ) {
			echo $fetch['NAME']. '<font color=#FF6633> has not been paid</font> ';
			} else
			if(($fetch['DAYPAY1']!='0000-00-00') || ($fetch['DAYPAY2']!='0000-00-00') || ($fetch['PAYAMOUNT']!=0)  ){
			echo $fetch['NAME']. '<font color=#FF6633> has been paid </font> ';

			}
			if(($fetch['DAYPAY1']!='0000-00-00') &&($fetch['DAYPAY2']!='0000-00-00') && ($fetch['PAYAMOUNT']!=0) && ($fetch['CREDIT']==0) ){
			echo '<font color=#FF6633>, fully paid </font> ';

			}

			?>
<form  method="post" name="myform">
  <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
    <tr>
      <td  height="24">Name</td>
      <td >&nbsp;</td>
      <td ><input type="text" name="fname" size="30" id='in' value="<?php echo $fetch['NAME'] ?>" readonly /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>&nbsp;</td>
      <td><input type="text" name="sex" size="30" id='in' value="<?php echo $fetch['SEX'] ?>" readonly /></td>
    </tr>
    <tr>
      <td>DUTY:</td>
      <td>&nbsp;</td>
      <td><input type="text" name="ahaa" size="30" id='in' value="<?php echo $fetch['DUTY'] ?>" readonly /></td>
    </tr>
    <tr>
      <td>SALARY</td>
      <td>&nbsp;</td>
      <td><input type="text" name="sal" size="30" id='in' value="<?php echo $fetch['SALARY'] ?>" readonly /></td>
    </tr>
    <tr>
      <td>amount PAY</td>
      <td>&nbsp;</td>
      <td><input type="text" name="paid" size="30" maxlength="6" id='in' value="<?php echo $fetch['PAYAMOUNT'] ?>" onkeypress="return isNumber(event)" />
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
        <br>
        <font size="-1">Replace the above figure to complete pay </font></td>
    </tr>
    <tr>
      <td>Credit </td>
      <td>&nbsp;</td>
      <td><font color="yellow" size="-1">
        <?php if(($fetch['SALARY'])<=($fetch['PAYAMOUNT']))
					{
					echo 'Credit: '.($fetch['SALARY']-$fetch['PAYAMOUNT']). ' <font color=red><blink>Fully paid</blink></font>';

					}else

					echo 'Credit: '.($fetch['SALARY']-$fetch['PAYAMOUNT']);

					?>
        </font> </td>
    </tr>
    <tr>
      <td>Date of first pay</td>
      <td>&nbsp;</td>
      <td><input type="date" name="date1" input style="width:200px;" id='in' value="<?php echo $fetch['DAYPAY1'] ?>"  />
        <br/>
        <font color="grey" size="-1">YYYY-MM-DD</font></td>
    </tr>
    <tr>
      <td>Date of LAST pay</td>
      <td>&nbsp;</td>
      <td><input type="date" name="date2" input style="width:200px;" id='in' value="<?php echo $fetch['DAYPAY2'] ?>"  /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right"><input type="submit" name="send" id='send'value="update" />
        <input type='reset' id='clear'name="clear" value="cancel"  /></td>
    </tr>
  </table>
  <input type="hidden" name="id1" value="<?php echo $fetch['NON_ID'] ?>"  />
  <input type="hidden" name="id2" value="<?php echo $fetch['PAY_ID'] ?>"  />
</form>
<?php
			  }
								if (isset($_POST['send'])){

			$fname =$_REQUEST['fname'];
			$sex=$_REQUEST['sex'];
			//$quality=$_REQUEST['ahaa'];
			$sal=$_REQUEST['sal'];
			$paid=$_REQUEST['paid'];
			$credit=$_REQUEST['credit'];
			$day1=$_REQUEST['date1'];
			$day2=$_REQUEST['date2'];
			$id1=$_POST['id1'];
			$id2=$_POST['id2'];
			if($paid!='' && (($day1=='0000-00-00') || ($day1=='0000-00-00') )){
			echo '<font color=yellow><blink> !</blink></font> please enter date of payments and resubmit';

			}else{

			$credit1=$sal-$paid;

			$insert= mysql_query("UPDATE nonstaffpay set PAYAMOUNT=$paid,CREDIT=$credit1,DAYPAY1='$day1',DAYPAY2='$day2'
			WHERE NON_ID='$id1' AND PAY_ID='$id2'");

			if($insert){
			echo '<img src="images/492.png" /> &nbsp;! data updated successfully';
			 echo '<meta content="2;home.php?action=salarynon" http-equiv="refresh" />';

			}else
			echo 'failed to insert data';
			echo mysql_error();
			//echo '<meta content="2;modifyst.php" http-equiv="refresh" />';
			}
			}
			}else if($action=='trans'){//----
			echo 'Transcripts not available at the moment<br><hr/>A student may request transcript when he/she wants to transfer to other school or when he/she has completed/graduated from the school and needs to join higher education or for some other purpose.<br>Officials from kebele and kifle-ketema education bureaus want to get statistical reports like number of registered students at the beginning of every year, number of drop outs, and number of passes/failures for each subject at the end of each semester as well as number of passes/failures at a grade level to help them participate in decision making<br/> >on marks entry include year and term for transript generation<br> > student attendance<br>

			Flow of Event:<br>
(1) student wants to be registered as a student of the school<br>
(2) Record officer verifies that the student is eligible<br>
(3) Registration form will be given to the student<br>
(4) The student completes the registration form that contains student’s full name, address, parent name, emergency person names and addresses and other detail information.<br>
(5) RecordOfficer of the school checks whether the contents of the registration form is properly completed<br>
(6) RecordOfficer fills and submits the form to the system<br>
(7) System registers<br>
(8) Use case ends<br>
<br>
(1) A home room teacher wants to record absentees from the class<br>
(2) The home room teacher fills in the attendance slip in the class room<br>
(3) Having the attendance slip the home room teacher logs in to record<br>
(4) HomeRoomTeacher records absentees and submits<br>
(5) System acknowledges<br>
(6) Use case ends<br>

<br>
(1) The record officer logs in and selects the class/section to which the student belongs<br>
(2) The record officer searches the student from the class/section based on the search criteria defined<br>
(3) The system processes the report card<br>
(4) System displays and print the result<br>

(5) Use case ends<br>
<br>
(1) A student wants to get transcript<br>
(2) The record officer logs in and searches the students record from the database based on the search criteria<br>
(3) The system processes the transcript<br>
(4) System displays and print the result<br>
(5) Use case ends<br>

			';

			}
			else if($action=='viewclubs'){//-----------------------------------------------------------------------------------------
			?>
<style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
<?php
			$sel=mysql_query("select *from club ORDER BY DATE DESC ");
			echo '<table style="width:100%">';
			echo '<th>CLUB CODE</th><th>CLUB NAME</th><th>CHAIRMAN</th><th>PATRON</th><th>DATE of REG</th><th>status</th>';
			$flag = 0;
			while($fetch=mysql_fetch_array($sel)){




			echo '<tr><td>'.$fetch['0'].'</td><td>'.$fetch['1'].'</td><td>'.$fetch['3'].'</td><td>'.$fetch['4'].'</td><td>'.$fetch['5'].'</td><td>'.$fetch['6'].'</td></tr</tr>';


			}
			echo '</table>';
			}else if($action=='clubmember'){//-----------------------------------------------------------------------------------------

			?>
<style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
<?php
			$sel=mysql_query("select *from club, student, clubmember where club.CLUB_ID=clubmember.CLUB_ID AND clubmember.MEMBER_ID=student.STNAME ORDER BY clubmember.DATE DESC");
			echo '<table style="width:100%">';
			echo '<th align="left">DAY REGISTERED</th><th align="left">NAME</th><th align="left">GENDER</th><th align="left">CLUB NAME</th>';
			$flag = 0;
			while($fetch=mysql_fetch_array($sel)){




			echo '<tr><td>'.$fetch['DATE'].'</td><td> '.$fetch['STNAME'].'</td><td>'.$fetch['SEX'].'</td><td>'.$fetch['NAME'].'</td></tr</tr>';


			}
			echo '</table>';

			}else  if($action=='search'){//------------------------------------------------------------

			 $search=$_POST['search'];


			$query=mysql_query("SELECT * from student , image where image.image_id='$search' AND student.STNAME='$search'")or die(mysql_error());
			$array=mysql_fetch_array($query);
			$count=mysql_num_rows($query);
			if($count < 1){
			echo 'some little problem :-  try <a href="home.php?action=recordstudent">this</a>';

			}else {

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
    <td rowspan="5"><img src="<?php echo 'improve/'.$array['location']; ?>" width="200" height="200"  id="images"/></td>
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

			}?>
      <div class="cleaner"></div>
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
</body>
</html>
