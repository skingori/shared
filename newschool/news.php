<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>kisoro vision school</title>
<link  type="text/css" rel="stylesheet" href="vision.css"    />
<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-weight: bold}
.style3 {font-weight: bold}
-->
</style>
</head>

<body><div>
<h1><center>Ndiuni</center></h1><br/></div>
<div class="menu"> Links
<br/><ul class="menu1">
<li><span class="style1"><a href='home.php'><img src="images/120.png" width="30" height="30" /><img src="images/spacer.gif" />Home</a></span></li>
<li class="style2"><a href='#'> <img src="images/46.png" width="30" height="30" /><img src="images/spacer.gif" />register</a>
 <ul class="menu2">
 <li><a href='register.php'>student</a></li>
 <li><a href='register1.php'>teacher</a></li>
 <li><a href='register2.php'>nonstaff</a></li>
 </ul></li>
<li class="style3"><a href='#'><img src="images/my_documents.png" width="30" height="30" /><img src="images/spacer.gif" />update record</a>
	<ul class="menu3">
 <li><a href='recordstudent.php'>students record</a></li>
 <li><a href='recordteacher.php'>teachers record</a></li>
 <li><a href='recordnonstaff.php'>nonstaff record</a></li>
 </ul></li>

<li><a href='#'><img src="images/Wholesale.png"  width="30" height="30" /> <img src="images/spacer.gif" />payments</a>
<ul class="menu3">
 <li><a href='studentmoney.php'>enter pay</a></li>
 <li><a href='viewpay.php'>view pay</a></li>
 </ul></li>  </ul></div>
<div class='aside'><div class='aside'><form name="calculator">

<table border="0" bgcolor="#8080C0" id="calc" style="border-radius:5px;" cellpadding="0">
<td align="center">
KVSMS fx-991 MS   <br/>TWO WAY POWER
</td>
</tr>
<tr>
<td>
<input type="text" name="text" size="15">
</td>
</tr>

<tr><td align="center">
<input type="button" value="1" onclick="calculator.text.value += '1'">
<input type="button" value="2" onclick="calculator.text.value += '2'">
<input type="button" value="3" onclick="calculator.text.value += '3'">
<input type="button" value="4" onclick="calculator.text.value += '4'"></td>
</tr>
<tr>
<td align="center"><input type="button" value="5" onclick="calculator.text.value += '5'">
<input type="button" value="6" onclick="calculator.text.value += '6'">
<input type="button" value="7" onclick="calculator.text.value += '7'">
<input type="button" value="8" onclick="calculator.text.value += '8'"></td>
</tr>
<tr>
<td align="center"><input type="button" value="9" onclick="calculator.text.value += '9'">
<input type="button" value="0" onclick="calculator.text.value += '0'">
<input type="button" value="+" onclick="calculator.text.value += '+'">
<input type="button" value="-" onclick="calculator.text.value += '-'"></td>
</tr>

<tr>
<td align="center"><input type="button" value="*" onclick="calculator.text.value += '* '">
<input type="button" value="/" onclick="calculator.text.value += '/ '">
<input type="reset" value="c" >
<input type="button" value="=" onClick="calculator.text.value = eval(calculator.text.value)"></td>
</tr>
<tr><td><img src="images/loader.gif" width="170" title='THIS DEVICE IS UP TO DATE'></td> </tr>
</table>
</form></div></div>
<div class="content"><br/>
 <?php
                        $Today = date('y:m:d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?><br/><hr/>
						info</div>
						<div class='footer'>
  <p><center>
    <?php include('footer.php')?>
  </p>
</div>
</body>
</html>
<?php include'headers.php';?>