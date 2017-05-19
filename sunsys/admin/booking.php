<?php
// Inialize session
session_start();
include '../connection/conn.php';
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userid']) && isset($_SESSION['category'])) {
    switch($_SESSION['category']) {


        case 1:
            header('location:../index.php');//redirect to  page
            break;

        case 2:
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
$mobnum=$row['phonenum'];
?>

<?php include 'xh.php'?>

            <!-- Your Page Content Here by samson -->
<?php
include("../connection/dbconn.php");

$query="SELECT * FROM apartments";

$resource=mysql_query($query,$conn);
echo "
                                <table align=\"center\" border=\"\" width=\"100%\" class=\"table table-responsive table-bordered table-striped\" style=\"background-color: #c1e2b3\">
                                <tr>
                                <td><b>Apartment Name</b></td><td><b>Located</b></td><td><b>Status</b></td><td><b>Rent(Ksh)</b></td><td><b>View</b></td><td><b>Rent</b></td><td><b>More</b></td></tr> ";
while($result=mysql_fetch_array($resource))
{
    echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[4]."<td>".$result[5]."</td><td>
                          <a href=\"view.php?apart_name=".$result[0]."\"><i class=\"fa fa-search\" aria-hidden=\"true\"></i></a></td><td>
                          <a href=\"ubook.php?apart_name=".$result[0]."\"><i class=\"fa fa-check-square-o\" aria-hidden=\"true\"></i></a></td><td>
                          <a href=\"otherpay.php?mobile_num=".$result[3]."\"><i class=\"fa fa-ellipsis-h\" aria-hidden=\"true\"></i></td></tr>";

}

echo "</table>";

?>


            <!--
           Add content here
            -->
<?php include 'xf.php'?>