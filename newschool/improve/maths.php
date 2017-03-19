<?php 
error_reporting("E_NOTICE"); 
?>
<?php
//include('../header.php');
mysql_connect('localhost','root','');
mysql_select_db('');

$hy=mysql_query("select CODE, TEST, AGGREGATE from studentmark, grades WHERE 
studentmark.STUDENT_ID='$name' AND studentmark.TEST >=grades.LMARK AND studentmark.TEST<=grades.HMARK AND studentmark.YEAR='$ya' AND studentmark.TERM='$term'");
$hm=mysql_num_rows($hy);

while($hw=mysql_fetch_array($hy)){
//echo $hw['CODE'].' '.$hw['TEST'].' '.$hw['AGGREGATE'].'<BR/>';

}
$hy=mysql_query("select SUM(AGGREGATE) As aggs from studentmark, grades WHERE 
studentmark.STUDENT_ID='$name' AND studentmark.TEST >=grades.LMARK AND studentmark.TEST<=grades.HMARK AND studentmark.YEAR='$ya' AND studentmark.TERM='$term'");
$hw=mysql_fetch_array($hy);
echo $hw['aggs'].' in '.($hm-3);


?>