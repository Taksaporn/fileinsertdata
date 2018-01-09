<?php
    include 'databaseConnect.php';

   
        $ideaID = $_POST["ideaID"];
        $symbol = $_POST["symbol"];
        $Percent = $_POST["percent"];
    /*
        $sql = $conn->query("SELECT count(*) FROM stockidea WHERE IdeaID = 1 ");

        while($row = $sql->fetch_array())
        {
           $amountOfStock = $row[0];
        }
        $amountOfStock = $amountOfStock+1;``

        $percentSym= 100/$amountOfStock;
    */
        //$percentSym = 20;

        $sql = "INSERT INTO stockidea (IdeaID, Symbol, Percent) VALUES ('$ideaID' ,'$symbol', '$Percent')";
        echo $sql;
        //$conn->query($sql);
        mysqli_close($conn);

      //echo $symbol.'--'.$ideaID;
  
?>
