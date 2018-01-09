<?php
  include 'databaseConnect.php';
  //include 'Idea.php';

  $ideaID=$Ideanumber;

  $resultGetDateCreated = $conn->query("SELECT DateCreated FROM idea WHERE ideaID = $ideaID ");
  $rowDateCreated= $resultGetDateCreated->fetch_array();  //Get price when create the idea
  $DateCreated = $rowDateCreated[0];

  $arrValue = array();
  $resultSymbol = $conn->query("SELECT * FROM stockidea");
  while($rowSymbol = $resultSymbol->fetch_array()) { // 5 รอบ
    $Symbol = $rowSymbol['Symbol'];
    $Weight = $rowSymbol['Percent'];
    $resultGetPriceDateCreated = $conn->query("SELECT Priceclose FROM historyprice WHERE Symbol = '$Symbol' AND datePrice = '$DateCreated'");
    $rowpriceCreatedDate = $resultGetPriceDateCreated->fetch_array();
    $PriceDateCreated = $rowpriceCreatedDate[0];

    $resultValue = $conn->query("SELECT datePrice, (($Weight/$PriceDateCreated)*Priceclose) AS Value FROM historyprice WHERE Symbol = '$Symbol'");
    $arrValue["'".$Symbol."'"] = array();
    while($rowValue = $resultValue->fetch_array()) {
      // $tmpValue = array();
      // $tmpValue['datePrice'] = $rowValue['datePrice'];
      // $tmpValue['Value'] = $rowValue['Value'];
      $arrValue["'".$Symbol."'"]["'".$rowValue['datePrice']."'"] = $rowValue['Value'];
      // print_r($rowValue);
    }
    // echo $rowSymbol['Symbol'];
    // print_r($arrValue);
  }
  // print_r($arrValue);

  $arrDate = array();
  $resultdatePrice = $conn->query("SELECT DISTINCT datePrice FROM historyprice ");
  while($rowdatePrice = $resultdatePrice->fetch_array()) {
    array_push($arrDate, $rowdatePrice['datePrice']);
  }
  // print_r($arrDate);

$arrSum = array();
foreach ($arrDate as $date) {
  $resultSymbol = $conn->query("SELECT * FROM stockidea");
  $sum = 0;
  while($rowSymbol = $resultSymbol->fetch_array()) { // 5 รอบ
    $Symbol = $rowSymbol['Symbol'];
    if(array_key_exists("'".$date."'", $arrValue["'".$Symbol."'"])) {
      $sum += $arrValue["'".$Symbol."'"]["'".$date."'"];
    }
  }
  $arrSum["'".$date."'"] = array();
  $arrSum["'".$date."'"] = $sum;
}


// echo json_encode($arrSum);
?>
