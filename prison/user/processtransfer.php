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
$Filenum=$_POST['Filenum'];
$From=$_POST['From'];
$To=$_POST['To'];
$dot=$_POST['dot'];
//It wiil insert a row to our recruit details`
$sql = "INSERT INTO `prison`.`transfer` (`National_id`,`File_num`, `From_prison`,`To_prison`,`Dateoftransfer`) 
	VALUES ('{$Nid}', '{$Filenum}', '{$From}', '{$To}', '{$dot}');";
//we are using mysql_query function. it returns a resource on true else False on error
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
?>
					<script type="text/javascript">
						alert("New Record is Added thank you");
						window.location = "transfer.php";
					</script>
					<?php
//close of connection
mysql_close($conn);
?>