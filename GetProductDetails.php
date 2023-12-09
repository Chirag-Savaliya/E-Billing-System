<?php 
  require("DbConnection.php");
  session_start();
  $entpId=$_SESSION["User"];
  $req=$_GET['c'];
    $Qry="SELECT ProdctId,ProdctName,ProdctRt,ProdctGstRt,ProdctStock FROM products WHERE EntpId='$entpId' AND ProdctSttus=TRUE AND ProdctId='$req'";
  $res=mysqli_query($conn,$Qry);
  $Prodctlst=[];
  while ($r=mysqli_fetch_array($res))
  {
   $Prodctlst[]=$r;
  }
  $jr=json_encode($Prodctlst);
  echo $jr;
?>