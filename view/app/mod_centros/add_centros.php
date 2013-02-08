<?php 
require('../../../controller/class/agent.classInt.php');
$objagent=new agent;
	
if(isset($_POST['submit'])){
	
	$clave_ct = htmlspecialchars(trim($_POST['clave_ct']));
	$sim_ct = htmlspecialchars(trim($_POST['sim_ct']));
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$direccion = htmlspecialchars(trim($_POST['direccion']));
	$tel = htmlspecialchars(trim($_POST['tel']));
	$email = htmlspecialchars(trim($_POST['email']));
	$web = htmlspecialchars(trim($_POST['web']));
	
	
	
	
	//echo "$pass";
	
	//$image = strtolower($nombre_m."_".$tipo_m.".jpg");
	//copy("/home/cesar/public_html/pri_campanas/webapp/eventos/agregar_medios/image/medios.jpg", "/home/cesar/public_html/pri_campanas/webapp/eventos/agregar_medios/image/".$image);
	//echo "INSERT INTO user (iduser,nombre,user,pass,nivel) VALUES (null,'".$nombre."', '".$user."','".$pass."',".$nivel.")";
	if($objagent){
		if ( $objagent->insertar_centro($clave_ct,$sim_ct,$nombre,$direccion,$tel,$email,$web) == true){
	echo 'DATOS  GUARDADOS ¡CLICK EN ACEPTAR!';
	}else{
		echo 'SE PRODUJO UN ERROR , INTENTE NUEVAMENTE';
		}
		}else{echo "SE PRODUJO UN ERROR , INTENTE NUEVAMENTE";}
	}else{
?>
<script type="text/javascript">

function formReset()
{
document.getElementById("frmCentroNuevo").reset();
}

$.validator.setDefaults({
	submitHandler: function() { 
	alert("Enviando");
	GrabarDatos_add_Centro(); return false
	 }
});

			
		
	
	$("#frmCentroNuevo").validate({
	rules: {
			nombre:  
			{
				required: true,
      			maxlength: 60
							
			},
			clave_ct:  
			{
				required: true,
      			maxlength: 5							
			},
			sim_ct:  
			{
				required: true,
      			maxlength: 5
							
			},
			direccion:  
			{
				required: true,
      			maxlength: 120
							
			},
			
			},
		messages: {
			nombre:
			{
				required: "Ingresa el Nombre del Centro de Trabajo",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 60 Caracteres"
			},
			clave_ct:
			{
				required: "Ingresa la Clave Numerica del Centro de Trabajo",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 5 Caracteres"
			},
			sim_ct:
			{
				
				required: "Ingresa la Clave del Centro de Trabajo",
				maxlength:"No mas de 5 Caracteres"
			},
			direccion:
			{
				required: "Ingresa la Dirección de Centro de Trabajo",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 120 Caracteres"
			},
			
			}
	});
	$("#atras a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'medios/mod_medios.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	
	$("#cancelar").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_centros/mod_centros.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#cancelar0").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_centros/mod_centros.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#cancelar1").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_centros/mod_centros.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
		$("#cancelar2").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_centros/mod_centros.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#cancelar3").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_centros/mod_centros.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	
	
	




</script>

<div>

<div style="background-color: #444444;height: 60px;padding-left: 20px;padding-right: 20px;padding-top: 20px;">
  <div style="width:60%; float:left; padding-top: 10px;"> <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#fff" size="+1">
    Administrar </font></span><span class="variabletit"><font color="#fff" size="+1">Centros de Trabajo</font></span><span class="variabletit" style="color:#666666">  <font color="#FF0000" size="+2"> ]</font> </span>
       
  <!-- <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Selecciona la acción a Realizar</span>--> 
   </div>
   <div style="width:40%; float:left;">
   <table width="120" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td width="80" align="center"><span id="cancelar0"><a href="#"><img src="view/admin/img/32x32/notification_error.png" width="32" height="32" border="0"  /></a></span></td>
    <td width="80" align="center"><span id="cancelar2"><a href="#"><img src="view/admin/img/32x32/calendar.png" width="32" height="32" border="0"  /></a></span></td>
  </tr>
  <tr>
    <td align="center"><span id="cancelar1"><a href="#"><font color="#FFFFFF">Cerrar </font></a></span></td>
    <td align="center"><span id="cancelar3"><a href="#"><font color="#FFFFFF">Panel </font></a></span></td>
  </tr>
</table>
    </div>
  </div>
   
<div style="padding-left: 20px;   padding-right: 20px;    padding-top: 3px; float:left; width:900px;"> 

<form class="cmxform" id="frmCentroNuevo" style="position:relative;" name="frmCentroNuevo" method="post" action="view/app/mod_centros/add_centros.php" >
  <div id="message"></div>
<br />
   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> </span><span class="variabletit">Centros de Trabajo
    </span><span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Nuevo</span>  <br />   
   <br />
<span class="variable" style=" font-size:11px;">Nombre Centro de Trabajo</span><br />
            <input  name="nombre" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="nombre" type="text" size="50" value="" > <br /><br />
<span class="variable" style="font-size:11px;">Numero de Centro de Trabajo</span><br />
            <input  name="clave_ct" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="clave_ct" type="text" size="50" value="" > <br /><br />
 <span class="variable" style=" font-size:11px;" onclick="showAddress();">Clave de Centro de Trabajo</span><br />
            <input  name="sim_ct" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="sim_ct" type="dir" size="50" value="" > <br /><br />
<span class="variable" style=" font-size:11px;">Direccion</span><br />
            <input  name="direccion" class="" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="direccion" type="text" size="50" value="" > <br /><br />
			
            
            <span class="variable" style=" font-size:11px;">Telefono</span><br />
 <input  name="tel" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="tel" type="text" size="50" value="" ><br /><br />
 
 <span class="variable" style=" font-size:11px;">E_mail</span><br />
  <input  name="email" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="email" type="text" size="50" value="" >
<br /><br />
<span class="variable" style=" font-size:11px;">Pagina Web</span><br />
 <input  name="web" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="web" type="text" size="50" value="" >
 <p align="center">
   <input  onclick="formReset()" type="image" src="view/admin/img/limpiar.png" class="variable"  />
  <input class="variable" name="submit" id="submit" type="image" src="view/admin/img/guardar.png" />
  <input  class="variable" name="cancelar" id="cancelar" type="image" src="view/admin/img/cancelar.png"   />
</p>
  
</form>

</div>

</div>

<?php
}
?> 