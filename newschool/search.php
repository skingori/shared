<?php include('connection.php')?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Title</title>
<link  type="text/css" rel="stylesheet" href="vision.css"    />

</head>

<body><div class="heading"><h1><center>Kisoro vision school management system</center></h1><br/></div>

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
    <td width="424">
	<div class="search"><p>
	
	<form name="details" action="search.php" method="POST">
    	 <input type="hidden" name="database" value="vision" />
        <input type="hidden" name="username"  value="root"/>
      <input type="hidden" name="password" value="" />
       <div id="mysearch"><input type='text' name="search"  id='s' placeholder='Search'/> 
  <input type="submit" name="Submit"  value="SEARCH" /> </div>
</form></p></div></td>
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


<?php 

if (isset($_POST["search"]) && ($_POST["search"] != "")) {

	$conn = mysql_connect("localhost", $_POST["username"], $_POST["password"]) or die ("Error connecting to mysql");
	mysql_select_db($_POST["database"]);

	$aryTables = array();
	$aryFields = array();

	$sql = "SHOW TABLES FROM " . $_POST["database"];
	$result = mysql_query($sql);

	while ($row = mysql_fetch_row($result)) {
		$aryTables[sizeof($aryTables)] = $row[0];
	}

	for ($i = 0; $i < sizeof($aryTables); $i = $i + 1) {
		$sql = "SHOW COLUMNS FROM " . $aryTables[$i];
		$result = mysql_query($sql);
		while ($row = mysql_fetch_row($result)) {
			$aryFields[sizeof($aryFields)] = $row[0];
		}

		$sql = "SELECT * FROM " . $aryTables[$i] . " WHERE ";
		for ($j = 0; $j < sizeof($aryFields); $j = $j + 1) {
			$sql = $sql . $aryTables[$i] . "." . $aryFields[$j] . " LIKE '%" . $_POST["search"] . "%'";
			if (($j + 1) != sizeof($aryFields)) {
				$sql = $sql . " OR ";
			} else {
				$sql = $sql . ";";
			}
		}

		$result = mysql_query($sql);
		
		 if (mysql_num_rows($result)>0) {
		 
		 
			echo "<br/><hr/><p>" .mysql_num_rows($result).'  search results for  '.$_POST["search"].' in table '. $aryTables[$i] . "</p><br/>"; 
			echo "<center><table ><tr><thead>";
			
			foreach ($aryFields as $field => $value) {
			
			
				echo "<th>". $value . "</th>";
			}
			while ($aryData = mysql_fetch_assoc($result)) {
			if ($flag%2 ==0 ) :
               echo "<tr style=\"background:#6699CC;\"";
                else :
                echo "<tr style=\"background:grey;\"";
                endif;
				echo "<tr>";
				
				for ($j = 0; $j < sizeof($aryFields); $j = $j + 1) {
					echo "<td>" . substr(htmlspecialchars($aryData[$aryFields[$j]], ENT_QUOTES), 0, 150) . "</td>";
				}
				
				echo "</tr>";
				
			}
			
			echo "</table></center>";
		}

		$aryFields = array();

	}


} else { ?><center>
<p style="height:50px;"><br>
Type you search term here and click go
   <form name="details" action="search.php" method="POST">
    	 <input type="hidden" name="database" value="vision" />
        <input type="hidden" name="username"  value="root"/>
      <input type="hidden" name="password" value="" />
       <input type='text' name="search"  id='s' placeholder='Search'/> 
  <input type="submit" name="Submit"  value="GO" /> 
</form></p></center><br>
<?php } ?>

<?php if (isset($conn)) {mysql_close($conn);} ?>
</div>
<div class='footer'>
  <p><center>
    <?php include('footer.php')?>
  </p>
</div>
</body>
</html>
<?php include'headers.php';?>