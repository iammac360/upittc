<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Assignment 1 - UPITTC Online Exam</title>
	<link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'].'/assignment1/assets/css/style.css'; ?>">
	<link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'].'/assignment1/assets/css/global.css'; ?>">

	<script src="http://<?php echo $_SERVER['HTTP_HOST'].'/assignment1/assets/js/libs/modernizr-2.6.1-respond-1.1.0.min.js'; ?>"></script>

	<style type="text/css">
		input[type=text], input[type=radio], input[type=checkbox] {margin-bottom: 0};
	</style>
</head>
<body>
	<div class="container">
		<form action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assignment1/session.php" method="post">
			<label for="name">Name: </label> <input type="text" name="name" id="name">
			<input type="submit" class="btn btn-primary">
		</form>
	</div>
</body>
</html>