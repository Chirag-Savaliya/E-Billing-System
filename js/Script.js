function ManagePills(menu)
{
	var menus = document.getElementsByClassName("nav-link");
	var x;
	for(x=0; x<menus.length; x++)
	{
		menus[x].classList.remove("active");
	}
	document.getElementById(menu).classList.add("active");
}
function validateSignup()
{
	var rslt=false;
	if(document.getElementById("EntpName").value.length<1)
	{
		alert("Enterprise Name Must Not Be Empty.");
	}
	else if(!chkAplphabates(document.getElementById("EntpName").value))
	{
		alert("Enter Valid Enterprise Name.");
	}
	else if(document.getElementById("EntpAddrs").value.length<1)
	{
		alert("Enterprise Address Must Not Be Empty.");
	}
	else if(document.getElementById("EntpEml").value.length<1)
	{
		alert("Email Address Must Not Be Empty.");
	}
	else if(!chkEmail(document.getElementById("EntpEml").value))
	{
		alert("Enter Valid Email Address.");
	}
	else if(document.getElementById("EntpPass").value.length<1)
	{
		alert("Password Must Not Be Empty.");
	}
	else if(document.getElementById("EntpReentrPass").value.length<1)
	{
		alert("Re-Enter Your Password.");
	}
	else if(document.getElementById("EntpPass").value!=document.getElementById("EntpReentrPass").value)
	{
		alert("Password Did Not Match.");
	}
	else if(document.getElementById("EntpSeqQstn").value.length<1)
	{
		alert("Security Question Must Not Be Empty.");
	}
	else if(document.getElementById("EntpQstnAnsr").value.length<1)
	{
		alert("Security Question Answer Must Not Be Empty.");
	}
	else
	{
		if(document.getElementById("EntpContctNo").value.length>0)
		{
			if(document.getElementById("EntpContctNo").value.length!=10)
			{
				alert("Enter Valid Contact Number");
			}
			else if(!chkContactNumber(document.getElementById("EntpContctNo").value))
			{
				alert("Enter Valid Contact Number");
			}
			else
			{
				rslt=true;
			}
		}
		else
		{
			rslt=true;
		}
	}
	return rslt;
}
function chkAplphabates(str)
{
	var ptrn=/[A-Za-z0-9]/;
	var rslt=false;
	if(str.match(ptrn))
	{
		rslt=true;
	}
	return rslt;
}
function chkDigits(str)
{
	var ptrn=/^[0-9]+$/;
	var rslt=false;
	if(str.match(ptrn))
	{
		rslt=true;
	}
	return rslt;
}
function chkEmail(str)
{
	var ptrn=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var rslt=false;
	if(str.match(ptrn))
	{
		rslt=true;
	}
	return rslt;
}
function chkContactNumber(str)
{
	var rslt=false;
	if(str.length<1)
	{
		rslt=true;
	}
	else if(chkDigits(str))
	{
		rslt=true;
	}
	return rslt;
}
function validateSignin()
{
	var rslt=false;
	if(document.getElementById("UsrName").value.length<1)
	{
		alert("User Name Must Not Be Empty.");
	}
	else if(!chkEmail(document.getElementById("UsrName").value))
	{
		alert("Enter Valid User Name.");
	}
	else if(document.getElementById("UsrPasswrd").value.length<1)
	{
		alert("Password Must Not Be Empty.");
	}
	else
	{
		rslt=true;
	}
	return rslt;
}
function cpValidateEmail()
{
	var rslt=false;
	if(document.getElementById("UsrName").value.length<1)
	{
		alert("User Name Must Not Be Empty.");
	}
	else if(!chkEmail(document.getElementById("UsrName").value))
	{
		alert("Enter Valid User Name.");
	}
	else
	{
		rslt=true;
	}
	return rslt;
}
function cpValidateNewPassword()
{
	var rslt=false;
	if(document.getElementById("UsrNewPasswrd").value.length<1)
	{
		alert("Password Must Not Be Empty.");
	}
	else if(document.getElementById("ReentrUsrNewPasswrd").value.length<1)
	{
		alert("Re-Enter Password.");
	}
	else if(document.getElementById("UsrNewPasswrd").value!=document.getElementById("ReentrUsrNewPasswrd").value)
	{
		alert("Password Did Not Match.");
	}
	else
	{
		rslt=true;
	}
	return rslt;
}
function validateProducts()
{
	var rslt=false;
	if(document.getElementById("ProdName").value.length<1)
	{
		alert("Product Name Must Not Be Empty.");
	}
	else if(document.getElementById("ProdRt").value.length<1)
	{
		alert("Product Rate Must Not Be Empty.");
	}
	else if(!chkDigits(document.getElementById("ProdRt").value))
	{
		alert("Enter Valid Product Rate.");
	}
	else if(!chkDigits(document.getElementById("ProdGstRt").value))
	{
		alert("Enter Valid G.S.T Rate.");
	}
	else if(parseInt(document.getElementById("ProdGstRt").value)>28 || parseInt(document.getElementById("ProdGstRt").value)<0)
	{
		alert("G.S.T Rate Must Be Between 0 To 28.");
	}
	else if(document.getElementById("ProdStock").value.length<1)
	{
		alert("Product Stock Must Not Be Empty.");
	}
	else if(!chkDigits(document.getElementById("ProdStock").value))
	{
		alert("Enter Valid Product Stock.");
	}
	else
	{
		rslt=true;
	}
	return rslt;
}
function FetchProductDetails()
{
	var term=document.getElementById("srchProd").value;
	var req=new XMLHttpRequest();
	req.onreadystatechange=function()
	{
		if(req.readyState==4 && req.status==200)
		{
			var objProdcts=JSON.parse(req.responseText);
			document.getElementById("rsltProdcts").innerHTML="";
			if(objProdcts.length>0)
			{
				var tbl='';
				tbl+='<table class="table table-striped table-hover">';
				tbl+='<thead><tr>';
				tbl+='<th scope="col">Product Name</th><th scope="col">Rate</th><th scope="col">G.S.T Rate</th><th scope="col">Available Stock</th><th scope="col">ACTION</th>';
				tbl+='</tr></thead>';
				tbl+='<tbody>';
				for(i=0; i<objProdcts.length; i++)
				{
					tbl+='<tr>';
					tbl+='<td>'+objProdcts[i].ProdctName+'</td>';
					tbl+='<td>'+objProdcts[i].ProdctRt+'</td>';
					tbl+='<td>'+objProdcts[i].ProdctGstRt+'</td>';
					tbl+='<td>'+objProdcts[i].ProdctStock+'</td>';
					tbl+='<td><button id="'+objProdcts[i].ProdctId+'" type="button" class="btn btn-primary" onclick="FillProductDetails(this.id)">ADD TO CART</button></td>';
					tbl+='</tr>';
				}
				tbl+='</tbody></table>';
				document.getElementById("rsltProdcts").innerHTML=tbl;
			}
		}
	};
	if(term.length==0)
	{
		req.open("GET","SearchProducts.php?c=*",true);
	}
	else
	{
		req.open("GET","SearchProducts.php?c="+term,true);
	}
	req.send();
}
function FillProductDetails(v)
{
	var term=v;
	var req=new XMLHttpRequest();
	req.onreadystatechange=function()
	{
		if(req.readyState==4 && req.status==200)
		{
			var objProdcts=JSON.parse(req.responseText);
			document.getElementById("ProdId").value=objProdcts[0].ProdctId;
			document.getElementById("ProdName").value=objProdcts[0].ProdctName;
			document.getElementById("ProdRt").value=objProdcts[0].ProdctRt;
			document.getElementById("ProdGstRt").value=objProdcts[0].ProdctGstRt;
			document.getElementById("ProdStock").value=objProdcts[0].ProdctStock;
		}
	};
	req.open("GET","GetProductDetails.php?c="+term,true);
	req.send();
}
function validateCartProduct()
{
	var rslt=false;
	if(document.getElementById("ProdQunt").value.length<1)
	{
		alert("Prodcut Quantities Must Not Be Empty.");
	}
	else if(parseInt(document.getElementById("ProdStock").value)<0)
	{
		alert(document.getElementById("ProdQunt").value+" Products Currently Not Available In Stock.");
	}
	else if(parseInt(document.getElementById("ProdQunt").value)<=0)
	{
		alert("Product Quantities Must Be Greater Than 0.");
	}
	else
	{
		rslt=true;
	}
	return rslt;
}
function validateCustomerName()
{
	var rslt=false;
	if(document.getElementById("CustName").value.length<1)
	{
		alert("Customer Name Must Not Be Empty.");
	}
	else if(!document.getElementById("CustName").value.match(/^[A-Za-z]+$/))
	{
		alert("Enter Valid Customer Name.");
	}
	else
	{
		rslt=true;
	}
	return rslt;
}
function FetchProducts()
{
	var term=document.getElementById("srchProd").value;
	var req=new XMLHttpRequest();
	req.onreadystatechange=function()
	{
		if(req.readyState==4 && req.status==200)
		{
			var objProdcts=JSON.parse(req.responseText);
			document.getElementById("rsltProdcts").innerHTML="";
			if(objProdcts.length>0)
			{
				var tbl='';
				tbl+='<table class="table table-striped table-hover">';
				tbl+='<thead><tr>';
				tbl+='<th scope="col">Product Name</th><th scope="col">Rate</th><th scope="col">G.S.T Rate</th><th scope="col">Available Stock</th><th scope="col" colspan="2">ACTION</th>';
				tbl+='</tr></thead>';
				tbl+='<tbody>';
				for(i=0; i<objProdcts.length; i++)
				{
					tbl+='<tr>';
					tbl+='<td>'+objProdcts[i].ProdctName+'</td>';
					tbl+='<td>'+objProdcts[i].ProdctRt+'</td>';
					tbl+='<td>'+objProdcts[i].ProdctGstRt+'</td>';
					tbl+='<td>'+objProdcts[i].ProdctStock+'</td>';
					tbl+='<td><a href="EditProduct.php?a='+objProdcts[i].ProdctId+'"><button type="button" class="btn btn-primary">EDIT</button></a></td>';
					tbl+='<td><a href="DeleteProduct.php?a='+objProdcts[i].ProdctId+'"><button type="button" class="btn btn-primary">REMOVE</button></a></td>';
					tbl+='</tr>';
				}
				tbl+='</tbody></table>';
				document.getElementById("rsltProdcts").innerHTML=tbl;
			}
		}
	};
	if(term.length==0)
	{
		req.open("GET","LoadProducts.php?c=*",true);
	}
	else
	{
		req.open("GET","LoadProducts.php?c="+term,true);
	}
	req.send();
}
function ManageProfile()
{
	var rslt=false;
	if(document.getElementById("SbmtProfile").innerHTML=="EDIT PROFILE")
	{
		document.getElementById("SbmtProfile").innerHTML="UPDATE PROFILE";
		var txts=document.getElementsByClassName("profile");
		var x;
		for(x=0; x<txts.length; x++)
		{
			if(x!=3)
			{
				txts[x].removeAttribute("readonly");
			}
		}
	}
	else
	{
		if(validateSignup())
		{
			document.getElementById("SbmtProfile").innerHTML="EDIT PROFILE";
			rslt=true;
		}
	}
	return rslt;
}
function updateStock()
{
	var pid=document.getElementById("ProdId").value;
	var apc=document.getElementById("ProdStock").value;
	var npq=document.getElementById("ProdQunt").value;
	var req=new XMLHttpRequest();
	req.onreadystatechange=function()
	{
		if(req.readyState==4 && req.status==200)
		{
			 document.getElementById("ProdStock").value=req.responseText;
		}
	};
	req.open("GET","UpdateStock.php?upid="+pid+"&unpq="+npq,true);
	req.send();
}
function validateCart()
{
	var rslt=false;
	if(document.getElementById("ProdQunt").value.length<1)
	{
		alert("Prodcut Quantities Must Not Be Empty.");
	}
	else if(parseInt(document.getElementById("ProdStock").value)<=0)
	{
		alert("Product Currently Not Available In Stock.");
	}
	else if(parseInt(document.getElementById("ProdQunt").value)<=0)
	{
		alert("Product Quantities Must Be Greater Than 0.");
	}
	else if(parseInt(document.getElementById("ProdQunt").value)>parseInt(document.getElementById("ProdStock").value))
	{
		alert("Product Quantities Must Be Less Than Or Equal To Product Stock.");
	}
	else
	{
		rslt=true;
	}
	return rslt;
}