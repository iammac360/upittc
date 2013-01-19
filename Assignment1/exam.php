<?php
	session_start();

	if(!isset($_SESSION['is_registered']))
	{
		header("location:index.php");
		die();
	}
	$jsonData = file_get_contents("QA.json");
	$exam = json_decode($jsonData);
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Assignment 1 - UPITTC Online Exam</title>
	<link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'].'/assignment1/assets/css/style.css'; ?>">
	<link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'].'/assignment1/assets/css/global.css'; ?>">

	<script src="http://<?php echo $_SERVER['HTTP_HOST'].'/assignment1/assets/js/libs/modernizr-2.6.1-respond-1.1.0.min.js'; ?>"></script>

	<style type="text/css">
		input[type=text], input[type=radio], input[type=checkbox] {margin-bottom: 0;}
		input[type=radio], input[type=checkbox] {margin-top: 0;}
		ul.unstyled {margin-left: 30px;}

	</style>
</head>
<body>
	<div class="container">
		<h2>Hi <?php echo $_SESSION['registered_name']; ?></h2>
		<form action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assignment1/ProcessExam.php" method="post">

			<div id="multiple">
				<h3>Part 1: Multiple Choice:</h3>
				<?php for($i = 0; $i < count($exam->multipleChoice); $i++): ?>
				<p><?php echo ($i + 1).".) ".$exam->multipleChoice[$i]->question; ?></p>
				<ul class="unstyled">
					<?php foreach($exam->multipleChoice[$i]->choices as $key => $value): ?>
					<li>
						<input type="radio" name="multi<?php echo ($i + 1); ?>" value="<?php echo $key; ?>">
						<span><?php echo $key.".) ".$value; ?></span>
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endfor; ?>
			</div>
			<hr>

			<div id="fillin">
				<h3>Part 2: Fill in the blanks:</h3>
				<?php for($i = 0; $i < count($exam->fillInTheBlanks); $i++): ?>
				<p><?php echo ($i + 1).".) ".$exam->fillInTheBlanks[$i]->question; ?></p>
				<p>answer: <input type="text" name="fillin<?php echo ($i + 1); ?>"></p>
				<?php endfor; ?>
			</div>
			<hr>

			<div id="multiguess">
				<h3>Part 3: Multiple Guess:</h3>
				<?php for($i = 0; $i < count($exam->fillInTheBlanks); $i++): ?>
				<p><?php echo ($i + 1).".) ".$exam->multipleGuess[$i]->question; ?></p>
				<ul class="unstyled">
					<?php foreach($exam->multipleGuess[$i]->choices as $key => $value): ?>
					<li>
						<input type="checkbox" name="multiGuess<?php echo ($i + 1).'[]'; ?>" value="<?php echo $key; ?>">
						<span><?php echo $key.".) ".$value; ?></span>
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endfor; ?>
			</div>
			<br>
			<br>
			<input class="btn btn-primary btn-large" type="submit">

		</form>
	</div>
</body>
</html>