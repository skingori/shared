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
    <!-- end of header -->
    <div id="school_menubar">
      <div id="top_nav" class="ddsmoothmenu">
        <ul>
          <li><a href="?action=home" >Home</a></li>
          <li><a href="#">Record</a>
            <ul>
              <li><a href='?action=pay'> pupil pay</a></li>
			  <!--<li><a href='?action=expenditure'> school expenditure</a></li>-->
            </ul>
          </li>
          <li><a href="?action=viewpay">view</a>
            <ul>
              <li><a href='?action=viewpay'>Tution payments</a></li>
              <li><a href='?action=viewitems'> Others</a></li>
              <li><a href='?action=onbursary'> pupils on bursary</a></li>
              <li><a href='?action=unpaid'>unpaid pupils</a></li>
            </ul>
          </li>
          <li><a href="?action=account">accountability</a></li>
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
	  <br/></br>
        <?php
		$action=$_REQUEST['action'];
		if ($action=='home'){
		?>
          <?php
				  }if ($action=='pay'){


				?>
          <div style="float:left">school fees</div>
          <div  style="float:right"><a href="?action=item">Other items</a> </div>
          <p style="height:30px"></p>
          <form action="" method="post" >
            <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
              <tr>
                <td align="right" colspan="3"><input type="text" name="tution"  placeholder="CURRENT TUTION" required onkeypress="return isNumber(event)" maxlength="6"/>

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
                </td>
              </tr>
              <tr>
                <td  height="24">Names</td>
                <td >&nbsp;</td>
                <td ><select name="firstname" required >
                    <option>
                    <option>
                    <?php
						$result = mysql_query("SELECT STNAME FROM student WHERE STNAME NOT IN (SELECT STNAME FROM payments) and STNAME NOT IN  (SELECT NAME FROM bursarystudent)") ;
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
							for($ya=2016; $ya<=2016; $ya++)
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
                <td><input type="text" name="amount" size="30" id='in'title="pay money" required onkeypress="return isNumber(event)" maxlength="6"/>

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
            <!--  <tr>
                <td>date</td>
                <td>&nbsp;</td>
                <td><input type="text" id="SelectedDate" name='date' readonly onClick="GetDate(this)" placeholder='Date today' /></td>
              </tr>-->
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
//$date=$_POST['date'];

//echo $day;

$dues=$tution-$amount;

$balance=$amount-$tution;

$ins= mysql_query("INSERT INTO  payments VALUES ('','$fnames','$class','$term',$year,$tution,$amount,$dues,$balance,curdate())") or die (mysql_error());

if($ins){
echo '<img src="images/492.png" /> &nbsp;! data inserted successfully';
 echo '<meta content="2;homeb.php?action=viewpay" http-equiv="refresh" />';

}else
echo 'failed to insert data';
echo mysql_error();
//echo '<meta content="2;register1.php" http-equiv="refresh" />';

}
 }
 else if($action=='expenditure'){
 echo 'Some little problem:- page under implementation';


 }
 else if($action=='viewpay'){//-----------------------------------------------------------------------------------------
?>
<style type="text/css">
#mytable{margin-left:-24px;}

th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
</style>
<?PHP
$sel=mysql_query("SELECT * FROM payments ORDER BY DATE DESC");
echo '<table id=mytable >';
echo '<th>NAMES</th><th>CLASS</th><th>TERM</th><th>YEAR</th><th>AMOUNT PAID</th><th>DUES</th><th>BALANCE</th><th>DATE OF PAY</th><th colspan=3>ACTION</th>';
$flag = 0;
while($fetch=mysql_fetch_array($sel)){




echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['2'].'</td><td>'.$fetch['3'].'</td><td>'.$fetch['4'].'</td><td>'.$fetch['6'].'</td><td>'.$fetch['7'].'</td><td>'.$fetch['8'].'</td><td>'.$fetch['9'].'</td><td><a href=modifypay.php?id='.$fetch['STUDENT_ID'].'><img src="images/edit-icon.png" width=30 height=30 title=MODIFY_RECORD /></a></td><td><a href=deletepay.php?id='.$fetch['STUDENT_ID'].'><img src="images/deletee.png" width="30" height="30" title=DELETE_RECORD /></a></td>
<td><a href=printreceipt.php?id='.$fetch['STUDENT_ID'].'><img src="images/Print.png" width="30" height="30" title=print_out_receipt /></a></td></tr>';


}
echo '</table>';
?>
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
                <td><textarea name="item" placeholder="list items being paid for here" cols=40 rows=5 wrap="virtual" required></textarea></td>
              </tr>
              <tr>
                <td>Amount(total)</td>
                <td>&nbsp;</td>
                <td><input type="text" name="amount" size="30" id='in'  maxlength="6" required onkeypress="return isNumber(event)"/>

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
              <!--<tr>
                <td>date</td>
                <td>&nbsp;</td>
                <td><input type="text" id="SelectedDate" name='date' readonly onClick="GetDate(this)" placeholder='select date' /></td>
              </tr>-->
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

$ins= mysql_query("INSERT INTO  itempay VALUES ('','$fnames','$item',$amount,curdate())") or die ('Some little problem: Amount should be int, try again');

if($ins){
echo '<img src="images/492.png" /> &nbsp;! data inserted successfully';
 echo '<meta content="2;homeb.php?action=viewitems" http-equiv="refresh" />';

}

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
echo '<th align=left>Pupil Name</th><th align=left>item(s)paid for</th><th align=left>Amount</th><th align=left>Date</th><th colspan=3>ACTION</th>';
$flag = 0;
while($fetch=mysql_fetch_array($sel)){




echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['2'].'</td><td>'.$fetch['3'].'</td><td>'.$fetch['4'].'</td><td><a href=deleteitempay.php?id='.$fetch['ID'].'><img src="images/deletee.png" width=30 height=30 title=MODIFY_RECORD /></a></td><td><!--<a href=#printitem.php?id='.$fetch['ID'].'><img src="images/Print.png" width="30" height="30" title=print_out_receipt />--></a></td></tr>';


}
echo '</table>';
?>
          <?php
}
else if($action=='onbursary'){

?>
<style type="text/css">
th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
</style>
 <?php

$sel=mysql_query("SELECT * FROM bursarystudent");
echo '<table style="width:100%">';
echo '<th align=left>Pupil Name</th><th align=left>CLASS</th><th align=left>SEX</th><th align=left>AMOUNT PAID</th>';
$flag = 0;
while($fetch=mysql_fetch_array($sel)){




echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['2'].'</td><td>'.$fetch['3'].'</td><td>'.$fetch['4'].'</td></tr>';


}
echo '</table>';
?>
          <?php
}else if($action=='unpaid'){

?>
<style type="text/css">

th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
</style>
<?php
echo 'unpaid';
echo '<table style="width:100%"><th align=left>Pupil name</th><th align=left>sex</th><th align=left>class</th>';

$result = mysql_query("SELECT *FROM student WHERE STNAME NOT IN (SELECT STNAME FROM payments) and STNAME NOT IN  (SELECT NAME FROM bursarystudent)") ;							while($row = mysql_fetch_array($result))
							{
								echo '<tr><td>'.$row['STNAME'].'</td><td>'.$row['SEX'].'</td><td>'.$row['CLASS'].'</td></tr>';

							}
						?>
          </table>
          <br>
          Pupils on bursary are not listed here
          <?php





}else  if($action=='account'){

?><style type="text/css">

th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
</style><?php
echo '<br><br>Finance got from other tution';

$famount=mysql_query("select TERM, YEAR, TUTION, SUM(AMOUNT) AS tamount, SUM(DUES) AS tdues FROM payments GROUP BY YEAR , TERM ORDER BY YEAR DESC ");
echo '<table style="width:100%">';
echo '<th align=left>TERM</th><th align=left>YEAR</th><th align=left>TUTION</th><th align=left>TOTAL AMOUNT</th><th align=left>TOTAL DUES</th>';
while($fetch=mysql_fetch_array($famount)){


echo '<tr><td>'.$fetch['TERM'].'</td><td>'.$fetch['YEAR'].'</td><td>'.$fetch['TUTION'].'</td><td>'.$fetch['tamount'].'</td><td>'.$fetch['tdues'].'</td></tr>';

}

echo '</table>';
echo '<br><br>Finance got from other properties';
$oamount=mysql_query("select SUM(AMOUNT) AS tamount FROM itempay ");
$fetch=mysql_fetch_array($oamount);
echo '<br/><hr/>Total: '.$fetch['tamount'].' /=  <br/><br/><form action="" method="post"><input type="submit" name="go" value="View Details" /></form><hr/>';

 if(isset($_POST['go'])){
$sel=mysql_query("SELECT * FROM itempay");
echo '<table style="width:100%">';
echo '<th align=left>Pupil name</th><th align=left>item(s)paid for</th><th align=left>Amount</th><th align=left>Date</th>';
$flag = 0;
while($fetch=mysql_fetch_array($sel)){




echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['2'].'</td><td>'.$fetch['3'].'</td><td>'.$fetch['4'].'</td></tr>';


}
echo '</table>';
}
}
else  if($action=='search'){//------------------------------------------------------------

 $search=$_POST['search'];


$query=mysql_query("SELECT * from student , image where image.image_id='$search' AND student.STNAME='$search'")or die(mysql_error());
$array=mysql_fetch_array($query);
$count=mysql_num_rows($query);
if($count >0){

?>
          <table style="border: 3px double #FF6600; background:url(images/powder.gif);background-size:cover; padding:12px; color:#003366">
            <tr>
              <td scope="col" colspan="3" align="center"> </td>
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
}else{
echo 'student photo not available. please check the student<a href="?action=stlist"> from this list</a>';
}
}else if($action=='stlist'){
?><style type="text/css">

th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
</style><?php
$sel=mysql_query("SELECT * FROM student");
echo '<table style="width:100%;">';
echo '<th>NAME</th><th>SEX</th><th>DISTRICT</th><th>PARENT</th><th>OFFERTYPE</th><th>CLASS</th><th>STATUS</th>';

while($fetch=mysql_fetch_array($sel)){


echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['SEX'].'</td><td>'.$fetch['DISTRICT'].'</td><td>'.$fetch['GUARDIAN'].'</td><td>'.$fetch['OFFERING'].'</td><td>'.$fetch['CLASS'].'</td><td>'.$fetch['STATUS'].'<td></tr>';

}
echo '</table>';
}
?>

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
</ul>
</body>
</html>
