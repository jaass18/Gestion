	var xmlHttp

	function ShowInfo(){ 
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null){
			alert ("Browser does not support HTTP Request")
			return
		} 

		ShowPendingImage();
		var url="getinfo.php";
		url=url+"?q=getinfo"+GetInfoString();
		xmlHttp.onreadystatechange=stateChanged
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
	
	}

	function GetInfoString(){
		
	    var sData="";
        var iCount =0;

        iCount = myform.elements.namedItem("chkinfo").length;
        if(iCount>>0){
	        for(i=0;i<iCount;i++){
	            //===========================================================================
	            // This Logic Is Compatible With IE browser but most not compatible for Other 
	            //===========================================================================
	            //if (myform.elements.namedItem("chkinfo[]","")(i).checked){
	            //sData += "&chkinfo[]=" +  myform.elements.namedItem("chkinfo[]","")(i).value;
	            //}
	            
	            //==============================================================
	            //Replace With This New Logic:  has been Tested In IE And Chrome
	            //==============================================================
	            if (myform.chkinfo[i].checked) {
	                sData += "&chkinfo[]=" + myform.chkinfo[i].value;
	            }
	        }
	    }         
	    
		return sData;
	}
	
	function stateChanged(){ 
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
			document.getElementById("show_info").innerHTML=xmlHttp.responseText 
		} 
	}
	
	function GetXmlHttpObject(){
		var xmlHttp=null;
		try
			{
			// Firefox, Opera 8.0+, Safari
			xmlHttp=new XMLHttpRequest();
			}
		catch (e)
			{
				// Internet Explorer
			try
				{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				}
			catch (e)
				{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
			}

		return xmlHttp;
	}

	function ShowPendingImage(){
		document.getElementById("show_info").innerHTML="<image src=bigrotation2.gif>Please Wait!</image>";
	}

	function HidePendingImage(){
		document.getElementById("show_info").innerHTML="";
	}
