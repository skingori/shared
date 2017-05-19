

<?php include 'xh.php'?>

    <!-- Your Page Content Here ..................................................................-->

        <?php
        include("../connection/dbconn.php");
        $cc=$_REQUEST['id'];

        $query="SELECT * FROM booking WHERE id='".$cc."'";

        $resource=mysql_query($query,$conn) or die ("An unexpected error occured while <b>Activating</b> the record, Please try again!");
        $result=mysql_fetch_array($resource);

        ?>

        <form id="" name="cancel" method="POST" action="">

            <div class="form-group has-feedback">

                <label> Booking ID: </label><input type="text" readonly="" name="bid" placeholder="" class="form-control" value="<?php echo $result[id] ?>" >
            </div>
            <div class="form-group has-feedback">

                <label> Apartment booked: </label><input type="text" readonly="" name="ab" action="?action=search" placeholder="" class="form-control" value="<?php echo $result[apart_booked] ?>" />
            </div>

            <div class="form-group has-feedback">
                <label> Booked/Rented by : </label><input type="text" name="" readonly="" class="form-control" value="<?php echo $result[booked_by] ?>" />
            </div>

            <div class="form-group has-feedback">
                <label> Deposit Paid : </label><input type="text" name="" readonly="" class="form-control" value="<?php echo $result[deposit_paid] ?>" />

            </div>

            <div class="form-group has-feedback">
                <label>Select Payment Method<small style="color: red" > *</small></label>
                <div class="form-group">
                    <select onchange="yesnoCheck(this);" class="form-control" name="mode">
                        <option value="Cash">Cash</option>
                        <option value="Bank">Bank</option>
                        <option value="M-Pesa">M-pesa</option>
                    </select>
                </div>


                <div id="ifYes" style="display: none;" class="form-group">
                    <input type="text" id="mpesa" name="mpesa" class="form-control" placeholder="M-PESA REF"/>
                </div>
                <div id="ifYes1" style="display: none;" class="form-group">
                    <input type="text" id="bank" name="bank" class="form-control" placeholder="BANK REF"/>
                </div>



                <script>
                    function yesnoCheck(that) {
                        if (that.value == "M-Pesa") {
                            alert("You are now paying with MPESA");
                            document.getElementById("ifYes").style.display = "block";
                        } else {
                            document.getElementById("ifYes").style.display = "none";
                        }
                        if (that.value == "Bank") {
                            alert("You are now paying with BANK");
                            document.getElementById("ifYes1").style.display = "block";
                        } else {
                            document.getElementById("ifYes1").style.display = "none";
                        }
                    }
                </script>



            <div class="form-group has-feedback">

                <label> Balance Remaining : </label><input type="text" name="payment" readonly class="form-control" value="<?php echo $result[5] ?>" />

            </div>



            <div class="form-group">
                <button type="submit" value="" name="update" class="btn btn-primary btn-flat">Confirm Payment?</button>

            </div>



        </form>


        <?php
        if (isset($_POST['update'])){

            $ss=$_POST['bid'];
            $mode=$_POST['mode'];
            $pay=$_POST['payment'];
            $bank=$_POST['bank'];
            $mpesa=$_POST['mpesa'];



            $query="UPDATE booking SET  book_status='paid', bal_paid='$pay' ,pmodebal='$mode' ,bankrefbal='$bank' ,mpesarefbal='$mpesa' ,cdate=NOW() WHERE id='$cc'";

            if(!mysql_query($query,$conn))
            {die ("An unexpected error occured while Cancelling Please try again!");}

            ?>

            <script type="text/javascript">
                alert('The Account has been Paid');
                window.location="report.php?rep=<?php echo $cc ;?>";
            </script>

            <?php
        }
        ?>




    <!-- ...........................................................................-->

<?php include "xf.php";?>