<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>String to Array</title>
</head>
<body>
	<?php
		extract($_POST);
		$arr = explode(" ", $list);
		echo "Your string <b> {$list}</b> has been converted into an array. Below is the array version of your string: <br />";
	?>

	<pre><?php var_dump($arr); ?></pre>
</body>
</html>