<?php
include 'databaseConnect.php';
if(isset($_POST['Import']))
{
    if(count($_FILES['Import']['name']) > 0)
    {
        //Loop through each file
        for($i=0; $i<count($_FILES['Import']['name']); $i++) 
        {
          //Get the temp file path
            $tmpFilePath = $_FILES['Import']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){
            
                //save the filename
                $shortname = $_FILES['Import']['name'][$i];

                //save the url and the file
                $filePath = "uploaded/" . date('d-m-Y-H-i-s').'-'.$_FILES['Import']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) 
                {

                    $files[] = $shortname;

                    $file = fopen($files[$i], "r");
                    while (($emapData = fgetcsv($file,10000, ",")) !== FALSE)
                    {
                    //$emapData = fgetcsv($file,10000,",");
                        //It wiil insert a row to our listofcompanies table from our csv file`
                        $sql1 = "INSERT INTO historyprice (Symbol, datePrice, Priceopen, PriceHigh, PriceLow, Priceclose, Volume)
                                            VALUES ('$emapData[0]', '$emapData[1]', '$emapData[2]', '$emapData[3]', '$emapData[4]', '$emapData[5]', '$emapData[6]')";
                                            echo $sql1;
                        
                    }
                    fclose($file);
                    echo "$sql";
                    mysqli_close($conn); 

                }
              }
        }
    }

   
}
?>