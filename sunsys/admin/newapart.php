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

<?php include "xh.php"; ?>

      <!--................<!-- Your Page Content Here by samson --.................................content here -->


      <div class="box-body">
        <!--<p class="login-box-msg">Register a new Apartment </p>-->
        <form id="newapartment" method="POST" action="">
          <div class="form-group has-feedback">
            <label>Apartment Name:</label>
              <input type="text" name="apartname" pattern="[a-zA-Z\s]+" title="Only enter letters" placeholder="Enter Name" id="apartname" value="" class="form-control" required=""/>

          </div>
          <div class="form-group has-feedback">
            <label>Location:</label><input type="Text" pattern="[a-zA-Z\s]+" placeholder="Location" name="apartloc" id="apartloc" value="" class="form-control">
          </div>
          <div class="form-group has-feedback">
            <label>Owner Name:</label><input type="Text" placeholder="" readonly="" name="ownername"  id="ownername" value="<?php echo "".$OtherNames."";?>" class="form-control" required="">
          </div>
          <div class="form-group has-feedback">
            <label>Mobile Number:</label><input type="tel" placeholder="" readonly="" name="mobilenum" id="mobilenum"  value="<?php echo $mobnum;?>" class="form-control" required="">
          </div>
          <div class="form-group has-feedback">
            <label>Units:</label><input type="Text" placeholder="Units Available" pattern="[a-zA-Z\s]+" name="numunits" id="" value="" class="form-control">
          </div>
          <div class="form-group has-feedback">
            <label>Status:</label><select name="status" id="status" value="" class="form-control" required>
              <option value="new">New</option>
              <option value="good">Good condition</option>
              <option value="old"> Old </option>
            </select>
          </div>
          <div class="form-group has-feedback">
            <label>Pricing:</label><input type="number" placeholder="Amount" name="price" id="price" value="" class="form-control" required="" />
          </div>

          <!---  upload code
          <div class="form-group has-feedback">
            <label>Upload Property Image:</label>
            <input type="file" name="image"  id="in" class="form-control" required />
          </div>
           upload code end -->


          <div class="form-group has-feedback">
            <label>Registration date:</label><input type="date" autocomplete="off"  placeholder="End date" name="regdate" id="" value="" class="form-control" required>
          </div>
          <!-- My personal code -->
         

          <!-- my personal code -->
          <!--<div class="form-group has-feedback">
            <label>Cancelation Charges:<i><font color="red"> *To be used in case of canceled booking* </i></font> </label><input type="number" placeholder="Add charges" name="cancelcharge" id="regdate" value="" class="form-control">
          </div>-->
          <div class="form-group has-feedback">
            <label>Furniture</label><textarea pattern="[a-zA-Z\s]+" placeholder="Items to find from this apartment" name="furniture" id="" value="" class="form-control"></textarea>

          </div>

          <div class="form-group has-feedback">
            <label>Other Details:</label><textarea pattern="[a-zA-Z\s]+" placeholder="Other details" name="otherdet" id="" value="" class="form-control"></textarea>
          </div>

          <div class="form-inline">
              <button type="submit" value="New Apartment" name="create" class="btn bg-blue btn-default "><i class="fa fa-home"> New Apartment</i>
            <button type="button" onclick="location.href='upload.php';" value="Next" class="btn bg-red-gradient"><i class="fa fa-image"> Image</i>
          </div>

        </form>




      </div>


      <?php include '../connection/dbconn.php'; ?>
      <?php
      if (isset($_POST['create'])){
        $apartname=$_POST['apartname'];
        $apartloc=$_POST['apartloc'];
        $ownername=$_POST['ownername'];
        $mobilenum=$_POST['mobilenum'];
        $status=$_POST['status'];
        $price=$_POST['price'];
        $regdate=$_POST['regdate'];
        $numunits=$_POST['numunits'];
        //$cancelcharge=$_POST['cancelcharge'];
        $furniture=$_POST['furniture'];
        $otherdet=$_POST['otherdet'];


        ///your insert code//
//$encrypted = md5($password); // Encrypting pssword using md5 algo

        $query=mysql_query("INSERT INTO apartments(`apart_name`,`apart_loc`,`owner_name`,`mobile_num`,`apart_status`,`apart_price`,`regdate`, `num_units`,`furniture` ,`other_det` ,`logs`)
VALUES('$apartname','$apartloc','$ownername','$mobilenum','$status','$price','$regdate', '$numunits', '$furniture' ,'$otherdet' ,'Apartment added')
")or die(mysql_error());




          ?>

          <script type="text/javascript">
              alert('The Account has been canceled and charges applied');
              window.location="newapart.php";
          </script>

          <?php
      }
?>

      <!-- end of your contet --------------<!--  END Your Page Content Here by samson -------------------------->
<?php include "xf"; ?>