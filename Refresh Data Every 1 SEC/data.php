<?php
$from=$_GET['from'];
$to=$_GET['to'];
//here below do whatever you wanna do with the parameters youve sent or if you didnt send anythin just do below what you want to return to the view
echo 'Example Data : '.$from.' '.$to;
echo'<br>';
echo date('Y-m-d H:i:s');
?>