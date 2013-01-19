<?php
session_start();

if(!isset($_SESSION['is_registered']))
{
	header("location:index.php");
	die();
}

require_once 'ProcessExamClass.php';

$count = 0;
$score = 0;
$multiGuessScore = 0;

$exam = new ProcessExam();

foreach($_POST as $key => $value)
{
	for($i = 1; $i <= 4; $i++)
	{
		if($key == 'multi'.$i)
		{
			$score += $exam->checkAnswers($value, $exam->getAnswers(1, $i)) ? 2 : 0;
		}
		if($key == 'fillin'.$i)
		{
			$score += $exam->checkAnswers($value, $exam->getAnswers(2, $i)) ? 2 : 0;
		}
		if($key == 'multiGuess'.$i)
		{
			foreach($value as $answer)
			{
				for($j = 0; $j < count($exam->getAnswers(3, $i)); $j++) $score += ($exam->getAnswers(3, $i)[$j] === $answer) ? 2 : 0;
				
			}
			if(count($exam->getAnswers(3, $i)) == count($value))
			{
				$result = array_intersect($exam->getAnswers(3, $i), $value);
				$count += count($exam->getAnswers(3, $i)) - count($result);
			}
			elseif(count($exam->getAnswers(3, $i)) < count($value))
			{
				$result = array_intersect($exam->getAnswers(3, $i), $value);
				$count += count($value) - count($result);
			}
			elseif(count($exam->getAnswers(3, $i)) > count($value))
			{
				$result = array_intersect($exam->getAnswers(3, $i), $value);
				$count += count($exam->getAnswers(3, $i)) - count($result);
			}
		}
	}
}
$remarks = '';
$multiGuessScore = $multiGuessScore - (2 * $count);
$score += $multiGuessScore;
$percentage = ($score / 36) * 100;
if($percentage < 50)
{
	$remarks = 'failed';
}
else
{
	$remarks = 'passed';
}
// echo $count.'<br/>';
// echo $multiGuessScore.'<br/>';
// echo $score.'<br/>';
// echo $percentage.'<br />';
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
		<h1>
			<?php if($remarks == 'passed'): ?>
			Congratulations <?php echo $_SESSION['registered_name']; ?>, <br />
			You PASSED THE EXAM! Your Exam Score is <?php echo $score; ?>/36;
			<?php else : ?>
			Im sorry to inform you <?php echo $_SESSION['registered_name']; ?> that you failed the exam. <br />
			Better luck next time. Your Exam Score is <?php echo $score; ?>/36;
			<?php endif; ?>
		</h1>
	</div>
</body>
</html>

<?php unset($_SESSION['is_registered']); ?>