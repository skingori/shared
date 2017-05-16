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

<?php include 'xh.php' ?>

      <!-- Info boxes -->
<!-- Your Page Content Here ..................................................................-->
<p> <a href="booking.php"><i class="fa fa-mail-reply-all"></i> Back</a></p>
<?php


$id=$_REQUEST['apart_name'];


$do=mysql_query("SELECT * from apartments , image where image.image_id='$id' AND apartments.apart_name='$id'")or die(mysql_error());
$array=mysql_fetch_array($do);
$count=mysql_num_rows($do);
if($count >0)

{

?>

        <table style="border: 3px double #FF6600; background:url(../images/back.jpg);background-size:cover; padding:12px; color:#003366">
          <tr>
            <td scope="col" colspan="3" align="center"> </td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td width="175" height="34">APARTMENT NAME :</td>
            <td width="251"><?php echo $array['apart_name'];?> </td>
            <td rowspan="5"><img src="<?php echo $array['location']; ?>" width="200" height="200"  id="images"/></td>
          </tr>
          <tr>
            <td>APARTMENT LOCATION: </td>
            <td><?php echo $array['apart_loc'];?></td>
          </tr>
          <tr>
            <td height="38">RENT WORTH: </td>
            <td><?php echo $array['apart_price'];?></td>
          </tr>
          <tr>
            <td height="40">APARTMENT OWNER: </td>
            <td><?php echo $array['owner_name'];?> </td>
          </tr>
          <tr>
            <td height="40">MOBILE NUMBER: </td>
            <td><?php echo $array['mobile_num'];?></td>
          </tr>
          <tr>
            <td height="40">DATE REGISTERED: </td>
            <td><?php echo $array['regdate'];?> </td>
          </tr>
          <tr>
            <td height="40">FURNITURE: </td>
            <td><?php echo $array['furniture'];?> </td>
          </tr>

          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="center">SUN APARTMENTS</td>
          </tr>
        </table>
        <?php
}
?>



<!-- ...........................................................................-->

<?php include "xf.php"; ?>