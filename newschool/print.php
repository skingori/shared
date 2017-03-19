
<?php
////include('header.php');
include('../connection.php');

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

<body><div     class="h">
Vision EasyManager<!--<img src="images/logo.png" width="1221" height="89" />--></div>

<div class="menu"><ul class="menu1">
<li><a href='home.php'><i class="icon-home icon-large"></i>&nbsp;<img src="images/120.png" width="30" height="30" /><img src="images/spacer.gif" />Home</a></li>
<li><a href='#'> <img src="images/46.png" width="30" height="30" /><img src="images/spacer.gif" />register</a>
 <ul class="menu2">
 <li><a href='register.php'>student</a></li>
 <li><a href='register1.php'>teacher</a></li>
 <li><a href='register2.php'>nonstaff</a></li>
 </ul></li>
<li><a href='#'><img src="images/my_documents.png" width="30" height="30" /><img src="images/spacer.gif" />update record</a>
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
 <table width="1218"  cellspacing="3" cellpadding="0">
  <tr>
    <td width="367"><div class='name'> 
  <p>KVMS </p>
</div></td>
    <td width="407"> <div class="time"><center> 
  <p>
    <?php
                        $Today = date('y:m:d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>
  </p></td>
    <td width="424"><div class="search"><p>
	
	<form name="details" action="search.php" method="POST">
    	 <input type="hidden" name="database" value="vision" />
        <input type="hidden" name="username"  value="root"/>
      <input type="hidden" name="password" value="" />
       <div id="mysearch"><input type='text' name="search"  id='s' placeholder='Search'/> 
  <input type="submit" name="Submit"  value="SEARCH" /> </div>
</form> </p></div></td>
  </tr>
</table>

  <p>&nbsp;</p>
  <p>&nbsp; </p>
</div>
 <div class="lefts">*\</div>

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
<div class="content">
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
<?php
$sel=mysql_query("SELECT * FROM student");
echo '<table id="mytable">';
echo '<th>FNAME</th><th>LNAME</th><th>SEX</th><th>AGE</th><th>DISTRICT</th><th>PARENT</th><th>OFFERTYPE</th><th>ROOM</th><th>CLASS</th>';

while($fetch=mysql_fetch_array($sel)){


echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['2'].'</td><td>'.$fetch['SEX'].'</td><td>'.$fetch['AGE'].'</td><td>'.$fetch['DISTRICT'].'</td><td>'.$fetch['GUARDIAN'].'</td><td>'.$fetch['OFFERING'].'</td><td>'.$fetch['ROOM'].'</td><td>'.$fetch['CLASS'].'</td></tr>';
 
}
echo '</table>';
?>
</div>

</div>
<div class='footer'>
  <p><center>
    <?php include('footer.php')?>
  </p>
</div>
</body>
</html>
<?php include'headers.php';?>