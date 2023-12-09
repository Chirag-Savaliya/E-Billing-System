<?php
	session_start();
	require("DbConnection.php");
 	$prodctId=$_REQUEST["a"];
 	$entpId=$_SESSION["User"];
 	$Qry="UPDATE products INNER JOIN cart ON products.ProdctId=cart.ProdctId SET products.ProdctStock=products.ProdctStock+cart.Qntities WHERE products.ProdctId='$prodctId' AND products.EntpId='$entpId' AND cart.EntpId='$entpId';";
	AddUpdateDeleteData($Qry);
 	AddUpdateDeleteData("DELETE FROM cart WHERE EntpId='$entpId' AND ProdctId='$prodctId';");
 	echo "<script>alert('Product Removed From Cart Successfully.')</script>";
 	echo"<script>window.location.replace('http://localhost/E-Billing System/Generatebill.php');</script>";
?>