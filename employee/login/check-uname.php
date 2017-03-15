<?php

include("connection/connector.php");

if(isSet($_POST['farmerusername']))

{

$username = $_POST['farmerusername'];



$sql_check = mysql_query("SELECT farmer_id FROM farmer_table WHERE farmer_username='".$username."'") or die(mysql_error());



if(mysql_num_rows($sql_check))

{

echo '<img src="images/not-available.png" /> <font color="red"><STRONG>' .$username.'</STRONG> is already taken.</font> ';

}

else

{

echo '<img src="images/available.png" />';

}


}



?>