<?php include 'xh.php'?>
        <?php


        $id=$_REQUEST['mobile_num'];


        $do=mysql_query("SELECT * from users where phonenum='$id' ")or die(mysql_error());
        $array=mysql_fetch_array($do);
        $count=mysql_num_rows($do);
        if($count >0)

        {

          ?>
                <label><a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
                        <a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>&nbsp;
                        <a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                </label>


          <table class="table-bordered table table-responsive table-striped table-condensed" style="border: 1px double;background-color: #c1e2b3 ;background-size:cover; padding:0px ">

            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="50%">APARTMENT OWNER :</td>
              <td width="90%"><?php echo $array['othernames'];?> </td>
              <td rowspan="5"><img src="../dist/img/user2-160x160.jpg" width="200" height="200"  id="images"/></td>
            </tr>
            <tr>
              <td>MOBILE NUMBER: </td>
              <td><?php echo $array['phonenum'];?></td>
            </tr>
            <tr>
              <td height="">BANK NAME: </td>
              <td><?php echo $array['bank_name'];?></td>
            </tr>
            <tr>
              <td height="">ACCOUNT NUMBER: </td>
              <td><?php echo $array['bank_account'];?> </td>
            </tr>


            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3" align=""><b>SUN APARTMENTS</b><br><small>P.O BOX 7667 NAIROBI</small></td>

            </tr>
          </table>
          <?php
        }
        ?>



        <!-- ...........................................................................-->
<?php include 'xf.php'?>