
<?php
// Inialize session
session_start();
include '../connection/conn.php';
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userid']) && isset($_SESSION['category'])) {
      switch($_SESSION['category']) {
      	
      	case 2:
      		header('location:../index.php');//redirect to  page
      		break;
		
		case 1:
		  header('location:../index.php');//redirect to  page
        break;
		case 3:
      header('location:../index.php');//redirect to  page
        break;

      }
	  }else
	  {

header('Location:index.php');
}

?>
<?php
//mag show sang information sang user nga nag login
$userid=$_SESSION['userid'];

$result=mysql_query("SELECT * from users where userid='$userid'")or die(mysql_error);
$row=mysql_fetch_array($result);

$SirName=$row['sirname'];
$OtherNames=$row['othernames'];
$UserName=$row['username'];
$user_id=$row['userid'];
?>

<?php include 'xh.php'?>
    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here ..................................................................-->

      <?php
      include("../connection/dbconn.php");
      $query="SELECT * FROM users WHERE userid <> '$user_id' AND  status='active'";

      $resource=mysql_query($query,$conn);
      echo "
		<table align=\"center\" border=\"0\" width=\"100%\" class=\"table table-bordered table-striped\">
		<tr>
		<td><b>Names</b></td><td><b>Email</b></td> <td><b>Category</b></td></td><td><b>Action</b></td></tr> ";
      while($result=mysql_fetch_array($resource))
      {
        echo "<tr><td>".$result[6]."&nbsp".$result[7]."</td><td>".$result[2]."</td><td>".$result[8]."</td><td>
	<a href=\"deac_.php?userid=".$result[0]."\"><img border=\"0\" src=\"../images/deactivate.png\"/></a>
	</td></tr>";
      } echo "</table>";
      ?>
      
<!-- ...........................................................................-->

<?php include 'xf.php'?>