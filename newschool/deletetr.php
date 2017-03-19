<?php include('connection.php')?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php 
	 $id=$_REQUEST['id']; 
	
	 $query1=mysql_query("select NAMES FROM teacher WHERE TEACH_ID='$id' limit 1") or die(mysql_error());
	 $echo=mysql_fetch_array($query1);
	 $name=$echo['NAMES'];

	 $query=mysql_query("DELETE FROM teacher WHERE TEACH_ID='$id' limit 1");
	  $query=mysql_query("DELETE FROM teachersalary WHERE TEACH_ID='$name'")or die(mysql_error());
 
	header('location:home.php?action=recordteacher');	
	 ?>
	 
</body>
</html>
