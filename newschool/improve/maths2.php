<?php 
error_reporting("E_NOTICE"); 
?>
<?php
//include('../header.php');
mysql_connect('localhost','root','');
mysql_select_db('vision');

$hy=mysql_query("select CODE, EXAM, AGGREGATE from studentmark, grades WHERE 
studentmark.STUDENT_ID='$name' AND studentmark.EXAM >=grades.LMARK AND studentmark.EXAM<=grades.HMARK AND studentmark.YEAR='$ya' AND studentmark.TERM='$term'");
$hm=mysql_num_rows($hy);

while($hw=mysql_fetch_array($hy)){
//echo $hw['CODE'].' '.$hw['TEST'].' '.$hw['AGGREGATE'].'<BR/>';

}
$hy=mysql_query("select SUM(AGGREGATE) As aggs from studentmark, grades WHERE 
studentmark.STUDENT_ID='$name' AND studentmark.EXAM >=grades.LMARK AND studentmark.EXAM<=grades.HMARK AND studentmark.YEAR='$ya' AND studentmark.TERM='$term'");
$hw=mysql_fetch_array($hy);
echo $hw['aggs'].' in '.$hm;


?>