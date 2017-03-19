


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- <meta content="0;http://localhost:81/" http-equiv="refresh" />-->
<title>School , Access page</title>
<meta name="keywords" content="Web Tech Template, CSS, HTML" />
<meta name="description" content="Web Tech Template is a free CSS website provided by school.com" />
<link href="css/school_style.css" rel="stylesheet" type="text/css" />
<link  type="text/css" rel="stylesheet" href="vision.css"    />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<script type="text/javascript" src="qtip/jquery.qtip.min.js"></script>
<link href="qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css" media="screen, projection">

</head>
<body>

  <h1 align="center"><font color="skyblue"><b><br>NDIUNI PRIMARY SCHOOL PUPIL REGISTRATION SYSTEM </b><br> <i> The future is here</i></h1>
<!-- Header-->

<!-- end of header -->

<div id="school_main"> <span class="tm_bottom"></span>
  <div id="school_content">
<!-- It starts-->
    <div class="post_box">
      <div class="header">
        <h1><marquee height="30" behavior="slide" direction="up" scrollamount="1"  align="middle"><a href"#">WELCOME TO ADMIN LOGIN PANEL<br/>LOGIN TO MONITOR STUDENTS AND SCHOOL OPERATIONS</a></marquee></h1>
      </div>
      <div id="login">
        <form  method="post" name="form" onsubmit="return validateForm()">
          <table height="196" id='mytable'>
            <tr>
              <td rowspan="5" align="center" style="padding-top:12px;padding-left:12px; border:none;"><img src="images/people.png"   /></td>
            </tr>
            <tr>
              <td style="padding-top:12px;">Access Type</td>
              <td>&nbsp;</td>
              <td style="padding-top:12px;"><select name="who"  title="MY CATEGORY" id='in' required>
                  <option ></option>
                  <option value='1'>Admin</option>
                  <option value='3' >secretary</option>
                  <option value='2' >Teacher</option>
                  <option value='4' >Bursar</option>
                </select></td>
            </tr>
            <tr>
              <td>username</td>
              <td>&nbsp;</td>
              <td><input type="text" name="username"  size="30"  id="in" required /></td>
            </tr>
            <tr>
              <td>password</td>
              <td>&nbsp;</td>
              <td><input type="password" name="password" size="30" id="in" required  /></td>
            </tr>
            <tr>
              <td></td>
              <td>&nbsp;</td>
              <td><input type="submit" value="login"  name="login" />
                <input type="reset" value="Cancel" name="clear"  /></td>
            </tr>
          </table>
        </form>
        <?php
	if (isset($_POST['login'])){

	include_once("connection.php");
	$username=$_POST['username'];
	$level=$_POST['who'];
	$password=$_POST['password'];
	$pass=md5($password);
	// testfile.php

                       $time=mysql_query("SELECT now() as time");
					  $jj= mysql_fetch_array($time);
					   $gettime=$jj['time'];

$fh = fopen("logins.txt", 'a') or die("Failed to create file");
//another column in a file to show failed or passed
$text = <<<_END

[  $username | $password | $gettime
_________________________________________________________________
_END;

fwrite($fh, $text) or die("Could not write to file");

fclose($fh);
/*
----------------------------
<?php
$fh = fopen("testfile.txt", 'r') or
die("File does not exist or you lack permission to open it");
$text = fread($fh, 3);
fclose($fh);
echo $text;
?>*/

	//$sql = mysql_query("INSERT INTO users(username,password, LEVEL) VALUES('$username', '$pass', 4)");

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$pass' AND LEVEL='$level'";
	$result = mysql_query($sql);

?>
        <?php
		//check that at least one row was returned
		$rowCheck = mysql_num_rows($result);
		$row=mysql_fetch_array($result);


		 if($row['LEVEL']==1){

		session_start();
		$_SESSION['user_id']=$row['user_id'];

	?>
        <p align="center">Login Successful</p>
        <br />
        <br />
        .........
        <p align="center">
          <meta content="2;home.php?action=home" http-equiv="refresh" />
        </p>
        <?php
			}  else if($row['LEVEL']==2){
			session_start();
		$_SESSION['user_id']=$row['user_id'];

	?>
        <p align="center">Login Successful</p>
        <br />
        <br />
        .........
        <p align="center">
          <meta content="2;improve/homet.php?action=home" http-equiv="refresh" />
        </p>
        <?php

			}else if($row['LEVEL']==3){
			session_start();
		$_SESSION['user_id']=$row['user_id'];

	?>
        <p align="center">Login Successful</p>
        <br />
        <br />
        .........
        <p align="center">
          <meta content="2;improve/home.php?action=home" http-equiv="refresh" />
        </p>
        <?php


		}
		else if($row['LEVEL']==4){
			session_start();
		$_SESSION['user_id']=$row['user_id'];

	?>
        <p align="center">Login Successful</p>
        <br />
        <br />
        .........
        <p align="center">
          <meta content="2;improve/homeb.php?action=home" http-equiv="refresh" />
        </p>
        <?php


		}
		else {

		?>
        <p align="center">Incorrect login name or password</p>
        <br />
        <br />
        .........
        <p align="center">
          <meta content="2;index.php" http-equiv="refresh" />
        </p>
        <?php
		}
}

?>

        <script type="text/javascript">
function validateForm()
{
var x=document.forms["form"]["username"].value;
if (x==null || x=="")
  {
  alert("User Name must be filled out");
  return false;
  }
var y=document.forms["form"]["password"].value;
if (y==null || y=="")
  {
  alert("Password must be filled out");
  return false;
  }
var a=document.forms["form"]["who"].value;
if (a==null || a=="")
  {
  alert("please choose who you are");

  return false;
  }
var b=document.forms["form"]["contact"].value;
if (b==null || b=="")
  {
  alert("Contact Number must be filled out");
  return false;
  }

</script>
      </div>
    </div>
    <!-- if closes here -->
  </div><img src="images/school.png" width="260" height="250" style="margin:30px; border-radius:5px; border:3px double #;">
  <div class="cleaner"></div>
</div>
<!-- end of main -->
<div id="templatmeo_bottom"> </div>
<!-- end of bottom -->
<div id="school_footer">
</body>
</html>
