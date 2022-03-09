<?php
$conn = new mysqli("localhost","root","","otp");
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}

$User_ID=$_GET['User_ID'];
$User_Name=$_GET['User_Name'];
$OTP_Date=date('Y-m-d');
$OTP_Time=date('H:i:s');

$d=date('y');
$m=date('m');
$t=date('is');
$r=rand($d.$m.$t, $User_ID);
$rr=md5($r);

$OTP=NULL;

$sql_0 = "SELECT * FROM otp WHERE User_ID='$User_ID' AND OTP_Date='$OTP_Date'";
$stmt_0 = mysqli_query($conn,$sql_0) or die( mysqli_error($conn));
while($row_0 = mysqli_fetch_array($stmt_0))
{
$OTP=$row_0['OTP'];
}
if($OTP==" " OR $OTP=="" OR $OTP==NULL)
{
$sql = "insert into otp 
  (User_ID,User_Name,OTP,OTP_Date,OTP_Time)
  VALUES
 (N'$User_ID',N'$User_Name',N'$rr','$OTP_Date','$OTP_Time')";

$stmt = mysqli_query($conn,$sql) or die( mysqli_error($conn));
}
else
{
$sql = "UPDATE otp SET OTP=N'$rr',OTP_Date='$OTP_Date' WHERE User_ID='$User_ID'";

$stmt = mysqli_query($conn,$sql) or die( mysqli_error($conn));
}

echo "Sent Successfully ! ".$r;
?>