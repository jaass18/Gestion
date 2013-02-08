<?php
if(isset($_POST['submit'])){
	require('../../../controller/class/agent.classInt.php');
	
	$objagent=new agent;
	
	$id_corres= htmlspecialchars(trim($_POST['id_corres']));
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
	
	
	if ( $objagent->edit_doc($usuario,$attachment,$anexos,$asunto,$id_firmante,$id_turno,$clase,$referencia, $t_documento, $f_documento, $f_recepcion) == true){
			echo 'DATOS  GUARDADOS ¡CLICK EN ACEPTAR!';
			
	}else{
		echo 'SE PRODUJO UN ERROR , INTENTE NUEVAMENTE';
	}
	
}else{
	if(isset($_GET['id_corres'])){
		
		require('../../../controller/class/agent.classInt.php');
		$objagent=new agent;
		$consulta = $objagent->mostrar_corr($_GET['id_corres']);
		$agent = mysql_fetch_array($consulta);
	?>
   <script type="text/javascript">

function formReset()
{
document.getElementById("frmCorrEdit").reset();
}

$.validator.setDefaults({
	submitHandler: function() { 
	EditCorr(); return false
	 }
});

$().ready(function() {
	$("#frmCorrEdit").validate({
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
			url: 'view/app/mod_correspondencia/consul_corr.php',
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
			url: 'view/app/mod_correspondencia/consul_corr.php',
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
			url: 'view/app/mod_correspondencia/consul_corr.php',
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
    Administrar Correspondencia</font> <font color="#FF0000" size="+2"> ]</font> </span>
       
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
<form class="cmxform" id="frmCorrEdit" style="position:relative;" name="frmCorrEdit" method="post" action="view/app/mod_correspondencia/edit_corr.php" >

   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> </span><span class="variabletit">Correspondencia
     </span><span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Editar</span>  <br />   
  
   <input type="hidden" name="id_corres" id="id_corres" value="<?php echo $agent['id_corres']?>" /><br /><br />
   
       <span class="variable" style="font-size:11px;">Fecha de Recepci&oacute;n</span><br />
            <input  name="f_recepcion" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="f_recepcion" type="text" size="10" disabled="disabled" value="<?php echo date("Y-m-d");?>" > <br /><br />
            <span class="variable" style="font-size:11px;">Fecha del Documento</span><br />
      <input  name="f_documento" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="f_documento" type="text" size="10" value="<?php echo date("Y-m-d");?>" > <br /><br />


<span class="variable" style="font-size:11px;">Tipo de Documento</span><br />
 <select name="t_documento" id="t_documento"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;"><?php if( $agent['t_documento']== 0){ ?>
          <option value= "0" selected="selected">Carta</option>
          <option value= "1">Oficio</option>
          <option value= "2">Memorandum</option>
          <option value= "3">Circular</option>
          <option value= "4">Nota</option>							 
			<?php }
		   if( $agent['t_documento']== 1){ ?>
          <option value= "0" >Carta</option>
          <option value= "1" selected="selected">Oficio</option>
          <option value= "2">Memorandum</option>
          <option value= "3">Circular</option>
          <option value= "4">Nota</option>							 
			<?php }
			 if( $agent['t_documento']== 2){ ?>
          <option value= "0" >Carta</option>
          <option value= "1">Oficio</option>
          <option value= "2" selected="selected">Memorandum</option>
          <option value= "3">Circular</option>
          <option value= "4">Nota</option>							 
			<?php }
			 if( $agent['t_documento']== 3){ ?>
          <option value= "0" >Carta</option>
          <option value= "1">Oficio</option>
          <option value= "2">Memorandum</option>
          <option value= "3" selected="selected">Circular</option>
          <option value= "4">Nota</option>							 
<?php }
			 if( $agent['t_documento']== 4){ ?>
          <option value= "0" >Carta</option>
          <option value= "1">Oficio</option>
          <option value= "2">Memorandum</option>
          <option value= "3">Circular</option>
          <option value= "4" selected="selected">Nota</option>							 
			<?php }?>
	  </select>
<br /><br />
<span class="variable" style=" font-size:11px;">Referencia</span><br />
            <input  name="referencia" type="text" class="required" id="referencia" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" value="<?php echo $agent['referencia']?>" size="50" > <br /><br />
            
<span class="variable" style="font-size:11px;">Tipo de Documento</span><br />
<select name="clase" id="clase"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
                             <?php if( $agent['clase']== 0){ ?>
            <option value= "0" selected="selected" >Original</option>
            <option value= "1"  >Copia</option>						 
			<?php }
			if( $agent['clase']== 1){ ?>
            <option value= "0">Original</option>
            <option value= "1" selected="selected" >Copia</option>
								 
			<?php }?> 
      </select>
<br /><br />
           
<span class="variable" style="font-size:11px;">Dirigido a:</span><br />
            <input  name="id_turno" class="id_turno" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="asunto" type="text" size="50" value="<?php echo $agent['id_turno']?>" > <br /><br />
            
            <span class="variable" style="font-size:11px;">Area Remitente</span><br />
            <input  name="asunto" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="asunto" type="text" size="50" value="<?php echo $agent['id_turno']?>" > <br /><br />
            <span class="variable" style="font-size:11px;">Firmante</span><br />
            <input  name="id_firmante" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="id_firmante" type="text" size="50" value="<?php echo $agent['id_firmante']?>" > <br /><br />
            <span class="variable" style="font-size:11px;">Cargo</span><br />
            <input  name="asunto" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="asunto" type="text" size="50" value="<?php echo $agent['cargo']?>" > <br /><br />
      <span class="variable" style="font-size:11px;">Asunto</span><br />
            <textarea name="asunto" cols="50" class="required" id="asunto" style="font-family:Arial;font-size:11px;	font-stretch:narrower;"><?php echo $agent['asunto']?></textarea> 
            <br /><br />
            <span class="variable" style="font-size:11px;">Anexos</span><br />
            <input  name="anexos" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="anexos" type="text" size="50" value="<?php echo $agent['anexos']?>" > <br /><br />
            <span class="variable" style="font-size:11px;">Documento Electronico</span><br />
            <input  name="attachment" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="attachment" type="text" size="50" value="" > 
            <label for="agregar"></label>
            <input type="button" name="agregar" id="agregar" value="Agregar" />
            <input type="submit" name="eliminar" id="eliminar" value="Eliminar" />
            <br /><br />
            
<span class="variable" style="font-size:11px;">Elaboró</span><br />
            <input  name="usuario" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="usuario" type="text" size="50" value="<?php echo $agent['usuario']?>" > <br /><br />


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