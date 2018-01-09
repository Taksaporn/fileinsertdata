<?php
    include 'databaseConnect.php';

    $IdeaName = $_POST['IdeaName'];
    $Description = $_POST['Description'];

    $userid =1;
    $money=0;
    $sql = "INSERT INTO ideatemp (UserID ,Description ,InvestAmount ,InvestName)
    VALUES ('$userid', '$Description', '$money', '$IdeaName')";

    $conn->query($sql);
    mysqli_close($conn);
  
?>
