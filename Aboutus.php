<?php
require("Header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aboutus Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/Style.css">
	<script type="text/javascript" src="js/Script.js"></script>
</head>
<body onload="ManagePills('mnuAboutus')">
	<div class="card text-center" style="font-weight: bold;font-family: 'Times New Roman';font-size:20px">
		<div class="card-header">
			About Us
		</div>
		<div class="card-body">
			<h5 class="card-title" style="font-weight: bold;font-size: 25px;font-style: italic">What is E-Billing System ?</h5>
			<p class="card-text">An <span style="font-weight: bold;font-style: italic;color: blue">E-Billing System</span> is a web based application designed and developed by 
				<span style="font-weight: bold;font-style: italic;color: blue">Chirag Savaliya</span> as a project of <span style="font-weight: bold;font-style: italic;color: blue"> M.C.A Semester - 1</span>.This application is specially developed for <span style="font-weight: bold;font-style: italic;color: blue">Shopping Mall , Enterprise</span> or <span style="font-weight: bold;font-style: italic;color: blue">Shop</span> to generate an invoice with <span style="font-weight: bold;font-style: italic;color: blue">G.S.T</span> in their routine business.</p>
		</div>
		<div class="card-footer text-muted">
		</div>
	</div>
	<div class="row" style="font-family: 'Times New Roman';font-size:20px">
  <div class="col">
    <div class="card bg-primary text-white" style="margin:1%">
      <div class="card-body" style="margin-left: 35%">
        <h5 class="card-title" style="font-size: 25px;font-style: italic">Features of E-Billing System.</h5>
        <p class="card-text">	
        	<table>
        		<tbody>
        			<tr>
        				<td><img src="images/point.png" height="30px" width="30px" align="right"></td>
        				<td align="left">Product Management</td>
        			</tr>
        			<tr>
        				<td><img src="images/point.png" height="30px" width="30px" align="right"></td>
        				<td align="left">Cart System</td>
        			</tr>
        			<tr>
        				<td><img src="images/point.png" height="30px" width="30px" align="right"></td>
        				<td align="left">Stock Management</td>
        			</tr>
        			<tr>
        				<td><img src="images/point.png" height="30px" width="30px" align="right"></td>
        				<td align="left">Invoice Generation With G.S.T</td>
        			</tr>
        		</tbody>
        	</table>
        </p>
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