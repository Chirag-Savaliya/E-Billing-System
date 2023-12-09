<?php
require("Header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Products Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/Style.css">
	<script type="text/javascript" src="js/Script.js"></script>
</head>
<body onload="ManagePills('mnuProducts');FetchProducts()">
	<center>
		<form role="form" method="post" onsubmit="return validateProducts()">
			<div class="container">
				<span class="note">Note : All Fields With <span>* </span> Are Required.</span>
				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<span>* </span><label>Enter Product Name</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="ProdName" name="ProdName" type="text" placeholder="Product Name" class="form-control" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<span>* </span><label>Enter Product Rate</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="ProdRt" name="ProdRt" type="text" placeholder="Product Rate" class="form-control" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<label>Enter G.S.T Rate</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="ProdGstRt" name="ProdGstRt" type="text" placeholder="G.S.T Rate" class="form-control" value="0" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<label>Enter Available Product Stock</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="ProdStock" name="ProdStock" type="text" placeholder="Product Stock" class="form-control" value="0" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<button name="sbmtProdcts" type="submit" class="btn btn-primary">ADD PRODUCT</button>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<label>Search Products</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="srchProd" name="srchProd" type="text" placeholder="Search Products" class="form-control" oninput="FetchProducts()" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div id="rsltProdcts">
				</div>

			</div>
		</form>
	</center>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php
require("DbConnection.php");
$entpId=$_SESSION["User"];
if(isset($_POST["sbmtProdcts"]))
{
	$prodName=$_POST["ProdName"];
	$prodRt=$_POST["ProdRt"];
	$prodGstRt=$_POST["ProdGstRt"];
	$prodStock=$_POST["ProdStock"];
	$Qry="INSERT INTO products SELECT MAX(ProdctId)+1,'$entpId','$prodName','$prodRt','$prodGstRt','$prodStock',TRUE FROM products;";
	AddUpdateDeleteData($Qry);
	echo "<script>alert('Product Added Successfully.')</script>";
}
require("Footer.php");
?>




