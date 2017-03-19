<?php
error_reporting("E_NOTICE");
?>
<?php
//include('../header.php');
mysql_connect('localhost','root','root');
mysql_select_db('school');

$hy=mysql_query("select CODE, ((TEST+EXAM)/2) AS alt, AGGREGATE from studentmark, grades where studentmark.STUDENT_ID='jackson hreb' AND (TEST+EXAM)/2 >=grades.LMARK AND
(TEST+EXAM)/2 <= grades.HMARK;");
$hm=mysql_num_rows($hy);

while($hw=mysql_fetch_array($hy)){
//echo $hw['CODE'].' '.$hw['alt'].' '.$hw['AGGREGATE'].'<BR/>';

}
$hy=mysql_query("select SUM(AGGREGATE) as aggs from studentmark, grades where studentmark.STUDENT_ID='jackson hreb' AND (TEST+EXAM)/2 >=grades.LMARK AND
(TEST+EXAM)/2 <= grades.HMARK;");
$hw=mysql_fetch_array($hy);
echo $hw['aggs'].' in '.$hm;


?>
