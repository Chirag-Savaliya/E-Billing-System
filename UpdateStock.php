<?php
session_start();
require("DbConnection.php");
$prodctId=$_REQUEST["upid"];
$avlblStock;
$newQuntity=$_REQUEST["unpq"];
$entpId=$_SESSION["User"];
$rslt=[];
$Qry="SELECT p.ProdctStock,c.Qntities FROM products p,cart c WHERE p.ProdctId=c.ProdctId AND p.ProdctId='$prodctId' AND c.ProdctId='$prodctId' AND p.EntpId='$entpId' AND c.EntpId='$entpId'";
$res=mysqli_query($conn,$Qry);
	while ($r=mysqli_fetch_array($res))
	{
		if(($r[1]-$newQuntity)>=0)
		{
			$avlblStock=$r[0]+($r[1]-$newQuntity);
		}
		else
		{
			$avlblStock=$r[0]-abs($r[1]-$newQuntity);
		}
	}
	echo $avlblStock;
?>