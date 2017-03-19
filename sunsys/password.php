<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sun | Registration Page</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>Sun</b> Apartments</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Reset password</p>

    <form  method="POST" id="reset">

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
     <!-- <div class="form-group has-feedback">
        <select name="who" id="usertype"  class="form-control" required>
          <option value='4'>Admin<font color="red">*</font></option>
          <option value='1'>Property Owner*</option>
          <option selected="" value='2'>User*</option>
          <!--<option value='3'>Employee</option>-->
        <!--  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </select>
      </div>-->

      <div class="form-group has-feedback">
        <input type="" name="username" placeholder="Username" id="" class="form-control" minlength="5" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
     <!--<div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="New Password" name="password" autocomplete="off" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="confirmpassword" autocomplete="off" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>-->

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" required=""> I agree to the <a href="terms.php">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="reset" class="btn btn-primary btn-block btn-flat">Reset</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <?php
    if (isset($_POST['reset'])){

        include_once("connection/conn.php");
        $username=$_POST['username'];
        $email=$_POST['email'];
        //$category=$_POST['who'];
        //$mypassword=$_POST['password'];
        //$repassword=$_POST['re_pass'];
        //before ecrypt

        $encrypted=hash("sha256" ,12345678);

        $sql = "SELECT * FROM users WHERE username='$username' AND emailad='$email' AND status='active' ";
        $result = mysql_query($sql);




        ?>
        <?php
        //check that at least one row was returned
        $rowCheck = mysql_num_rows($result);
        $row=mysql_fetch_array($result);


        if($row['category']==1){

            $query="UPDATE users SET username='$username' ,password='$encrypted' ,pass_status='insecure' WHERE emailad='$email' AND username='$username' ";
            //send message

            //end of send email

            if(!mysql_query($query,$conn))

            {die ("An unexpected error occured while activating Please try again!");}
            ?>
            <p align="center">Reset Successful</p>
            <br />
            <br />
            ........loading.....
            <p align="center">
                <meta content="2;login.php" http-equiv="refresh" />
            </p>
            <?php
        }  else if($row['category']==2){

            $query="UPDATE users SET username='$username' ,password='$encrypted' ,pass_status='insecure' WHERE emailad='$email' AND username='$username'";


            if(!mysql_query($query,$conn))
            {die ("An unexpected error occured while activating Please try again!");}

            ?>
            <p align="center">Reset Successful</p>
            <br />
            <br />
            ........loading.....
            <p align="center">
                <meta content="2;login.php" http-equiv="refresh" />
            </p>
            <?php

        }else if($row['category']==3){
            $query="UPDATE users SET username='$username' ,password='$encrypted' ,pass_status='insecure' WHERE emailad='$email' AND username='$username' ";


            if(!mysql_query($query,$conn))
            {die ("An unexpected error occured while activating Please try again!");}

            ?>
            <p align="center">Reset Successful</p>
            <br />
            <br />
            ........loading.....
            <p align="center">
                <meta content="2;login.php" http-equiv="refresh" />
            </p>
            <?php


        }
        else if($row['category']==4){
            $query="UPDATE users SET username='$username' ,password='$encrypted' ,pass_status='insecure' WHERE emailad='$email' AND username='$username'";


            if(!mysql_query($query,$conn))
            {die ("An unexpected error occured while activating Please try again!");}

            ?>

            <p align="center">Reset Successful</p>
            <br />
            <br />
            ........loading.....
            <p align="center">
                <meta content="2;login.php" http-equiv="refresh" />
            </p>
            <?php


        }
        else {

            ?>
            <p align="center"><font color="Red">Wrong email or username || user deactivated</font></p>
            <br />
            <br />
            ........loading.....
            <p align="center">
                <meta content="2;password.php" http-equiv="refresh" />
            </p>
            <?php
        }
        }

        ?>



    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>-->

    <a href="login.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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

<!-- No Number -->
<script>
                                  $(document).ready(function(){
                      $("#username").keypress(function(event){
                          var inputValue = event.charCode;
                          if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
                              event.preventDefault();
                              alert("Wrong input for username | Number not allowed");
                          }

                      });

                  });
</script>

</body>
</html>
