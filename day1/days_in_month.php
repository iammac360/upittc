<?php // save this as days_in_month.php

$months = Array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November","December");

// $count = 1;
// foreach($months as $month)
// {
// 	print "$month has " .
// 	cal_days_in_month(CAL_GREGORIAN, $count, date("Y")). 
// 	" days<br />";

// 	$count++; 
// }

for($i = 0; $i < count($months); $i++)
{
	echo $months[$i] . "<br/>";
}
