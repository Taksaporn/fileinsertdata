
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
				$string=(string)$emapData[0];
				list($month, $day, $year) = explode("/", $string);
				$date =$year.'-'.$month.'-'.$day;
				//echo $year.'-'.$month.'-'.$day;
				//$date =explode("/", $string);
				//$day=$date[0];
				//$month=$date[1];
				//$year=$date[2];
				//echo $year.'-'.$month.'-'.$day;
				 // piece2
				//It wiil insert a row to our listofcompanies table from our csv file`
				$sql = "INSERT INTO setindexmarket (DateIndex, SETindex, SETFifty, SETHundred, sSET, SETHD, SETmai) VALUES ('$date', '$emapData[1]', '$emapData[2]', '$emapData[3]', '$emapData[4]', '$emapData[5]', '$emapData[6]')";

				//$date = 
				$conn->query($sql);				
				
			}
			fclose($file);
			echo "$sql";
			mysqli_close($conn); 
		}
	} 
?> 