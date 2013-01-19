<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php 
	$numbers = array(100,200, 300, 400, 500, 600);?>
	<pre><?php print_r($numbers); ?></pre>
	<?php
	$last = array_push($numbers, 100);
	echo "first:" . $last ."<br />";
	?>
	<pre><?php print_r($numbers); ?></pre>
</body>
</html>