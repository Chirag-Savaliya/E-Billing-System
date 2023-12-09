<?php
	$conn=mysqli_connect("localhost","Chirag","Chirag5184","e-billingsystem");
	function AddUpdateDeleteData($Qry)
	{
	 	$conn=mysqli_connect("localhost","Chirag","Chirag5184","e-billingsystem");
	 	mysqli_query($conn,$Qry);
	}
	function FetchData($Qry)
	{
		$conn=mysqli_connect("localhost","Chirag","Chirag5184","e-billingsystem");
		$rslt=mysqli_query($conn,$Qry);
		return $rslt;
	}
?>