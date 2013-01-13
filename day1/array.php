<?php 

$sum_arr = array();
$sum = 0;

for($i = 1; $i <= 10; $i++)
{
	$sum += $i;
	$sum_arr[$i] = $sum;
}
echo '<pre>';
print_r($sum_arr);
echo '</pre>';