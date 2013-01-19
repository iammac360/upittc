<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if(strlen($_POST['name']) > 0 && !empty($_POST['name']))
	{
		$_SESSION['is_registered'] = 1;
		$_SESSION['registered_name'] = $_POST['name'];
	}
}

if(!isset($_SESSION['is_registered']))
{
	header("location:index.php");
}
else
{
	header("location:exam.php");
}