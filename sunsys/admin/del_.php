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
            <?php
            include("../connection/conn.php");
            $id=$_REQUEST['userid'];
            $query="SELECT * FROM users WHERE userid='".$id."'";

            $resource=mysql_query($query,$conn) or die ("An unexpected error occured while <b>Activating</b> the record, Please try again!");
            $result=mysql_fetch_array($resource);

            ?>
            <div class="register-box-body">
            <form id="form1" class="" name="form1" method="post" action="">

            <div class="form-group has-feedback">
                <input type="hidden" name="uid" value="<?php echo $result[0] ?>"  />
                <input type="hidden" name="uname" value="<?php echo $result[1] ?>"  />
            </div>
            <div class="form-group has-feedback">
                <input name="id" class="form-control" type="text" id="textfield" value="<?php echo $result[0] ?>" readonly />

            </div>
            <div class="form-group has-feedback" >
                <input name="uname" class="form-control" type="text" id="textfield" value="<?php echo $result[1] ?>" readonly />
            </div>

            <label>
                <button class="btn btn-primary btn-block btn-flat" type="submit" name="de" class="button" value="Activate" />Delete Account</label>
            </label>

            </form>

            </div>
                    <?php
                            if (isset($_POST['de'])){ 
                            include("../connection/connector.php");
                            $id=$_POST['id'];
                            $query="DELETE FROM users WHERE userid='".$id."'";

                            $log_query=mysql_query("INSERT INTO logs(`activity`,`activity_by` ,`date`)
                                                           VALUES('User Deleted','By admin' , now() )
                                                                ")or die(mysql_error());

                              if(!mysql_query($query,$conn))
                              {die ("An unexpected error occured while Deleting the account Please try again!");}

                     ?>

                    <script type="text/javascript">
                    alert('The Account has been Deleted');
                    window.location="deleter.php";
                    </script>

                    <?php
                    }
                    ?>

                <!-- ...........................................................................-->
<?php include 'xf.php'?>