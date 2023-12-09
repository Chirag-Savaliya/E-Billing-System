<?php
require("Header.php");
    /*
     Note : require() and include() function only include markup. It does not incude <head>,<body>,<script> etc.
      It removes all the content which is not in <body> tag.
      So we need to give reference of all the ".css" and ".js" files into each ".php" file.
    */
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/Style.css">
  <script type="text/javascript" src="js/Script.js"></script>
</head>
<body onload="ManagePills('mnuHome')">
  <div class="container">
    <div class="row my-3">
        <div class="col-md-4">
            <div class="card text-center h-100 bg-primary text-white">
                <div class="card-block">
                    <h2><i class="fa fa-truck"></i></h2>
                    <h4 class="card-title">Product Management</h4>
                    <ul>
                      <li>Add New Product</li>
                      <li>Edit Details Of Existing Product</li>
                      <li>Remove Existing Product</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center h-100 bg-primary text-white">
                <div class="card-block">
                    <h2><i class="fa fa-product-hunt"></i></h2>
                    <h4 class="card-title">Stock Management</h4>
                    <ul>
                      <li>Edit Stock On Purchases Of Product</li>
                      <li>Automatic Subtract Stock On Sales Of Product</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center h-100 bg-primary text-white">
                <div class="card-block">
                    <h2><i class="fa fa-shopping-cart"></i></h2>
                    <h4 class="card-title">Cart System</h4>
                    <ul>
                      <li>Add New Product In Cart</li>
                      <li>Edit Quantities Of Product Available In Cart.</li>
                      <li>Remove Product From Cart.</li>
                      <li>Generate Bill Direct From Cart.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php
require("Footer.php");
?>