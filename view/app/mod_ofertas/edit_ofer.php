<?php
if(isset($_POST['submit'])){
	require('../../../controller/class/agent.classInt.php');
	$objagent=new agent;
	
	$id = htmlspecialchars(trim($_POST['idoferta']));
	$nom_product = htmlspecialchars(trim($_POST['nom_product']));
	$costo = htmlspecialchars(trim($_POST['costo']));
	$descuento = htmlspecialchars(trim($_POST['descuento']));
	$publicacion = htmlspecialchars(trim($_POST['publicacion']));
	$descrip = htmlspecialchars(trim($_POST['descrip']));
	$fech_ini = htmlspecialchars(trim($_POST['fech_ini']));
	$fech_fin = htmlspecialchars(trim($_POST['fech_fin']));
	$img = htmlspecialchars(trim($_POST['img']));
	$id_sucursales = htmlspecialchars(trim($_POST['chkinfo']));	
	
	if ( $objagent->edit_ofer($nom_product,$costo,$descuento,$publicacion,$descrip,$fech_ini,$fech_fin,$img,$id_sucursales,$id) == true){
			echo 'DATOS  GUARDADOS ¡CLICK EN ACEPTAR!';
			
	}else{
		echo 'SE PRODUJO UN ERROR , INTENTE NUEVAMENTE';
	}
	
}else{
	if(isset($_GET['idoferta'])){
		require('../../../controller/class/agent.classInt.php');
		$objagent=new agent;
		$consulta = $objagent->mostrar_ofer($_GET['idoferta']);
		$agent = mysql_fetch_array($consulta);
	?>

<script type="text/javascript">

function formReset()
{
document.getElementById("frmoferNuevo").reset();
}

$.validator.setDefaults({
	submitHandler: function() { 
	alert("Enviando");
	EditOfer(); return false
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
		'onComplete': function(event, queueID, fileObj,data) {
			//alert(fileObj.name);
			$('#img').after(document.frmoferNuevo.nimg.value=fileObj.name);
			$('#info').text(' Archivo cargado.');
			$('#imgUploader').hide();
			}
		
	});	
	
	
	
	$("#frmoferNuevo").validate({
	rules: {
		
		
			nom_product:  
			{
				required: true,
      			maxlength: 30,
				minlength:	1		
			},
		
			
			descrip:  
			{
				required: true,
      			maxlength: 200
							
			},
			fech_ini:  
			{
				required: true,
      			
							
			},
			fech_fin:  
			{
				required: true,
      			
							
			},
			nimg:  
			{
				required: true,
      			
							
			},
			
			},
		messages: {
			nom_product:
			{
				required: "*",
				minlength: "Mas de  5 Caracteres",
				maxlength:"No mas de 30 Caracteres"
			},
		
			descrip:
			{
				required: "*"
			},
			fech_ini:
			{
				required: "*"
			},
			fech_fin:
			{
				required: "*"
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
			url: 'view/app/mod_ofertas/consul_ofer.php',
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
			url: 'view/app/mod_ofertas/consul_ofer.php',
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
			url: 'view/app/mod_ofertas/consul_ofer.php',
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
		mode : "textaxreas",
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
    <td width="80" align="center"><a href="logout.php"><img src="view/admin/img/32x32/calendar.png" width="32" height="32" border="0"  /></a></td>
  </tr>
  <tr>
    <td align="center"><span id="cancelar1"><a href="#"><font color="#FFFFFF">Cerrar </font></a></span></td>
    <td align="center"><a href="logout.php"><font color="#FFFFFF">Panel </font></a></td>
  </tr>
</table>
    </div>
  </div>
   
<div style="padding-left: 20px;   padding-right: 20px;    padding-top: 3px; float:left; width:900px;"> 
<form class="cmxform" id="frmoferNuevo" style="position:relative;" name="frmoferNuevo" method="post" action="view/app/mod_ofertas/add_ofer.php" >
<br />
   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#333" size="+1">
    Oferta </font> <font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Nuevo</span>   
   <br /><br />
 <fieldset id="form" >
 <legend><span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">Datos Oferta</font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span></legend>
 <input type="hidden" name="idoferta" id="idoferta" value="<?php echo $agent['idoferta']?>" /><br />
  
 <table style="width:800px;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="165" align="center" valign="middle"><span class="variable" style=" font-size:11px;">Nombre del Producto</span> </td>
   <td width="99" align="center" valign="middle"><span class="variable" style=" font-size:11px;">Publicado</span>  </td>
       <td width="131" height="26" align="center" valign="middle"><span class="variable" style=" font-size:11px;">Fecha Inicio</span></td>
        <td width="134" align="center" valign="middle"><span class="variable" style=" font-size:11px;">Fecha Fin</span></td>
     
  </tr>
  <tr>
    <td width="165" align="center" valign="middle"><input type="text" name="nom_product"  class="required" id="nom_product" value="<?php echo $agent['nom_product']?>" /></td>
   <td align="center" valign="middle">
    <?php 
	if( $agent['publicacion'] == 1){?>
	<input type="checkbox" name="publicacion" id="publicacion" value="1" checked="checked"  size="6"/>
	<?php }else{?>
	<input type="checkbox" name="publicacion" id="publicacion" value="1"  size="6"/>
	<?php
		}
	?>
    </td>
    <td height="26" align="center" valign="middle"><input type="text" name="fech_ini"  class="required" id="fech_ini" value="<?php echo $agent['fecha_ini']?>" size="11" /></td>
    <td align="center" valign="middle"><input type="text" name="fech_fin" id="fech_fin"  class="required" value="<?php echo $agent['fecha_fin']?>" size="11" /></td>
   </tr>
  <tr>
    <td colspan="6"> <span class="variable" style=" font-size:11px;">Descripción del Producto</span><br />
      <textarea  cols="100" rows="4" name="descrip" id="descrip"  class="required" style="width:818px;"  >
      <?php echo $agent['descrip']?>
      </textarea>    </td>
    </tr>
  </table>

</fieldset >
  <fieldset id="form" >
   <legend><span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">Agregar Sucursal</font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span></legend>
   <?php // echo $combo;
   ?>
<div style="overflow-x: hidden; height:100px; overflow-y:scroll;">
   <table style="width:830px;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="165"><span class="variable" style=" font-size:11px; font-weight:bold;">Nombre de la Sucursal</span><br /></td>
    <td width="138" align="center" valign="middle"><span class="variable" style=" font-size:11px; font-weight:bold;">Direcci&oacute;n</span>
  </td>
    <td width="66" align="center" valign="middle"><span class="variable" style=" font-size:11px; font-weight:bold;">Zona</span>  </td>
    <td width="67" align="center" valign="middle"><span class="variable" style=" font-size:11px; font-weight:bold;">Seleccionar</span></td>
   </tr>
  <?php 
	$con=$objagent->consulta_sucur();
	$con2=$objagent->consulta_sucur();
	$temp = $agent['id_sucursales'];
	$idsucur = explode(',',$temp);
	
	 //echo $temp;
	$b=0;
	$temList ;
	if($con2) {
		$a=0;
		while( $check = mysql_fetch_array($con2) ){
			
			$temList[$a]="";
			for($r=0; $r<sizeof($idsucur);$r++ ){
			
			if($check['idsucursal']==$idsucur[$r]){
				$temList[$a]=$idsucur[$r];
				//echo "id_suc:".$check['idsucursal']."/entra".$idsucur[$a];
			}
				//echo $a;
				//echo "*dato",$temList[$a];
			}
			//echo $a;
			
		$a++;}
	}
	
	if($con) {
	while( $check = mysql_fetch_array($con) ){
		?>
        <tr>
        <td width="165"><?php echo  $check['nombre']?></td>
    <td align="center" valign="middle"><?php echo  $check['direccion']?></td>
    <td align="center" valign="middle"><?php echo  $check['zona']?></td>
    <td align="center" valign="middle">
    <?php 
		
       //$var = $idsucur[$b];
	   $var2 =$check['idsucursal'];
	  // echo $b;
	   //echo $var;
	  
		   
		 if(  $temList[$b] == $var2){
			 ?> <input name="chkinfo" id="chkinfo" type="checkbox" checked="checked"  value="<?php echo $var2;?>">
		<?php
			   }
		   else{
			   // $var = $temp;
				?>
         
        <input name="chkinfo" id="chkinfo" type="checkbox"  value="<?php echo $var2;?>">
		<?php
			   }
	   
	  // echo "$var *** $var2";
	   
	?>
   </td>
        
       </tr>  
        
	<?php 
		$b++;
		//$temp = $var;
		}
	}
	?> 
</table>
</div>
</fieldset>	

<fieldset id="form" >
<legend><span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">Imagen de Promoción</font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span></legend>
<input  name="img" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="img" type="file" size="50" value="" >
 <input size="50" type="hidden" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="nimg" name="nimg" value="<?php echo $agent['img']?>" />
 
 <div style=" width:830px; height:55px; position:relative;  float: left;">

 
 <div id="info" style="position:relative; width:315px; padding-top:13px; float:left;">
  <?php 
 if($agent['img'] != ""){
	 ?>
	 <img src="view/app/img/app_ofertas/min/thumb_<?php echo$agent['img'];?>" width="52" height="22" />
      <span class="variabletit" style="color:#666666"><font color="#FF0000"style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">
   <img src="view/admin/img/32x32/file.png" width="10" height="10" /> Archivo cargado </font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">imagen</span>
    
	 <?php
	 }?>
</div>
 <div id="custom-queue" class="uploadifyQueue" style="position:relative;height:55px; width:515px; float:left;"></div>
 </div>
</fieldset>	

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