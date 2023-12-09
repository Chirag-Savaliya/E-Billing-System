<?php
require("Header.php");
require("DbConnection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bill Generator Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/Style.css">
	<script type="text/javascript" src="js/Script.js"></script>
</head>
<body onload="ManagePills('mnuCart')">
	<center>
		<?php
		$entpId=$_SESSION["User"];
		$sum=0;
		$Qry="SELECT p.ProdctId,p.ProdctName,c.Qntities,p.ProdctRt,p.ProdctGstRt FROM products p,cart c WHERE p.ProdctId=c.ProdctId AND p.EntpId='$entpId' AND c.EntpId='$entpId' AND p.ProdctSttus=TRUE";
		$rslt=FetchData($Qry);
		if(mysqli_num_rows($rslt)>0)
		{
			echo '<table class="table table-striped table-hover" style="margin-top:10%">';
			echo'<thead><tr>';
			echo'<th scope="col">Product Name</th><th scope="col">Quantities</th><th scope="col">Rate</th><th scope="col">G.S.T Rate</th><th scope="col">Amount</th><th scope="col">G.S.T Amount</th><th scope="col">TOTAL</th><th scope="col" colspan="2">ACTION</th>';
			echo'</tr></thead>';
			echo'<tbody>';
			while($row=mysqli_fetch_array($rslt))
			{
				$GstAmnt=(($row[2]*$row[3])*$row[4])/100;
				$Totl=($row[2]*$row[3])+(($row[2]*$row[3])*$row[4])/100;
				$sum+=$Totl;
				echo'<tr>';
				echo'<td>'.$row[1].'</td>';
				echo'<td>'.$row[2].'</td>';
				echo'<td>'.$row[3].'</td>';
				echo'<td>'.$row[4].'</td>';
				echo'<td>'.$row[2]*$row[3].'</td>';
				echo'<td>'.$GstAmnt.'</td>';
				echo'<td>'.$Totl.'</td>';
				echo'<td><a href="EditCart.php?a='.$row[0].'"><button type="button" class="btn btn-primary">EDIT</button></a></td>';
				echo'<td><a href="DeleteCart.php?a='.$row[0].'"><button type="button" class="btn btn-primary">REMOVE</button></a></td>';
				echo'</tr>';
			}
			echo'<tr>';
			echo'<td colspan="8" align="center" style="font-weight:bold">Total Amount : '.$sum.'</td>';
			echo'</tr>';
			echo'</tbody></table>';
		}

		?>
		<form role="form" method="post" onsubmit="return validateCustomerName()">
			<div class="container">
				<span class="note">Note : All Fields With <span>* </span> Are Required.</span>
				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<span>* </span><label>Enter Customer Name</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="CustName" name="CustName" type="text" placeholder="Customer Name" class="form-control" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<button type="submit" name="sbmtGnrtBill" class="btn btn-primary">GENERATE BILL</button>
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
if(isset($_POST["sbmtGnrtBill"]))
{
	$cstmrName=$_POST["CustName"];
	$dt=date('Y-m-d');
	$Qry="INSERT INTO bill SELECT MAX(BillId)+1,'$entpId','$cstmrName','$dt' FROM bill;";
	AddUpdateDeleteData($Qry);
	$Qry="INSERT INTO sales SELECT c.EntpID,b.BillId,c.ProdctId,c.Qntities FROM cart c,bill b WHERE c.EntpId=b.EntpId AND b.BillId=(SELECT MAX(BillId) FROM bill WHERE EntpId='$entpId');";
	AddUpdateDeleteData($Qry);
	echo"<script>window.location.replace('http://localhost/E-Billing System/Bill.php');</script>";
}
require("Footer.php");
?>