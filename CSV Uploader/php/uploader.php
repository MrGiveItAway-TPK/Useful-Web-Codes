<?php
header ('Content-Type: text/html; charset=UTF-8'); 
date_default_timezone_set('Asia/Amman');
require_once ('conn.php');

$Backup_Date_Time=date("Y-m-d h:i:s");
$Upload_Session_Date=date("Y-m-d");
$Upload_Session_Time=date("h:i:s");

$Upload_Session=date("Y-m-d h:i:s");
$Upload_Session = trim(str_replace("-","",$Upload_Session));
$Upload_Session = trim(str_replace(":","",$Upload_Session));
$Upload_Session = trim(str_replace(" ","",$Upload_Session));

$source_file = $_FILES['file']['tmp_name']; 
$name = $_FILES['file']['name'];

$mimes = array('application/vnd.ms-excel','text/csv','text/tsv');

if(in_array($_FILES['file']['type'],$mimes)){

$required_headers = ['ID Number','Name'];

$f = fopen($source_file, 'r');
$firstLine = fgets($f);
fclose($f);  

$found_file_headers = str_getcsv(trim($firstLine), ',', '"');

if ($found_file_headers !== $required_headers) {
	
	header("Location: http://localhost/CSV Uploader/index.php?&error=2#");
    die();
}
else {

if (($handle = fopen($source_file, "r")) !== FALSE){
	
	$sql_History = "INSERT INTO data_history 
	(ID_Number,Name,Upload_Session,Upload_Session_Date,Upload_Session_Time,Backup_Date_Time) 
	SELECT ID_Number,Name,Upload_Session,Upload_Session_Date,Upload_Session_Time,'".$Backup_Date_Time."' FROM data";
	$stmt_History = $conn -> query($sql_History);
	
	$sql_Filter = "Truncate Table data";
	$stmt_Filter = $conn -> query($sql_Filter);
	
	$count = 0;
	while (($row = fgetcsv($handle, 1000, ",")) !== FALSE){
		$count++;
		if ($count > 1)
		{	
			$ID_Number = trim(str_replace("'","''",$row[0]));
			$Name = trim(str_replace("'","''",$row[1]));
 
			$sql = "INSERT INTO data (ID_Number,Name,Upload_Session,Upload_Session_Date,Upload_Session_Time) 
					VALUES ('".$ID_Number."','".$Name."','".$Upload_Session."','".$Upload_Session_Date."','".$Upload_Session_Time."')";
			$stmt = $conn -> query($sql);
		}
	}
 
}

	$target_dirU = "../Files_Uploaded/";
	$target_fileU = $target_dirU ."(".$name.")"."(".$Upload_Session.")"."_Data_Uploaded_On_". date('Y-m-d') . "_(". date('H-i-s'). ")". ".csv";
	move_uploaded_file($source_file, $target_fileU);
	
	header("Location: http://localhost/CSV Uploader/index.php?&success=1");
}
}
else {
	header("Location: http://localhost/CSV Uploader/index.php?&error=1#");
}
?>