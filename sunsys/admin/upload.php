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

      <!-- Your Page Content Here -->

      <form  method="POST" enctype="multipart/form-data" id="mytable" >
          <div class="form-group has-feedback">
              <select name="owner" required class="form-control">
                  <option>
                  <option>
                  <?php
            $result = mysql_query("SELECT apart_name FROM apartments WHERE apart_name NOT IN (SELECT image_id FROM image)");
            while($row = mysql_fetch_array($result))
              {
                echo '<option value="'.$row['apart_name'].'">';
                echo $row['apart_name'];
                echo '</option>';
              }
            ?>
                </select>
          </div>
          <div class="form-group has-feedback">

          <input type="file" name="image"  id="in" required class="form-control"/>

          </div
          <div class="form-group has-feedback">
            <input type="submit" name="submit" value="Upload" class="btn btn-primary" />
                <input type="reset" name="reset" value="Cancel Upload" class="btn btn-primary" />
          </div>

        </form>

        <?php

      if (isset($_POST['submit'])) {

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $_FILES["image"]["name"]);
                                $location = "../upload/" . $_FILES["image"]["name"];
                $owner=$_POST['owner'];
                                mysql_query("insert into image (image_id,location)
      values ('$owner','$location')
      ") or die(mysql_error());



      $query=mysql_query("SELECT * from image, apartments where image.image_id='$owner' and apartments.apart_name='$owner'")or die(mysql_error());
      while($row=mysql_fetch_array($query)){

      echo 'THE APARTMENT IS '.$row['apart_name'].'<BR/>';

      ?>
        <img src="<?php echo $row['location']; ?>" width="100" height="100" alt="" class="img-rounded">
        <?php
      }

      echo '<meta content="4;upload.php" http-equiv="refresh" />';
                            }
      ?>


    <!-- Main content -->    <!-- right col -->
    <?php include "xf.php"; ?>