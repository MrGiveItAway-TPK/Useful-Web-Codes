<?php
$from=strtotime($_GET['from']);
$to=strtotime($_GET['to']);
//here below do whatever you wanna do with the parameters youve sent or if you didnt send anythin just do below what you want to return to the view
echo 'Example Data Sent From Date Selectors Above:<br><br>From: '.date("m-d-Y",$from).'<br>To: '.date("m-d-Y",$to).'<br>';
echo '<br>Current Date: '.date('Y-m-d').'<br>Current Time: '.date('H:i:s');
?>