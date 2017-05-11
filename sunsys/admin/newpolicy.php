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


<?php include "xh.php";?>

      <!-- Your Page Content Here by samson -->
      

      <div class="register-box-body">
        <!--<p class="login-box-msg">Register a new Apartment </p>-->
        <p><h4><font color="#a52a2a">Add New Policy</font></h4></p>
        
        <form id="newapartment" method="POST" action="">
            
        <div class="form-group has-feedback">
            <input type="text" name="policynum" placeholder="Policy Number" value="" class="form-control" required>
        </div>
        <div class="form-group has-feedback">
            <input type="Text" placeholder="Policy" name="policytype"  value="" class="form-control" required>
        </div>
        <div class="form-group has-feedback">
         <textarea placeholder="Other Details" name="odtails" value="" class="form-control" required></textarea>
        </div>


            <div class="col-xs-4">
                <button type="submit"  name="policy" class="btn btn-primary btn-block btn-flat">Save Information</button>
         
            </div>
            
            
        </form>
    </div>
    
    
    <?php include '../connection/dbconn.php'; ?>
    <?php
    if (isset($_POST['policy'])){
$policynum=$_POST['policynum'];
$policy=$_POST['policytype'];
$otherdet=$_POST['odtails'];


if($policy !=''||$policynum !=''){
//$encrypted = md5($password); // Encrypting pssword using md5 algo
$query=mysql_query("INSERT INTO policy(`policynumber`,`policytype`,`otherdetails`,`logs`)
VALUES('$policynum','$policy','$otherdet','Policy added by admin')
")or die(mysql_error());
echo '<font color="Green"><b> Policy added to list </font></b>';
}
 else {
    echo '<font color="red"><b> Empty fields not allowed </font></b>';
}
    }
    
?>    
        <!--
       Add content here 
        -->
    <?php include "xf.php"; ?>