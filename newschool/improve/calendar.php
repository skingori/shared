<?php 
error_reporting("E_NOTICE"); 
?>
<?php
//include('../header.php');
//
// Produce a calendar for a selected year.
//
// This will print the months in 3 rows of 4,
// with the days shown vertically (Monday to Sunday),
// and the weeks shown horizontally.

?>
<html>
<head>
<title>Year-to-a-Page Calendar</title>
<link rel="stylesheet" type="text/css" href="../school.css" />

<style type="text/css">
    <!--
        .month { text-align: center; font-weight: bold; font-family:Arial, Helvetica, sans-serif;color:#00FF00; }
		.monthname{ color:#669900;}
        .dayname { font-weight: bold; font-family:Century Gothic;color: #006600; }
        .SAT { color: red; }
        .SUN { color: red; }
    -->
    </style>
</head>
<body>
<div >
  <p> <font color="#333333"  size="+2" face="Century Gothic">Year-to-a-Page Calendar</font></p>
  <br/>
  <?php
if (isset($_GET['year'])) {
    $year = $_GET['year'];
} else {
    $year = '';
} // if
?>
  <div>
    <form action="" method="GET">
      <p >Enter Year:
        <input type="text" name="year" size="4" value="<?php echo $year ?>"  />
        <input type="submit" value="GO" />
      </p>
      <?php

// validate year
if (isset($_GET['year'])) {
    $valid = TRUE;
    if (!ereg('^[[:digit:]]+$', $year)) {
        echo "Year must be an integer";
        $valid = FALSE;
    } // if
    if ($year < 1970) {
        echo "Year cannot be less than 1970";
        $valid = FALSE;
    } // if
    if ($year > 2037) {
        echo "Year cannot be greater than 2037";
        $valid = FALSE;
    } // if
} // if
?>
    </form>
  </div>
  <?php
if (isset($_GET['year']) and ($valid)) {
    // start at 1st day of 1st month in this year
    $dd = 1;
    $mm = 1;
    $ccyy = $year;
    // convert components into date format
    $date = strtotime("$ccyy-$mm-$dd");
    // create array of date information
    $today = getdate($date);
    // build array of dates until the year changes
    $date_array = array();
    do {
        build_array($ccyy, $mm, $dd);
    } while($ccyy == $year);

    // transfer contents of $date-array into an HTML table
    print_array($date_array);
} // if
?>
</div>
</body>
</html>
<?php
function build_array(&$ccyy, &$mm, &$dd)
// build an array containing every date for the selected year
{
global $date;
global $today;
global $date_array;
static $month_no;
static $week_no;

// at change of month reset to week 1 of 6
if ($mm > $month_no) {
    $month_no = $mm;
    $week_no  = 1;
} // if

$dow = $today['wday'];  // get day of week (0 = Sunday, 6 = Saturday)
if ($dow == 0) {
    $dow = 7;                // convert Sunday to day 7
} // if

// add to array
$date_array[$month_no][$week_no][$dow] = $dd;

// after day 7 increment to next week
if ($dow == 7) {
    $week_no = $week_no + 1;
} // if

// increment date to next day
$date = strtotime("+1 day", $date);

// create array of date information
$today = getdate($date);

// extract ccyy, mm, dd
$ccyy = $today['year'];
$mm   = $today['mon'];
$dd   = $today['mday'];

return;

} // build_array

function print_array($date_array) {

// set of array for day-of-week
$day_names = array(1 => 'MON','TUE','WED','THU','FRI','SAT','SUN');
// set up array of month names
$month_names = array(1 => 'J A N U A R Y',
                          'F E B R U A R Y',
                          'M A R C H',
                          'A P R I L',
                          'M A Y',
                          'J U N E',
                          'J U L Y',
                          'A U G U S T',
                          'S E P T E M B E R',
                          'O C T O B E R',
                          'N O V E M B E R',
                          'D E C E M B E R');

echo "<table style=\"border:3px double grey; margin:0px; \">\n";
echo '<colgroup width="20">';
echo '<colgroup span="5" width="20">';
echo '<colgroup width="20">';
echo '<colgroup span="5" width="20">';
echo '<colgroup width="20">';
echo '<colgroup span="5" width="20">';
echo '<colgroup width="20">';
echo "<colgroup span='5' width='20'>\n";

// print the array in 3 rows with 4 months in each row
for ($row = 1; $row <= 3; $row++) {
   // identify the starting month in current row
   $first = set_start_month($row);
   // process one row at a time (the 1st line contains the month names)
   echo "<tr>\n";

   for ($m = $first; $m <= $first+3; $m++) {
      echo "<td></td><td class='month' colspan='6' style='color:#003366;'>" .$month_names[$m] ."</td>\n";
   } // for
   echo "</tr>\n";
    
   // output a line for each of the 7 days of the week
   for ($dow = 1; $dow <= 7; $dow++) {
    
      echo "<tr class='$day_names[$dow]' >\n";
	 
      // step through each of the 4 months in this row
      for ($m = $first; $m <= $first+3; $m++) {
         // output the details for 4 consecutive months
         // 1st cell identifies the day of week (first month of the 4)
         if ($m == $first) {
		   
            echo "<td class='dayname' style='padding-left:30px;padding-right:0px;'>" .$day_names[$dow] ."</td>";
         } else {
            echo "<td></td>"; // not first month, so cell is empty
         } // if
         // the next 6 cells are for the dates that fall on that day
         for ($week = 1; $week <= 6; $week++) {
            if (isset($date_array[$m][$week][$dow])) {
               echo "<td>" .$date_array[$m][$week][$dow] ."</td>";
            } else {
               echo "<td>&nbsp;</td>";
            } // if
         } // for
      } // for
      echo "\n</tr>\n";
   } // for
   // output a blank line at the end of each row of months
   echo "<tr><td colspan='28'>&nbsp;</td></tr>\n";
} // for

echo "</table>\n";

return;

} // print_array

function set_start_month($row) {
// identify the first month in each of the three rows
    if ($row == 1) {
        $first = 1;
    } elseif ($row == 2) {
        $first = 5;
    } else {
        $first = 9;
    } // if
    return $first;

} // set_start_month
?>
