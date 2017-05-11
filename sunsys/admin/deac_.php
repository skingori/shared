<?php include 'xh.php'?>

        <!-- Main content -->
        <section class="content">

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
                <button class="btn btn-primary btn-block btn-flat" type="submit" name="de" class="button" value="Activate" />De-activate Account</label>
            </label>

            </form>

            </div>
            <?php
            if (isset($_POST['de'])){
                include("../connection/conn.php");
                $id=$_POST['id'];
                $mypassword=$_POST['password'];
                $encrypted=hash("sha256" ,$mypassword);
                $query="UPDATE users SET status='inactive' WHERE userid='".$id."'";

                if(!mysql_query($query,$conn))
                {die ("An unexpected error occured while activating Please try again!");}

                ?>

                <script type="text/javascript">
                    alert('The Account has been de-activated');
                    window.location="deactivator.php";
                </script>

                <?php
            }
            ?>

                <!-- ...........................................................................-->

<?php include 'xf.php'?>