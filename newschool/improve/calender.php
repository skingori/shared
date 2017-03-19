

<?php

 
class Calendar
{
	var $events;

	function Calendar($date)
	{
		if(empty($date)) $date = time();
		define('NUM_OF_DAYS', date('t',$date));
		define('CURRENT_DAY', date('j',$date));
		define('CURRENT_MONTH_A', date('F',$date));
		define('CURRENT_MONTH_N', date('n',$date));
		define('CURRENT_YEAR', date('Y',$date));
		define('START_DAY', (int) date('N', mktime(0,0,0,CURRENT_MONTH_N,1, CURRENT_YEAR)) - 1);
		define('COLUMNS', 7);
		define('PREV_MONTH', $this->prev_month());
		define('NEXT_MONTH', $this->next_month());
		$this->events = array();
	}

	function prev_month()
	{
		return mktime(0,0,0,
				(CURRENT_MONTH_N == 1 ? 12 : CURRENT_MONTH_N - 1),
				(checkdate((CURRENT_MONTH_N == 1 ? 12 : CURRENT_MONTH_N - 1), CURRENT_DAY, (CURRENT_MONTH_N == 1 ? CURRENT_YEAR - 1 : CURRENT_YEAR)) ? CURRENT_DAY : 1),
				(CURRENT_MONTH_N == 1 ? CURRENT_YEAR - 1 : CURRENT_YEAR));
	}
	
	function next_month()
	{
		return mktime(0,0,0,
				(CURRENT_MONTH_N == 12 ? 1 : CURRENT_MONTH_N + 1),
				(checkdate((CURRENT_MONTH_N == 12 ? 1 : CURRENT_MONTH_N + 1) , CURRENT_DAY ,(CURRENT_MONTH_N == 12 ? CURRENT_YEAR + 1 : CURRENT_YEAR)) ? CURRENT_DAY : 1),
				(CURRENT_MONTH_N == 12 ? CURRENT_YEAR + 1 : CURRENT_YEAR));
	}
	
	function getEvent($timestamp)
	{
		$event = NULL;
		if(array_key_exists($timestamp, $this->events))
			$event = $this->events[$timestamp];
		return $event;
	}
	
	function addEvent($event, $day = CURRENT_DAY, $month = CURRENT_MONTH_N, $year = CURRENT_YEAR)
	{
		$timestamp = mktime(0, 0, 0, $month, $day, $year);
		if(array_key_exists($timestamp, $this->events))
			array_push($this->events[$timestamp], $event);
		else
			$this->events[$timestamp] = array($event);
	}
	
	function makeEvents()
	{
		if($events = $this->getEvent(mktime(0, 0, 0, CURRENT_MONTH_N, CURRENT_DAY, CURRENT_YEAR)))
			foreach($events as $event) echo $event.'<br />';
	}
	
	function makeCalendar()
	{
		echo '<center><br/><br/>Switching calendar<table style=" background:white;width:700px;height:300px; " >
		<tr style=" background:greenyellow; color:red;">';
		echo '<td width="40"><a href="?date='.PREV_MONTH.'">&lt;&lt;</a></td>';
		echo '<td colspan="5" style="text-align:center; text-transform:uppercase;">'.CURRENT_MONTH_A .' - '. CURRENT_YEAR.'</td>';
		echo '<td width="50"><a href="?date='.NEXT_MONTH.'">&gt;&gt;</a></td>';
		echo '</tr><tr style=" background:grey; ">';
		echo '<td width="50">MON</td>';
		echo '<td width="50">TUE</td>';
		echo '<td width="50">WED</td>';
		echo '<td width="50">THU</td>';
		echo '<td width="50">FRI</td>';
		echo '<td width="50">SAT</td>';
		echo '<td width="50">SUN</td>';
		echo '</tr><tr>';
		
		echo str_repeat('<td>&nbsp;</td>', START_DAY);
		
		$rows = 1; 
		
		for($i = 1; $i <= NUM_OF_DAYS; $i++)
		{
			if($i == CURRENT_DAY)
				echo '<td>'.$i.'</td>';
			else if($event = $this->getEvent(mktime(0, 0, 0, CURRENT_MONTH_N, $i, CURRENT_YEAR)))
				echo '<td ><a href="?date='.mktime(0,0,0,CURRENT_MONTH_N,$i,CURRENT_YEAR).'">'.$i.'</a></td>';
			else
				echo '<td><a href="?date='.mktime(0 ,0 ,0, CURRENT_MONTH_N, $i, CURRENT_YEAR).'">'.$i.'</a></td>';
					
			if((($i + START_DAY) % COLUMNS) == 0 && $i != NUM_OF_DAYS)
			{
				echo '</tr><tr>';
				$rows++;
			}
		}
		echo str_repeat('<td>&nbsp;</td>', (COLUMNS * $rows) - (NUM_OF_DAYS + START_DAY)).'</tr></table>';
	}
}

$cal = new Calendar($_GET['date']);
$cal->addEvent('Ok');
$cal->addEvent('event 2', 10);
$cal->addEvent('event 3', 10, 10);
$cal->addEvent('event 4', 10, 10, 10);
$cal->makeCalendar();
$cal->makeEvents();
echo '</center>';

?>
