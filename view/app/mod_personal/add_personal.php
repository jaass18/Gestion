<?php 
require('../../../controller/class/agent.classInt.php');
$objagent=new agent;
	
if(isset($_POST['submit'])){
	
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$id_ct = htmlspecialchars(trim($_POST['id_ct']));
	$id_dep_ct = htmlspecialchars(trim($_POST['id_dep_ct']));
	$a_paterno = htmlspecialchars(trim($_POST['a_paterno']));
	$a_materno = htmlspecialchars(trim($_POST['a_materno']));
	$curp = htmlspecialchars(trim($_POST['curp']));
	$e_mail = htmlspecialchars(trim($_POST['e_mail']));
	$id_puesto = htmlspecialchars(trim($_POST['id_puesto']));
	$num_empleado = htmlspecialchars(trim($_POST['num_empleado']));
	
	//echo "$pass";
	
	//$image = strtolower($nombre_m."_".$tipo_m.".jpg");
	//copy("/home/cesar/public_html/pri_campanas/webapp/eventos/agregar_medios/image/medios.jpg", "/home/cesar/public_html/pri_campanas/webapp/eventos/agregar_medios/image/".$image);
	//echo "INSERT INTO sis_personal (nombre, id_ct, id_dep_ct, a_paterno, a_materno, curp, e_mail, id_puesto, num_empleado) VALUES (NULL, '".$nombre."', '".$id_ct."', '".$id_dep_ct."', '".$a_paterno."', '".$a_materno."', '".$curp."', '".$e_mail."', '".$id_puesto."', '".$num_empleado."')";
	if($objagent){
		if ( $objagent->insertar_personal($nombre,$id_ct,$id_dep_ct,$a_paterno,$a_materno,$curp,$e_mail,$id_puesto, $num_empleado) == true){
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
document.getElementById("frmPersonalNuevo").reset();
}

$.validator.setDefaults({
	submitHandler: function() { 
	alert("Enviando");
	GrabarDatos_add_personal(); return false;
	 }
});

$().ready(function() {
	$("#frmPersonalNuevo").validate({
	rules: {
			nombre:  
			{
				required: true,
      			maxlength: 50
							
			},
			a_paterno:  
			{
				required: true,
      			maxlength: 50
							
			},
			a_materno:  
			{
				required: true,
      			maxlength: 50
							
			},
			
			
			},
		messages: {
			nombre:
			{
				required: "Ingresa nombre del personal",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 8 Caracteres"
			},
			a_paterno:
			{
				required: "Ingresa apellido paterno",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 60 Caracteres"
			},
			a_materno:
			{
				required: "Inserte apellido materno",
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
			url: 'view/app/mod_personal/mod_personal.php',
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
			url: 'view/app/mod_personal/mod_personal.php',
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
			url: 'view/app/mod_personal/mod_personal.php',
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
			url: 'view/app/mod_personal/mod_personal.php',
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
			url: 'view/app/mod_personal/personal.php',
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
    Administrar </font></span><span class="variabletit"><font color="#fff" size="+1">Personal</font></span><span class="variabletit" style="color:#666666">  <font color="#FF0000" size="+2"> ]</font> </span>
       
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
<form class="cmxform" id="frmPersonalNuevo" style="position:relative; overflow: auto;" name="frmPersonalNuevo" method="post" action="view/app/mod_personal/add_personal.php" >

   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font></span><span class="variabletit"><font color="#333" size="+1">Personal</font></span><span class="variabletit" style="color:#666666"><font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Nuevo</span>  <br /><br /><br />
    
<table width="100%" border="0">
          <tr>
            <td width="46%" class="headerSortdesc">
            	<span class="variable" style="font-size:11px;">Nombre Presonal:</span><br />
                <input  name="nombre" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="nombre" type="text" size="50" >
            </td>
            <td width="54%">
       	    </td>
          </tr>
          <tr>
            <td>
            	<span class="variable" style="font-size:11px;">Apellido Paterno:</span><br />
                <input  name="a_paterno" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="a_paterno" type="text" size="50" >
          </td>
            <td></td>
          </tr>
       
          <tr>
           <td> <span class="variable" style="font-size:11px;">Apellido Materno:</span><br />
             <input name="a_materno" id="a_materno"  class="required"  type="text" size="50" style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
     </td>
            <td></td>
          </tr>
          <tr>
           <td><span class="variable" style="font-size:11px;">CURP:</span><br />
             <input name="curp" id="curp"  class="required"  type="text" size="50" style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
      </td>
            <td></td>
          </tr>
          
          <tr>
          <td colspan="2">
           </td>
          </tr>
          <tr>
            <td height="33" colspan="2">
             <span class="variable" style="font-size:11px;">E-Mail:</span><br />
             <input  name="e_mail" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="e_mail" type="text" size="50" value="" >
            </td>
          </tr>
          <tr>
            <td colspan="2">
           <span class="variable" style="font-size:11px;">Centro de Trabajo:</span><br />
           <select name="id_ct" id="id_ct"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
<?php
$consulta=$objagent->consulta_centro();
	if($consulta) {
		while( $agent = mysql_fetch_array($consulta) ){
		?>
		<option value="<?php echo $agent['id_ct'];?>"><?php echo $agent['nombre'];?>|<?php echo $agent['id_ct']; ?></option>
		<?php
		}
		
	}else {echo "Problema con Consulta";}
?>
</select>
           </td>
          </tr>
          <tr>
            <td colspan="2">
           	  <span class="variable" style="font-size:11px;">Departamento</span><br />
              <select name="id_dep_ct" id="id_dep_ct"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
<?php
$consulta=$objagent->consulta_departamento();
	if($consulta) {
		while( $agent = mysql_fetch_array($consulta) ){
		?>
		<option value="<?php echo $agent['id_dep_ct'];?>"><?php echo $agent['nombre_depar'];?>|<?php echo $agent['id_dep_ct']; ?></option>
		<?php
		}
		
	}else {echo "Problema con Consulta";}
?>
</select>
           	</td>
          </tr>
          <tr>
            <td colspan="2">
            <span class="variable" style="font-size:11px;">Numero de Empleado</span><br />
    <input  name="num_empleado" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="num_empleado" type="text" size="50" >
    <label for="agregar"></label></td>
          </tr>
          
          <tr>
            <td>
              	<span class="variable" style="font-size:11px;">Puesto</span><br />
    <select name="id_puesto" id="id_puesto"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
<?php
$consulta=$objagent->consulta_puesto();
	if($consulta) {
		while( $agent = mysql_fetch_array($consulta) ){
		?>
		<option value="<?php echo $agent['id_puesto'];?>"><?php echo $agent['nom_puesto'];?>|<?php echo $agent['id_puesto']; ?></option>
		<?php
		}
		
	}else {echo "Problema con Consulta";}
?>
</select>
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