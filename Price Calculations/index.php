<style>
table {
	width:100%;
	border-collapse:collapse;
	text-align:center;
}
td, tr {
	border:1px solid black;
}
input {
	width: -webkit-fill-available;
	border: none;
}
</style>
<table>
<tr>
<td>#</td>
<td>Quantity</td>
<td>Price</td>
<td>Discount %</td>
<td>Discount Amount</td>
<td>Tax %</td>
<td>Tax Amount</td>
<td>Line Total</td>
</tr>
<script>
function GET_Sub_Total() {
var Sub_Total=0;
var Total=0;
var Discount_Total=0;
var Tax_Total=0;
var Quantity = document.querySelectorAll("input[id='Quantity[]'");
var Unit_Price = document.querySelectorAll("input[id='Unit_Price[]'");
var Unit_Tax = document.querySelectorAll("input[id='Unit_Tax[]'");
var Unit_Discount = document.querySelectorAll("input[id='Unit_Discount[]'");
var Unit_Line_Total = document.querySelectorAll("input[id='Unit_Line_Total[]'");

var Unit_Tax_Value = document.querySelectorAll("input[id='Unit_Tax_Value[]'");
var Unit_Discount_Value = document.querySelectorAll("input[id='Unit_Discount_Value[]'");


for (var i = 0; i < Unit_Price.length; i++)
{
if(Unit_Price[i].value*Quantity[i].value!=0)
{
Sub_Total+=Unit_Price[i].value*Quantity[i].value;

var U_Total=Unit_Price[i].value*Quantity[i].value;
var U_Total_Discount=U_Total-(U_Total*Unit_Discount[i].value/100);
var U_Total_Tax=U_Total_Discount+(U_Total_Discount*Unit_Tax[i].value/100);
var U_Total_2=U_Total_Tax;

Unit_Line_Total[i].value=U_Total.toFixed(3).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

Unit_Discount_Value[i].value=(U_Total*Unit_Discount[i].value/100).toFixed(3).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
Unit_Tax_Value[i].value=(U_Total_Discount*Unit_Tax[i].value/100).toFixed(3).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

Total+=U_Total_2;
Discount_Total+=U_Total*Unit_Discount[i].value/100;
Tax_Total+=U_Total_Discount*Unit_Tax[i].value/100;
}
}
document.getElementById('Sub_Total').value=Sub_Total.toFixed(3).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById('Total').value=Total.toFixed(3).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById('Discount_Total').value=Discount_Total.toFixed(3).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById('Tax_Total').value=Tax_Total.toFixed(3).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
</script>
<script>
function checkfilestatus(Item_ROW_ID_JS) {
if(document.getElementById("Offer_Attachment["+Item_ROW_ID_JS+"]").value != "") {
document.getElementById("Offer_Attachment["+Item_ROW_ID_JS+"]").style.display="none";
document.getElementById("OkLabel["+Item_ROW_ID_JS+"]").style.display="block";
}
else {
document.getElementById("Offer_Attachment["+Item_ROW_ID_JS+"]").style.display="block";
document.getElementById("OkLabel["+Item_ROW_ID_JS+"]").style.display="none";
}
}

function ClearLabelClick(Item_ROW_ID_JS) {
document.getElementById("Offer_Attachment["+Item_ROW_ID_JS+"]").style.display="block";
document.getElementById("OkLabel["+Item_ROW_ID_JS+"]").style.display="none";
document.getElementById("Offer_Attachment["+Item_ROW_ID_JS+"]").value = ""
}
</script>
<?php
$Item_ROW_ID=1;
$x=0;
while($x<5)
{
echo "<td>".$Item_ROW_ID."</td>";
echo "<td><input onkeyup='GET_Sub_Total();' type='number' id='Quantity[]'></td>";
echo "<td><input type='number' step='any' min='0' id='Unit_Price[]' onkeyup='GET_Sub_Total();' name='Unit_Price[".$Item_ROW_ID."]' required></td>";
echo "<td><input type='number' step='any' min='0' onkeyup='GET_Sub_Total();' id='Unit_Discount[]' name='Unit_Discount[".$Item_ROW_ID."]' required></td></td>";
echo "<td><input type='text' id='Unit_Discount_Value[]' name='Unit_Discount_Value[".$Item_ROW_ID."]' required readonly></td>";
echo "<td><input type='number' min='0' onkeyup='GET_Sub_Total();' oninput='this.value=(parseInt(this.value))' id='Unit_Tax[]' name='Unit_Tax[".$Item_ROW_ID."]' required></td>";
echo "<td><input type='text' id='Unit_Tax_Value[]' name='Unit_Tax_Value[".$Item_ROW_ID."]' required readonly></td>";
echo "<td><input type='text' id='Unit_Line_Total[]' name='Unit_Line_Total[".$Item_ROW_ID."]' required readonly></td></tr>";
$Item_ROW_ID++;
$x++;
}
?>
</table>
<br>
<table style='width:25%;'>
<tr><td>Sub Total:</td><td><input type="text" id="Sub_Total" name="Sub_Total" readonly></td></tr>
<tr><td>Total Discount:</td><td><input type="text" id="Discount_Total" name="Discount_Total" readonly></td></tr>
<?php
echo '<tbody id="ChangableTAX_TR"></tbody>';
?>
<tr><td>Total:</td></td><td><input type="text" id="Total" name="Total" readonly></td></tr>
<script>
function CalculateTaxVarients() {
document.getElementById('ChangableTAX_TR').innerHTML='';

var Unit_Tax_Calc = document.querySelectorAll("input[id='Unit_Tax[]'");
var Unit_Tax_Value_Calc = document.querySelectorAll("input[id='Unit_Tax_Value[]'");

const TaxSum = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

for (var X = 0; X < Unit_Tax_Calc.length; X++)
{
for (var i = 0; i <100; i++)
{
if(Unit_Tax_Calc[X].value==i)
{
TaxSum[i]+=+Unit_Tax_Value_Calc[X].value;
}
}
}

for (var X = 0; X < TaxSum.length; X++)
{
if(TaxSum[X]!=0)
document.getElementById('ChangableTAX_TR').innerHTML+='<tr><td>Total Tax '+X+'%</td><td><input type="text" readonly value="'+TaxSum[X]+'"></td></tr>';
}
}
var intervalId = window.setInterval(function(){
CalculateTaxVarients();
}, 100);
</script>
</table>