<?php

$START = strtotime('2021-01-01 10:48:30');
$END = strtotime('2022-12-31 12:59:59');

$diff = abs($END - $START);

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));

$Diffrence = $years."y ".$months."m ".$days."d ".$hours."h ".$minutes."m ".$seconds."s";

echo "From: ".date('Y-m-d H:i:s',$START)."<br>To: ".date('Y-m-d H:i:s',$END)."<br><br>Diffrence: ".$Diffrence."";

?>