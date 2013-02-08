<?php 
require('../../../controller/class/agent.classInt.php');
$objagent=new agent;
	
if(isset($_POST['submit'])){
	
	$usuario = htmlspecialchars(trim($_POST['usuario']));
	$attachment = htmlspecialchars(trim($_POST['attachment']));
	$anexos = htmlspecialchars(trim($_POST['anexos']));
	$asunto = htmlspecialchars(trim($_POST['asunto']));
	$id_firmante = htmlspecialchars(trim($_POST['id_firmante']));
	$id_turno = htmlspecialchars(trim($_POST['id_turno']));
	$clase = htmlspecialchars(trim($_POST['clase']));
	$referencia = htmlspecialchars(trim($_POST['referencia']));
	$t_documento = htmlspecialchars(trim($_POST['t_documento']));
	$f_documento = htmlspecialchars(trim($_POST['f_documento']));
	$f_recepcion = htmlspecialchars(trim($_POST['f_recepcion']));
	$id_area = htmlspecialchars(trim($_POST['id_area']));
	$id_cargo = htmlspecialchars(trim($_POST['id_cargo']));
	
	//echo "$pass";
	
	//$image = strtolower($nombre_m."_".$tipo_m.".jpg");
	//copy("/home/cesar/public_html/pri_campanas/webapp/eventos/agregar_medios/image/medios.jpg", "/home/cesar/public_html/pri_campanas/webapp/eventos/agregar_medios/image/".$image);
	//echo "INSERT INTO correspondencia (usuario, attachment, anexos, asunto, id_firmante, id_turno, clase, referencia, t_documentos, f_documento, f_recepcion, id_area, id_cargo) VALUES (NULL, '".$usuario."', '".$attachment."', '".$anexos."', '".$asunto."', '".$id_firmante."', '".$id_turno."', '".$clase."', '".$referencia."', '".$t_documento."', '".$f_documento."', '".$f_recepcion."', '".$id_area."', '".$id_cargo."')";
	if($objagent){
		if ( $objagent->insertar_corr($usuario,$attachment,$anexos,$asunto,$id_firmante,$id_turno,$clase,$referencia, $t_documento, $f_documento, $f_recepcion,$id_area,$id_cargo) == true){
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
document.getElementById("frmCorrNuevo").reset();
}

$.validator.setDefaults({
	submitHandler: function() { 
	alert("Enviando");
	GrabarDatos_add_corr(); return false;
	 }
});

$().ready(function() {
	$("#frmCorrNuevo").validate({
	rules: {
			f_documento:  
			{
				required: true,
      			maxlength: 8
							
			},
			referencia:  
			{
				required: true,
      			maxlength: 60
							
			},
			asunto:  
			{
				required: true,
      			maxlength: 100
							
			},
			
			
			},
		messages: {
			f_documento:
			{
				required: "Ingresa la fecha del documento",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 8 Caracteres"
			},
			referencia:
			{
				required: "Ingresa la referencia fisica del documento",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 60 Caracteres"
			},
			asunto:
			{
				required: "Inserte el asunto del documento",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 100 Caracteres"
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
			url: 'view/app/mod_correspondencia/mod_corr.php',
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
			url: 'view/app/mod_correspondencia/mod_corr.php',
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
			url: 'view/app/mod_correspondencia/mod_corr.php',
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
			url: 'view/app/mod_correspondencia/mod_corr.php',
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
			url: 'view/app/mod_correspondencia/mod_corr.php',
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
    Administrar Correspondencia </font> <font color="#FF0000" size="+2"> ]</font> </span>
       
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
<form class="cmxform" id="frmCorrNuevo" style="position:relative; overflow: auto;" name="frmCorrespondenciaNuevo" method="post" action="view/app/mod_correspondencia/add_corr.php" >

   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font></span><span class="variabletit"><font color="#333" size="+1">Correspondencia</font></span><span class="variabletit" style="color:#666666"><font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Nuevo</span>  <br /><br /><br />
    
<table width="100%" border="0">
          <tr>
            <td width="46%" class="headerSortdesc">
            	<span class="variable" style="font-size:11px;">Fecha de Recepci&oacute;n:&nbsp;&nbsp;</span>
    <input  name="f_recepcion" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="f_recepcion" type="text" size="10" disabled="disabled" value="<?php echo date("Y-m-d");?>" >
            </td>
            <td width="54%">
            	<span class="variable" style=" font-size:11px;">Referencia:</span>
    <input  name="referencia" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="referencia" type="text" size="50" > </td>
          </tr>
          <tr>
            <td>
            	<span class="variable" style="font-size:11px;">Fecha del Documento</span>
    <input  name="f_documento" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="f_documento" type="text" size="10" value="<?php echo date("Y-m-d");?>" >
          </td>
            <td><span class="variable" style="font-size:11px;">	Dirigido a:&nbsp;</span>
              <input  name="id_turno" class="id_turno" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="asunto" type="text" size="50" value="" > </td>
          </tr>
       
          <tr>
           <td> <span class="variable" style="font-size:11px;">Tipo de Documento</span>
    <select name="t_documento" id="t_documento"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
      <option value= "0">Carta</option>
      <option value= "1">Oficio</option>
      <option value= "2">Memorandums</option>
      <option value= "3">Circulares</option>
      <option value= "4">Notas</option>
      
      
    </select></td>
            <td><span class="variable" style="font-size:11px;">Firmante:&nbsp;&nbsp;</span>
    <input  name="id_firmante" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="id_firmante" type="text" size="50" value="" > </td>
          </tr>
          <tr>
           <td><span class="variable" style="font-size:11px;">Tipo de Documento</span>
    <select name="clase" id="clase"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
      <option value= "0">Original</option>
      <option value= "1">Copia</option>
      
      
      
    </select></td>
            <td> <span class="variable" style="font-size:11px;">Anexos:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
    <input  name="anexos" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="anexos" type="text" size="50" value="" > </td>
          </tr>
          
          <tr>
          
            
            <td colspan="2">
           </td>
          </tr>
          <tr>
            <td height="33" colspan="2">
             <span class="variable" style="font-size:11px;">Area Remitente</span>
    <input  name="id_area" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="id_area" type="text" size="50" value="" >
            </td>
          </tr>
          <tr>
            <td colspan="2">
           <span class="variable" style="font-size:11px;">Cargo</span>
    <input  name="id_cargo" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="id_cargo" type="text" size="50" value="" >
           </td>
          </tr>
          <tr>
            <td colspan="2">
           	  <span class="variable" style="font-size:11px;">Asunto</span><br />
    <textarea name="asunto" cols="50" rows="10" class="required" id="asunto" style="font-family:Arial;font-size:11px;	font-stretch:narrower;"></textarea> 
           	</td>
          </tr>
          <tr>
            <td colspan="2">
            <span class="variable" style="font-size:11px;">Documento Electronico</span><br />
    <input  name="attachment" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="attachment" type="text" size="50" value="" > <br />
    <label for="agregar"></label>
    <input type="button" name="agregar" id="agregar" value="Agregar" />
    <input type="submit" name="eliminar" id="eliminar" value="Eliminar" />
            </td>
          </tr>
          
          <tr>
            <td>
              	<span class="variable" style="font-size:11px;">Elaboró</span><br />
    <input  name="usuario" type="text" disabled="disabled" class="required" id="usuario" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" value="<?php echo $userl;?>" size="50" > 
            </td>
            <td>
            	
            </td>
          </tr>
        
        </table>
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