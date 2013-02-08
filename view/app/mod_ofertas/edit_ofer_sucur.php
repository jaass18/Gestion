<?php

if(isset($_POST['submit'])){
	require('../../../controller/class/agent.classInt.php');
	$objagent=new agent;
	
	//$id = htmlspecialchars(trim($_POST['idsucursal']));
	$nom_product = htmlspecialchars(trim($_POST['nom_product']));
	$costo = htmlspecialchars(trim($_POST['costo']));
	$descuento = htmlspecialchars(trim($_POST['descuento']));
	$publicacion = htmlspecialchars(trim($_POST['publicacion']));
	$descrip = htmlspecialchars(trim($_POST['descrip']));
	$fech_ini = htmlspecialchars(trim($_POST['fech_ini']));
	$fech_fin = htmlspecialchars(trim($_POST['fech_fin']));
	$img = htmlspecialchars(trim($_POST['img']));
	$q=$_POST["q"];
	$chkinfo=@$_POST["chkinfo"] or exit("No Info Selected"); 
	
	foreach($chkinfo as $key){
		
			$id_sucur[]=$key;
		}
	$id_sucursales= implode(',',$id_sucur);
	

	
	
	if ( $objagent->insertar_ofer($nom_product,$costo,$descuento,$publicacion,$descrip,$fech_ini,$fech_fin,$img,$id_sucursales) == true){
			echo 'DATOS  GUARDADOS ¡CLICK EN ACEPTAR!';
			echo "INSERT INTO `indiga_geofertas`.`oferta` (`idoferta`, `nom_product`, `costo`, `descuento`, `descuento`, `publicacion`, `descrip`, `fech_ini`, `fech_fin`, `img`,`id_sucursales`) VALUES (NULL, '".$nom_product."', '$costo', '$descuento', '".$publicacion."', '".$descrip."', '".$fech_ini."', '".$fech_fin."', '".$img."', '".$id_sucursales."')";
			
	}else{
		echo 'SE PRODUJO UN ERROR , INTENTE NUEVAMENTE';
	}
	
}else{
	
		require('../../../controller/class/agent.classInt.php');
		$objagent=new agent;
		
		
		$consulta = $objagent->mostrar_sucur($_GET['idsucursal']);
		$agent = mysql_fetch_array($consulta);
		$sql= "SELECT * FROM sucursal order by idsucursal ";
$combo=$objagent->combo("combo_cusur","idsucursal",$_GET['idsucursal'],$sql,'verSucur(this.value)',"---- Seleccione Sucursal ----","enabled","idsucursal","nombre");

	?>
<script type="text/javascript">

function formReset()
{
document.getElementById("frmoferNuevo").reset();
}

$.validator.setDefaults({
	submitHandler: function() { 
	alert("Enviando");
	GrabarDatos_add_Ofer(); return false
	 }
});

$().ready(function() {
	
		$('#img').uploadify({
		'uploader'  : 'controller/class/jquery-uploader/uploadify.swf',
		'script'    : 'controller/class/jquery-uploader/uploader_ofer.php',
		'cancelImg' : 'controller/class/jquery-uploader/cancel.png',
		'multi' : true,
		'auto' : true,
		'fileExt' : '*.jpg;*.gif;*.png',
		'fileDesc' : 'Image Files (.JPG, .GIF, .PNG)',
		'queueID' : 'custom-queue',
		'queueSizeLimit' : 1,
		'simUploadLimit' : 1,
		'sizeLimit' : 102400,
		'removeCompleted': false, 
		'folder'    : 'view/app/img/app_ofertas/normal',
		'buttonImg'   : 'view/admin/img/selecc.png',
		'scriptData' : {'texto': $("#mitexto").val()},
		'onSelectOnce' : function(event,data) {
$('#info').text(data.filesSelected + ' archivos agregados .');
},
'onAllComplete' : function(event,data) {
$('#info').text(data.filesUploaded + ' archivos cargados, ' + data.errors + ' errores.');},

'onComplete': function(event, queueID, fileObj) {
			//alert(fileObj.name);
			$('#img').after(document.frmoferNuevo.nimg.value=fileObj.name);
			$('#imgUploader').hide();
			}
		
	});	
	
	
	
	$("#frmoferNuevo").validate({
	rules: {
			nombre:  
			{
				required: true,
      			maxlength: 30
							
			},
			razon_s:  
			{
				required: true,
      			maxlength: 50
							
			},
			zona:  
			{
				required: true,
      			maxlength: 20
							
			},
			dir:  
			{
				required: true,
      			maxlength: 120
							
			},
			x:  
			{
				required: true,
      			
							
			},
			y:  
			{
				required: true,
      			
							
			},
			nimg:  
			{
				required: true,
      			
							
			},
			
			},
		messages: {
			nombre:
			{
				required: "Ingresa el Nombre del Usuario",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 20 Caracteres"
			},
			razon_s:
			{
				required: "Ingresa la Razón Social",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 50 Caracteres"
			},
			zona:
			{
				
				maxlength:"No mas de 20 Caracteres"
			},
			dir:
			{
				required: "Ingresa la Dirección",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 120 Caracteres"
			},
			x:
			{
				required: "Mueve el Pin para ubicar Direccion"
			},
			y:
			{
				required: "Mueve el Pin para ubicar Direccion"
			},
			nimg:
			{
				required: "Selecciona una imagen"
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
			url: 'view/admin/mod_admin/mod_users.php',
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
			url: 'view/admin/mod_admin/mod_users.php',
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
			url: 'view/admin/mod_admin/mod_users.php',
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
			url: 'view/app/mod_ofertas/mod_ofer.php',
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
			url: 'view/app/mod_ofertas/mod_ofer.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	
	
});

jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy-mm-dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
           $("#fech_ini").datepicker();
        });
		$(document).ready(function() {
           $("#fech_fin").datepicker();
        });
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "simple",
		skin : "default",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<div>

<div style="background-color: #444444;height: 60px;padding-left: 20px;padding-right: 20px;padding-top: 20px;">
  <div style="width:60%; float:left; padding-top: 10px;"> <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#fff" size="+1">
    Administrar Ofertas </font> <font color="#FF0000" size="+2"> ]</font> </span>
       
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

<form class="cmxform" id="frmoferNuevo" style="position:relative;" name="frmoferNuevo" method="post" action="view/app/mod_ofertas/add_ofer.php" >

<br />
   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#333" size="+1">
    Oferta </font> <font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Nuevo</span>  <br />   
   <br />
 		
 <fieldset id="form" >
 <legend><span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">Datos Oferta</font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span></legend>
  
 <table style="width:800px;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="165" rowspan="2"><span class="variable" style=" font-size:11px;">Nombre del Producto</span><br />
    <input type="text" name="nom_product" id="nom_product" value="" />
    </td>
    <td width="138" align="center" valign="middle"><span class="variable" style=" font-size:11px;">Costo </span>
  </td>
    <td width="133" align="center" valign="middle"><span class="variable" style=" font-size:11px;">Descuento</span>  </td>
    <td width="99" align="center" valign="middle"><span class="variable" style=" font-size:11px;">Publicado</span>  </td>
       <td width="131" height="26" align="center" valign="middle"><span class="variable" style=" font-size:11px;">Fecha Inicio</span></td>
        <td width="134" align="center" valign="middle"><span class="variable" style=" font-size:11px;">Fecha Fin</span></td>
     
  </tr>
  <tr>
    <td align="center" valign="middle"><input type="text" name="costo" id="costo" value="" size="6" /></td>
    <td align="center" valign="middle"><input type="text" name="descuento" id="descuento" value="" size="6"/></td>
    <td align="center" valign="middle"><input type="checkbox" name="publicacion" id="publicacion" value="" size="6"/></td>
    <td height="26" align="center" valign="middle"><input type="text" name="fech_ini" id="fech_ini" value="" size="11" /></td>
    <td align="center" valign="middle"><input type="text" name="fech_fin" id="fech_fin" value="" size="11" /></td>
   </tr>
  <tr>
    <td colspan="6"> <span class="variable" style=" font-size:11px;">Descripción del Producto</span><br />
      <textarea  cols="100" rows="4" name="descrip" id="descrip" value="" />    </td>
    </tr>
  </table>

</fieldset >
  <fieldset id="form" >
   <legend><span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">Agregar Sucursal</font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span></legend>
   <?php // echo $combo;
   ?>
   <br />
 <?php 
	$con=$objagent->consulta_sucur();
	if($con) {
	while( $check = mysql_fetch_array($con) ){
		echo  $check['nombre']?><input name="chkinfo" type="checkbox"  value="<?php echo $check['idsucursal']?>">
	<?php 
	}
	?> 
<!-- 
<table style="width:400px;"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle">
    <img src="view/app/img/min/thumb_<?php echo $agent['img']?>"  align="left" />  
    </td>
    <td align="left">
    <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Nombre</span>
    <span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> <?php echo $agent['nombre']?> </font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span> <br />
     <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Razón Social</span>
     <span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"><?php echo $agent['razon_s']?> </font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span> <br />
    <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Dirección</span>
     <span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> <?php echo $agent['direccion']?> </font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span> <br />
     <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Zona</span>
     <span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> <?php echo $agent['zona']?> </font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span> <br />
<span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Ubicación (X,Y)</span><span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:8px;"><?php echo $agent['coordenada_x']?>,<?php echo $agent['coordenada_y']?></font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span><br />
     </td>
  </tr>
  </table>
-->
</fieldset>	

<fieldset id="form" >
<legend><span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">Imagen de Promoción</font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span></legend>
<input  name="img" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="img" type="file" size="50" value="" >
 <input size="50" type="hidden" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="nimg" name="nimg" value="<?php echo $agent['img']?>" />
 <input type="hidden" size="25" name="mensaje" id="mitexto"  />
 <div style=" width:830px; height:55px; position:relative;  float: left;">
 <div id="info" style="position:relative; width:315px;height:55px; padding-top:13px; float:left;"><span class="variabletit" style="color:#666666"><font color="#FF0000"style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">
    Estado </font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">imagen</span></div>
 <div id="custom-queue" class="uploadifyQueue" style="position:relative;height:55px; width:515px; float:left;"></div>
 </div>
</fieldset>	

<p align="center">
  <input  onclick="formReset()" class="variable" type="button" style="text-transform:uppercase; font-family:Arial;font-size:11px;	font-stretch:narrower;" value="Limpiar Campos" />
    <input type="submit"class="variable" name="submit" id="button" value="Guardar Informaci&oacute;n" style="text-transform:uppercase; font-family:Arial;font-size:11px;	font-stretch:narrower;" />
    <label></label>
    <input type="button" class="variable" name="cancelar" id="cancelar" style="text-transform:uppercase; font-family:Arial;font-size:11px;	font-stretch:narrower;" value="Cancelar"  />
  </p>
    
</form>
</div></div>
 
   <?php 
	}
}
?>