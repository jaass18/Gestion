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
	if(isset($_GET['idsucursal'])){
		
		require('../../../controller/class/agent.classInt.php');
		$objagent=new agent;
		$consulta = $objagent->mostrar_sucur($_GET['idsucursal']);
		$agent = mysql_fetch_array($consulta);
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
			url: 'view/app/mod_sucursales/consul_sucur.php',
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
			url: 'view/app/mod_sucursales/consul_sucur.php',
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
			url: 'view/app/mod_sucursales/consul_sucur.php',
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
			url: 'view/app/mod_sucursales/mod_sucur.php',
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
			url: 'view/app/mod_sucursales/mod_sucur.php',
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
    Administrar Sucursales </font> <font color="#FF0000" size="+2"> ]</font> </span>
       
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
<form class="cmxform" id="frmUserEdit" style="position:relative;" name="frmUserEdit" method="post" action="view/app/mod_sucursales/edit_sucur.php" >
<div id="map" style="width:300px; height:200px;clear: both;display: block; position:relative; float: right;height: 300px;
margin-right: 40px;margin-top: 15px;width: 400px;">
<script type="text/javascript">
//<![CDATA[

if (GBrowserIsCompatible()) {
	
	var map;
var geo;
var reasons=[]; 
var map = new GMap(document.getElementById("map")); map.addControl(new GLargeMapControl());

map.centerAndZoom(new GPoint(-98.21056365966797, 19.038189935576685), 6);
//map.addControl(new GMapTypeControl());
map.addControl(new GScaleControl());
//map.addControl(new GOverviewMapControl());
map.setMapType(G_NORMAL_MAP);


geo = new GClientGeocoder(); 
// ====== Array for decoding the failure codes ======
reasons[G_GEO_SUCCESS] = "Listo";
reasons[G_GEO_MISSING_ADDRESS] = "Falta Dirección: La dirección no se encuentra o no se escribio.";
reasons[G_GEO_UNKNOWN_ADDRESS] = "Dirección desconocida: Sin lugar geográfico correspondiente no se  pudo encontrar la dirección especificada.";
reasons[G_GEO_UNAVAILABLE_ADDRESS]= "Dirección no disponible: El código geográfico de la dirección dada no pueden ser devuelta debido a razones legales o contractuales.";
reasons[G_GEO_BAD_KEY] = "Key erronea: La clave de la API no es válido o no coincide con el dominio para el que se le dio";
reasons[G_GEO_TOO_MANY_QUERIES] = "Queries Ecxedidos: la cuota diaria de geocodificación de este sitio ha sido superado.";
reasons[G_GEO_SERVER_ERROR] = "Error del servidor: La solicitud de geocodificación no podía ser procesado con éxito.";


      
      GEvent.addListener(map, "moveend", function (overlay,point){
         if (point){
            marker.setPoint(point);
            document.frmUserEdit.x.value=point.x
            document.frmUserEdit.y.value=point.y
         }
      });
	  
	  
	  
	  function place(lat,lng) {
		 //  document.frmUserEdit.dir.value="+nom+";
		var point = new GLatLng(lat,lng);
		var marker = new GMarker(point);
			map.setCenter(point,14);
			map.addOverlay(marker);
			document.frmUserEdit.x.value=point.x;
            document.frmUserEdit.y.value=point.y;
			document.getElementById("message").innerHTML = "";
			
     // map.addOverlay(marker);
			GEvent.addListener(map, "click", function (overlay,point){
         if (point){
            marker.setPoint(point);
            document.frmUserEdit.x.value=point.x
            document.frmUserEdit.y.value=point.y
         }
      });
} 
	  place(<?php echo $agent['coordenada_y']?>,<?php echo $agent['coordenada_x']?>);
	  function showAddress() {
        var search = document.getElementById("dir").value;
        // ====== Perform the Geocoding ======        
        geo.getLocations(search, function (result)
          {
            map.clearOverlays(); 
            if (result.Status.code == G_GEO_SUCCESS) {
              // ===== If there was more than one result, "ask did you mean" on them all =====
              if (result.Placemark.length > 1) { 
                document.getElementById("message").innerHTML = "Quizas quiere decir:";
                // Loop through the results
                for (var i=0; i<result.Placemark.length; i++) {
                  var p = result.Placemark[i].Point.coordinates;
				  var nom=  result.Placemark[i].address.replace(/,/g, ".");
				 
                  document.getElementById("message").innerHTML += "<br>"+(i+1)+": <a href='#' onclick='place("+p[1]+","+p[0]+");'>"+ result.Placemark[i].address+"<\/a>";
                }
              }
              // ===== If there was a single marker =====
              else {
                document.getElementById("message").innerHTML = "";
                var p = result.Placemark[0].Point.coordinates;
                place(p[1],p[0]);
              }
            }
            // ====== Decode the error status ======
            else {
              var reason="Code "+result.Status.code;
              if (reasons[result.Status.code]) {
                reason = reasons[result.Status.code]
              } 
              alert('Could not find "'+search+ '" ' + reason);
            }
          }
        );
      }
	  }
//]]>
</script>
</div>
<div id="message"></div>
<br />
   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#333" size="+1">
    Sucursal  </font> <font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Editar</span>  <br />   
   <br />
   <input type="hidden" name="idsucursal" id="idsucursal" value="<?php echo $agent['idsucursal']?>" /><br />
<span class="variable" style=" font-size:11px;">Nombre</span><br />
            <input  name="nombre" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="nombre" type="text" size="50" value="<?php echo $agent['nombre']?>" > <br /><br />
<span class="variable" style=" font-size:11px;">Num. Telef&oacute;nico</span><br />
            <input  name="razon_s" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="razon_s" type="text" size="50" value="<?php echo $agent['razon_s']?>" > <br /><br />
 <span class="variable" style=" font-size:11px;">Dirección</span><br />
            <input  name="dir" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="dir" type="dir" size="50" value="<?php echo $agent['direccion']?>" ><a href="#" onclick="showAddress()" >buscar</a> <br /><br />
<span class="variable" style=" font-size:11px;">Zona</span><br />
            <input  name="zona" class="" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="zona" type="text" size="50" value="<?php echo $agent['zona']?>" > <br /><br />
			
            
            <span class="variable" style=" font-size:11px;">Coordenadas (X,Y)</span><br />
 <input  name="x" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="x" type="text" size="50" value="<?php echo $agent['coordenada_x']?>" ><br /><br />
  <input  name="y" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="y" type="text" size="50" value="<?php echo $agent['coordenada_y']?>" >
<br /><br />

<span class="variable" style=" font-size:11px;">Imagen</span><br />

<input  name="img" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="img" type="file" size="50" value="" >
 <input size="50" type="hidden" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="nimg" name="nimg" value="<?php echo $agent['img']?>" />
 <input type="hidden" size="25" name="mensaje" id="mitexto"  />
 <div style=" width:830px; height:55px; position:relative;  float: left;">
 <div id="info" style="position:relative; width:315px;height:55px; padding-top:13px; float:left;"><span class="variabletit" style="color:#666666"> <img src="view/app/img/min/thumb_<?php echo $agent['img']?>" width="200" height="40" align="left" /><font color="#FF0000" size="+2">[ </font> <font color="#333" size="+1">
    Estado </font> <font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">imagen</span></div>
 <div id="custom-queue" class="uploadifyQueue" style="position:relative;height:55px; width:515px; float:left;"></div>
 </div>


<p align="center">
  <input  onclick="formReset()" type="image" src="view/admin/img/limpiar.png" class="variable"  />
  <input class="variable" name="submit" id="submit" type="image" src="view/admin/img/guardar.png" />
  <input  class="variable" name="cancelar" id="cancelar" type="image" src="view/admin/img/cancelar.png"   />
  </p>
  
</form>
<script>
   window.onload=load;
   
   window.onunload=GUnload;
</script> 
</div></div>
 
   <?php
	}
}
?>