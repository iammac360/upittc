<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Array to String</title>
</head>
<body>
	<?php
		$arr = array("Honda", "Toyota", "Nissan", "Mazda");
		$newList = implode(" ", $arr);
		echo 'Your Array';
	?>
	<pre><?php var_dump($arr); ?></pre>
	is now a single long string with each word separated by a space.<br><br>
	Here is your string:<br><?php echo $newList; ?>
</body>
</html>