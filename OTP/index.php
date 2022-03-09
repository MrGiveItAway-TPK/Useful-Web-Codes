<?php
$User_ID='9819';
$User_Name='Munes Bani Fawaz';
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<script>
function SendOTP() {
document.getElementById('button2').disabled=true;
document.getElementById('button1').disabled=false;
document.getElementById('OTP').value=null;
document.getElementById('OTP_Status_2').innerHTML=null;

var User_ID=document.getElementById('User_ID').value;
var User_Name=document.getElementById('User_Name').value;

if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById('OTP_Status').innerHTML=xmlhttp.responseText;
if(xmlhttp.responseText.includes("Sent Successfully !"))
{
document.getElementById('button2').disabled=false;
document.getElementById('OTP_Status').style.color="green";
}
else
{
document.getElementById('OTP_Status').style.color="red";
}
}
}
xmlhttp.open("GET","php/SEND_OTP.php?User_ID="+User_ID+"&User_Name="+User_Name,true);
xmlhttp.send();

}
function ValidateOTP() {
var OTP=document.getElementById('OTP').value;
var User_ID=document.getElementById('User_ID').value;

if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById('OTP_Status_2').innerHTML=xmlhttp.responseText;
if(xmlhttp.responseText=="Valid")
{
document.getElementById('OTP_Status_2').style.color="green";
document.getElementById('button1').disabled=true;
setTimeout(function(){document.getElementById('C_Modal').click();},1000);
}
else
{
document.getElementById('OTP_Status_2').style.color="red";
}
}
}
xmlhttp.open("GET","php/Validate_OTP.php?OTP="+OTP+"&User_ID="+User_ID,true);
xmlhttp.send();
}

function clearfields() {
	document.getElementById('button2').disabled=false;
	document.getElementById('button1').disabled=false;
	document.getElementById('OTP').value=null;
	document.getElementById('OTP_Status_2').innerHTML=null;
	document.getElementById('OTP_Status').innerHTML=null;
}
</script>
<div class="modal fade" id="OTP_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<strong style="font-size:20px;">OTP</strong>
</div>
<div class="modal-body">
<label>Please enter the code that was sent to <?php echo "(".$User_ID.") ".$User_Name.""; ?></label>
<br>
<input id="User_ID" type="hidden" readonly value="<?php echo $User_ID; ?>">
<input id="User_Name" type="hidden" readonly value="<?php echo $User_Name; ?>">
<input id="OTP" type="text" style="display: inline-flex;" onkeyup="ValidateOTP();"><label style="display: inline-flex;margin-left: 5px;" id="OTP_Status_2"></label>
</div>
<div class="modal-footer">
<button onclick="SendOTP();" type="button" id="button2" class="btn btn-default" style="color:white;background:#5cb85c;height:34px;border:none;border-radius: 5px;font-size:15px;width:130px;float:left;">Send OTP</button><label id="OTP_Status" style="color:red;float: left;margin-top: 7px;margin-left: 5px;">Not Sent</label>
<button onclick="ValidateOTP();" id="button1" type="button" class="btn btn-success" style='color:white;background:#5cb85c;height:34px;margin-right:30px;border:none;border-radius: 5px;font-size:15px;width:120px;float: right;margin-right: 0%;' data-toggle="modal">Validate</button>
<button id="C_Modal" style="display:none;" type="button" data-dismiss="modal"></button>
</div>
</div>
</div>
</div>

<style>
.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>
  <div class="center">
  <button onclick='clearfields();' type="button" class="btn btn-success" data-toggle="modal" data-target="#OTP_Modal" data-backdrop="static" data-keyboard="false" style="width:10vw;height:10vh;">OTP</button>
</div>