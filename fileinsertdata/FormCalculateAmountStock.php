<!DOCTYPE html>
<?php 
 include 'databaseConnect.php';
?> 
<html>
	<head>
 		<title>Cal Amount Stock</title>
 	</head>
	<body>    
    	<form action="CalculateAmountStock.php" method="post" name="upload_invest">
			UserID:<input type="text" name="userid"><br>
			Invest:<input type="text" name="invest"><br>
			symbol1:<input type="text" name="symbol1"> percentSym1:<input type="text" name="percentSym1"><br>
			symbol2:<input type="text" name="symbol2"> percentSym2:<input type="text" name="percentSym2"><br>
			symbol3:<input type="text" name="symbol3"> percentSym3:<input type="text" name="percentSym3"><br>
			symbol4:<input type="text" name="symbol4"> percentSym4:<input type="text" name="percentSym4"><br>
			symbol5:<input type="text" name="symbol5"> percentSym5:<input type="text" name="percentSym5"><br>
			<button type="submit" id="submit" name="Upload" >Submit</button>
		</form>
	</body>
</html>