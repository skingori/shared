<?php
//set up for mysql Connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
//test if the connection is established successfully then it will proceed in next process else it will throw an error message
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

//we specify here the Database name we are using
mysql_select_db('prison');
$Nid=$_POST['Nid'];
$Fname=$_POST['Fname'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$county=$_POST['county'];
$Gender=$_POST['Gender'];
$education=$_POST['education'];
$status=$_POST['status'];
$offence=$_POST['offence'];
$di=$_POST['di'];
$Filenum=$_POST['Filenum'];

//It wiil insert a row to our prisoners`
$sql = "INSERT INTO `prison`.`registration` (`id`,`Full_Name`, `DOB`, `Address`, `County`,  `Gender`, `Education`, `Marital`, `Offence`, `Date_in`, `File_num`) 
	VALUES ('{$Nid}', '{$Fname}', '{$dob}', '{$address}', '{$county}', '{$Gender}', '{$education}', '{$status}', '{$offence}','{$di}', '{$Filenum}');";
//we are using mysql_query function. it returns a resource on true else False on error
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('The data is already: ' . mysql_error());
 
}

?>
					<script type="text/javascript">
						alert("New Record is Added thank you");
						window.location = "registration.php";
					</script>
					<?php
//close of connection
mysql_close($conn);
?>