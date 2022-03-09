
<script>
function getXMLHTTP() {
var xmlhttp=false;
try{
xmlhttp=new XMLHttpRequest();
}
catch(e) {
try{
xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
}
catch(e){
try{
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}
catch(e1){
xmlhttp=false;
}
}
}
return xmlhttp;
}
function Show_Data() {

var from=document.getElementById('from').value;
var to=document.getElementById('to').value;

if (window.XMLHttpRequest) {
xmlhttp=new XMLHttpRequest();
} else {
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function() {
if (xmlhttp.readyState==4 && xmlhttp.status==200) {
document.getElementById("data_div").innerHTML=xmlhttp.response;
}
}
xmlhttp.open("GET","data.php?from="+from+"&to="+to,true);
xmlhttp.send();
}
</script>

<label>From:</label> <input type="date" id='from' value="<?php echo date('Y-m-d');?>">
<label>To:</label> <input type="date" id='to' value="<?php echo date('Y-m-d');?>">
<br><br>
<div id="data_div"></div>

<script>
function B_Timer() {t = setInterval(function() {Show_Data();}, 1000);}
Show_Data();
B_Timer();

function E_Timer() {
	clearInterval(t);
	document.getElementById('Start_Data_Refresh').style.display='block';
	document.getElementById('Stop_Data_Refresh').style.display='none';
	}

function Start() {
	document.getElementById('Start_Data_Refresh').style.display='none';
	document.getElementById('Stop_Data_Refresh').style.display='block';
	Show_Data();
	B_Timer();
}
</script>

<br>
<button id='Stop_Data_Refresh' style='display:block;' onclick="E_Timer()">Stop Data Refresh</button>
<button id='Start_Data_Refresh' style='display:none;' onclick="Start();">Start Data Refresh</button>