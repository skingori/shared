<?php

//capture search term and remove spaces at its both ends if the is any
$searchTerm = trim($_GET["keyname"]);

//check whether the name parsed is empty
if($searchTerm == "")
{
	echo "Enter name you are searching for.";
	exit();
}

//database connection info
$host = "localhost"; //server
$db = "prison"; //database name
$user = "root"; //dabases user name
$pwd = ""; //password

//connecting to server and creating link to database
$link = mysqli_connect($host, $user, $pwd, $db);

//MYSQL search statement
$query ="SELECT * FROM registration WHERE id LIKE '%$searchTerm%'";

$results = mysqli_query($link, $query);

/* check whethere there were matching records in the table
by counting the number of results returned */
if(mysqli_num_rows($results) >= 1)
{
	$output = "";
	while($row = mysqli_fetch_array($results))
	{
echo 

		$output .= "ID: " . $row['id'] . "<br />";
		$output .= "Full Name: " . $row['Full_Name'] . "<br />";
		$output .= "Date Of Birth: " . $row['DOB'] . "<br />";
		$output .= "Address: " . $row['Address'] . "<br /><br />";
		$output .= "County: " . $row['County'] . "<br />";
		$output .= "Gender: " . $row['Gender'] . "<br />";
		$output .= "Education: " . $row['Education'] . "<br />";
		$output .= "Marital: " . $row['Marital'] . "<br /><br />";
		$output .= "Offence: " . $row['Offence'] . "<br />";
		$output .= "Date_in: " . $row['Date_in'] . "<br />";
		$output .= "File_num: " . $row['File_num'] . "<br /><br />";
	}
	echo $output;
  }
else

	echo'<body bgcolor="Green">';
	echo'<center>';
	echo "<h2>No record found please check your ID </h2>";
	echo "<br/>";
	echo "<br/>";
	echo'</center>';
	echo'</body>';
	 echo "<font size='5'>"."Click" . "<a href='search-form.php'>"."  ". "here"  . "</a>"  . "  " . "to verify your ID"."</font>";
?>
