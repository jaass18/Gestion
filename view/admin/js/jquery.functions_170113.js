//-------------------------------------------------------------
function GetInfoString(){
		
	    var sData="";
        var iCount =0;
        iCount = $("input:chkinfo").length;
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
				alert("check  "+i);
	            if ($(this).is(":checked")) {
	                sData += "&chkinfo[]=" + $("input:chkinfo").value;
					
	            }
	        }
	    }          
	    
		return sData;
	}
function verdoc(id_documentos){	
$("#wait").show();
$.ajax({
			url: 'view/app/mod_documentos/edit_doc.php',
			type: "GET",
			data: "id_documentos="+id_documentos,
			success: function(datos){
				//ConsultaDatosMedios();
				//datos;
				$("#formulario").html(datos);
				$("#tabla").hide();
				$("#wait").hide();
			}
		});
		
		return false;
	}
function GrabarDatos_add_user(){
	
		var Nombre= $('#Nombre').attr('value');
		var a_paterno= $('#A_Paterno').attr('value');
		var a_materno= $('#A_Materno').attr('value');
		var depart = $('#Departamento').attr('value');
		var user = $('#Usuario').attr('value');
		var pass = $('#Password').attr('value');
		var veripass = $('#veripass').attr('value');
		var nivel = $('#T_Usuario').attr('value');
		
		//alert("El password es igual  &nombre="+nombre+"&user="+user+"&pass="+pass+"&nivel="+nivel);
		if(pass == veripass){
			//alert("El password es igual  &nombre="+nombre+"&user="+user+"&pass="+pass+"&nivel="+nivel);
		$.ajax({
			url: 'view/admin/mod_admin/add_user.php',
			type: "POST",
			data: "submit=&Nombre="+Nombre+"&A_Paterno="+a_paterno+"&A_Materno="+a_materno+"&Departamento="+depart+"&Usuario="+user+"&Password="+pass+"&T_Usuario="+nivel,
			success: function(datos){
				//ConsultaDatosMedios();
				alert(datos);
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		}else{alert("El password es diferente");}
		return false;
	}
	function GrabarDatos_add_Ofer(){
			
		var nom_product= $('#nom_product').attr('value');
		var costo = $('#costo').attr('value');
		var descuento = $('#descuento').attr('value');
		var publicacion = $('#publicacion').attr('value');
		var descrip = $('textarea#descrip').val();
		var fech_ini = $('#fech_ini').attr('value');
		var fech_fin = $('#fech_fin').attr('value');
		
		var img = $('#nimg').attr('value');
		//var chkinfo = $('#chkinfo').attr('value');
		//var ids = GetInfoString()
		var selectedItems = new Array();
		$("input:checkbox[name^='chkinfo']:checked").each(function(){
			selectedItems.push($(this).val());
		});
		
		var dia_de_hoy=new Date();	
		var Ffin = fech_fin.split("-");
			var yi=Ffin[0];
			var mi=Ffin[1];
			var di=Ffin[2];
			var fechaFinal = new Date(yi, mi, di);
			var Fini = fech_ini.split("-");
			var yf=Fini[0];
			var mf=Fini[1];
			var df=Fini[2];
			var fechaInicial = new Date(yf, mf, df);
        
		//alert(""+yf+"-"+mf+"-"+df+"/"+yi+"-"+mi+"-"+di+"" );
		
		if( fechaFinal > fechaInicial){

		if(img != ""){
			//alert("descrip  "+descrip);
		$.ajax({
			url: 'view/app/mod_ofertas/add_ofer.php',
			type: "POST",
			data: "submit=&nom_product="+nom_product+"&costo="+costo+"&descuento="+descuento+"&publicacion="+publicacion+"&descrip="+descrip+"&fech_ini="+fech_ini+"&fech_fin="+fech_fin+"&img="+img+"&chkinfo="+selectedItems,
			
			success: function(datos){
				//ConsultaDatosMedios();
				alert(datos);
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		}else{alert("No has seleccionado una imagen.\n");}
		}else{alert("La Fecha Final debe ser igual o posterior a la Fecha de Inicio.\n");}
		return false;
	}
	function GrabarDatos_add_doc(){	
		var para= $('#para').attr('value');
		var asunto = $('#asunto').attr('value');
		var elaboro = $('#elaboro').attr('value');
		var ref_doc = $('#ref_doc').attr('value');
		var firma = $('#firma').attr('value');
		var f_entrega = $('#f_entrega').attr('value');
		var tipos = $('#tipos').attr('value');
		var ori_copia = $('#ori_copia').attr('value');
			alert("js variable");
	
		$.ajax({
			url: 'view/app/mod_documentos/add_doc.php',
			type: "POST",
			data: "submit=&para="+para+"&asunto="+asunto+"&elaboro="+elaboro+"&ref_doc="+ref_doc+"&firma="+firma+"&f_entrega="+f_entrega+"&tipos="+tipos+"&ori_copia="+ori_copia,
			success: function(datos){
				//ConsultaDatosMedios();
				alert(datos);
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		
			return false;
	}

	function EliminarUsuario(iduser){
		var msg = confirm("Deseas eliminar este usuario ?")
		if ( msg ) {
			$.ajax({
				url: 'view/admin/mod_admin/del_user.php',
				type: "GET",
				data: "ID_Usuario="+iduser,
				success: function(datos){
					alert(datos);
					$("#fila-"+iduser).remove();
				}
			});
		}
		return false;
	}
	function EliminarDocumento(id_documentos){
		var msg = confirm("Deseas eliminar el Documento ?")
		if ( msg ) {
			$.ajax({
				url: 'view/app/mod_documentos/del_doc.php',
				type: "GET",
				data: "id_documentos="+id_documentos,
				success: function(datos){
					alert(datos);
					$("#fila-"+id_documentos).remove();
				}
			});
		}
		return false;
	}
	function EliminarOferta(idsoferta){
		var msg = confirm("Deseas eliminar esta Oferta ?")
		if ( msg ) {
			$.ajax({
				url: 'view/app/mod_ofertas/del_ofer.php',
				type: "GET",
				data: "idsoferta="+idsoferta,
				success: function(datos){
					alert(datos);
					$("#fila-"+idsoferta).remove();
				}
			});
		}
		return false;
	}
	
	function EditUser(){
			
		var ID_Usuario = $('#ID_Usuario').attr('value');
		var Nombre= $('#Nombre').attr('value');
		var a_paterno= $('#A_Paterno').attr('value');
		var a_materno= $('#A_Materno').attr('value');
		var depart = $('#Departamento').attr('value');
		var user = $('#Usuario').attr('value');
		var pass = $('#Password').attr('value');
		var veripass = $('#veripass').attr('value');
		var nivel = $('#T_Usuario').attr('value');
		
		if(pass == veripass){
		$.ajax({
			url: 'view/admin/mod_admin/edit_user.php',
			type: "POST",
			data: "submit=&ID_Usuario="+ID_Usuario+"&Nombre="+Nombre+"&A_Paterno="+a_paterno+"&A_Materno="+a_materno+"&Departamento="+depart+"&Usuario="+user+"&Password="+pass+"&T_Usuario="+nivel,
			success: function(datos){
				
				alert(datos);
				//ConsultaDatosMedio();
				$("#formulario").hide();
				$("#tabla").show();
			}
		});}else{alert("El password es diferente");}
		return false;
	}
	function EditDoc(){
		
		
		var id_documentos = $('#id_documentos').attr('value');
		var para = $('#para').attr('value');
		var asunto= $('#asunto').attr('value');
		var elaboro = $('#elaboro').attr('value');
		var ref_doc = $('#ref_doc').attr('value');
		var firma = $('#firma').attr('value');
		var f_entrega = $('#f_entrega').attr('value');
		var tipos = $('#tipos').attr('value');
		var ori_copia = $('#orig_copia').attr('value');
		
		
		$.ajax({
			url: 'view/app/mod_documentos/edit_doc.php',
			type: "POST",
			data: "submit=&id_documentos="+id_documentos+"&para="+para+"&asunto="+asunto+"&elaboro="+elaboro+"&ref_doc="+ref_doc+"&firma="+firma+"&f_entrega="+f_entrega+"&tipos="+tipos+"&ori_copia="+ori_copia,
			success: function(datos){
				
				alert(datos);
				//ConsultaDatosMedio();
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		
		return false;
	}
	
		function EditOfer(){
		
		var idoferta= $('#idoferta').attr('value');	
		var nom_product= $('#nom_product').attr('value');
		var costo = $('#costo').attr('value');
		var descuento = $('#descuento').attr('value');
		//var publicacion = $('#publicacion').attr('value');
		var checkeado=$('#publicacion').attr('checked');
		var descrip = $('textarea#descrip').val();
		var fech_ini = $('#fech_ini').attr('value');
		var fech_fin = $('#fech_fin').attr('value');
		var img = $('#nimg').attr('value');
		//var chkinfo = $('#chkinfo').attr('value');
		//var ids = GetInfoString()
		var selectedItems = new Array();
		$("input:checkbox[name^='chkinfo']:checked").each(function(){
			selectedItems.push($(this).val());
		});
		
		var publicacion = new Array();
		if(checkeado){
			$("input:checkbox[name^='publicacion']:checked").each(function(){
				publicacion.push($(this).val());
			});
		}else{
			publicacion.push(0);
			}
		//alert(selectedItems);
			var Ffin = fech_fin.split("-");
			var yi=Ffin[0];
			var mi=Ffin[1];
			var di=Ffin[2];
			var fechaFinal = new Date(yi, mi, di);
			var Fini = fech_ini.split("-");
			var yf=Fini[0];
			var mf=Fini[1];
			var df=Fini[2];
			var fechaInicial = new Date(yf, mf, df);
        
		//alert(""+yf+"-"+mf+"-"+df+"/"+yi+"-"+mi+"-"+di+"" );
		
		if( fechaFinal > fechaInicial){
		if(img != ""){
			//alert("descrip  "+descrip);
		$.ajax({
			url: 'view/app/mod_ofertas/edit_ofer.php',
			type: "POST",
			data: "submit=&nom_product="+nom_product+"&costo="+costo+"&descuento="+descuento+"&publicacion="+publicacion+"&descrip="+descrip+"&fech_ini="+fech_ini+"&fech_fin="+fech_fin+"&img="+img+"&chkinfo="+selectedItems+"&idoferta="+idoferta,
			
			success: function(datos){
				//ConsultaDatosMedios();
				alert(datos);
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		}else{alert("No has seleccionado una imagen");}
		}else{alert("La Fecha Final debe ser igual o posterior a la Fecha de Inicio.\n");}
		return false;
	}

//-------------------------------------------------------------
