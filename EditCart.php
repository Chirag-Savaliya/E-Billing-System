<?php
require("Header.php");
require("DbConnection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Cart Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/Style.css">
	<script type="text/javascript" src="js/Script.js"></script>
</head>
<body onload="ManagePills('mnuCart')">
	<center>
		<form role="form" method="post" autocomplete="off" onsubmit="return validateCartProduct()">
			<div class="container">
				<span class="note">Note : All Fields With <span>* </span> Are Required.</span>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>

					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<label>Product Id</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="ProdId" name="ProdId" type="text" placeholder="Product Id" class="form-control" readonly="true" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>

					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<label>Product Name</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="ProdName" name="ProdName" type="text" placeholder="Product Name" class="form-control" readonly="true" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<label>Available Product Stock</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="ProdStock" name="ProdStock" type="text" placeholder="Product Stock" class="form-control" readonly="true"/>
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<span>* </span><label>Product Quantities</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="ProdQunt" name="ProdQunt" type="number" placeholder="Product Quantities" class="form-control" oninput="updateStock()" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<button name="sbmtCartProdct" type="submit" class="btn btn-primary">UPDATE CART</button>
					</div>
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
$entpId=$_SESSION["User"];
$prodId=$_REQUEST["a"];
$Qry="SELECT p.ProdctName,p.ProdctStock,c.Qntities FROM products p,cart c WHERE p.ProdctId=c.ProdctId AND p.EntpId='$entpId' AND c.EntpId='$entpId' AND p.ProdctId='$prodId' AND p.ProdctSttus=TRUE";
$rslt=FetchData($Qry);
if(mysqli_num_rows($rslt)>0)
{
	while($row=mysqli_fetch_array($rslt))
	{
		echo"<script>document.getElementById('ProdId').value='$prodId'</script>";
		echo"<script>document.getElementById('ProdName').value='".$row[0]."'</script>";
		echo"<script>document.getElementById('ProdStock').value=$row[1]</script>";
		echo"<script>document.getElementById('ProdQunt').value=$row[2]</script>";
	}
}
if(isset($_POST["sbmtCartProdct"]))
{
	$prodctQuantities=$_POST["ProdQunt"];
	$avlblStock=$_POST["ProdStock"];
	AddUpdateDeleteData("UPDATE cart SET Qntities='$prodctQuantities' WHERE EntpId='$entpId' AND ProdctId='$prodId';");
	AddUpdateDeleteData("UPDATE products SET ProdctStock='$avlblStock' WHERE EntpId='$entpId' AND ProdctId='$prodId';");
	echo"<script>alert('Cart Updated Successfully.')</script>";
	echo"<script>window.location.replace('http://localhost/E-Billing System/Generatebill.php');</script>";
}
require("Footer.php");
?>