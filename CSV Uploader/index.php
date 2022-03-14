<link rel="stylesheet" href="css/style.css">

<div class="center">
	<div class="center_div_elements">
		<h2>Munes Bani Fawaz</h2>
		<h2>Data Uploader</h2>
		<hr>
		<form action="php/uploader.php" enctype="multipart/form-data" onsubmit="submit.disabled = true; return true;" method="post">
			<table class="headers_table">
				<tr>
					<td colspan=2>Headers</td>
				</tr>
				<tr>
					<td>ID_Number</td><td>Name</td>
				</tr>
			</table>
		<hr>
		<label>Headers must match !</label><br>
		<label>CSV files only allowed !</label>
		<hr>
		<input name="file" type="file" required accept=".csv">
		<input name="submit" id="submit" type="submit" value="Upload File">
		</form>
		
		<?php
			if(isset($_GET['success'])){
			$success=$_GET['success'];
			if($success==1){
			echo"<hr><strong style='color:green;'>The file has been uploaded.</strong>";
			}
			}
			if(isset($_GET['error'])){
			$error=$_GET['error'];
			if($error ==1){
			echo"<hr><strong style='color:red;'>Error, Only CSV files allowed</strong>";
			}
			else if($error ==2){
			echo"<hr><strong style='color:red;'>Error, Headers do not match</strong>";
			}
			}
		?>
	</div>
</div>