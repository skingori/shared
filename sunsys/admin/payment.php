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
$mobnum=$row['phonenum'];
?>

<?php include 'xh.php'?>

      <!-- Your Page Content Here ..................................................................-->
      <div class="box-body">

        <small style="color: red">You are about to Perform a full payment</small>

        <?php
        include("../connection/dbconn.php");
        $cc=$_REQUEST['id'];

        $query="SELECT * FROM booking WHERE id='".$cc."'";

        $resource=mysql_query($query,$conn) or die ("An unexpected error occured while <b>Activating</b> the record, Please try again!");
        $result=mysql_fetch_array($resource);

        ?>

        <form id="" name="cancel" method="POST" action="">
          <label>
            <input name="bid" type="text" id="" hidden="" value="<?php echo $result[10] ?>" readonly />
          </label>

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
            <label> Deposit Paid : </label><input type="text" name="" readonly="" class="form-control" value="<?php echo $result[5] ?>" />

          </div>

          <div class="form-group has-feedback">
            <label for="selectopt">Payment Mode:</label><label style="color: red">*</label>
            <select id="selectopt" class="form-control">
              <option value="" selected >--SELECT OPTION--</option>
              <option value="1" >--CASH--</option>
              <option value="2">--BANK--</option>
              <option value="3">--M-PESA--</option>
            </select>
              <script>
                  $("#selectopt").change(function () {
                      var selected_option = $('#selectopt').val();
                      if (selected_option === '2') {
                          $('#bank').attr('pk','1').show();
                      }
                      if (selected_option === '3') {
                          $('#mpesa').attr('pk','1').show();
                      }
                      if (selected_option != '3') {
                          $('#mpesa').attr('pk','1','2').hide();
                      }
                      if (selected_option != '2') {
                          $("#bank").removeAttr('pk').hide();
                      }
                  })

              </script>
          </div>

          <div class="form-group has-feedback">
            <input id="mpesa" hidden="hidden" name="mpesa" class="form-control" placeholder="MPESA REFERENCE NUMBER">
            <input id="bank" hidden="hidden" name="bank" class="form-control" placeholder="BANK REFERENCE/RECEIPT NUMBER">
          </div>



          <div class="form-group has-feedback">

            <label> Balance Remaining : </label><input type="text" name="payment" readonly class="form-control" value="<?php echo $result[5] ?>" />

          </div>



          <div class="form-group">
            <button type="submit" value="" name="update" class="btn btn-primary btn-flat">Confirm?</button>

          </div>



        </form>


        <?php
        if (isset($_POST['update'])){
          $ss=$_POST['bid'];
          $pay=$_POST['payment'];
          $bank=$_POST['bank'];
          $mpesa=$_POST['mpesa'];



          $query="UPDATE booking SET  book_status='paid', bal_paid='$pay' ,bankref='$bank' ,mpesaref='$mpesa' WHERE id='$cc'";

          if(!mysql_query($query,$conn))
          {die ("An unexpected error occured while Cancelling Please try again!");}

          ?>

          <script type="text/javascript">
            alert('The Account has been Paid');
            window.location="viewapart.php";
          </script>

          <?php
        }
        ?>

      </div>




      <!-- ...........................................................................-->

<?php include "xf.php";?>