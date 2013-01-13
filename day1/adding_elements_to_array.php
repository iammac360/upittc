<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php 
	$soup = array("Monday" => "Sinigang",
		"Tuesday" => "Nilaga",
		"Wednesday" => "Tinola");

	$howMany = count($soup);
	echo "The array contains $howMany elements. <br />";
	$soup["Thursday"] = "Chicken Noodle Soup";
	$soup["Friday"] = "Cream of MUshroom Soup";
	$soup["Saturday"] = "Cream of Asapragus";
	$howManyNow = count($soup);
	echo "The array now contains $howManyNow elements. <br />"
	?>
</body>
</html>