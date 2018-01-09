<?php
  include 'databaseConnect.php';

    $ideaID = $_POST["ideaID"];
    $IdeaName = $_POST['IdeaName'];
    $Description = $_POST['Description'];
    //echo $IdeaName;
    $userid =1;
    $money=$_POST['investamount'];

    $sql2 = "UPDATE idea SET InvestAmount = $money WHERE IdeaID =$ideaID ";
    $conn->query($sql2);
    //echo $sql;
    echo $sql2;
/*
    

    $result2 = $conn->query("DELETE FROM stockideatemp WHERE IdeaID = $ideaID" );*/
    mysqli_close($conn);

    //echo "yesssssssssssssssssssssssss";
    header('Location: addstocktostockidea.php');
?>
