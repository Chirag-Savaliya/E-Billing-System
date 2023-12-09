<?php
	session_start();
	require("DbConnection.php");
 	$prodctId=$_REQUEST["a"];
 	$entpId=$_SESSION["User"];
 	AddUpdateDeleteData("UPDATE products SET ProdctSttus=FALSE WHERE EntpId='$entpId' AND ProdctId='$prodctId';");
 	echo "<script>alert('Product Removed Successfully.')</script>";
 	echo"<script>window.location.replace('http://localhost/E-Billing System/Products.php');</script>";
?>