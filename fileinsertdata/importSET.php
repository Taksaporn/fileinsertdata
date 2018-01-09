
<?php
	include 'databaseConnect.php';
	if(isset($_POST["Import"]))
	{
		echo $filename=$_FILES["file"]["tmp_name"];
		if($_FILES["file"]["size"] > 0)
		{		

			$file = fopen($filename, "r");
			while (($emapData = fgetcsv($file,10000, ",")) !== FALSE)
			{
				$sql = "INSERT INTO marketindex (MonthYear, SETIndex, SETFifty, SETHundred, SETsSET, SEThd, SETmai) 
				values('$emapData[0]', '$emapData[1]', '$emapData[2]', '$emapData[3]', '$emapData[4]', '$emapData[5]', '$emapData[6]')";
				$conn->query($sql);				
			}	
			fclose($file);
			echo "SUCCESS";
			mysqli_close($conn);
		}	
	} 
?> 