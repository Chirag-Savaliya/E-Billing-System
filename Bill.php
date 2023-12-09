<?php
require("Header.php");
require("DbConnection.php");
require("vendor/autoload.php");
$entpId=$_SESSION["User"];
$Qry="SELECT e.EntpName,e.EntpAddrs,e.EntpContctNo,e.EntpEml,b.BillId,b.BillDt,b.CustmrName FROM enterprise e,bill b WHERE e.EntpId=b.EntpId AND b.BillId=(SELECT MAX(b.BillId) FROM bill WHERE EntpId='$entpId');";
$rslt=FetchData($Qry);
$html='<div style="border: solid 1px">';
$html.='<table cellspacing="20" cellpadding="10" width="100%" style="font-weight:bold;border:1px solid">';
if(mysqli_num_rows($rslt)>0)
{
	while($row=mysqli_fetch_array($rslt))
	{
		$html.='<thead>';
		$html.='<tr align="center">';
		$html.='<th colspan="3">'.$row[0].'</th>';
		$html.='</tr>';
		$html.='</thead>';
		$html.='<tbody>';
		$html.='<tr>';
		$html.='<td>Address : '.$row[1].'</td>';
		$html.='<td>Contact No : '.$row[2].'</td>';
		$html.='<td>Email : '.$row[3].'</td>';
		$html.='</tr>';
		$html.='<tr>';
		$html.='<td>Customer Name : '.$row[6].'</td>';
		$html.='<td>Invoice Number : '.$row[4].'</td>';
		$html.='<td>Date : '.$row[5].'</td>';
		$html.='</tr>';
		$html.='</tbody></table>';
	}
}
$sum=0;
$Qry="SELECT p.ProdctId,p.ProdctName,c.Qntities,p.ProdctRt,p.ProdctGstRt FROM products p,cart c WHERE p.ProdctId=c.ProdctId AND p.EntpId='$entpId' AND c.EntpId='$entpId' AND p.ProdctSttus=TRUE";
$rslt=FetchData($Qry);
if(mysqli_num_rows($rslt)>0)
{
	$html.='<table class="table table-striped table-hover" cellspacing="20" cellpadding="10" style="border:1px solid;" width="100%">';
	$html.='<thead><tr>';
	$html.='<th scope="col">Product Name</th><th scope="col">Quantities</th><th scope="col">Rate</th><th scope="col">G.S.T Rate</th><th scope="col">Amount</th><th scope="col">G.S.T Amount</th><th scope="col">TOTAL</th>';
	$html.='</tr></thead><tbody>';
	while($row=mysqli_fetch_array($rslt))
	{
		$GstAmnt=(($row[2]*$row[3])*$row[4])/100;
		$Totl=($row[2]*$row[3])+(($row[2]*$row[3])*$row[4])/100;
		$sum+=$Totl;
		$html.='<tr>';
		$html.='<td>'.$row[1].'</td>';
		$html.='<td>'.$row[2].'</td>';
		$html.='<td>'.$row[3].'</td>';
		$html.='<td>'.$row[4].'</td>';
		$html.='<td>'.$row[2]*$row[3].'</td>';
		$html.='<td>'.$GstAmnt.'</td>';
		$html.='<td>'.$Totl.'</td>';
		$html.='</tr>';
	}
	$html.='<tr>';
	$html.='<td colspan="8" align="center" style="font-weight:bold">Total Amount : '.$sum.'</td>';
	$html.='</tr>';
	$html.='</tbody></table>';
}
$html.='</div>';
use Dompdf\Dompdf;
$dompdf=new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','landscape');
$dompdf->render();
ob_end_clean();
$dompdf->stream('abc',array('Attachment'=>0));
$Qry="DELETE FROM cart WHERE EntpId='$entpId';";
AddUpdateDeleteData($Qry);
?>