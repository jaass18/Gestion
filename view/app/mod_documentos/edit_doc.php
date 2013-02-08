<?php
if(isset($_POST['submit'])){
	require('../../../controller/class/agent.classInt.php');
	$objagent=new agent;
	$id_documentos= htmlspecialchars(trim($_POST['id_documentos']));
	$para = htmlspecialchars(trim($_POST['para']));
	$asunto = htmlspecialchars(trim($_POST['asunto']));
	$elaboro = htmlspecialchars(trim($_POST['elaboro']));
	$ref_doc = htmlspecialchars(trim($_POST['ref_doc']));
	$firma = htmlspecialchars(trim($_POST['firma']));
	$f_entrega = htmlspecialchars(trim($_POST['f_entrega']));
	$tipos = htmlspecialchars(trim($_POST['tipos']));
	$ori_copia = htmlspecialchars(trim($_POST['ori_copia']));
	$status = htmlspecialchars(trim($_POST['status']));
	
	
	if ( $objagent->edit_doc($id_documentos,$para,$asunto,$elaboro,$ref_doc,$firma,$f_entrega,$tipos,$ori_copia, $status) == true){
			echo 'DATOS  GUARDADOS ¡CLICK EN ACEPTAR!';
			
	}else{
		echo 'SE PRODUJO UN ERROR , INTENTE NUEVAMENTE';
	}
	
}else{
	if(isset($_GET['id_documentos'])){
		
		require('../../../controller/class/agent.classInt.php');
		$objagent=new agent;
		$consulta = $objagent->mostrar_doc($_GET['id_documentos']);
		$agent = mysql_fetch_array($consulta);
	?>
   <script type="text/javascript">

function formReset()
{
document.getElementById("frmDocEdit").reset();
}

$.validator.setDefaults({
	submitHandler: function() { 
	EditDoc(); return false
	 }
});

$().ready(function() {
	$("#frmDocEdit").validate({
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
				required: "Inserte el numero de folio de correspondencia",
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
			url: 'view/app/mod_documentos/consul_doc.php',
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
			url: 'view/app/mod_documentos/consul_doc.php',
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
			url: 'view/app/mod_documentos/consul_doc.php',
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
    Administrar Usuarios </font> <font color="#FF0000" size="+2"> ]</font> </span>
       
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
<form class="cmxform" id="frmDocEdit" style="position:relative;" name="frmDocEdit" method="post" action="view/app/mod_documentos/edit_doc.php" >

   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#333" size="+1">
    Documento </font> <font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Editar</span>  <br />   
  
   <input type="hidden" name="id_documentos" id="id_documentos" value="<?php echo $agent['id_documentos']?>" /><br /><br />
   
   
   <span class="variable" style="font-size:11px;">Tipo de Documento</span><br />
<select name="tipos" id="tipos"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
          <?php if( $agent['tipos']== 0){ ?>
          <option value= "0" selected="selected">Carta</option>
          <option value= "1">Oficio</option>
          <option value= "2">Memorandum</option>
          <option value= "3">Circular</option>
          <option value= "4">Nota</option>							 
			<?php }
		   if( $agent['tipos']== 1){ ?>
          <option value= "0" >Carta</option>
          <option value= "1" selected="selected">Oficio</option>
          <option value= "2">Memorandum</option>
          <option value= "3">Circular</option>
          <option value= "4">Nota</option>							 
			<?php }
			 if( $agent['tipos']== 2){ ?>
          <option value= "0" >Carta</option>
          <option value= "1">Oficio</option>
          <option value= "2" selected="selected">Memorandum</option>
          <option value= "3">Circular</option>
          <option value= "4">Nota</option>							 
			<?php }
			 if( $agent['tipos']== 3){ ?>
          <option value= "0" >Carta</option>
          <option value= "1">Oficio</option>
          <option value= "2">Memorandum</option>
          <option value= "3" selected="selected">Circular</option>
          <option value= "4">Nota</option>							 
			<?php }
			 if( $agent['tipos']== 4){ ?>
          <option value= "0" >Carta</option>
          <option value= "1">Oficio</option>
          <option value= "2">Memorandum</option>
          <option value= "3">Circular</option>
          <option value= "4" selected="selected">Nota</option>							 
			<?php }?>
			 </select>
<br /><br />
<span class="variable" style=" font-size:11px;">Para</span><br />
            <input  name="para" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="para" type="text" size="50" value="<?php echo $agent['para']?>" > <br /><br />
      <span class="variable" style=" font-size:11px;">Asunto</span><br />
      <input  name="asunto" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="asunto" type="text" size="50" value="<?php echo $agent['asunto']?>" > <br /><br />
            <span class="variable" style=" font-size:11px;">Elaboró</span><br />
            
<input  name="elaboro" class="required" style="font-family:Arial;font-size:11px;font-stretch:narrower;" id="elaboro" type="text" size="50" value="<?php echo $agent['elaboro']?>" > <br /><br />
<!--
<span class="variable" style=" font-size:11px;">Referencia Documento</span><br />
            <input  name="ref_doc" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="ref_doc" type="text" size="50" value="<?php echo $agent['ref_doc']?>" > <br /><br />-->
            <span class="variable" style=" font-size:11px;">Firma</span><br />
            <input  name="firma" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="firma" type="text" size="50" value="<?php echo $agent['firma']?>" > <br /><br />
 
 <span class="variable" style="font-size:11px;">Fecha de Elaboraci&oacute;n</span><br />
            <input  name="f_entrega" class="required" disabled="disabled" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="f_entrega" type="text" size="10" value="<?php echo $agent['f_entrega']?>" ><br />

<span class="variable" style="font-size:11px;">Estatus del Documento</span><br />
<select name="status" id="status"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
			<?php if( $agent['status']== 0){ ?>
            <option value= "0" selected="selected" >En Revisi&oacute;n</option>
            <option value= "1"  >Activo</option>
			<option value= "2">Cancelado</option>							 
			<?php }
			if( $agent['status']== 1){ ?>
            <option value= "0">En Revisi&oacute;n</option>
            <option value= "1" selected="selected" >Activo</option>
			<option value= "2">Cancelado</option>							 
			<?php }
		 if( $agent['status']== 2){ ?> 
            <option value= "0" >En Revisi&oacute;n</option>
            <option value= "1">Activo</option>
            <option value= "2" selected="selected">Cancelado</option>
		<?php }?> 
      </select>
<br /><br />


<!--<span class="variable" style="font-size:11px;">Categoria del Documento</span><br />
<select name="ori_copia" id="ori_copia" size="5"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
                             <option value= "0">Original</option>
                             <option value= "1">Copia</option>
                             
                             
							
	  </select>
<br /><br />
-->


<p align="center">
  <input  onclick="formReset()" type="image" src="view/admin/img/limpiar.png" class="variable"  />
  <input class="variable" name="submit" id="submit" type="image" src="view/admin/img/guardar.png" />
  <input  class="variable" name="cancelar" id="cancelar" type="image" src="view/admin/img/cancelar.png"   />
  </p>
  
</form>
</div></div>
 
   <?php
	}
}
?>