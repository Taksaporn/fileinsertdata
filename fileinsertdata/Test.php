
<?php
   include 'databaseConnect.php';
    $dataX = array();
   $resultDatey = $conn->query("SELECT datePrice FROM historyprice Group By datePrice");
   while($row = $resultDatey->fetch_array())
   {
     $dataX[] =  $row[0];
   }
  ?>



    <?php


             include 'databaseConnect.php';
                 $dateToday ;

                 $dataY = array();
                   $resultDate = $conn->query("SELECT datePrice FROM historyprice Group By datePrice");
                   while($row = $resultDate->fetch_array())
                   {

                     $index =0;
                     $SumSecurityValue = 0;
                     $SumTheFirstSecurityValue = 1;
                     $date = $row[0];

                     $resultCalculateIdeaIndex = $conn->query("SELECT * FROM stockidea WHERE ideaID = $ideaID ");
                     while($rowindex = $resultCalculateIdeaIndex->fetch_assoc()) //this while for calculate the security value for
                     {
                       $Symbol = $rowindex['Symbol'];
                       $Weight = $rowindex['Percent'];
                       $DateCreated = '0000-00-00';
                       $Price = 0;
                       $PriceDateCReated = 0;
                       $resultGetDateCreated = $conn->query("SELECT DateCreated FROM idea WHERE ideaID = $ideaID ");
                       while($rowDateCreated= $resultGetDateCreated->fetch_array()){
                         $DateCreated = $rowDateCreated[0];
                         $resultGetPriceDateCreated = $conn->query("SELECT PriceClose FROM historyprice WHERE Symbol = $Symbol AND datePice = $DateCreated ");
                         while($rowpriceCreatedDate = $resultGetPrice->fetch_array()){
                           $PriceDateCReated = $rowpriceCreatedDate[0];
                           }
                         }
                         $resultGetPrice= $conn->query("SELECT PriceClose FROM historyprice WHERE Symbol = $Symbol AND datePice = $date ");
                         while($rowprice = $resultGetPrice->fetch_array()){
                             $Price = $rowprice[0];
                         }


                         $AmountOfStock = $Weight/$PriceDateCReated;
                         $SecurityValue = $AmountOfStock*$Price;
                         $SumSecurityValue = $SumSecurityValue+$SumSecurityValue;
                         $index = $SumSecurityValue/$SumTheFirstSecurityValue;
                         $dataY[] = $index ;

                     }


                   }


           ?>
