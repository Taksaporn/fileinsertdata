<!DOCTYPE html>

<html>
<title>Idea Investment</title>
<body>
<header>


  <style>
  .username {
      width: 40%;
      padding: 12px 20px;
      margin: 8px 8%;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
  }


  textarea[type=text]{
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      border: none;
  }
  button[type=submit]{
      margin: 0px 8%;
  }
  ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
  }

  li {
      float: left;
  }

  li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
  }

  li a:hover:not(.active) {
      background-color: #111;
  }

  .active {
      background-color: #48D1CC;
  }
  </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</header>

  <ul><!Menu bar!>
    <li><a href="#home">Home</a></li>
    <li><a href="#news">Idea</a></li>
    <li style="float:right"><a class="active" href="#about">Log out</a></li>
    <li style="float:right"><a href="#contact">Portfolio</a></li>
  </ul><!End Menu bar!>
<body onload="form1.reset();">
  <form action="redirectTempNameIdea.php" name="NameandDescript" method="post" id="form1">
      <div><!Profile Pic!>


      </div>
      <!End Profile pic!>

        <div ><!Username !>
            <input autocomplete="off" type="text" id="fname" class="username" name="IdeaName" placeholder="Idea name..">
        </div><!End Username!>

      <div class="jumbotron text-center"><!Description and performance!>
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <h3>Description</h3>
                <textarea autocomplete="off" rows="6" cols="50" type="text" id="fname" name="Description" placeholder="Description..."></textarea>
            </div>
            <div class="col-sm-6">
              <h3 >Performance</h3><!genergategraph!>
              <div id="myDiv" style="height: 200px;"></div>
            </div>
          </div>
        </div>
      </div><!End description and performance!>
      <hr>

      <button class="btn btn-default" type="submit">Create Idea</button>
      
  </form>
</body>


<?php $ideaID = 1; // assign idea id?>
<div>
  <div class="container"><!Show stocklist!>
    <h2>Asset in this idea</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Symbol</th>
        <th>Company</th>
        <th>Weight</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include 'databaseConnect.php';
        //<!while loop to fetch stock list!>
        $result1 = $conn->query("SELECT * FROM stockideatemp WHERE IdeaID = $ideaID" );
         while($row1 = $result1->fetch_assoc())
            {

                $symbol = $row1['Symbol'];
                $percent = $row1['Percent'];

                  echo  '<tr>
                  <td>'.$symbol.'</td>';
                  $sql = $conn->query("SELECT Company FROM listofcompanies WHERE Symbol = '$symbol' ");

                  while($row = $sql->fetch_array())
                  {
                    echo '<td>'.$row[0].'</td>';
                  }
                 echo   '<td>'.$percent.'</td>
                </tr>';
            }
        ?>
        <!end while loop!>
    </tbody>
  </table>
  </div><!End show stock list!>

<?php
/*
  <div class="container"><!Seach and Add!>
        <center><h3>Add stock</h3></center>


        <?php
        include 'databaseConnect.php';
        ?>

      <div class="container">
        <div class="dropdown" style="text-align:center;">
          <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Search symbol(Just test)
          <span class="caret"></span></button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
           
            <!-<?php
              //echo '<a role="menuitem" tabindex="-1" href="redirectAddStockandRatio.php?symbol=' .$symbol. '&ideaID='.$ideaID.'">'.$symbol.'</a>'
            ?>-!>
                             
          </ul>
        </div>
      </div>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
      		    <div class="input-group">
                      <div class="input-group-btn search-panel">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          	<span id="search_concept">Filter by</span> <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#symbols">Symbol</a></li>
                            <li><a href="#companies">Company</a></li>

                          </ul>
                          </div>
                          <input type="hidden" name="search_param" value="all" id="search_param">
                          <input type="text" class="form-control" name="x" placeholder="Search Symbol or Company">
                          <span class="input-group-btn">
                          <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                      </span>
                  </div>
              </div>
  	     </div>
    </div>

  <hr>
  <center>
      <div>
        <form class="form-inline">
          <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">Amount (In Bahts)</label>
            <div class="input-group">
              <div class="input-group-addon">฿</div>
              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Invest Amount">
              <div class="input-group-addon">.00</div>
            </div>
          </div>

        </form>
      </div>
</center>
</div>*/
?>

  <!insert stock list!>
  <div>

    <form class="form-inline" action="redirectTemp.php" method="post">
      <div class="input-group-addon">
          <input type="text" class="form-control" id="exampleInputAmount" name ="symbol" placeholder="Search stock">
          <input type="text" class="form-control" id="exampleInputPercentsymbol" name="percent" placeholder="Percent symbol">
          <input type="hidden" value= "<?php echo $ideaID ?>" name="ideaID">

          <button class="btn btn-default" type="submit">Add</button>
      </div>
    </form>

  </div>
  <!end insert stock list!>
  <hr>
    <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy;Idea Investment Project by Theeranith And Taksaporn</p>
      </div>
    </footer>


</body>
</html>



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



    var IdeaInvestment = {

    x: [1,2,4,5,6,7,8,9,10,11,12,13,14,15 ],
    y: [1,12,3,4,5,16,7,4,5,,4,33,null],
    mode: 'lines',
    connectgaps: true

  };
  var SET_Index = {
    x: [1, 2, 3, 4,5,6,7,8,9,10,11,12],
    y: [16,null,null, 5,null,null, 11,null,null, 9,null,null,],
    mode: 'lines',
    connectgaps: true

  };
  var data = [IdeaInvestment, SET_Index];
  Plotly.newPlot('myDiv', data, layout);
});
</script>
