<?php
  include 'databaseConnect.php';
  $ideaID = 1;
  $dataY = array();
  $resultDate = $conn->query("SELECT datePrice FROM historyprice Group By datePrice");
  while($row = $resultDate->fetch_array())
  { $index =0;
    $SumSecurityValue = 0;
    $SumTheFirstSecurityValue = 1;
    $date = $row[0];
    //echo 'date'.$date;




    $resultCalculateIdeaIndex = $conn->query("SELECT * FROM stockidea WHERE ideaID = $ideaID ");
    while($rowindex = $resultCalculateIdeaIndex->fetch_assoc()) //this while for calculate the security value
    {
      $Symbol = $rowindex['Symbol'];
      $Weight = $rowindex['Percent'];
      $DateCreated = '0000-00-00';
      $Price = 0;
      $PriceDateCreated = 0;
    //  echo 'Percent'.$Weight;
      //echo 'symbol'.$Symbol;
      $resultGetDateCreated = $conn->query("SELECT DateCreated FROM idea WHERE ideaID = $ideaID ");
      while($rowDateCreated= $resultGetDateCreated->fetch_array()){  //Get price when create the idea
        $DateCreated = $rowDateCreated[0];
        $DateCreated;
        $year = substr($DateCreated,0,4);
        $month = substr($DateCreated,5,2);
        $date_ = substr($DateCreated,8,2);
        $ConvertDateCreated = $year.$month.$date_;
        //echo 'created date'.$ConvertDateCreated;

      //  echo $Symbol;
          $resultGetPriceDateCreated = $conn->query("SELECT Priceclose FROM historyprice WHERE Symbol = '$Symbol' AND datePrice = '$ConvertDateCreated' ");
          while($rowpriceCreatedDate = $resultGetPriceDateCreated->fetch_array()){
                   $PriceDateCreated = $rowpriceCreatedDate[0];
             }

          $resultGetPrice = $conn->query("SELECT Priceclose FROM historyprice WHERE Symbol = '$Symbol' AND datePrice = '$date' ");
               while($rowprice = $resultGetPrice->fetch_array()){
                   $Price = $rowprice[0];


               }


        }


        $AmountOfStock = $Weight/$PriceDateCreated;
        $SecurityValue = $AmountOfStock*$Price;
        $SumSecurityValue = $SumSecurityValue+$SumSecurityValue;



    }
    $index = $SumSecurityValue/$SumTheFirstSecurityValue;
    $dataY[] = $index ;

    echo '------';
  }
    var_dump($dataY);
