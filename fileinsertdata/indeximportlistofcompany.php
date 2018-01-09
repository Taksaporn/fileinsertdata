
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
			//$emapData = fgetcsv($file,10000,",");
				//It wiil insert a row to our listofcompanies table from our csv file`
				$sql = "INSERT INTO listofcompanies (Symbol, Company, Market, Industry, Sector, Address, ZipCode, Telephone, Fax, Website) 
						values ('$emapData[0]', '$emapData[1]', '$emapData[2]', '$emapData[3]', '$emapData[4]', '$emapData[5]', '$emapData[6]', '$emapData[7]', '$emapData[8]', '$emapData[9]')";
				$conn->query($sql);				
				
			}
			fclose($file);
			echo "$sql";
			mysqli_close($conn); 
		}
	} 
?> 