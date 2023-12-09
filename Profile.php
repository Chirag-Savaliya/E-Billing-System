<?php
require("Header.php");
require("DbConnection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profile Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/Style.css">
	<script type="text/javascript" src="js/Script.js"></script>
</head>
<body onload="ManagePills('mnuProfile')">
	<center>
		<form role="form" method="post" onsubmit="return ManageProfile()">
			<div class="container">
				<span class="note">Note : All Fields With <span>* </span> Are Required.</span>
				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<span>* </span><label>Enter Enterprise Name</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="EntpName" name="EntpName" type="text" placeholder="Enterprise Name" class="form-control profile" readonly="true" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<span>* </span><label>Enter Address</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<textarea id="EntpAddrs" name="EntpAddrs" cols="10" rows="5" class="form-control profile" placeholder="Address" readonly="true"></textarea>
					</div>
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<label>Enter Contact Number</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="EntpContctNo" name="EntpContctNo" type="text" placeholder="Contact Number" class="form-control profile" maxlength="10" readonly="true" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<span>* </span><label>Enter Email Address</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="EntpEml" name="EntpEml" type="text" placeholder="Email Address" class="form-control profile" readonly="true" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<span>* </span><label>Enter Password</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="EntpPass" name="EntpPass" type="password" placeholder="Password" class="form-control profile" readonly="true" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<span>* </span><label>Re-Enter Password</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="EntpReentrPass" name="EntpReentrPass" type="password" placeholder="Confirm Password" class="form-control profile" readonly="true" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<span>* </span><label>Enter Security Question</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="EntpSeqQstn" name="EntpSeqQstn" type="text" placeholder="e.g.What is your favriout actor?" class="form-control profile" readonly="true" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<span>* </span><label>Enter Answer</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="EntpQstnAnsr" name="EntpQstnAnsr" type="text" placeholder="Security Question Answer" class="form-control profile" readonly="true" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<button id="SbmtProfile" name="SbmtProfile" type="submit" class="btn btn-primary">EDIT PROFILE</button>
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
require("Footer.php");
$entpId=$_SESSION["User"];
$Qry="SELECT EntpName,EntpAddrs,EntpContctNo,EntpEml,EntpPasswrd,EntpSecQstn,EntpSecQstnAnsr FROM enterprise WHERE EntpId='$entpId' AND EntpSttus=true;";
$rslt=FetchData($Qry);
if(mysqli_num_rows($rslt)>0)
{
	while($row=mysqli_fetch_array($rslt))
	{
		echo"<script>document.getElementById('EntpName').value='$row[0]'</script>";
		echo"<script>document.getElementById('EntpAddrs').value='$row[1]'</script>";
		echo"<script>document.getElementById('EntpContctNo').value=$row[2]</script>";
		echo"<script>document.getElementById('EntpEml').value='$row[3]'</script>";
		echo"<script>document.getElementById('EntpPass').value=$row[4]</script>";
		echo"<script>document.getElementById('EntpReentrPass').value=$row[4]</script>";
		echo"<script>document.getElementById('EntpSeqQstn').value='$row[5]'</script>";
		echo"<script>document.getElementById('EntpQstnAnsr').value='$row[6]'</script>";
	}
}
if(isset($_POST["SbmtProfile"]))
{
	$name=$_POST["EntpName"];
	$addrs=$_POST["EntpAddrs"];
	$conno=$_POST["EntpContctNo"];
	$pass=$_POST["EntpPass"];
	$secQstn=$_POST["EntpSeqQstn"];
	$qstnAnsr=$_POST["EntpQstnAnsr"];
	$Qry="UPDATE enterprise SET EntpName='$name',EntpAddrs='$addrs',EntpContctNo='$conno',EntpPasswrd='$pass',EntpSecQstn='$secQstn',EntpSecQstnAnsr='$qstnAnsr' WHERE EntpId='$entpId'";
	AddUpdateDeleteData($Qry);
	echo"<script>alert('Profile Updated Successfully')</script>";
	echo"<script>window.location.replace('http://localhost/E-Billing System/Profile.php');</script>";
}
?>
