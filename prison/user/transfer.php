<html>
<head>
<title> Transfer Form</title>
<link rel="stylesheet" media="screen" href="login.css" >
</head>
<body>
<table width="95%" height="91" border="0" align="center" bgcolor="#FFFFFF">
<tr>
<td height="33" align="center" bgcolor="#FFFFFF">
<font size="5">
<a href="userpanel.php">Home</a> 
</font>
</td>
</tr>
<td height="5" bgcolor="#FFFFFF"><tr>
<td>
<form action="processtransfer.php" method="post">
<table bgcolor="white" height="431" border="0" align="center" width="50%">
<td width="34%" bgcolor="#FFFFFF"><b>National Id:</b></td>
<td width="66%" bgcolor="#FFFFFF"><input type="text" name="Nid" /></td>
</tr>
<td width="34%" bgcolor="#FFFFFF"><b>File Number:</b></td>
<td width="66%" bgcolor="#FFFFFF"><input type="text" name="Filenum" /></td>
</tr>

<tr><td bgcolor="#FFFFFF"><b>From Prison:</b></td>
        <td> <select name="From">
        <option>LANGATA</option>
		<option>KODIAGA</option>
		<option>SHIMOLATEWA</option></td></tr>
	<tr><td bgcolor="#FFFFFF"><b>To Prison:</b></td>
        <td> <select name="To">
		<option>LANGATA</option>
		<option>KODIAGA</option>
		<option>SHIMOLATEWA</option></td></tr>
        
<tr>
<td bgcolor="#FFFFFF"><b>Date of Transfer:</b></td>
<td bgcolor="#FFFFFF"><input type="text" name="dot" /></td>
</tr>
  <td height="26" bgcolor="#FFFFFF" align="center"><input type="submit" value="Add" /></td>
 </tr>
</table>
</form>
</td>
<td bgcolor="#FFFFFF"></tr>
<tr>
<td height="21" colspan="2" align="center" bgcolor="#FF0000">&copy; KENYA PRISONS SERVICE</td>
</tr>
</table>
</body>
</html>