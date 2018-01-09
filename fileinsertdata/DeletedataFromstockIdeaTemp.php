 <?php  
	 include 'databaseConnect.php';
	 $result2 = $conn->query("DELETE FROM stockideatemp WHERE IdeaID" );
	 mysqli_close($conn);
	 header('Location: patty.html');
 ?>