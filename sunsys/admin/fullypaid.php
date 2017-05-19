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

<?php include 'xh.php'?>

      <!-- Your Page Content Here ..................................................................-->
<section class="content">
      <!-- Info boxes -->
  <div class="panel" id="activate">
                <div class="content_section">
                <div class="box">
                        <div class="box-header">
                            <span class="input-group-btn">

                            <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-print"></i></button>&nbsp;
                            <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-file"></i></button>
                            </span>
                          </div>

                <?php 
                                 include("../connection/dbconn.php");	
                         $query="SELECT * FROM booking where book_status='paid'";

                                  $resource=mysql_query($query,$conn);
                                  echo "
                                <table align=\"center\" border=\"0\" width=\"100%\" class=\"table table-bordered table-striped\" id=\"table1\">
                                <tr>
                                <td><b>Apartment Name</b></td> <td><b>Booked by</b></td><td><b>Date booked</b></td><td><b>Deposit Paid</b></td><td><b>Balance Paid(Kshs)</b></td></tr>";
                while($result=mysql_fetch_array($resource))
                        { 
                        echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[5]."</td><td>".$result[6]."</td></tr>";
                        
                        } 
                        
                        echo "</table>";
                        
                         ?>

                </div>

                </div>


    </div>       
      
      
<!-- ...........................................................................-->

<?php include 'xf.php'?>
