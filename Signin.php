<?php
require("Header.php");
require("DbConnection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Signin Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/Style.css">
	<script type="text/javascript" src="js/Script.js"></script>
</head>
<body onload="ManagePills('mnuSignin')">
	<center>
		<form role="form" method="post" onsubmit="return validateSignin()">
			<div class="container">
				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<label>Enter Registered Email Address</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="UsrName" name="UsrName" type="text" placeholder="User Name" class="form-control" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<label>Enter Password</label>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
						<input id="UsrPasswrd" name="UsrPasswrd" type="password" placeholder="Password" class="form-control" />
					</div>
					<div class="col-lg-2 col-md-1 col-sm-2 col-xs-0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<button name="SbmtSignin" type="submit" class="btn btn-primary">SIGNIN</button>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<a href="Forgetpassword.php">Fogret Password</a>
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
if(isset($_POST["SbmtSignin"]))
{
	$usr=$_POST["UsrName"];
	$passwrd=$_POST["UsrPasswrd"];
	$rslt=FetchData("SELECT EntpEml,EntpPasswrd,EntpId FROM enterprise WHERE EntpEml='$usr';");
	if(mysqli_num_rows($rslt)>0)
	{
		if($row=mysqli_fetch_array($rslt)) 
		{
			if($usr==$row[0]&&$passwrd==$row[1])
			{
				$_SESSION["User"]=$row[2];
				echo"<script>window.location.replace('http://localhost/E-Billing System/Index.php');</script>";
			}
			else
			{
				echo "<script>alert('User Name Or Password Did Not Match.');</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('User Could Not Found.');</script>";
	}
}
?>
