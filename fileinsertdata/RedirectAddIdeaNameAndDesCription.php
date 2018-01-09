<?php
  include 'databaseConnect.php';
  //if(isset($_POST["submit"]))
	//{
    $IdeaName = $_POST['IdeaName'];
    $Description = $_POST['Description'];
    echo $IdeaName;
    $userid =1;
    $money=100000;
    $sql = "INSERT INTO idea (UserID ,Description ,InvestAmount ,InvestName)
    VALUES ('$userid', '$Description', '$money', '$IdeaName')";
//  }


  //  echo $IdeaName.'-'.$Description;
    //echo "$sql";
    $conn->query($sql);
    mysqli_close($conn);

    //echo "yesssssssssssssssssssssssss";
?>
