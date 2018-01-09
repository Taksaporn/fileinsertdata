<?php
    include 'databaseConnect.php';

   
        $ideaID = $_POST["ideaID"];
        $symbol = $_POST["symbol"];
        $Percent = $_POST["percent"];

        $Count= 0;
        $result1 = $conn->query("SELECT count(*) FROM stockideatemp WHERE IdeaID = $ideaID" );
         while($row1 = $result1->fetch_array()){
                    $Count = $row1[0]+ 1 ;
              }
           $Percent = (double)100/$Count;  

        $sql = "INSERT INTO stockideatemp (IdeaID, Symbol, Percent) VALUES ('$ideaID', '$symbol', '$Percent')";
        $conn->query($sql);
        $sql2 = "UPDATE stockideatemp SET Percent = $Percent WHERE IdeaID =$ideaID ";
        $conn->query($sql2);
        mysqli_close($conn);
        echo $symbol.'   '.$Percent;
      //echo $symbol.'--'.$ideaID;
        header('Location: creatingIdea.php');
  
?>
