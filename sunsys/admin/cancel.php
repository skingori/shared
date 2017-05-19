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
            <!-- Your Page Content Here ..................................................................-->
<?php
include("../connection/dbconn.php");

$cc=$_REQUEST['id'];

$query="SELECT * FROM booking WHERE id='".$cc."'";

$resource=mysql_query($query,$conn) or die ("An unexpected error occured while <b>Activating</b> the record, Please try again!");
$result=mysql_fetch_array($resource);
///array for getting data in a row
$array=mysql_fetch_array($query);
$count=mysql_num_rows($query);
if($count >0)
    ?>

    <form id="" name="cancel" method="POST" action="">

        <div class="form-group has-feedback">

            <label> Booking ID: </label><input type="text" readonly="" name="bid" placeholder="" class="form-control" value="<?php echo $result[10] ?>" />
        </div>
        <div class="form-group has-feedback">

            <label> Apartment booked: </label><input type="text" readonly="" name="ab" action="?action=search" placeholder="" class="form-control" value="<?php echo $result[0] ?>" />
        </div>

        <div class="form-group has-feedback">
            <label> Booked/Rented by : </label><input type="text" name="" readonly="" class="form-control" value="<?php echo $result[1] ?>" />
        </div>

        <div class="form-group has-feedback">
            <label> Deposit Paid : </label><input type="text" name="deposit" readonly="" class="form-control" value="<?php echo $result[5] ?>" />

        </div>

        <?php
        $xx=$result[5] *  0.15
        ?>

        <div class="form-group has-feedback">
            <label> Charges to apply : </label><input type="text" name="charges" readonly="" class="form-control" value="<?php echo $xx?>" />

        </div>

        <!--<div class="form-group has-feedback">


         <label> Charges to apply : </label><input type="text" name=""  class="form-control" value="" />


       <div class="col-xs-4">
            <button type="submit" value="" name="cancel" class="btn btn-primary btn-block btn-flat"><b>Confirm?</b></button>

        </div>
        </div>-->

        <div class="form-inline">
            <button type="submit" value="" name="cancel" class="btn btn-primary btn-flat alert-danger"><b>Confirm?</b></button>&nbsp;
            <button type="reset" value="" name="cancel" onclick="location.href='index.php'" class="btn btn-primary btn-flat alert-warning"><b>Cancel</b></button>

        </div>

    </form>

<?php


if (isset($_POST['cancel'])){

    $charges=$_POST['charges'];

    $query="UPDATE booking SET charges_paid='$charges', book_status='canceled' ,cdate=NOW() WHERE id='$cc'";

    if(!mysql_query($query,$conn))
    {die ("An unexpected error occured while Cancelling Please try again!");}
    //logs
    $log_query=mysql_query("INSERT INTO logs(`activity`,`activity_by` ,`date`)
                        VALUES('Application canceled','By user' , now() )
                        ")or die(mysql_error());
    //end of logs
    ?>

    <script type="text/javascript">
        alert('The Account has been canceled and charges applied');
        window.location="creport.php?rep=<?php echo $cc ;?>";
    </script>

    <?php
}
?>
    <!-- ...........................................................................-->

<?php include 'xf.php'?>