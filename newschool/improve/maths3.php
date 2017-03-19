<?php 
error_reporting("E_NOTICE"); 
?>
<?php
//include('../header.php');
mysql_connect('localhost','root','');
mysql_select_db('vision');

$hy=mysql_query("select CODE, ((TEST+EXAM)/2) AS alt, AGGREGATE from studentmark, grades where studentmark.STUDENT_ID='$name' AND (TEST+EXAM)/2 >=grades.LMARK AND
(TEST+EXAM)/2 <= grades.HMARK AND studentmark.YEAR='$ya' AND studentmark.TERM='$term';");
$hm=mysql_num_rows($hy);

while($hw=mysql_fetch_array($hy)){
//echo $hw['CODE'].' '.$hw['alt'].' '.$hw['AGGREGATE'].'<BR/>';

}
$hy=mysql_query("select SUM(AGGREGATE) as aggs from studentmark, grades where studentmark.STUDENT_ID='$name' AND (TEST+EXAM)/2 >=grades.LMARK AND
(TEST+EXAM)/2 <= grades.HMARK AND studentmark.YEAR='$ya' AND studentmark.TERM='$term';");
$hw=mysql_fetch_array($hy);
echo $hw['aggs'].' in '.($hm+1);


?>