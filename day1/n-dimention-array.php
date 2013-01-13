<?php

$users = Array(
	Array("name"=>"Eden", "address"=>"Sucat", "age"=>"20"),
	Array("name"=>"Test", "address"=>"Earth", "age"=>"100"),
	Array("name"=>"Bugoy", "address"=>"dito lng sa bahay", "age"=>"123")
	);

echo '<pre>';
print_r($users);
$index = 1;


echo '<h3> Number of '.count($users).'</h3>';
foreach($users as $user)
{
	extract($user);
	echo '<h3>User #'. $index . '</h3>';
	echo '<p>';
	echo 'name: '.$name . '<br />';
	echo 'address: '.$address.'<br />';
	echo 'age: '.$age.'<br />';
	echo '</p>';
	$index ++;
}
echo '</pre>';