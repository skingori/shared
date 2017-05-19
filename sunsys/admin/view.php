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
    <label>
        <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
            <a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>&nbsp;
            <a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a>
    </label>
<?php


$id=$_REQUEST['apart_name'];


$do=mysql_query("SELECT * from apartments , image where image.image_id='$id' AND apartments.apart_name='$id'")or die(mysql_error());
$array=mysql_fetch_array($do);
$count=mysql_num_rows($do);
if($count >0)

{

    ?>

    <table class="table-bordered table table-responsive table-striped table-condensed" style="border: 1px transparent;background-color: #c1e2b3 ;background-size:cover; padding:0px ">

        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td width="50%" height="">APARTMENT NAME :</td>
            <td width="90%"><?php echo $array['apart_name'];?> </td>
            <td rowspan="10"><img src="<?php echo $array['location']; ?>" width="200px" height="200px"  id="images"/></td>
        </tr>
        <tr>
            <td>APARTMENT LOCATION: </td>
            <td><?php echo $array['apart_loc'];?></td>
        </tr>
        <tr>
            <td height="">RENT WORTH: </td>
            <td><?php echo $array['apart_price'];?></td>
        </tr>
        <tr>
            <td height="">APARTMENT OWNER: </td>
            <td><?php echo $array['owner_name'];?> </td>
        </tr>
        <tr>
            <td height="">MOBILE NUMBER: </td>
            <td><?php echo $array['mobile_num'];?></td>
        </tr>
        <tr>
            <td height="">DATE REGISTERED: </td>
            <td><?php echo $array['regdate'];?> </td>
        </tr>
        <tr>
            <td height="">FURNITURE: </td>
            <td><?php echo $array['furniture'];?> </td>
        </tr>

        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3" align=""><b>SUN APARTMENTS</b><br><small>P.O BOX 7667 NAIROBI</small></td>
        </tr>
    </table>
    <?php
}
?>
<!-- ...........................................................................-->

<?php include "xf.php"; ?>