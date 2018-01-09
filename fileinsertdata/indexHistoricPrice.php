<!DOCTYPE html>
<?php 
 include 'databaseConnect.php';
?> 
<html lang="en">
 <head>
  <meta charset="utf-8">
  <title>Import csv To Mysql Database Using PHP </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="Hemant Vishwakarma">
  <meta name="description" content="Import csv File To MySql Database Using php">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Import csv File To MySql Database Using php</title>
 </head>
 <body>    
    <br><br>
        <div class="container">
            <div class="row"><br>
                <div class="col-md-3 hidden-phone"></div>
                <div class="col-md-6" id="form-login">
                    <form class="well" action="importHistoricPrice.php" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Import CSV/Excel file</legend>
                            <div class="control-group">
                                <div class="control-label">
                                    <label>CSV/Excel File:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="file" name="file[]" id="file" class="input-large form-control" multiple>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                <button type="submit" id="submit" name="Import" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3 hidden-phone"></div>
            </div>
        </div>
 </body>
</html>



