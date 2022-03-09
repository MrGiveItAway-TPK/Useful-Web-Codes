<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<style>
input[type=text], select, textarea {
width:-webkit-fill-available;
}
textarea,select {
resize:vertical;
height:3vh;
}
table {
width: 50vw;
font-size:14px;
font-weight:bold;
white-space: nowrap;
border-collapse:collapse;
}
table td, th {
text-align: center;
vertical-align: middle;
padding: 8px;
border: 1px solid #ddd;
font-weight:bold;
width:10vw;
}
.RowButton {
font-size: 14px;
color: white;
margin-top: 1vh;
background: blue;
font-weight: bold;
width: 10vw;
height: 5vh;
border:none;
}
.RowButton:hover{
font-size: 14px;
color: white;
margin-top: 1vh;
background: blue;
font-weight: bold;
opacity:0.8;
width: 10vw;
height: 5vh;
border:none;
}
</style>
<form action='data.php' method="POST">
<table id="DataTable">
<tr style="color:white;background:blue;">
<td>#</td>
<td>Input</td>
<td>Text Area</td>
<td>Select</td>
</tr>
</table>
<input type="button" id="AddROW" value="Add Item" class="RowButton">
<input type="button" id="DeleteROW" value="Delete Item" class="RowButton" style='background:red;'>
<input type="submit" value="Submit" class="RowButton" style='background:green;'>
</form>
<script>
var C = 0;

jQuery('#DeleteROW').click(function(event){
if(C>1)
{
var $last = jQuery("#DataTable").find('tr:last');
$last.remove();
C=C-1;
}
});

jQuery('#AddROW').click(function(event){
event.preventDefault();
C++;

//Method maybe useful in some cases
/* var Row =
jQuery('<tr><td>'+C+'</td>'+
'<td><input type="text" name="Input_'+C+'" id="Input_'+C+'"></td>'+
'<td><textarea name="Text_Area_'+C+'" id="Text_Area_'+C+'"></textarea></td>'+
'<td><select name="Select_'+C+'" id="Select_'+C+'">'+
'<?php echo "<option value=\'\'>...</option>"; for($x = 0;$x <= 10;$x++){echo "<option value=\'".$x."\'>".$x."</option>";} ?>'+
'</select></td></tr>'); */

//Preferable Method
var Row =
jQuery('<tr><td>'+C+'</td>'+
'<td><input type="text" name="Input[]" id="Input[]"></td>'+
'<td><textarea name="Text_Area[]" id="Text_Area[]"></textarea></td>'+
'<td><select name="Select[]" id="Select[]">'+
'<?php echo "<option value=\'\'>...</option>"; for($x = 0;$x <= 10;$x++){echo "<option value=\'".$x."\'>".$x."</option>";} ?>'+
'</select></td></tr>');

jQuery('#DataTable').append(Row).html();
});

jQuery('#AddROW').click();
</script>