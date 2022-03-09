<?php
$counter=1;
foreach($_POST['Input'] as $key => $value) {
	$Input=$_POST['Input'][$key];
	$TextArea=$_POST['Text_Area'][$key];
	$Select=$_POST['Select'][$key];
	echo 'Array Index : '.$key.' / Post Counter : '.$counter.'<br>Input: '.$Input.'<br>Text Area: '.$TextArea.'<br>Select: '.$Select.'<br><hr>';
	$counter++;
}
?>