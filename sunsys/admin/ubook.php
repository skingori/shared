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
        <p> <a href="booking.php"><i class="fa fa-mail-reply-all"></i> Back</a></p>
<?php
        $id=$_REQUEST['apart_name'];

        $do=mysql_query("SELECT * FROM apartments , image WHERE image.image_id='$id' AND apartments.apart_name='$id'")or die(mysql_error());
        $array=mysql_fetch_array($do);
        $count=mysql_num_rows($do);
        if($count >0)

?>

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
                <label > Start date:</label ><input type = "date" placeholder = "Start date" onchange="calc()" name = "bookfrom" id = "startdate" value = "" class="form-control" required >
        </div >

          <!--My personal code-->


          <!--my personal code-->


          <div class="form-group has-feedback" >
            <label > End date:</label >
              <input type = "date" placeholder = "End date" onchange="calc()" name = "bookto" id = "enddate" value = "" class="form-control" required>

          </div >

          <!--My personal code-->

          <!--my personal code-->

        <div class="form-group has-feedback" >
            <label > Unit: </label >
            <input type = ""  placeholder = "Unit" name = "ya" id = "" value = "<?php echo $array['num_units'];?>" class="form-control" required />
        </div >

        <div class="form-group has-feedback" >
            <?php
            $price=$array['apart_price'];
            ?>
            <label > Total Payment:</label ><input type = "" readonly="" placeholder = "" name = "totalpay" id = "output" value = "" class="form-control" required />
        </div >


        <div class="form-group has-feedback" >
            <label >Deposit to be Paid </label><label style="color: red">*</label><input type = ""  placeholder = "Deposit paid" readonly name = "depositpaid" id = "dep" value = "<?php echo $deposit;?>" class="form-control" required />
        </div >
        <div class="form-group has-feedback">
            <label for="selectopt">Select Payment Method<small style="color: red" > *</small></label>
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
            <label > Agree to Terms And Conditions :</label ><input type = "checkbox" required="" name = "bookstatus" value = "applied"  >
            </select >
        </div >


        <div class="form-group" >
            <button type = "submit" value = "book apartment" name = "book" class="btn btn-primary  bg-red-gradient" > Book/Rent </button >

        </div >


        </form >


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
<script>
    function calc() {
        var datex = document.getElementById('startdate').value;
        var datey = document.getElementById('enddate').value;
        var date1 = new Date(datex);
        var date2 = new Date(datey);
        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        //for full price
        var days= diffDays * <?php echo $price?>;
        document.getElementById('output').value = days;
        //for deposit
        document.getElementById('dep').value = days/2;
    }
</script>

    <!-- Main content -->    <!-- right col -->
<?php include "xf.php"; ?>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->


