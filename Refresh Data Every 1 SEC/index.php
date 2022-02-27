
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

<input type="date" id='from' value="<?php echo date('Y-m-d');?>">
<input type="date" id='to' value="<?php echo date('Y-m-d');?>">
<div id="data_div"></div>

<script>
function B_Timer() {t = setInterval(function() {Show_Data();}, 1000);}
B_Timer();

function E_Timer() {clearInterval(t);}
</script>

<button onclick="E_Timer()">End Timer</button>