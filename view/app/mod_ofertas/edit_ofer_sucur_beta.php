<?php

if(isset($_POST['submit'])){
	require('../../../controller/class/agent.classInt.php');
	$objagent=new agent;
	
	$id = htmlspecialchars(trim($_POST['idsucursal']));
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$razon_s = htmlspecialchars(trim($_POST['razon_s']));
	$zona = htmlspecialchars(trim($_POST['zona']));
	$dir = htmlspecialchars(trim($_POST['dir']));
	$x = htmlspecialchars(trim($_POST['x']));
	$y = htmlspecialchars(trim($_POST['y']));
	$img = htmlspecialchars(trim($_POST['img']));
	
	
	if ( $objagent->edit_sucur($nombre,$razon_s,$dir,$zona,$x,$y,$img,$id) == true){
			echo 'DATOS  GUARDADOS ¡CLICK EN ACEPTAR!';
			
	}else{
		echo 'SE PRODUJO UN ERROR , INTENTE NUEVAMENTE';
	}
	
}else{
	if(!isset($_GET['idsucursal']))
	{require('../../../controller/class/agent.classInt.php');
		$objagent=new agent;
	 $sql= "SELECT * FROM sucursal order by idsucursal";
$combo=$objagent->combo("combo_cusur","idsucursal",$idsucursal,$sql,'verSucur(this.value)',"---- Seleccione Sucursal ----","enabled","idsucursal","nombre");
echo $combo;}
	else{
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
document.getElementById("frmUserEdit").reset();
}

$.validator.setDefaults({
	submitHandler: function() { 
	alert("Enviando");
	EditSucur(); return false
	 }
});

$().ready(function() {
	
		$('#img').uploadify({
		'uploader'  : 'controller/class/jquery-uploader/uploadify.swf',
		'script'    : 'controller/class/jquery-uploader/uploader.php',
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
		'folder'    : 'view/app/img/normal',
		'buttonImg'   : 'view/admin/img/selecc.png',
		'scriptData' : {'texto': $("#mitexto").val()},
		'onSelectOnce' : function(event,data) {
$('#info').text(data.filesSelected + ' archivos agregados .');
},
'onAllComplete' : function(event,data) {
$('#info').text(data.filesUploaded + ' archivos cargados, ' + data.errors + ' errores.');},

'onComplete': function(event, queueID, fileObj) {
			//alert(fileObj.name);
			$('#img').after(document.frmUserEdit.nimg.value=fileObj.name);
			$('#imgUploader').hide();
			}
		
	});	
	$("#frmUserEdit").validate({
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

<form class="cmxform" id="frmUserEdit" style="position:relative;" name="frmUserEdit" method="post" action="view/app/mod_sucursales/edit_sucur.php" >
<div id="map" style="width:300px; height:200px;clear: both;display: block; position:relative; float: right;height: 300px;
margin-right: 40px;margin-top: 15px;width: 400px;">
<script type="text/javascript">
//<![CDATA[

if (GBrowserIsCompatible()) {
var map = new GMap(document.getElementById("map")); map.addControl(new GLargeMapControl());

map.centerAndZoom(new GPoint(-98.21056365966797, 19.038189935576685), 6);
//map.addControl(new GMapTypeControl());
map.addControl(new GScaleControl());
//map.addControl(new GOverviewMapControl());
map.setMapType(G_NORMAL_MAP);
var point = new GPoint (<?php echo $agent['coordenada_x']?>,<?php echo $agent['coordenada_y']?>);
      var marker = new GMarker(point);
      map.addOverlay(marker);
      
      GEvent.addListener(map, "click", function (overlay,point){
         if (point){
            marker.setPoint(point);
			
			/*document.frmUserEdit.x.value=point.x
            document.frmUserEdit.y.value=point.y}*/
         }
      });
	  }
	 

//]]>
</script>
</div>
<br />
   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#333" size="+1">
    Oferta </font> <font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Nuevo</span>  <br />   
   <br />
 		
 <fieldset id="form" >
 <legend><span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">Datos Oferta</font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span></legend>
  
 <input type="hidden" name="idsucursal" id="idsucursal" value="<?php echo $agent['idsucursal']?>" />
 <table style="width:400px;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="2"><span class="variable" style=" font-size:11px;">Nombre del Producto</span><br />
    <input type="text" name="nom_product" id="nom_product" value="" />
    </td>
    <td align="center" valign="middle"><span class="variable" style=" font-size:11px;">Costo </span>
  </td>
    <td align="center" valign="middle"><span class="variable" style=" font-size:11px;">Descuento</span>  </td>
    <td align="center" valign="middle"><span class="variable" style=" font-size:11px;">Publicado</span>
  </td>
  </tr>
  <tr>
    <td align="center" valign="middle"><input type="text" name="costo" id="costo" value="" size="6" /></td>
    <td align="center" valign="middle"><input type="text" name="descuento" id="descuento" value="" size="6"/></td>
    <td align="center" valign="middle"><input type="checkbox" name="publicacion" id="publicacion" value="" size="6"/></td>
  </tr>
  <tr>
    <td> <span class="variable" style=" font-size:11px;">Descripción del Producto</span><br />
  <input type="text" name="descrip" id="descrip" value="" /></td>
    <td colspan="3"><table width="250" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="116" height="26" align="center" valign="middle"><span class="variable" style=" font-size:11px;">Fecha Inicio</span></td>
        <td width="115" align="center" valign="middle"><span class="variable" style=" font-size:11px;">Fecha Fin</span></td>
      </tr>
      <tr>
        <td height="26" align="center" valign="middle"><input type="text" name="costo" id="costo" value="" size="6" /></td>
        <td align="center" valign="middle"><input type="text" name="costo" id="costo" value="" size="6" /></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td><span class="variable" style=" font-size:11px;">X</span><br />
 <input  name="x" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="x" type="text" size="30" value="<?php echo $agent['coordenada_x']?>" readonly="readonly"  disabled="disabled"></td>
    <td colspan="3"><span class="variable" style=" font-size:11px;">Y</span><br />
 <input  name="y" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="y" type="text" size="30" value="<?php echo $agent['coordenada_y']?>" readonly="readonly"  disabled="disabled"></td>
  </tr>
  <tr>
    
  </tr>
</table>

</fieldset >
  <fieldset id="form" >
   <legend><span class="variabletit" style="color:#666666"><font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">[ </font> <font color="#333" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;">Datos Sucursal</font> <font color="#FF0000" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:11px;"> ]</font> </span></legend>
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
<span class="variable" style=" font-size:11px;">Imagen de Promoción</span><br />
<input  name="img" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="img" type="file" size="50" value="" >
 <input size="50" type="hidden" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="nimg" name="nimg" value="<?php echo $agent['img']?>" />
 <input type="hidden" size="25" name="mensaje" id="mitexto"  />
 <div style=" width:830px; height:55px; position:relative;  float: left;">
 <div id="info" style="position:relative; width:315px;height:55px; padding-top:13px; float:left;"><span class="variabletit" style="color:#666666"> <img src="view/app/img/app_ofertas/min/thumb_<?php echo $agent['img']?>" width="200" height="40" align="left" /><font color="#FF0000" size="+2">[ </font> <font color="#333" size="+1">
    Estado </font> <font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">imagen</span></div>
 <div id="custom-queue" class="uploadifyQueue" style="position:relative;height:55px; width:515px; float:left;"></div>
 </div>


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