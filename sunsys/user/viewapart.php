<?php include "xh.php";?>

                <?php
                                 include("../connection/dbconn.php");
                         $query="SELECT * FROM booking WHERE book_status<>'paid' AND book_contact='$mobnum' AND book_status='applied'";

                                  $resource=mysql_query($query,$conn);
                                  echo "
                                <table align=\"center\" border=\"\" width=\"100%\" class=\"table table-bordered table-striped\">
                                <tr>
                                <td><b>Apartment</b></td> <td><b>Booked By</b></td><td><b>From Date</b></td><td><b>To Date</b></td><td><b>Cancel</b></td><td><b>Pay</b></td></tr> ";
                while($result=mysql_fetch_array($resource))
                        {
                        echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td><td>
                        <a href=\"cancel.php?id=".$result[10]."\"><i class=\"fa fa-times\" aria-hidden=\"true\"></a></td>
                        <td><a href=\"payment.php?id=".$result[10]."\"><i class=\"fa fa-money\" aria-hidden=\"true\"></a></td></tr>";

                        }

                        echo "</table>";

                         ?>


<?php include 'xf.php' ?>