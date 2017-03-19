<?php require_once('connection/con.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
  {
    if (PHP_VERSION < 6) {
      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    }

    $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

    switch ($theType) {
      case "text":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "long":
      case "int":
        $theValue = ($theValue != "") ? intval($theValue) : "NULL";
        break;
      case "double":
        $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
        break;
      case "date":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "defined":
        $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
        break;
    }
    return $theValue;
  }
}

mysql_select_db($database_conn, $con);
$query_Recordset1 = "SELECT * FROM users";
$Recordset1 = mysql_query($query_Recordset1, $con) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

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

  <script src="custom/incl/jquery.js"></script>
  <script src="custom/incl/script.js"></script>
  <script src="custom/incl/script.responsive.js"></script>

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="admin.php"><b>Sun</b> Apartments</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form  method="POST" id="form1">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" autocomplete="off" placeholder="Sir name" id="sirname" name="sirname" minlength="3" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" autocomplete="off" placeholder="Other Names" id="othernames" name="othernames" minlength="8" required>
        <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="username" name="username" autocomplete="off" id="username" minlength="4" required/>
        <!--<span class="" id="user-result"></span>-->
        <td> <span id="user-result"></span></td>
      </div>
      <div class="form-group has-feedback">
        <input type="" class="form-control" placeholder="Mobile Number" name="mnumber" minlength="10" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>


      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" autocomplete="off" placeholder="ID number" name="idnumber" minlength="7" required>
        <span class="glyphicon glyphicon-qrcode form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="category" id="usertype"  class="form-control" required>
          <option value='4'>Admin<font color="red">*</font></option>
          <option value='1'>Property Owner*</option>
          <option selected="" value='2'>User*</option>
          <!--<option value='3'>Employee</option>-->
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </select>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" placeholder="Password" id="password" class="form-control" minlength="5" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="conf_pass" placeholder="Confirm Password" id="conf_pass" class="form-control" minlength="5" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

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
          <button type="submit" name="create" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


        <?php
        include "connection/dbconn.php"; 

        if(isset($_POST['create'])){

        //start of good code

            $sirname=$_POST['sirname'];
            $othernames=$_POST['othernames'];
            $username=$_POST['username'];
            $mnumber=$_POST['mnumber'];
            $idnumber=$_POST['idnumber'];
            $email=$_POST['email'];
            $category=$_POST['category'];
            $mypassword=$_POST['password'];
            $conf_pass=$_POST['conf_pass'];
            $encrypted=hash("sha256" ,$mypassword); // Encrypting pssword


            if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['conf_pass']) || empty($_POST['email'])){
                echo '<b>Please fill out all fields.</b>';

            }elseif($_POST['password'] != $_POST['conf_pass']){
                echo '<b><font color="red">Error!! Your Passwords do not match.</font></b></b>';
            }else{

                $dup = mysql_query("SELECT username FROM users WHERE username='".$_POST['username']."'");
                if(mysql_num_rows($dup) >0){
                    echo '<b><font color="red">Error!! Username Already Used.</font></b>';
                }
                else{
                    //$url = 'http:tarclink.com';
                   // echo '<META HTTP-EQUIV=Refresh CONTENT="2; URL='.$url.'">';

                     $sql=mysql_query("INSERT INTO users(`username`,`emailad`,`idcard`,`phonenum`,`password`,`sirname`,`othernames`,`category`,`status`)
                      VALUES('$username','$email','$idnumber','$mnumber','$encrypted','$sirname','$othernames','$category','inactive')
                      ");//or die(mysql_error());   

                    if($sql){
                         echo '<b><font color="green">Congrats, You are now Registered.</font></b>';
                            $url = 'login.php';
                            echo '<META HTTP-EQUIV=Refresh CONTENT="2; URL='.$url.'">';
                    }
                    else{
                        echo '<b>Error!! Registeration.</b>';
                    }
                }
            }
        }
      
      ?>


   <!-- <div class="social-auth-links text-center">
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
//for username
                   $(document).ready(function(){
                      $("#sirname").keypress(function(event){
                          var inputValue = event.charCode;
                          if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
                              event.preventDefault();
                              alert("Wrong input for Sirname | Number not allowed");
                          }
                      });
                  });
//for username
                   $(document).ready(function(){
                      $("#othernames").keypress(function(event){
                          var inputValue = event.charCode;
                          if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
                              event.preventDefault();
                              alert("Wrong input for Name | Number not allowed");
                          }
                      });
                  });
</script>



<script type="text/javascript">
  $(document).ready(function() {
    $("#username").keyup(function (e) {

      //removes spaces from username
      $(this).val($(this).val().replace(/\s/g, ''));

      var username = $(this).val();
      if(username.length < 1){$("#user-result").html('');return;}

      if(username.length >= 1){
        $("#user-result").html('<img src="images/loader.gif" />');
        $.post('check-uname.php', {'username':username}, function(data) {
          $("#user-result").html(data);
        });
      }
    });
  });
</script>



</body>
</html>
<?php
mysql_free_result($Recordset1);
?>