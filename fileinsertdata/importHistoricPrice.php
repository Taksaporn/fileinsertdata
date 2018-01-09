
<?php
	include 'databaseConnect.php';
	if(isset($_POST['Import']))
	{
		if(count($_FILES['file']['name'])!=0)
		{
			
				for($i=0; $i<count($_FILES['file']['name']); $i++)
				{
					$filename=$_FILES['file']['tmp_name'][$i];
					//echo $filename;
					//$tmpFilePath = $_FILES['upload']['tmp_name'][$i];
					if($filename !="")
					{
						$shortname = $_FILES['file']['name'][$i];

						//echo $shortname;
						if($_FILES["file"]["size"][$i] > 0)//for each element
						{	
							$file = fopen($filename, "r");
							//$i=0;
							//echo $file;
							$PriceDate=substr($shortname,16,10);
									echo "Sucesssssssss";
								while (($emapData = fgetcsv($file,10000, ",")) != FALSE )
								{
									
										$sql1 = "INSERT INTO historyprice (Symbol, datePrice, Priceopen, PriceHigh, PriceLow, Priceclose, Volume)
											VALUES ('$emapData[0]', '$PriceDate', '$emapData[2]', '$emapData[3]', '$emapData[4]', '$emapData[5]', '$emapData[6]')";
									
									$conn->query($sql1);		
								}
							
							
						}
					 }
				}
			//}
		}
		fclose($file);
		mysqli_close($conn);
	} 
?> 