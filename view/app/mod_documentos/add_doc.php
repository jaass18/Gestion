<?php 
require('../../../controller/class/agent.classInt.php');
$objagent=new agent;
	
if(isset($_POST['submit'])){
	
	$para = htmlspecialchars(trim($_POST['para']));
	$asunto = htmlspecialchars(trim($_POST['asunto']));
	$elaboro = htmlspecialchars(trim($_POST['elaboro']));
	$no_folio_asig = htmlspecialchars(trim($_POST['no_folio_asig']));
	$firma = htmlspecialchars(trim($_POST['firma']));
	$f_entrega = htmlspecialchars(trim($_POST['f_entrega']));
	$tipos = htmlspecialchars(trim($_POST['tipos']));
	$ori_copia = htmlspecialchars(trim($_POST['ori_copia']));
	$status = htmlspecialchars(trim($_POST['status']));
	//echo "$pass";
	
	//$image = strtolower($nombre_m."_".$tipo_m.".jpg");
	//copy("/home/cesar/public_html/pri_campanas/webapp/eventos/agregar_medios/image/medios.jpg", "/home/cesar/public_html/pri_campanas/webapp/eventos/agregar_medios/image/".$image);
	//echo "INSERT INTO documentos (para, asunto, elaboro, ref_doc, firma, f_entrega, tipos, ori_copia) VALUES (NULL, '".$para."', '".$asunto."', '".$elaboro."', '".$ref_doc."', '".$firma."', '".$f_entrega."', '".$tipos."', '".$ori_copia."')";
	if($objagent){
		if ( $objagent->insertar_doc($para,$asunto,$elaboro,$no_folio_asig,$firma,$f_entrega,$tipos,$ori_copia, $status) == true){
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
document.getElementById("frmDocNuevo").reset();
}

$.validator.setDefaults({
	submitHandler: function() { 
	alert("Enviando");
	GrabarDatos_add_doc(); return false;
	 }	 
});

$().ready(function() {
	$("#frmDocNuevo").validate({
	rules: {
			para:  
			{
				required: true,
      			maxlength: 60
							
			},
			asunto:  
			{
				required: true,
      			maxlength: 60
							
			},
			elaboro:  
			{
				required: true,
      			maxlength: 60
							
			},
			no_folio_asig:  
			{
				required: true,
      			
							
			},
			
			},
		messages: {
			para:
			{
				required: "Ingresa el Nombre de la Persona",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 60 Caracteres"
			},
			asunto:
			{
				required: "Ingresa el Asunto de Documento",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 60 Caracteres"
			},
			no_folio_asig:
			{
				required: "Inserte No de folio de correspondencia",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 60 Caracteres"
			},
			elaboro:
			{
				required: "Inserte la persona que lo Elaboro",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 60 Caracteres"
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
			url: 'view/app/mod_documentos/mod_doc.php',
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
			url: 'view/app/mod_documentos/mod_doc.php',
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
			url: 'view/app/mod_documentos/mod_doc.php',
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
			url: 'view/app/mod_documentos/mod_doc.php',
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
			url: 'view/app/mod_documentos/mod_doc.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	
});
</script>
<div>

<div style="background-color: #444444;height: 60px;padding-left: 20px;padding-right: 20px;padding-top: 20px;">
  <div style="width:60%; float:left; padding-top: 10px;"> <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#fff" size="+1">
    Administrar Documentos </font> <font color="#FF0000" size="+2"> ]</font> </span>
       
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
<form class="cmxform" id="frmDocNuevo" style="position:relative;" name="frmDocumentoNuevo" method="post" action="view/app/mod_documentos/add_doc.php" >

   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font></span><span class="variabletit"><font color="#333" size="+1">Documento</font></span><span class="variabletit" style="color:#666666"><font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Nuevo</span>  <br /><br /> 

<span class="variable" style="font-size:11px;">Tipo de Documento</span><br />
 <select name="tipos" id="tipos"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
                             <option value= "0">Carta</option>
                             <option value= "1">Oficio</option>
                             <option value= "2">Memorandums</option>
                             <option value= "3">Circulares</option>
                         <option value= "4">Notas</option>
                             
							
	  </select>
<br /><br />
<span class="variable" style=" font-size:11px;">Para</span><br />
            <input  name="para" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="para" type="text" size="50" > <br /><br />
<span class="variable" style="font-size:11px;">Asunto</span><br />
            <input  name="asunto" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="asunto" type="text" size="50" value="" > <br /><br />
<span class="variable" style="font-size:11px;">Elaboró</span><br />
            <input  name="elaboro" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="elaboro" type="text" size="50" value="<?php echo $userl;?>" > <br /><br />
<!--<span class="variable" style="font-size:11px;">Referencia del Documento</span><br />
            <input  name="ref_doc" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="ref_doc" type="text" size="50" value="" > <br /><br />-->
<span class="variable" style="font-size:11px;">Firma</span><br />
            <input  name="firma" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="firma" type="text" size="50" value="" > <br /><br />
            <span class="variable" style="font-size:11px;">Fecha de Elaboraci&oacute;n</span><br />
            <input  name="f_entrega" class="required" disabled="disabled" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="f_entrega" type="text" size="10"  value="<?php echo date("Y-m-d");?>"> <br /><br />
 <span class="variable" style="font-size:11px;">Estatus del Documento</span><br />
<select name="status" id="status"  class="required" disabled="disabled"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
          <option value= "0" selected="selected" >En Revisi&oacute;n</option>
			<option value= "1">Activo</option>
            <option value= "2">Cancelado</option>							 
	</select>
<br /><br />
<p align="center">
   <input  onclick="formReset()" type="image" src="view/admin/img/limpiar.png" class="variable"  />
  <input class="variable" name="submit" id="submit" type="image" src="view/admin/img/guardar.png" />
  <input  class="variable" name="cancelar" id="cancelar" type="image" src="view/admin/img/cancelar.png"   />
  </p>
  
</form>
</div></div>

<?php
}
?>