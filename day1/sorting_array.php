<?php // save this as sorting_arrays.php
	
	$array = array(
		"name" => "edent", 
		"address" => "qc", 
		"position" => "clerk", 
		"bday" => "1980-10-10"
		);

	sort($array);
	// rsort($array);
	// asort($array);
	// arsort($array);
	// ksort($array);
	// krsort($array);

	echo '<pre>';
	print_r($array);
	echo '</pre>';