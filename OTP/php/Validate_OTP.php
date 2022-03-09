<?php
$conn = new mysqli("localhost","root","","otp");
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}

$User_ID=$_GET['User_ID'];
$OTP=$_GET['OTP'];
$OTP_Date=date('Y-m-d');
$OTP_Time=date('H:i:s');


$sql = "SELECT * FROM otp WHERE User_ID='$User_ID' AND OTP_Date='$OTP_Date'";
$stmt = mysqli_query($conn,$sql) or die( mysqli_error($conn));
while( $row = mysqli_fetch_array($stmt) ) {
$DB_OTP=$row['OTP'];
}

if((md5($OTP))==$DB_OTP)
{
echo "Valid";
}
else
{
echo "Invalid or Expired";
}
?>