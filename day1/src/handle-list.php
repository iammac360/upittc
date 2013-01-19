<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>String to Array</title>
</head>
<body>
	<?php
		$List = $_POST["list"];
		$arr = explode("", $List);
	?>

	<pre><?php var_dump($arr); ?></pre>
</body>
</html>