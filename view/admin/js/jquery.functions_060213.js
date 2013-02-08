//-------------------------------------------------------------


	            //Julio codigo Personal
	            //==============================================================	
	function GrabarDatos_add_personal(){	
		var nombre= $('#nombre').attr('value');
		var id_ct = $('#id_ct').attr('value');
		var id_dep_ct = $('#id_dep_ct').attr('value');
		var a_paterno = $('#a_paterno').attr('value');
		var a_materno = $('#a_materno').attr('value');
		var curp = $('#curp').attr('value');
		var e_mail = $('#e_mail').attr('value');
		var id_puesto = $('#id_puesto').attr('value');
		var num_empleado = $('#num_empleado').attr('value');
		//alert("js variable");
	
		$.ajax({
			url: 'view/app/mod_personal/add_personal.php',
			type: "POST",
			data: "submit=&nombre="+nombre+"&id_ct="+id_ct+"&id_dep_ct="+id_dep_ct+"&a_paterno="+a_paterno+"&a_materno="+a_materno+"&curp="+curp+"&e_mail="+e_mail+"&id_puesto="+id_puesto+"&num_empleado="+num_empleado,
			success: function(datos){
				//ConsultaDatosMedios();
				alert(datos);
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		
			return false;
	}	

	
	
	   //Julio codigo Personal
	            //==============================================================	
	function EditPersonal(){
		
		
		var id_personal = $('#id_personal').attr('value');
		var nombre = $('#nombre').attr('value');
		var id_ct= $('#id_ct').attr('value');
		var id_dep_ct = $('#id_dep_ct').attr('value');
		var a_paterno = $('#a_paterno').attr('value');
		var a_materno = $('#a_materno').attr('value');
		var curp = $('#curp').attr('value');
		var e_mail = $('#e_mail').attr('value');
		var id_puesto = $('#id_puesto').attr('value');
		var num_empleado = $('#num_empleado').attr('value');
		
		
		$.ajax({
			url: 'view/app/mod_documentos/edit_personal.php',
			type: "POST",
			data: "submit=&id_personal="+id_personal+"&nombre="+nombre+"&id_ct="+id_ct+"&id_dep_ct="+id_dep_ct+"&a_paterno="+a_paterno+"&a_materno="+a_materno+"&curp="+curp+"&e_mail="+e_mail+"&id_puesto="+id_puesto+"&num_empleado="+num_empleado,
			success: function(datos){
				
				alert(datos);
				//ConsultaDatosMedio();
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		
		return false;
	}
	
		