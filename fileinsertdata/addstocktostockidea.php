<?php 
  include 'databaseConnect.php';
		$result1 = $conn->query("SELECT * FROM idea");
	    while($row1 = $result1->fetch_assoc())
	    {
	    	$ideaID=$row1['IdeaID'];
	    }

	$result = $conn->query("SELECT * FROM stockideatemp ");
	    while($row = $result->fetch_assoc())
	    {
	        //$ideaID=$row['IdeaID'];
	        $symboltemp = $row['Symbol'];
	        $percent = $row['Percent'];

	        $sql = "INSERT INTO stockidea (IdeaID, Symbol, Percent) VALUES ('$ideaID', '$symboltemp', '$percent')";
	        $conn->query($sql);
	    } 

    mysqli_close($conn);
    header('Location: DeletedataFromstockIdeaTemp');
?>