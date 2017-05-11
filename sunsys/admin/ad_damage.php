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
<?php include 'xh.php' ?>
      <!-- Your Page Content Here by samson -->
      

      <div class="register-box-body">
        <!--<p class="login-box-msg">Register a new Apartment </p>-->
        <p><h4><font color="#a52a2a">Add New Damage</font></h4></p>
        
        <form id="newapartment" method="POST" action="">
            
        <div class="form-group has-feedback">
            <input type="text" name="damageby" placeholder="Damage Caused by" value="" class="form-control" required>
        </div>
        <div class="form-group has-feedback">
            <input type="Text" placeholder="Mobile Number" name="dmobnumber"  value="" class="form-control" required>
        </div>
        <!--<div class="form-group has-feedback">
            <input type="Text" placeholder="Date today" name="date"  value="" class="form-control" required>
        </div>-->
        <div class="form-group has-feedback">
          <input type="Text" placeholder="Damage" name="damage"  value="" class="form-control" required>
        </div>
        <div class="form-group has-feedback">
          <input type="number" placeholder="Charges" name="charges"  value="" class="form-control" required>
        </div>
        <div class="form-group has-feedback">
         <textarea placeholder="Other Details" name="otherdtails" value="" class="form-control" required></textarea>
        </div>


            <div class="col-xs-4">
                <button type="submit"  name="policy" class="btn btn-primary btn-block btn-flat">Save Information</button>
         
            </div>
            
            
        </form>
    </div>
    
    
    <?php include '../connection/dbconn.php'; ?>
    <?php
    if (isset($_POST['policy'])){
$damageby=$_POST['damageby'];
$mobile=$_POST['dmobnumber'];
//$date=$_POST['date'];
$damage=$_POST['damage'];
$charges=$_POST['charges'];
$otherdetails=$_POST['otherdtails'];

if($damageby !=''||$damage !=''){
//$encrypted = md5($password); // Encrypting pssword using md5 algo
$query=mysql_query("INSERT INTO damages(`damageby`,`mobilenumber`,`date_reg`,`damage` ,`charges` ,`otherdetails` ,`logs`)
VALUES('$damageby','$mobile',now() ,'$damage','$charges','$otherdetails' ,'Damage added by admin')
")or die(mysql_error());


  //logs
  $log_query=mysql_query("INSERT INTO logs(`activity`,`activity_by` ,`date`)
                        VALUES('Damage Addaed','By admin' , now() )
                        ")or die(mysql_error());
  //end of logs

echo '<font color="Green"><b> Damage added to list </font></b>';
}
 else {
    echo '<font color="red"><b> Empty fields not allowed </font></b>';
}
    }
    
?>    
        <!--
       Add content here
        -->
<?php include 'xf.php' ?>