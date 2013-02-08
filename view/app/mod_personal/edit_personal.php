<?php
if(isset($_POST['submit'])){
	require('../../../controller/class/agent.classInt.php');
	$objagent=new agent;
	
	$id = htmlspecialchars(trim($_POST['id_personal']));
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$id_ct = htmlspecialchars(trim($_POST['id_ct']));
	$id_dep_ct = htmlspecialchars(trim($_POST['id_dep_ct']));
	$a_paterno = htmlspecialchars(trim($_POST['a_paterno']));
	$a_materno = htmlspecialchars(trim($_POST['a_materno']));
	$curp = htmlspecialchars(trim($_POST['curp']));
	$e_mail = htmlspecialchars(trim($_POST['e_mail']));
	$id_puesto = htmlspecialchars(trim($_POST['id_puesto']));
	$num_empleado = htmlspecialchars(trim($_POST['num_empleado']));
	
	
	if ( $objagent->edit_personal($id,$nombre,$id_ct,$id_dep_ct,$a_paterno,$a_materno,$curp,$e_mail,$id_puesto,$num_empleado) == true){
			echo 'DATOS  GUARDADOS ¡CLICK EN ACEPTAR!';
			
	}else{
		echo 'SE PRODUJO UN ERROR , INTENTE NUEVAMENTE';
	}
	
}else{
	if(isset($_GET['id_personal'])){
		
		require('../../../controller/class/agent.classInt.php');
		$objagent=new agent;
		$consulta = $objagent->mostrar_personal($_GET['id_personal']);
		$agent = mysql_fetch_array($consulta);
	?>
   <script type="text/javascript">

function formReset()
{
document.getElementById("frmPersonalEdit").reset();
}

$.validator.setDefaults({
	submitHandler: function() { 
	EditPersonal(); return false
	 }
});

$().ready(function() {
	$("#frmPersonalEdit").validate({
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
			url: 'view/app/mod_personal/mod_personal.php',
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
<form class="cmxform" id="frmPersonalEdit" style="position:relative;" name="frmPersonalEdit" method="post" action="view/app/mod_personal/edit_personal.php" >

   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> </span><span class="variabletit">Personal
    </span><span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Editar</span>  <br />   
  
   <input type="hidden" name="id_personal" id="id_personal" value="<?php echo $agent['id_personal']?>" /><br /><br />
   
   
  <table width="100%" border="0">
          <tr>
            <td width="46%" class="headerSortdesc">
            	<span class="variable" style="font-size:11px;">Nombre Presonal:</span><br />
                <input  name="nombre" type="text" class="required" id="nombre" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" value="<?php echo $agent['nombre']?>" size="50" >
            </td>
            <td width="54%">
       	    </td>
          </tr>
          <tr>
            <td>
            	<span class="variable" style="font-size:11px;">Apellido Paterno:</span><br />
                <input  name="a_paterno" type="text" class="required" id="a_paterno" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" value="<?php echo $agent['a_paterno']?>" size="50" >
          </td>
            <td></td>
          </tr>
       
          <tr>
           <td> <span class="variable" style="font-size:11px;">Apellido Materno:</span><br />
             <input name="a_materno"  type="text"  class="required" id="a_materno" style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;" value="<?php echo $agent['a_materno']?>" size="50">
     </td>
            <td></td>
          </tr>
          <tr>
           <td><span class="variable" style="font-size:11px;">CURP:</span><br />
             <input name="curp"  type="text"  class="required" id="curp" style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;" value="<?php echo $agent['curp']?>" size="50">
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
             <input  name="e_mail" type="text" class="required" id="e_mail" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" value="<?php echo $agent['e_mail']?>" size="50" >
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
		<option value="<?php echo $agent['id_dep'];?>"><?php echo $agent['nombre_depar'];?>|<?php echo $agent['id_dep']; ?></option>
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
    <input  name="num_empleado" type="text" class="required" id="num_empleado" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" value="<?php echo $agent['num_empleado']?>" size="50" >
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
}
?>