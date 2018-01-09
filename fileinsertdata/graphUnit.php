<?php include('DataX.php'); ?>

<script>
  $( document ).ready(function() {
     var layout ={
      margin:{
        t:0,
        b:20,
        l:18,
        r:10
      },
      height: "200",
      showlegend: false

    };



    $.ajax({

        type: 'GET',

        url: 'http://localhost:8080/ideaInvestment/dataX.php',

        success: function(data){

        	console.log(data);



        }


        });
  var SET_Index = {
    x: [
      <?php
      foreach ($arrSum as $key => $value) {
        echo $key.', ';
      }
      ?>
    ],
    y: [
      <?php
      foreach ($arrSum as $key => $value) {
        echo $value.', ';
      }
      ?>
    ],
    mode: 'lines',
    connectgaps: true

  };



  var data = [SET_Index];
  Plotly.newPlot('myDiv', data, layout);
});
</script>
