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



<?php include "xh.php"; ?>

      <!-- Your Page Content Here -->
        <p> <a href="index.php"><i class="fa fa-mail-reply-all"></i> Back</a></p>
<?php
        $id=$_REQUEST['apart_name'];

        $do=mysql_query("SELECT * FROM apartments , image WHERE image.image_id='$id' AND apartments.apart_name='$id'")or die(mysql_error());
        $array=mysql_fetch_array($do);
        $count=mysql_num_rows($do);
        if($count >0)

?>
            <div class="box-body" >
        <!--<p class="login-box-msg" > Register a new Apartment </p > -->

        <form id = "newapartment" method = "POST" action = "" >


        <div class="form-group has-feedback" >
            <label > Apartment:</label >
            <input type = "text" placeholder = "" readonly = "" name = "apartbooked" id = "" value = "<?php echo $array['apart_name'];?>" class="form-control" >
        </div >

        <div class="form-group has-feedback" >
            <label > Booked / Rented by: </label ><input type = "Text" placeholder = "Enter name" readonly = "" name = "bookedby" id = "apartloc" value = "<?php echo "".$OtherNames."  ".$SirName.""; ?>" class="form-control" >
        </div >
        <div class="form-group has-feedback" >
            <label > Phone Number:</label ><input type = "text" placeholder = "Enter Mobile" readonly = "" name = "bookcontact" id = "ownername" value = "<?php echo $mobnum;?>" class="form-control" >
        </div >
        <div class="form-group has-feedback" >
            <label > Owner Contact:</label ><input type = "text" placeholder = "" readonly = "" name = "ownernum" id = "" value ="<?php echo $array['mobile_num'];?>" class="form-control" >
        </div >
        <div class="form-group has-feedback" >
                <label > Start date:</label ><input type = "date" placeholder = "Start date" name = "bookfrom" id = "datepicker-2months" value = "" class="form-control" required >
        </div >

          <!--My personal code-->
         

          <!--my personal code-->


          <div class="form-group has-feedback" >
            <label > End date:</label ><input type = "date" placeholder = "End date" name = "bookto" id = "datepicker2" value = "" class="form-control" required>

          </div >

          <!--My personal code-->

          <!--my personal code-->

        <div class="form-group has-feedback" >
            <label > Unit: </label >
            <input type = ""  placeholder = "Unit" name = "ya" id = "" value = "<?php echo $array['num_units'];?>" class="form-control" required />
        </div >

        <div class="form-group has-feedback" >
            <label > Total Payment:</label ><input type = ""  placeholder = "" name = "totalpay" id = "dep" value = "<?php echo $array['apart_price'];?>" readonly class="form-control" required />
        </div >

            <?php

            $deposit=$array['apart_price'] / 2

            ?>
        <div class="form-group has-feedback" >
            <label ><font color="red"> Deposit to be Paid*</font></label ><input type = ""  placeholder = "Deposit paid" readonly name = "depositpaid" id = "dep" value = "<?php echo $deposit;?>" class="form-control" required />
        </div >
        <div class="form-group has-feedback">
            <label for="selectopt"><font color="red" aria-required="true"> Select Payment Method*</font></label>
            <select id="selectopt"  class="form-control">
                <option value="" name="mode" selected >--SELECT OPTION--</option>
                <option value="1" >--CASH--</option>
                <option value="2">--BANK--</option>
                <option value="3">--M-PESA--</option>

            </select>

        </div>
        <div class="form-group has-feedback">
            <input id="mpesa" hidden="hidden" class="form-control" name="mpesa" placeholder="MPESA REFERENCE NUMBER" >

        </div>
        <div class="form-group has-feedback">
            <input id="bank" hidden="hidden"  class="form-control" name="bank" placeholder="BANK REFERENCE/RECEIPT NUMBER" >
        </div>


        <div class="form-group has-feedback" >
            <label > Application:</label ><input type = "checkbox" name = "bookstatus" value = "applied" checked = "checked" readonly = "" />
            </select >
        </div >


        <div class="col-xs-4" >
            <button type = "submit" value = "book apartment" name = "book" class="btn btn-primary " > Save information </button >

        </div >


        </form >
    </div>


    <?php include '../connection/dbconn.php'; ?>

    <?php
    if (isset($_POST['book'])){
$apartbooked=$_POST['apartbooked'];
$bookcontact=$_POST['bookcontact'];
$ownernum=$_POST['ownernum'];
$bookedby=$_POST['bookedby'];
$bookfrom=$_POST['bookfrom'];
$bookto=$_POST['bookto'];
$unit=$_POST['ya'];
$bookstatus=$_POST['bookstatus'];

$depositpaid=$_POST['depositpaid'];
$bank=$_POST['bank'];
$mpesa=$_POST['mpesa'];
$mode=$_POST['mode'];

if($bookcontact !=''||$depositpaid !='' || $bookfrom !="" )
{
//$encrypted = md5($password); // Encrypting pssword using md5 algo
$query=mysql_query("INSERT INTO booking(`apart_booked`,`booked_by`,`book_from`,`book_to`,`book_status`,`deposit_paid`,`book_contact`,`unit_booked` ,`mpesaref` ,`bankref` ,`owner_num` ,`paymentmode`)
VALUES('$apartbooked','$bookedby','$bookfrom','$bookto','$bookstatus','$depositpaid', '$bookcontact', '$ya' ,'$mpesa' ,'$bank' ,'$ownernum' ,'$mode')
")or die(mysql_error());

}
?>
     {

     <script type="text/javascript">
         alert('Success! Information updated');
            window.location="index.php";
          </script>

}
    <?php
        }
     ?>


    <!-- Main content -->    <!-- right col -->
<?php include "xf.php"; ?>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->


