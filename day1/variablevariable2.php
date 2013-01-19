<?php
$room208 = 'Shiela';
$room209 = 'Peter';
$room304 = 'Malou';
$room305 = 'Harry';
$room204 = 'Luchie';

$teachers = array('room204', 'room209', 'room305');
foreach($teachers as $teacher)
	echo $$teacher."<br />";
