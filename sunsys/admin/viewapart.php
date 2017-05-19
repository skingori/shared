<?php
// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userid']) && isset($_SESSION['category'])) {
      switch($_SESSION['category']) {
      	
                case 1:
      		header('location:../index.php');//redirect to  page
      		break;
          
                case 2:
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
include "xh.php";
?>

      <!-- Your Page Content Here ..................................................................-->
      <!-- Info boxes -->
<?php
include("../connection/dbconn.php");
$query="SELECT * FROM booking WHERE book_status<>'paid' AND book_status='applied'";

$resource=mysql_query($query,$conn);
echo "
                                <table align=\"center\" border=\"\" width=\"100%\" class=\"table table-bordered table-striped\">
                                <tr>
                                <td><b>Apartment</b></td> <td><b>Booked By</b></td><td><b>From Date</b></td><td><b>To Date</b></td><td><b>Cancel</b></td><td><b>Pay</b></td></tr> ";
while($result=mysql_fetch_array($resource))
{
    echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td><td>
                        <a href=\"cancel.php?id=".$result[10]."\"><i class=\"fa fa-times\" aria-hidden=\"true\"></a></td>
                        <td><a href=\"payment.php?id=".$result[10]."\"><i class=\"fa fa-money\" aria-hidden=\"true\"></a></td></tr>";

}

echo "</table>";

?>
      
<!-- ...........................................................................-->      

<?php include "xf.php"; ?>