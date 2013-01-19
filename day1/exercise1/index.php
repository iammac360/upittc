<?php
	$showError = false;
	if(!empty($_POST))
	{
		$prodsTotal = array();
		$quartersTotal = array();
		$error = 0;
		if(isset($_POST['salesTotalProd'])) $_POST['salesTotalProd'] = 1;
		if(isset($_POST['salesTotalQuarter']))  $_POST['salesTotalQuarter'] = 1;
		if(isset($_POST['salesTotal'])) $_POST['salesTotal'] = 1;


		/** Validate if the user entered a number. If the user entered a non-numeric, $error increments by 1: */
		foreach($_POST as $key => $value) if(!is_numeric($value)) $error++;

		/** If $error >= 1, It will display an error mesage and the calculation will not be executed: */
		if($error >= 1)
		{
			$showError = true;
		}
		else
		{
			extract($_POST);

			/**
			* If the user clicks the "Calculate Sales Product" button, It will calculate all the sales per product
			* and it will render the Total Sales of the Products:
			*/
			if(isset($salesTotalProd))
			{
				for($i = 1; $i <= 3; $i++) $prodsTotal[$i] = calculateSalesTotal(array(${"p{$i}q1"}, ${"p{$i}q2"}, ${"p{$i}q3"}, ${"p{$i}q4"}));
			}
			/**
			* If the user clicks the "Calculate Sales Quarter" button, It will calculate all the sales per quarter
			* and it will render the Total Sales by Quarter:
			*/
			if(isset($salesTotalQuarter))
			{
				for($i = 1; $i <= 4; $i++) $quartersTotal[$i] = calculateSalesTotal(array(${"p1q{$i}"}, ${"p2q{$i}"}, ${"p3q{$i}"}));
			}
			/**
			* If the user clicks the "Calculate Sales" button, It will calculate all the sales per product & per quarter
			* and it will render both Total Sales by Quarter and Total Sales of Products:
			*/
			if(isset($salesTotal))
			{
				for($i = 1; $i <= 4; $i++) $quartersTotal[$i] = calculateSalesTotal(array(${"p1q{$i}"}, ${"p2q{$i}"}, ${"p3q{$i}"}));
				for($i = 1; $i <= 3; $i++) $prodsTotal[$i] = calculateSalesTotal(array(${"p{$i}q1"}, ${"p{$i}q2"}, ${"p{$i}q3"}, ${"p{$i}q4"}));
			}
		}
		
		/** For Debugging Purposes Only. Uncomment the 3 lines of codes below to see the contents of the array: */
		// echo "<pre>";
		// var_dump($_POST);
		// echo "</pre>";

	}

	/** Calculates the sum of all the elements in the array: */
	function calculateSalesTotal($arr = array(), $total = 0)
	{
		if(count($arr) <= 0) return $total;

		$total += array_shift($arr);
		return calculateSalesTotal($arr, $total);
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Exercise 1- Sales Calculatorl</title>
	<link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'].'/day1/exercise1/resources/css/style.css'; ?>">
	<link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'].'/day1/exercise1/resources/css/global.css'; ?>">

	<script src="http://<?php echo $_SERVER['HTTP_HOST'].'/day1/exercise1/resources/js/libs/modernizr-2.6.1-respond-1.1.0.min.js'; ?>"></script>

	<style type="text/css">
		input[type=text].span1 {width: 70px; }
	</style>
</head>
<body>
	<div class="container">
		<form action="index.php" method="post" id="calc" class="span7">
			<h1>Sales Calculator</h1>
			<table>
				<tr>
					<th><span class="span2">&nbsp</span></th>
					<th><span style="font-weight: bold;">Qtr1</span></th>
					<th><span style="font-weight: bold;">Qtr2</span></th>
					<th><span style="font-weight: bold;">Qtr3</span></th>
					<th><span style="font-weight: bold;">Qtr4</span></th>
					<th><span style="font-weight: bold;">Total</span></th>
				</tr>
				<?php for($i = 1; $i <= 3; $i++) : ?>
				<tr>
					<?php $quarters = array("p{$i}q1", "p{$i}q2", "p{$i}q3", "p{$i}q4"); ?>
					<td><span class="span2">Product<?php echo $i; ?>&nbsp</span></td>
					<?php foreach($quarters as $q) : ?>
					<td><input class="span1" type="text" name="<?php echo $q; ?>" id="<?php echo $q; ?>" value="<?php echo isset(${$q}) ? ${$q} : 0; ?>" /></td>
					<?php endforeach; ?>
					<td><span class="span1" style="font-weight: bold"><?php echo isset($prodsTotal[$i]) ? $prodsTotal[$i] : 0; ?></span></td>
				</tr>
				<?php endfor; ?>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><span class="span2" style="font-weight: bold; padding-top: 20px;">Total Sales&nbsp</span></td>
					<?php for($i = 1; $i <= 4; $i++) : ?>
					<td class="span1" style="border-top: 1px solid #cccccc; padding-top: 20px; font-weight: bold;"><?php echo isset($quartersTotal[$i]) ? $quartersTotal[$i] : 0; ?></td>
					<?php endfor; ?>
					<td><span class="span1" style="padding-top: 20px; font-weight: bold;"><?php echo isset($prodsTotal) ? calculateSalesTotal($prodsTotal) : 0; ?></span></td>
				</tr>
			</table>
			<br><br>
			<?php if($showError) : ?>
			<p class="alert-error alert-block" style="text-align: center; font-size: 12px"> 
				*You have entered an illegal characters on one or more fields. Only Numbers are allowed. 
				<br>Please try again.</p>
			<?php endif; ?>
			<input name="salesTotalProd" class="btn btn-primary btn-block" type="submit" value="Calculate Sales Total Product">
			<input name="salesTotalQuarter" class="btn btn-primary btn-block" type="submit" value="Calculate Sales Total Quarter">
			<input name="salesTotal" class="btn btn-primary btn-block" type="submit" value="Calculate Sales Total">
		</form>
	</div>
</body>
</html>