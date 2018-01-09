<?php 
 	include 'databaseConnect.php';

 		$UserID = intval($_POST['userid']);
 		$Invest = intval($_POST['invest']);
 		$symbol1= ($_POST['symbol1']);
 		$symbol2=($_POST['symbol2']) ;
 		$symbol3=($_POST['symbol3']) ;
 		$symbol4=($_POST['symbol4']);
 		$symbol5=($_POST['symbol5']);
 		$percentSym1 = (intval($_POST['percentSym1'])/100);
 		$percentSym2 = (intval($_POST['percentSym2'])/100);
 		$percentSym3 = (intval($_POST['percentSym3'])/100);
 		$percentSym4 = (intval($_POST['percentSym4'])/100);
 		$percentSym5 = (intval($_POST['percentSym5'])/100);

		//Step2 Get Price of stock from historyprice table
		$query = "SELECT * FROM historyprice" ;
		mysqli_query($conn, $query) or die('Error querying database.');

		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);

		while ($row = mysqli_fetch_array($result)) 
		{
		 	//$row['Symbol'] . ' ' . $row['datePrice'] . ' ' . $row['Priceopen'] . ' ' . $row['PriceHigh'] . ' ' . $row['PriceLow'] . ' ' . $row['Priceclose'] . ' ' . $row['Volume'].'<br />';


			if (strcmp($symbol1,$row['Symbol']) == true) 
			{
				$amountSym1 =intval((($Invest*$percentSym1)/$row['Priceclose']));
				echo "$amountSym1" .'<br />';
			}
/*
		}

 		
		//echo "$sql";
		$conn->query($sql);
		mysqli_close($conn);
    }
?> 