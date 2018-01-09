
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
				//echo "string";
				$a=$emapData[0];
				$b=$emapData[2];
				$c=$emapData[3];
				$d=$emapData[4];
				$e=$emapData[5];
				$f=$emapData[6];
				$f=$emapData[1];

				//echo $b;
				//$str = $emapData[1];
				//$str = "20140230";

				//$year = substr($str,0,4);
				//$month=substr($str, 4,2);
				//$day=substr($str,6, 2);
				//echo $year;
				//$PriceDate=$year.'-'.$month.'-'.$day;

				//$date=(string)$PriceDate;
				//echo $PriceDate;
			}
			fclose($file);
			echo "$sql";
			mysqli_close($conn); 
		}
	} 
?>
