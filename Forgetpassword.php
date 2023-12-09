<?php
require("Header.php");
require("DbConnection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Forget Password Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/Style.css">
	<script type="text/javascript" src="js/Script.js"></script>
</head>
<body>
	<center>
		<div class="container">
			<span class="note">All fields with <span>*</span> are required.</span>
			<fieldset id="Eml">
				<form action="" method="post" onsubmit="return cpValidateEmail()">
					<div class="row form-group">
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
						</div>
						<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
							<span>* </span><label>Enter Registered Email Address</label>
						</div>
						<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
							<input id="UsrName" name="UsrName" type="text" placeholder="User Name" class="form-control" />
						</div>
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<button name="sbmtEml" type="submit" class="btn btn-primary">NEXT</button>
						</div>
					</div>
				</form>
			</fieldset>

			<fieldset id="SeqQstn" disabled="true">
				<form action="" method="post">
					<div class="row form-group">
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
						</div>
						<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
							<label>Security Question</label>
						</div>
						<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
							<input id="UsrSeqQstn" name="SeqQstn" type="text" class="form-control" />
						</div>
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
						</div>
						<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
							<span>* </span><label>Enter Question Answer</label>
						</div>
						<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
							<input id="UsrSeqQstnAnswr" name="UsrSeqQstnAnswr" type="text" class="form-control" placeholder="Security Question Answer" />
						</div>
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<button name="sbmtSeqQstn" type="submit" class="btn btn-primary">NEXT</button>
						</div>
					</div>
				</form>
			</fieldset>

			<fieldset id="NewPasswrd" disabled="true">
				<form action="" method="post" onsubmit="return cpValidateNewPassword()">
					<div class="row form-group">
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
						</div>
						<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
							<span>* </span><label>Enter New Password</label>
						</div>
						<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
							<input id="UsrNewPasswrd" name="UsrNewPasswrd" type="password" class="form-control" placeholder="Enter New Password" />
						</div>
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
						</div>
						<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
							<span>* </span><label>Re-Enter Password</label>
						</div>
						<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
							<input id="ReentrUsrNewPasswrd" name="ReentrUsrNewPasswrd" type="password" class="form-control" placeholder="Re-Enter New Password" />
						</div>
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<button name="sbmtNewPasswrd" type="submit" class="btn btn-primary">CHANGE PASSWORD</button>
						</div>
					</div>
				</form>
			</fieldset>
		</div>
	</center>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php
require("Footer.php");
if(isset($_POST["sbmtEml"]))
{
	$usrNm=$_POST["UsrName"];
	$rslt=FetchData("SELECT EntpSecQstn,EntpSecQstnAnsr FROM enterprise WHERE EntpEml='$usrNm';");
	if(mysqli_num_rows($rslt)>0)
	{
		while($row=mysqli_fetch_array($rslt))
		{
			$_SESSION["tmp"]=$usrNm;
			echo"<script>document.getElementById('Eml').disabled=true</script>";
			echo"<script>document.getElementById('SeqQstn').disabled=false</script>";
			echo"<script>document.getElementById('UsrSeqQstn').value='$row[0]'</script>";
		}
	}
	else
	{
		echo"<script>alert('User Could Not Be Found.')</script>";
	}
}

if(isset($_POST["sbmtSeqQstn"]))
{
	$qstnAnsr=$_POST["UsrSeqQstnAnswr"];
	$usrNm=$_SESSION["tmp"];
	$rslt=FetchData("SELECT EntpSecQstn,EntpSecQstnAnsr FROM enterprise WHERE EntpEml='$usrNm';");
	while($row=mysqli_fetch_array($rslt))
	{
		if($qstnAnsr==$row[1])
		{
			echo"<script>document.getElementById('SeqQstn').disabled=true</script>";
			echo"<script>document.getElementById('Eml').disabled=true</script>";
			echo"<script>document.getElementById('NewPasswrd').disabled=false</script>";
		}
		else
		{
			echo"<script>alert('Answer Did Not Match.')</script>";
		}
	}
}

if(isset($_POST["sbmtNewPasswrd"]))
{
	$newPaswrd=$_POST["UsrNewPasswrd"];
	$usrNm=$_SESSION["tmp"];
	AddUpdateDeleteData("UPDATE enterprise SET EntpPasswrd='$newPaswrd' WHERE EntpEml='$usrNm';");
	echo"<script>alert('Password Changed Successfully.')</script>";
	session_destroy();
	echo"<script>window.location.replace('http://localhost/E-Billing System/Signin.php');</script>";
}
?>
