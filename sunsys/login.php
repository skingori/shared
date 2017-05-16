
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sun | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Sun</b> Apartments</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <div id="login">


            <form  method="post" name="form" onsubmit="return validateForm()">

               <!--<div class="form-group has-feedback ">
                            <select name="who" class="form-control" title="MY CATEGORY" id='in' required>
                                <option >--Select Type--</option>
                                <option value='1'>Property Owner*</option>
                                <option value='2' >User*</option>
                                <!--<option value='3' >Employee</option>-->
                        <!--        <option value='4' >Administrator*</option>
                            </select>
                </div>-->
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username"  autocomplete="off" placeholder="Username"  id="in" required />
                </div>
                <div class="form-group has-feedback">
                    <input type="password"  name="password" class="form-control" placeholder="Password" id="in" required  />
                </div>

                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" required=""> Accept our terms  </a>
                    </label>
                </div>

                       <button class="btn btn-primary btn-success btn-block btn-flat" type="submit" value="login" name="login">Sign in</button>
                            <!--<button  type="reset" class="btn btn-primary btn-block btn-flat" value="Cancel" name="clear">Clear</button>-->

            </form>


            <?php
            if (isset($_POST['login'])){

                include_once("connection/conn.php");
                $username=$_POST['username'];
                //$level=$_POST['who'];
                $mypassword=$_POST['password'];
                $encrypted=hash("sha256" ,$mypassword);
                // testfile.php

               /* $time=mysql_query("SELECT now() as time");
                $jj= mysql_fetch_array($time);
                $gettime=$jj['time'];

                $fh = fopen("logins.txt", 'a') or die("Failed to create file");
//another column in a file to show failed or passed
                $text = <<<_END

[  $username | $password | $gettime
_________________________________________________________________
_END;

                fwrite($fh, $text) or die("Could not write to file");

                fclose($fh);
                /*
                ----------------------------
                <?php
                $fh = fopen("testfile.txt", 'r') or
                die("File does not exist or you lack permission to open it");
                $text = fread($fh, 3);
                fclose($fh);
                echo $text;
                ?>*/

                //$sql = mysql_query("INSERT INTO users(username,password, LEVEL) VALUES('$username', '$pass', 4)");

                $sql = "SELECT * FROM users WHERE username='$username' AND password='$encrypted' AND status='active' ";
                $result = mysql_query($sql);

                ?>
                <?php
                //check that at least one row was returned
                $rowCheck = mysql_num_rows($result);
                $row=mysql_fetch_array($result);


                if($row['category']==1){

                    session_start();
                    $_SESSION['userid']=$row['userid'];
                    $_SESSION['category']=$row['category'];
                    ?>
                    <p align="center"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful</p>
                    <!--<br />
                    <br />
                     ........loading.....-->
                    <p align="center">
                        <meta content="2;powner/index.php?action=home" http-equiv="refresh" />
                    </p>
                    <?php
                }
                else if($row['category'] ==1 AND ($row['pass_status']=='insecure') OR ($mypassword =="")){
                    session_start();
                    $_SESSION['userid']=$row['userid'];
                    $_SESSION['category']=$row['category'];
                    ?>
                    <p align="center"><font color="red"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful but insecure</font></p>

                    <!--<br />
                    <br />
                    ........loading.....-->
                    <p align="center">
                        <meta content="2;powner/poprof.php" http-equiv="refresh" />
                    </p>
                    <?php


                }
                else if($row['category'] ==2 AND ($row['pass_status']=='insecure') OR ($mypassword =="")){
                    session_start();
                    $_SESSION['userid']=$row['userid'];
                    $_SESSION['category']=$row['category'];
                    ?>
                    <p align="center"><font color="red"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful but insecure</font></p>
                    <!--<br />
                    <br />
                     ........loading.....-->
                    <p align="center">
                        <meta content="2;user/uprof.php" http-equiv="refresh" />
                    </p>
                    <?php


                }

                else if($row['category']==2){
                    session_start();
                    $_SESSION['userid']=$row['userid'];
					$_SESSION['category']=$row['category'];
                    ?>
                    <p align="center"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful</p>
                    <!--<br />
                    <br />
                     ........loading.....-->
                    <p align="center">
                        <meta content="2;user/index.php?action=home" http-equiv="refresh" />
                    </p>
                    <?php

                }else if($row['category']==3){
                    session_start();
                    $_SESSION['userid']=$row['userid'];
					$_SESSION['category']=$row['category'];
                    ?>
                    <p align="center"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful</p>
                   <!-- <br />
                    <br />
                     ........loading.....-->
                    <p align="center">
                        <meta content="2;improve/index.php?action=home" http-equiv="refresh" />
                    </p>
                    <?php


                }
                else if($row['category'] ==4 AND ($row['pass_status']=='insecure') OR ($mypassword =="")){
                    session_start();
                    $_SESSION['userid']=$row['userid'];
					$_SESSION['category']=$row['category'];
                    ?>
                    <p align="center"><font color="red"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful but insecure</font></p>
                    <!--<br />
                    <br />
                     ........loading.....-->
                    <p align="center">
                        <meta content="2;admin/adminprof.php" http-equiv="refresh" />
                    </p>
                    <?php


                }
                else if($row['category']==4){
                    session_start();
                    $_SESSION['userid']=$row['userid'];
                    $_SESSION['category']=$row['category'];
                    ?>
                    <p align="center"><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Login Successful</p>
                   <!-- <br />
                    <br />
                     ........loading.....-->
                    <p align="center">
                        <meta content="2;admin/index.php" http-equiv="refresh" />
                    </p>
                    <?php


                }
                else {

                    ?>
                    <p align="center">Incorrect login name or password</p>
                    <br />
                    <br />
                    ........loading.....
                    <p align="center">
                        <meta content="2;login.php" http-equiv="refresh" />
                    </p>

                    <?php
                }
            }

            ?>



        <!--<div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                Google+</a>
        </div>-->
        <!-- /.social-auth-links -->
        <hr>

        Forgot your password? <a href="password.php">Click here</a><br>
        <a href="register.php" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });


</script>



</body>
</html>
